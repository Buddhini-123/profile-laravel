<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use DB;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $journal = DB::table('journal.union_journals')
            ->select([
                'journal.union_journals.*',
                'identity.users.title',
                'identity.users.address_line1','identity.users.city','identity.users.state','identity.users.country',
                'identity.users.address_line2','identity.users.address_line3','identity.users.po_code',
            ])
            ->leftjoin('identity.users', 'journal.union_journals.author_id', '=', 'identity.users.id')
            ->paginate(10);
//dd($journal);
        return view('journal.show', ['journal' => $journal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $journal_data = Journal::where('journal.union_journals.id', $id)->select([
            'journal.union_journals.*',
            'identity.users.title','identity.users.telephone','identity.users.mobile',
            'identity.users.address_line1','identity.users.city','identity.users.state','identity.users.country',
            'identity.users.address_line2','identity.users.address_line3','identity.users.po_code',
        ])
            ->leftjoin('identity.users', 'journal.union_journals.author_id', '=', 'identity.users.id')->first();
        //dd($journal_data);
        return view('journal.edit',compact('journal_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        //
    }
}
