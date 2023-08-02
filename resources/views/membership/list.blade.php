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
            <div class="search-results"> {{$total_result_count}} items found in {{$total_pages}} pages</div>
                @foreach ($search_result as $data)
                    <div class="divider divider-left">
                        <div class="divider-text"><i data-feather="arrow-down"></i> 2022</div>
                    </div>
                    <section class="invoice-list-wrapper">
                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Membership Category</th>
                                            <th><i data-feather='award'></i>Membership renewal type</th>
                                            <th><i data-feather='calendar'></i> Institution</th><!----==>user table data--->
                                            <th><i data-feather='calendar'></i> Department</th><!----==>user table data--->
                                            <th><i data-feather='triangle'></i> Union region</th>
                                            <th><i data-feather="trending-up"></i>Country</th>
                                            <th><i data-feather='calendar'></i>Membership end</th>
                                            <th class="cell-fit"><i data-feather='toggle-right'></i> Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $data->membership_id }}</td>
                                            <td>
                                                <div class="avatar bg-light-success rounded">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-award font-large-1">
                                                            <circle cx="12" cy="8" r="7"></circle>
                                                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88">
                                                            </polyline>
                                                        </svg>
                                                    </div>
                                                </div>
                                                {{ Helper::getLabel('mb_category', $data->membership_category_id) }}
                                            </td>
                                            <td>{{ Helper::getLabel('mb_category_group', $data->membership_renewal_type) }}</td>
                                            <td>{{ $data->institution }}</td><!----==>user table data--->
                                            <td>{{ $data->department }}</td><!----==>user table data--->
                                            <td>{{ Helper::getLabel('mb_union_regions', $data->union_region) }}</td>
                                            <td>{{ Helper::getLabel('profile_country', trim($data->country)) }}</td>
                                            <td>
                                                <div class="avatar bg-light-primary rounded mr-1">
                                                    <div class="avatar-content">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-calendar avatar-icon font-medium-3">
                                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                                        </svg>
                                                    </div>
                                                </div> @if($data->membership_end){{ date('d-m-Y', strtotime($data->membership_end)) }} @else Not found @endif
                                            </td>
                                            <td>{{ $data->membership_status }}</td>
                                        </tr>
                                        <tr class="sub-head">
                                            <td colspan="5" rowspan="8" style=" vertical-align: text-top;">
                                                <div class="card card-developer-meetup">
                                                    <div class="card-body">

                                                        @foreach($membership_prop_categories as $membership_prop_category)
                                                        @if($membership_prop_category->membership_id  == $data->membership_id)
                                                        @if($membership_prop_category->end_date > Carbon\Carbon::now())
                                                        <div class="meetup-header d-flex align-items-center">
                                                            <div class="meetup-day">
                                                                <h6 class="mb-0">THU</h6>
                                                                <h3 class="mb-0">24</h3>
                                                            </div>
                                                            <div class="my-auto">
                                                            <h4 class="card-title mb-25">{{ Helper::getLabel('mb_category', $membership_prop_category->	membership_category ) }}</h4>
                                                            <p class="card-text mb-0">start date:{{	$membership_prop_category->start_date}}- end date:{{$membership_prop_category->end_date}}</p>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="media">
                                                            <div class="avatar bg-light-success rounded">
                                                                <div class="avatar-content">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-award font-large-1">
                                                                        <circle cx="12" cy="8" r="7"></circle>
                                                                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88">
                                                                        </polyline>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="meetup-header d-flex align-items-center">
                                                                    <div class="my-auto">
                                                                        <h4 class="card-title mb-25">{{ Helper::getLabel('mb_category', $membership_prop_category->	membership_category ) }}</h4>
                                                                        <p class="card-text mb-0">start date:{{	$membership_prop_category->start_date}}- end date:{{$membership_prop_category->end_date}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="avatar-group mt-0">
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Billy Hopkins"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-9.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom" data-original-title="Amy Carson"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-6.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Brandon Miles"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-8.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Daisy Weber"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-20.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Jenny Looper"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-20.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <h6 class="align-self-center cursor-pointer ml-50 mb-0">+42
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        <!-- <div class="media">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-calendar avatar-icon font-medium-3">
                                                                        <rect x="3" y="4" width="18" height="18" rx="2"
                                                                            ry="2"></rect>
                                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Sat, May 25, 2020</h6>
                                                                <small>10:AM to 6:PM</small>
                                                            </div>
                                                            <div class="avatar-group mt-0">
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Billy Hopkins"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-9.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom" data-original-title="Amy Carson"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-6.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Brandon Miles"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-8.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Daisy Weber"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-20.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Jenny Looper"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-20.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <h6 class="align-self-center cursor-pointer ml-50 mb-0">+42
                                                                </h6>
                                                            </div>
                                                        </div>
                                                        <div class="media">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-calendar avatar-icon font-medium-3">
                                                                        <rect x="3" y="4" width="18" height="18" rx="2"
                                                                            ry="2"></rect>
                                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Sat, May 25, 2020</h6>
                                                                <small>10:AM to 6:PM</small>
                                                            </div>
                                                            <div class="avatar-group mt-0">
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Billy Hopkins"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-9.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom" data-original-title="Amy Carson"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-6.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Brandon Miles"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-8.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Daisy Weber"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-20.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Jenny Looper"
                                                                    class="avatar pull-up">
                                                                    <img src="app-assets/images/portrait/small/avatar-s-20.jpg"
                                                                        alt="Avatar" width="33" height="33">
                                                                </div>
                                                                <h6 class="align-self-center cursor-pointer ml-50 mb-0">+42
                                                                </h6>
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </th>
                                            <td colspan="5" rowspan="8" style=" vertical-align: text-top;">
                                                <div class="card card-transaction">
                                                    <div class="card-body">
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar  bg-light-success rounded">
                                                                    <div class="avatar-content">
                                                                        <i data-feather='users'
                                                                            class="avatar-icon font-medium-3"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Scientific section and
                                                                        subsection</h6>
                                                                    <small>{{ Helper::getLabel('mb_scientific_section', $data->prop_scientific_section) }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-danger">+ Add</div>
                                                        </div>
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar bg-light-success rounded">
                                                                    <div class="avatar-content">
                                                                        <i data-feather='send'
                                                                            class="avatar-icon font-medium-3"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title"> List Serves </h6>
                                                                    @foreach (explode('|', $data->prop_list_serves) as $item)
                                                                        <small>{{ Helper::getLabel('mb_scientific_section', $item) }}
                                                                        </small><br>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-danger">+ Add</div>
                                                        </div>
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar  bg-light-success  rounded">
                                                                    <div class="avatar-content">
                                                                        <i data-feather='grid'
                                                                            class="avatar-icon font-medium-3"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Working Groups</h6>
                                                                    @foreach (explode('|', $data->prop_working_groups) as $item)

                                                                        <small>{{ Helper::getLabel('mb_working_groups', $item) }}
                                                                        </small><br>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-danger">+ Add</div>
                                                        </div>
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar bg-light-warning rounded">
                                                                    <div class="avatar-content">
                                                                        <i data-feather='tag'
                                                                            class="avatar-icon font-medium-3"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Tags</h6>
                                                                    <small>-----</small>
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-danger">+ Add</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                @endforeach
                  <!-- E-commerce Pagination Starts -->
                    <section id="ecommerce-pagination">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-2">
                                        <!-- {{ $search_result -> links() }} -->
                                        <!-- {!! $search_result->links() !!} -->
                                        {!! $search_result->links() !!}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                                    <!-- E-commerce Pagination Ends -->
                <!-- popup modal  -->

                <!-- Trigger the modal with a button -->
                <!-- <button type="button" class="btn btn-info btn-lg">Add payment</button> -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title">Transaction details-Invoice</h4>
                            </div>
                            <div class="modal-body">
                                <form id="add-payment-form" method="post">
                                    @csrf
                                    <div class="mb-0">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="card-text ">
                                                    Add <code>.custom-control .custom-radio</code> as a single wrapper &amp;
                                                    add
                                                    <code>.custom-control-label</code> for better output.
                                                </p>
                                                <div class="demo-inline-spacing mb-2">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="customRadio"
                                                            class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="customRadio1">Pay</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="customRadio"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label"
                                                            for="customRadio2">Refund</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col">
                                                <label for="transaction_date" class="form-label">Transaction
                                                    date</label>
                                                <input type="date" name="transaction_date" class="form-control"
                                                    id="transaction_date" />
                                                <div class="error">
                                                    <span class="text-danger error-text transaction_date_error"></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="source_of_operation">Sourse of opration</label>
                                                    <select class="form-control" name="source_of_operation"
                                                        id="source_of_operation">
                                                        <option value="">Select</option>
                                                        <option value="OFFLINE">OFFLINE - All back office payments</option>
                                                        <option value="ONLINE">ONLINE - Online payments</option>
                                                        <option value="AFFILIATED">AFFILIATED - HRM/N-OM</option>
                                                        <option value="PROMOTION">PROMOTION - HRM/N-OM</option>
                                                        <option value="CAMPAIGN">CAMPAIGN - Courses/IJTLD</option>
                                                        <option value="INTERNAL">INTERNAL - Staff/Free</option>
                                                        <option value="REVIEW">REVIEW</option>
                                                        <option value="DEBUG">DEBUG</option>
                                                    </select>
                                                    <div class="error">
                                                        <span
                                                            class="text-danger error-text source_of_operation_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="basicSelect">Payment source</label>
                                                    <select class="form-control" name="source_reference"
                                                        id="basicSelect">
                                                        <option value="">Select</option>
                                                        <option value="CASH">CASH</option>
                                                        <option value="CARD">CARD</option>
                                                        <option value="BANK">BANK</option>
                                                        <option value="INTERNAL">INTERNAL</option>
                                                        <option value="EXCEPTIONAL">EXCEPTIONAL</option>
                                                        <option value="WAITING">WAITING</option>
                                                        <option value="COURSE">COURSE</option>
                                                        <option value="IJTLD">IJTLD</option>
                                                        <option value="CONFERENCE">CONFERENCE</option>
                                                        <option value="STAFF">STAFF</option>
                                                        <option value="INVOICE">INVOICE</option>
                                                        <option value="COMPLIMENTARY">COMPLIMENTARY</option>
                                                    </select>
                                                    <div class="error">
                                                        <span class="text-danger error-text source_reference_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="brand_of_payment">Brand ofpayment</label>
                                                    <select class="form-control" name="brand_of_payment"
                                                        id="brand_of_payment">
                                                        <option value="">Select</option>
                                                        <option value="">NONE</option>
                                                        <option value="MASTERCARD">MASTERCARD</option>
                                                        <option value="VISA">VISA</option>
                                                        <option value="CB">CB</option>
                                                        <option value="AMEX">AMEX</option>

                                                    </select>
                                                    <div class="error">
                                                        <span class="text-danger error-text brand_of_payment_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="row">
                                            <div class="col">
                                                <label for="amount" class="form-label">Amount</label>
                                                <input type="text" name="amount" class="form-control" id="amount" />
                                                <div class="error">
                                                    <span class="text-danger error-text amount_error"></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">Select</option>
                                                        <option value="1">Valid</option>
                                                        <option value="0">In valid</option>
                                                    </select>
                                                    <div class="error">
                                                        <span class="text-danger error-text status_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="basicSelect">Back issue month</label>
                                                    <select class="form-control" name="issue_month" id="basicSelect">
                                                        <option value="">Select</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July </option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                    <div class="error">
                                                        <span class="text-danger error-text issue_month_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-weight-bold">REFERENCE</p>
                                    <div class="mb-1">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="sponsor_id">Sponser or Group</label>
                                                    <select class="form-control" name="sponsor_id" id="sponsor_id">
                                                        <option value="">Select</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    <div class="error">
                                                        <span class="text-danger error-text sponsor_id_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="promotion_id">Promotion</label>
                                                    <select class="form-control" name="promotion_id" id="promotion_id">
                                                        <option value="">Select</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    <div class="error">
                                                        <span class="text-danger error-text promotion_id_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="course_id">In a relation with course</label>
                                                    <select class="form-control" name="course_id" id="course_id">
                                                        <option value="">Select</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <div class="error">
                                                        <span class="text-danger error-text course_id_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <label for="reference" class="form-label">Comments</label>
                                        <textarea class="form-control" name="reference" id="reference"
                                            rows="2"></textarea>
                                        <div class="error">
                                            <span class="text-danger error-text reference_error"></span>
                                        </div>
                                    </div>
                                    <input class="form-control" name="invoice_id" type="hidden" id="invoice_id">
                                    <input class="form-control" name="membership_id" type="hidden" id="membership_id">
                                    <input class="form-control" name="membership_payment_id" type="hidden"
                                        id="membership_payment_id">
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-primary" style="float: right;"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- popup modal  -->
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
