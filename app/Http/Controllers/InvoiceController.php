<?php

namespace App\Http\Controllers;
use App\Models\Membership_invoice;
use App\Models\Membership_invoice_item;
use App\Models\Membership_payment;
use App\Models\Membership;
use App\Models\Global_comment;
use App\Models\Ijtld_claim;
use App\Models\Membership_addon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Helper;
use Validator;
class InvoiceController extends Controller
{

    public function invoiceList($id)
    {
       
        $invoice = DB::table('Membership.membership_invoice')
        ->select('Membership.membership_invoice.*', 'Global_parameters.mb_category.short_name_eng')
        ->join('Global_parameters.mb_category', 'mb_category.id', '=', 'membership_invoice.membership_category')
        ->where('membership_invoice.membership_id', '=', $id )
        ->orderBy('membership_invoice.membership_start', 'DESC')
        ->get();

        $invoice_items = DB::table('Membership.membership_invoice')
        ->select('Membership.membership_invoice_items.*', 'Membership.membership_addons.*')
        ->join('Membership.membership_invoice_items', 'membership_invoice_items.invoice_id', '=', 'membership_invoice.id')
        ->join('Membership.membership_addons', 'membership_addons.id', '=', 'membership_invoice_items.item_id')
        ->where('membership_invoice.membership_id', '=', $id )
        ->get();

        $membership_payments=Membership_payment::where('membership_id',$id)->get();
        $course_year = Carbon::now()->format('Y');
        $sum=[];
       foreach($invoice as $data){
         $sum[$data->id]=Membership_invoice_item::where('invoice_id',$data->id)->sum('amount');
       }

    return view('invoice/invoice-list',compact('invoice','invoice_items','membership_payments','sum','course_year'));

    }
    public function addPayment(Request $request){

        $operator_id=Auth::user()->id;
        $invoice_id=$request->input('invoice_id');
        $request->validate([
            'amount' => 'required',
            'brand_of_payment' => 'required',
            'source_reference' => 'required',
            'source_of_operation' => 'required',
            'transaction_date' => 'required',
            'promotion_id' => 'required',
            'sponsor_id' => 'required',
            'status' => 'required',
            'course_id' => 'required',
       ]);
            $data = new Membership_payment;
            $data->invoice_id=$invoice_id;
            $data->amount = $request->input('amount');
            $data->membership_id = $request->input('membership_id');
            $data->brand_of_payment = $request->input('brand_of_payment');
            $data->source_reference = $request->input('source_reference');
            $data->source_of_operation = $request->input('source_of_operation');
            $data->transaction_date = $request->input('transaction_date');
            $data->promotion_id = $request->input('promotion_id');
            $data->sponsor_id = $request->input('sponsor_id');
            $data->operator_id = $request->input('operator_id');
            $data->course_id = $request->input('course_id');
            $data->status = $request->input('status');
            $data->save();


        if($request->input('comment')){
            $table = new Global_comment();
            $table->content = $request->input('comment');
            $table->ref_id = $data->id;
            $table->author_id = $operator_id;
            $table->comment_type = 'Payment';
            $table->status = '1';
            $table->save();
        }
         if($request->input('back_issue_month')){
            $months=$request->input('back_issue_month');
            $membership_id=$request->input('membership_id');
            $this->  ___updateBkIss($membership_id, $months);

        }

        $this-> __invoiceUpdate( $invoice_id);
        $invoice=Membership_invoice::where('id',$invoice_id)->first();/*-----==> display invoice------------------------- */
            return response()->json([$data,$invoice]);
        }
    public function get_payment_data(Request $request){

        $membership_payment = Membership_payment::where('id', $request->id)->first();
        $comments=Global_comment::where('ref_id',$request->id)->get();
        return response()->json([$membership_payment, $comments]);
    }
    public function editPayment(Request $request)

