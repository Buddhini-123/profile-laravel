
@extends('layouts.app')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset('app-assets/css/base/pages/app-invoice-list.css') }}">
    <style>
        .table th,
        .table td {
            padding: 0.52rem 1rem !important;
        }

        .table thead th,
        .table tfoot th,
        td,
        th {
            vertical-align: top;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }

        .card-transaction {
            font-size: 12px !important;
        }

    </style>
@endsection
@section('content')
    <!-- BEGIN: Content-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">

            </div>
            <div class="content-body">
            <div class="search-results">
            {{$total_count}} items found in ---- pages</div>
            </div>
            <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1207px;">
            <thead>
                <tr role="row">
                    <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 35px; display: none;" aria-label=""></th>
                    <th class="dt-checkboxes-cell dt-checkboxes-select-all sorting_disabled" rowspan="1" colspan="1" data-col="1" aria-label="">
                        <div class="custom-control custom-checkbox"><input class="custom-control-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="custom-control-label" for="checkboxSelectAll"></label></div>
                    </th>
                    <th>membership_id</th>
                    <th>membership_category_id</th>
                    <th>membership_category</th>
                    <th>email</th>
                    <th>profile-institution</th>
                    <th>title</th>
                    <th>surname</th>
                    <th>first_name</th>
                    <th>second_name</th>
                    <th>country_code</th>
                    <th>region</th>
                    <th>type_of_membership_operation</th>
                    <th>number_of_years</th>
                    <th>Membership_start</th>
                    <th>Membership_end</th>
                    <th>list_amount</th>
                    <th>discount_amount</th>
                    <th>paid_amount</th>
                    <th>due_amount</th>
                    <th>addon_amount</th>
                    <th>addons-data</th>
                    <th>membership_amount</th>
                    <th>payment_status</th>
                    <th>sponsor_id</th>
                    <th>source_of_operation</th>
                    <th>source_reference</th>
                    <th>brand_of_payment</th>
                    <th>payment_id</th>
                    <th>course_id</th>
                    <th>transaction_date</th>
                    <th>cb_transmission_date</th>
                    <th>cb_card_exp_month</th>
                    <th>cb_card_exp_year</th>
                    <th>cb_brand</th>
                    <th>reference</th>
                    <th>cb_transaction_id</th>
                    <th>cb_card_fingerprint</th>
                    <th>comments_payments</th>
                    <th>internal_amount</th>
                    <th>net_income</th>
                    <th>net_income_per_year</th>
                    <th>net_deferred_income_after_paid_year</th>
                    <th>net_conference_campaign_amount_2021</th>
                    <th>net_conference_campaign_amount_per_year</th>
                    <th>net_conference_campaign_deferred_amount</th>
                    <th>2007</th>
                    <th>2008</th>
                    <th>2009</th>
                    <th>2010</th>
                    <th>2011</th>
                    <th>2012</th>
                    <th>2013</th>
                    <th>2014</th>
                    <th>2015</th>
                    <th>2016</th>
                    <th>2017</th>
                    <th>2018</th>
                    <th>2019</th>
                    <th>2020</th>
                    <th>2021</th>
                    <th>2022</th>
                    <th>2023</th>
                    <th>2024</th>
                    <th>2025</th>
                    <th>2026</th>
                    <th>2027</th>
                    <th>2028</th>
                    <th>2029</th>
                    <th>2030</th>
                    <th>2031</th>
                    <th>2032</th>
                    <th>2033</th>
                    <th>2034</th>
                    <th>2035</th>
                    <th>2036</th>
                    <th>2037</th>
                </tr>
            </thead>
            @foreach($search_results as $search_result)
            <tbody>
                <tr class="odd">
                <td valign="top" type="checkbox"></td>
                    <td>{{$search_result['membership_id'] ?? ''}}</td>
                    <td>{{$search_result['membership_category_id'] ?? ''}}</td>
                    <td>{{$search_result['membership_category'] ?? ''}}</td>
                    <td>{{$search_result['email'] ?? ''}}</td>
                    <td>{{$search_result['profile_institution'] ?? ''}}</td>
                    <td>{{$search_result['title'] ?? ''}}</td>
                    <td>{{$search_result['surname'] ?? ''}}</td>
                    <td>{{$search_result['first_name'] ?? ''}}</td>
                    <td>{{$search_result['second_name'] ?? ''}}</td>
                    <td>{{$search_result['country_code'] ?? ''}}</td>
                    <td>{{$search_result['region'] ?? ''}}</td>
                    <td>{{$search_result['type_of_membership_opr'] ?? ''}}</td>
                    <td>{{$search_result['number_of_years'] ?? ''}}</td>
                    <td>{{$search_result['membership_start'] ?? ''}}</td>
                    <td>{{$search_result['membership_end'] ?? ''}}</td>
                    <td>{{$search_result['list_amount'] ?? ''}}</td>
                    <td>{{$search_result['discount_amount'] ?? ''}}</td>
                    <td>{{$search_result['paid_amount'] ?? ''}}</td>
                    <td>{{$search_result['due_amount'] ?? ''}}</td>
                    <td>{{$search_result['addon_amount'] ?? ''}}</td>
                    <td>{{$search_result['addons_data'] ?? ''}}</td>
                    <td>{{$search_result['membership_amount'] ?? ''}}</td>
                    <td>{{$search_result['payment_status'] ?? ''}}</td>
                    <td>{{$search_result['sponsor_id'] ?? ''}}</td>
                    <td>{{$search_result['source_of_operation'] ?? ''}}</td>
                    <td>{{$search_result['source_reference'] ?? ''}}</td>
                    <td>{{$search_result['brand_of_payment'] ?? ''}}</td>
                    <td>{{$search_result['payment_id'] ?? ''}}</td>
                    <td>{{$search_result['course_id'] ?? ''}}</td>
                    <td>{{$search_result['transaction_date'] ?? ''}}</td>
                    <td>{{$search_result['cb_transmission_date'] ?? ''}}</td>
                    <td>{{$search_result['cb_card_exp_month'] ?? ''}}</td>
                    <td>{{$search_result['cb_card_exp_year'] ?? ''}}</td>
                    <td>{{$search_result['cb_brand'] ?? ''}}</td>
                    <td>{{$search_result['reference'] ?? ''}}</td>
                    <td>{{$search_result['cb_transaction_id'] ?? ''}}</td>
                    <td>{{$search_result['cb_card_fingerprint'] ?? ''}}</td>
                    <td>{{$search_result['comments_payments'] ?? ''}}</td>
                    <td>{{$search_result['internal_amount'] ?? ''}}</td>
                    <td>{{$search_result['net_income'] ?? ''}}</td>
                    <td>{{$search_result['net_income_per_year'] ?? ''}}</td>
                    <td>{{$search_result['net_deferred_income_after_paid_year'] ?? ''}}</td>
                    <td>{{$search_result['net_conference_campaign_amount_2021'] ?? ''}}</td>
                    <td>{{$search_result['net_conference_campaign_amount_per_year'] ?? ''}}</td>
                    <td>{{$search_result['net_conference_campaign_deferred_amount'] ?? ''}}</td>
                    <td>{{$search_result['2007']}}</td>
                    <td>{{$search_result['2008']}}</td>
                    <td>{{$search_result['2009']}}</td>
                    <td>{{$search_result['2010']}}</td>
                    <td>{{$search_result['2011']}}</td>
                    <td>{{$search_result['2012']}}</td>
                    <td>{{$search_result['2013']}}</td>
                    <td>{{$search_result['2014']}}</td>
                    <td>{{$search_result['2015']}}</td>
                    <td>{{$search_result['2016']}}</td>
                    <td>{{$search_result['2017']}}</td>
                    <td>{{$search_result['2018']}}</td>
                    <td>{{$search_result['2019']}}</td>
                    <td>{{$search_result['2020']}}</td>
                    <td>{{$search_result['2021']}}</td>
                    <td>{{$search_result['2022']}}</td>
                    <td>{{$search_result['2023']}}</td>
                    <td>{{$search_result['2024']}}</td>
                    <td>{{$search_result['2025']}}</td>
                    <td>{{$search_result['2026']}}</td>
                    <td>{{$search_result['2027']}}</td>
                    <td>{{$search_result['2028']}}</td>
                    <td>{{$search_result['2029']}}</td>
                    <td>{{$search_result['2030']}}</td>
                    <td>{{$search_result['2031']}}</td>
                    <td>{{$search_result['2032']}}</td>
                    <td>{{$search_result['2033']}}</td>
                    <td>{{$search_result['2034']}}</td>
                    <td>{{$search_result['2035']}}</td>
                    <td>{{$search_result['2036']}}</td>
                    <td>{{$search_result['2037']}}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
    </div>

    <!-- END: Content-->
@endsection
@section('vendor-script')
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-list.js') }}"></script>
    <style>
        .media {
            display: flex;
            align-items: flex-start;
            min-width: 200px;
        }

    </style>
@endsection