    {
        $operator_id=Auth::user()->id;
        $request->validate([
            'amount' => 'required',
            'brand_of_payment' => 'required',
            'source_reference' => 'required',
            'source_of_operation' => 'required',
            'transaction_date' => 'required',
            'promotion_id' => 'required',
            'sponsor_id' => 'required',
            'status' => 'required',
            'course_id' => 'required',
       ]);

        $data = Membership_payment::where('id', $request->membership_payment_id)->update([

            'amount' => $request->amount,
            'transaction_date' => $request->transaction_date,
            'brand_of_payment' => $request->brand_of_payment,
            'source_reference' => $request->source_reference,
            'source_of_operation' => $request->source_of_operation,
            'promotion_id' => $request->promotion_id,
            'sponsor_id' => $request->sponsor_id,
            'operator_id' => $request->operator_id,
            'course_id' => $request->course_id,
            'status' => $request->status,

        ]);
        if($request->input('comment') && !$request->input('comment_id')){

            $table = new Global_comment();
            $table->content = $request->input('comment');
            $table->ref_id = $request->membership_payment_id;
            $table->author_id = $operator_id;
            $table->comment_type = 'Payment';
            $table->status = '1';
            $table->save();
        }
        if($request->input('comment_id') && $request->input('comment')){

            $comment = Global_comment::where('id', $request->comment_id)->update([

                'content' => $request->comment,
                'author_id' => $operator_id,

            ]);
        }
        if($request->input('back_issue_month')){
            $months=$request->input('back_issue_month');
            $membership_id=$request->input('membership_id');
            $this->  ___updateBkIss($membership_id, $months);

        }

        $membership_payment = Membership_payment::where('id', $request->membership_payment_id)->first();
        $invoice_id=$membership_payment->invoice_id;
        $this-> __invoiceUpdate( $invoice_id);
        $invoice=Membership_invoice::where('id',$invoice_id)->first();/*-----==> display invoice------------------------- */
        return response()->json([$membership_payment,$invoice]);

    }
    public function transaction_details_validation(Request $request){

        if ($request->input_name == 'amount') {

            $validater_input = [$request->input_name => 'numeric'];
        }
        if ($request->input_name == 'comment') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'transaction_date') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'source_of_operation') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'source_reference') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'brand_of_payment') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'status') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'issue_month') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'sponsor_id') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'promotion_id') {

            $validater_input = [$request->input_name => 'required'];
        }
        if ($request->input_name == 'course_id') {

            $validater_input = [$request->input_name => 'required'];
        }


        $validator = Validator::make($request->all(), $validater_input);

        if ($validator->fails()) {
            //pass validator errors as errors object for ajax response

            return response()->json(['errors' => $validator->errors()]);
        }

        if ($validator->passes()) {
            $name = $request->input_name;

            return response()->json(['success' => $name]);
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function transaction_comments_delete(Request $request)
    {

    Global_comment::where('id', $request->comment_id)->delete();
        return response()->json(['success' => 'comment removed']);
    }
    public function membership_payment_delete(Request $request){

       Membership_payment::where('id', $request->membership_payment_id)->delete();
       return response()->json(['success' => 'Removed']);
    }
    public function get_invoice_item_data(Request $request)
    {
        $price=$request->price;
        $quantity=$request->quantity;
        $amount=$quantity*$price;
        $membership_invoice_item = Membership_invoice_item::where('id', $request->invoice_item_id)->update([

            'quantity' => $quantity,
            'amount' => $amount,
        ]);

        $membership_invoice_item = Membership_invoice_item::where('id', $request->invoice_item_id)->first();
        $total=Membership_invoice_item::where('invoice_id',$membership_invoice_item->invoice_id)->sum('amount');
        $invoice_id=$membership_invoice_item->invoice_id;
        $invoice=Membership_invoice::where('id',$invoice_id)->first();/*-----==> display invoice------------------------- */
        $this-> __invoiceUpdate( $invoice_id);
        return response()->json([$membership_invoice_item,$total,$invoice]);
    }
    public function __invoiceUpdate( $invoice_id){
        /**************************INVOICE TABLE UPDATE STEPS*****************************/
        /*  =>  retrieve  transction for invoice
            =>  retrieve  items relatated to invoice
            =>  calculate the total payment
            =>  calculate total payable
            =>  total amount to pay =list amount
            =>  total amount paid= paid amount
            =>  calculate total due =list amount -(paid amount+discount amount )
            =>  if due  amount =0 change the invoie staus to paid
            =>  if  due amount <0 invoice status to paid
            =>  if  due amount >0 invoice status to panding
            =>  list amount = due amount =>unpaid( change the status) */
        /*********************** INVOICE TABLE UPDATE STEPS/****************************/

        $paid_amount = DB::table('Membership.membership_payments')
                                ->where('invoice_id', $invoice_id)
                                ->where('status', '=', 1)
                                ->sum('membership_payments.amount');
        $list_amount = DB::table('Membership.membership_invoice_items')
                                ->where('invoice_id', $invoice_id)
                                ->where('status', '=', 1)
                                ->sum('membership_invoice_items.amount');
        $membership_invoice= Membership_invoice::where('id', $invoice_id)->first('discount_amount');
        $discount_amount=$membership_invoice->discount_amount;
        $due_amount= $list_amount-($paid_amount+$discount_amount);

        if($due_amount <= 0){
             $status='PAID';
        }else{
            $status='UNPAID';
        }

        $membership_invoice= Membership_invoice::where('id', $invoice_id)->update([

                'list_amount' => $list_amount,
                'paid_amount' => $paid_amount,
                'due_amount' => $due_amount,
                'payment_status' => $status,
        ]);
    }
    public function invoice_items_delete(Request $request){

        Membership_invoice_item::where('id',$request->membership_invoice_item_id)->delete();
        return response()->json('Item deleted successfully');
    }
    public function invoice()
    {
        return view('invoice/invoice-view');
    }

    public function invoiceEdit()
    {
        return view('invoice/invoice-edit');

    }
    public function membership_invoice_update(Request $request){

        $invoice_id=$request->invoice_id;
        $membership_invoice= Membership_invoice::where('id', $invoice_id)->update([
            'number_of_years' => $request->number_of_years,
            'membership_start' => $request->membership_start,
            'membership_end' => $request->membership_end,
        ]);
        $this-> __invoiceUpdate( $invoice_id);
        $invoice=Membership_invoice::where('id',$invoice_id)->first();/*-----==> display invoice------------------------- */
        return response()->json( $invoice);
    }
    public function change_invoice_discount(Request $request){

    $invoice_id=$request->invoice_id;
    $author_id=Auth::user()->id;
    $membership_invoice= Membership_invoice::where('id', $invoice_id)->update([
    'discount_amount' => $request->discount_amount,

    ]);
    if($request->comment){
        $table = new Global_comment();
            $table->content = $request->input('comment');
            $table->ref_id = $invoice_id;
            $table->author_id = $author_id;
            $table->comment_type = 'Invoice';
            $table->status = '1';
            $table->save();
    }
    $this-> __invoiceUpdate( $invoice_id);
    $invoice=Membership_invoice::where('id',$invoice_id)->first(); /*-----==> display invoice------------------------- */
    return response()->json( $invoice);
    }
    public function ___updateBkIss($membership_id, $months)
{
        $now = Carbon::now();
        $year=$now->year;
        $claim = Ijtld_claim::where('membership_id',$membership_id)->where('issue_year',$year)->orderBy('dt_creation', 'ASC')->first();
        $membership = Membership::where('membership_id',$membership_id)->first();
        $date=$now ->format('Y-m-d');
        $issue_month=implode("-",$months);
         $issue_quantity= $membership->quantity_paper_journal;
         if(!$issue_quantity){
         $issue_quantity=0;
        }
    if (!$claim){
         $new_jjtld_claim = new Ijtld_claim();

         $new_jjtld_claim->membership_id = $membership_id;
         $new_jjtld_claim->claim_type = "BkIss";
         $new_jjtld_claim->communication_by ='Mail';
         $new_jjtld_claim->document_to_send = 'IJTLD';
         $new_jjtld_claim->status = 'T';
         $new_jjtld_claim->issue_quantity =$issue_quantity;
         $new_jjtld_claim->issue_year = $year;
         $new_jjtld_claim->issue_month = $issue_month;
         $new_jjtld_claim->date_of_claim = $date;
         $new_jjtld_claim->dt_creation = $date;
         $new_jjtld_claim->comments = "Via Back Office Transaction";
         $new_jjtld_claim->save();
    }else{
        $jjtld_claim= Ijtld_claim::where('id', $claim->id)->update([
            'membership_id' => $membership_id,
            'claim_type' => "BkIss",
            'communication_by' =>'Mail',
            'document_to_send' => 'IJTLD',
            'status' => 'T',
            'issue_quantity' =>$issue_quantity,
            'issue_year' => $year,
            'issue_month' => $claim->issue_month,
            'date_of_claim' => $date,
            'dt_creation' => $date,
            'comments' => "Via Back Office Transaction",
         ]);
        }
       
}

/**************************INVOICE TABLE UPDATE STEPS*****************************/
/*  =>  retrieve  transction for invoice
    =>  retrieve  items relatated to invoice
    =>  calculate the total payment
    =>  calculate total payable
    =>  total amount to pay =list amount
    =>  total amount paid= paid amount
    =>  calculate total due =list amount -(paid amount+discount amount )
    =>  if due  amount =0 change the invoie staus to paid
    =>  if  due amount <0 invoice status to paid
    =>  if  due amount >0 invoice status to panding
    =>  list amount = due amount =>unpaid( change the status) */
/*********************** INVOICE TABLE UPDATE STEPS/****************************/
        public function edit($invoice_id){
        
            $membership_invoice =DB::table('Membership.membership_invoice')
            ->select('Membership.membership_invoice.*','Global_Parameters.mb_category.label_eng')
            ->join('Global_Parameters.mb_category', 'mb_category.id', '=','membership_invoice.membership_category')
            ->where('membership_invoice.id','=',$invoice_id )
            ->first();
            $invoice_items = DB::table('Membership.membership_invoice')
            ->select('Membership.membership_invoice_items.*', 'Membership.membership_addons.*')
            ->join('Membership.membership_invoice_items', 'membership_invoice_items.invoice_id', '=', 'membership_invoice.id')
            ->join('Membership.membership_addons', 'membership_addons.id', '=', 'membership_invoice_items.item_id')
            ->where('membership_invoice.id', '=', $invoice_id)
            ->get();
            $profile_languages = Helper::getList("profile_language");
            $membership_addons=Helper::getList("membership_addons");
            // dd($membership_addons);
            $billing_details = DB::table('Identity.billing_details')->where('id', $membership_invoice->billing_details_id)->first();
// dd($invoice_items);
            return view('invoice/invoice-edit-new',['invoice' => $membership_invoice,
                                                    'billing_details' => $billing_details ,
                                                    'invoice_items'=>$invoice_items,
                                                    'membership_addons'=>$membership_addons
        ]);
        
        }
        public function load_invoice_itmes(Request $request){
            // dd($request->invoice_id);
            $invoice_id=$request->invoice_id;
            $invoice_items = DB::table('Membership.membership_invoice')
            ->select('Membership.membership_invoice_items.*', 'Membership.membership_addons.*','membership_invoice_items.id as item_table_id')
            ->leftjoin('Membership.membership_invoice_items', 'membership_invoice.id','=','membership_invoice_items.invoice_id')
            ->leftjoin('Membership.membership_addons', 'membership_invoice_items.item_id', '=', 'membership_addons.id')
            ->where('membership_invoice.id', '=', $invoice_id)
            ->get();
        
            return response()->json( [$invoice_items]);
        }
        public function save_invoice_itmes(Request $request){
   
            if($request['item_data']['item_table_id']=='new'){
                $table = new Membership_invoice_item();
                $table->invoice_id =$request['item_data']['invoice_id'];
                $table->item_id =$request['item_data']['product'];
                $table->amount =$request['item_data']['price'];
                $table->quantity =$request['item_data']['qty'];
                $table->status = 1;
                $table->save();

                $data=$table->id;
            }else{
                $Membership_invoice_item= Membership_invoice_item::where('id', $request['item_data']['item_table_id'])->update([
                    'invoice_id' =>$request['item_data']['invoice_id'],
                    'item_id' =>$request['item_data']['product'],
                    'amount' =>$request['item_data']['price'],
                    'quantity' => $request['item_data']['qty'],
                    'status' =>1,
                     ]);
               $data=$request['item_data']['item_table_id'];
   
               
            }
            return response()->json( $data);
        }
        public function addons_data_load(Request $request)
        {
            $data = [];
            // $page=$request->page;
            if ($request->page) {
                $page = $request->page;
            } else {
                $page = $request->page;
                $page = 1;
            }
            if ($request->has('q')) {
                $search = $request->q;
                $data = Membership_addon::select("id", "title","price")
                    ->where('title', 'LIKE', "%$search%")
                    ->limit($page * 10)
                    ->get()->toArray();
                $total = Membership_addon::select("id", "title")
                    ->where('title', 'LIKE', "%$search%")
                    ->get()->count();
            }
            $count = count($data);
    
            $data_array = array(
    
                'total_count' => $total,
                'incomplete_results' => false,
                'items' => $data,
                'page' => $page,
            );
    
    
            return response()->json($data_array);
      
        }
}
/**-------
 *  0 => {#301 ▼
      +"id": 2
      +"invoice_id": 4
      +"item_id": 2
      +"addon_id": 2
      +"amount": 1050
      +"quantity": 3
      +"status": 1
      +"last_update": "2022-01-28 15:51:48"
      +"created_at": "2022-01-15 11:49:08"
      +"updated_at": "2022-01-15 11:49:08"
      +"title": "Printed Journal (IJTLD) - 350 euros"
      +"description": "Subscribe to the printed version of IJTLD ."
      +"price": "350"
 ***/
