@extends('layouts.app')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
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
                @php
                $year='';
                @endphp
                @foreach ($invoice as $data)

                @if($year != date('Y', strtotime($data->membership_start)))
                    <div class="divider divider-left">
                    <div class="divider-text"><i data-feather="arrow-down"></i> *****{{ date('Y', strtotime($data->membership_start)) }}****</div>
                    </div>
                    @php
                    $year= date('Y', strtotime($data->membership_start));
                    @endphp
                @endif
                    <section class="invoice-list-wrapper">

                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="table" id="invoice-table-{{$data->id}}">
                                    <thead>
                                        <tr>
                                            <th><i data-feather='anchor'></i></th>
                                            <th>Category</th>
                                            <th><i data-feather='award'></i> NOY</th>
                                            <th><i data-feather='calendar'></i> Start</th>
                                            <th><i data-feather='calendar'></i> End</th>
                                            <th><i data-feather='triangle'></i> List amount</th>
                                            <th><i data-feather="trending-up"></i> Paid amount</th>
                                            <th><i data-feather='trending-down'></i> Due amount</th>
                                            <th><i data-feather='calendar'></i> DOP</th>
                                            <th class="cell-fit"><i data-feather='toggle-right'></i> Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                        data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="open-myModal1 dropdown-item change-discount" data-invoice-id="{{ $data->id }}"data-discount="{{$data->discount_amount}}"
                                                        data-toggle="modal"

                                                                data-target="#invoie-alter">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Alter</span>
                                                        </a>
                                                        <a class="open-myModal1 dropdown-item invoice-edit"
                                                        data-toggle="modal" data-invoice-id="{{ $data->id }}"

                                                                    data-target="#invoie-edit-form">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Quick Edit</span>
                                                        </a>
                                                        <a class="open-myModal1 dropdown-item invoice-edit" href="/invoice/edit/{{$data->id}}" >

                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                    </div> {{ $data->id }}
                                                </div>
                                            </td>
                                            <td class="membership-category">
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
                                                </div>{{ $data->short_name_eng }}
                                            </td>
                                            <td class="number-of-years">{{ $data->number_of_years }}</td>
                                            <td class="membership-start">{{ $data->membership_start }}</td>
                                            <td class="membership-end">{{ $data->membership_end }}</td>
                                            <td class="list-amount">{{ $data->list_amount }} €</td>
                                            <td class="paid-amount">{{ $data->paid_amount }} €</td>
                                            <td class="due-amount">{{ $data->due_amount }} €</td>
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
                                                </div> {{ date('d-m-Y', strtotime($data->date_of_payment)) }}
                                            </td>
                                            <td>{{ $data->payment_status }}</td>
                                        </tr>

                                        <tr class="sub-head">

                                            <th colspan="2">
                                                Addon name
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th>
                                                Total
                                            </th>
                                            <td colspan="5" rowspan="8">
                                                <div class="card card-transaction">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Transactions</h4>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm dropdown-toggle hide-arrow"
                                                                data-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="open-myModal1 dropdown-item add-payment"
                                                                    data-toggle="modal"
                                                                    data-target-invoice_id="{{ $data->id }}"
                                                                    data-target-membership_id="{{ $data->membership_id }}"
                                                                    data-target="#myModal">
                                                                    <i data-feather="edit-2" class="mr-50"></i>

                                                                    <span>Add payment</span>
                                                                </a>
                                                                <a class="open-myModal1 dropdown-item">
                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                    <span>Create a stripe payment</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @foreach ($membership_payments as $membership_payment)
                                                            @if ($membership_payment->invoice_id == $data->id)
                                                                @if ($membership_payment->source_reference == 'CASH')
                                                                    <div class="transaction-item"
                                                                        id="payment-{{ $membership_payment->id }}">
                                                                        <div class="media">
                                                                            <div class="avatar bg-light-danger rounded">
                                                                                <div class="avatar-content">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="14" height="14"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-dollar-sign avatar-icon font-medium-3">
                                                                                        <line x1="12" y1="1" x2="12"
                                                                                            y2="23"></line>
                                                                                        <path
                                                                                            d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                                                        </path>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="transaction-title">
                                                                                    {{ $membership_payment->brand_of_payment }}
                                                                                </h6>
                                                                                <small>{{ $membership_payment->source_of_operation }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="font-weight-bolder text-success">+
                                                                            {{ $membership_payment->amount }}</div>
                                                                        <!------------------------------------------------ dropdown-menu ---------------------------------------->
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-sm dropdown-toggle hide-arrow"
                                                                                data-toggle="dropdown">
                                                                                <i data-feather="more-vertical"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="open-myModal1 dropdown-item form-edit"
                                                                                    data-toggle="modal"
                                                                                    data-target-invoice_id="{{ $data->id }}"
                                                                                    data-target-membership_payment_id="{{ $membership_payment->id }}"
                                                                                    data-target="#myModal">
                                                                                    <i data-feather="edit-2"
                                                                                        class="mr-50"></i>
                                                                                     <span>Edit</span>
                                                                                </a>
                                                                                <a class="dropdown-item payment-delete"   data-target-membership_payment_id="{{ $membership_payment->id }}" data-target="#warning" data-toggle="modal" >
                                                                                    <i data-feather="trash"
                                                                                        class="mr-50"></i>
                                                                                    <span>Delete</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <!----------------------------------------------- dropdown-menu end---------------------------------->
                                                                    </div>
                                                                    @elseif ($membership_payment->source_reference == 'MASTERCARD')
                                                                    <div class="transaction-item"
                                                                        id="payment-{{ $membership_payment->id }}">
                                                                        <div class="media">
                                                                            <div class="avatar bg-light-warning rounded">
                                                                                <div class="avatar-content">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="14" height="14"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-credit-card avatar-icon font-medium-3">
                                                                                        <rect x="1" y="4" width="22"
                                                                                            height="16" rx="2" ry="2">
                                                                                        </rect>
                                                                                        <line x1="1" y1="10" x2="23"
                                                                                            y2="10"></line>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="transaction-title">Mastercard
                                                                                </h6>
                                                                                <small>{{ $membership_payment->source_of_operation }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="font-weight-bolder text-danger">-
                                                                            {{ $membership_payment->amount }}</div>
                                                                        <!------------------------------------------------ dropdown-menu ---------------------------------------->
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-sm dropdown-toggle hide-arrow"
                                                                                data-toggle="dropdown">
                                                                                <i data-feather="more-vertical"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="open-myModal1 dropdown-item form-edit"
                                                                                    data-toggle="modal"
                                                                                    data-target-invoice_id="{{ $data->id }}"
                                                                                    data-target-user_id="{{ $data->membership_id }}"
                                                                                    data-target-membership_payment_id="{{ $membership_payment->id }}"
                                                                                    data-target="#myModal">
                                                                                    <i data-feather="edit-2"
                                                                                        class="mr-50"></i>

                                                                                    <span>Editt</span>
                                                                                </a>
                                                                                <a class="dropdown-item payment-delete"  data-target-membership_payment_id="{{ $membership_payment->id }}"  data-target="#warning" data-toggle="modal">
                                                                                    <i data-feather="trash"
                                                                                        class="mr-50"></i>
                                                                                    <span>Delete</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <!----------------------------------------------- dropdown-menu end---------------------------------->
                                                                    </div>
                                                                    @elseif ($membership_payment->source_reference == 'BANK')
                                                                    <div class="transaction-item"
                                                                        id="payment-{{ $membership_payment->id }}">
                                                                        <div class="media">
                                                                            <div class="avatar bg-light-info rounded">
                                                                                <div class="avatar-content">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="14" height="14"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-trending-up avatar-icon font-medium-3">
                                                                                        <polyline
                                                                                            points="23 6 13.5 15.5 8.5 10.5 1 18">
                                                                                        </polyline>
                                                                                        <polyline points="17 6 23 6 23 12">
                                                                                        </polyline>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="transaction-title">Transfer</h6>
                                                                                <small>{{ $membership_payment->source_of_operation }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="font-weight-bolder text-success">+
                                                                            {{ $membership_payment->amount }}</div>
                                                                        <!------------------------------------------------ dropdown-menu ---------------------------------------->
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-sm dropdown-toggle hide-arrow"
                                                                                data-toggle="dropdown">
                                                                                <i data-feather="more-vertical"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="open-myModal1 dropdown-item form-edit"
                                                                                    data-toggle="modal"
                                                                                    data-target-invoice_id="{{ $data->id }}"
                                                                                    data-target-user_id="{{ $data->membership_id }}"
                                                                                    data-target-membership_payment_id="{{ $membership_payment->id }}"
                                                                                    data-target="#myModal">
                                                                                    <i data-feather="edit-2"
                                                                                        class="mr-50"></i>
                                                                                    <span>Edit</span>
                                                                                </a>
                                                                                <a class="dropdown-item payment-delete"  data-target-membership_payment_id="{{ $membership_payment->id }}"  data-target="#warning" data-toggle="modal">
                                                                                    <i data-feather="trash"
                                                                                        class="mr-50"></i>
                                                                                    <span>Delete</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <!----------------------------------------------- dropdown-menu end---------------------------------->

                                                                    </div>
                                                                @else
                                                                    <div class="transaction-item"
                                                                        id="payment-{{ $membership_payment->id }}">
                                                                        <div class="media">
                                                                            <div class="avatar bg-light-danger rounded">
                                                                                <div class="avatar-content">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="14" height="14"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="feather feather-dollar-sign avatar-icon font-medium-3">
                                                                                        <line x1="12" y1="1" x2="12"
                                                                                            y2="23"></line>
                                                                                        <path
                                                                                            d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                                                        </path>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="transaction-title">
                                                                                    {{ $membership_payment->brand_of_payment }}
                                                                                </h6>
                                                                                <small>{{ $membership_payment->source_of_operation }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="font-weight-bolder text-success">+
                                                                            {{ $membership_payment->amount }}</div>
                                                                        <!------------------------------------------------ dropdown-menu ---------------------------------------->
                                                                        <div class="dropdown">
                                                                            <button type="button"
                                                                                class="btn btn-sm dropdown-toggle hide-arrow"
                                                                                data-toggle="dropdown">
                                                                                <i data-feather="more-vertical"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <a class="open-myModal1 dropdown-item form-edit"
                                                                                    data-toggle="modal"
                                                                                    data-target-invoice_id="{{ $data->id }}"
                                                                                    data-target-membership_payment_id="{{ $membership_payment->id }}"
                                                                                    data-target="#myModal">
                                                                                    <i data-feather="edit-2"
                                                                                        class="mr-50"></i>

                                                                                    <span>Edit</span>
                                                                                </a>
                                                                                <a class="dropdown-item payment-delete"  data-target-membership_payment_id="{{ $membership_payment->id }}"  data-target="#warning" data-toggle="modal">
                                                                                    <i data-feather="trash"
                                                                                        class="mr-50"></i>
                                                                                    <span>Delete</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <!----------------------------------------------- dropdown-menu end---------------------------------->
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                        <span id="{{ $data->id }}" class="append-list"></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($invoice_items as $invoice_item)
                                            @if ($invoice_item->invoice_id == $data->id)
                                                <tr class="invoice-items" id="invoice-item-{{$invoice_item->id}}">
                                                    <td>
                                                        <!------------------------------------------------ dropdown-menu ---------------------------------------->
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm dropdown-toggle hide-arrow"
                                                                data-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="open-myModal dropdown-item invoice-item-edit" data-price="{{$invoice_item->price}}" data-quantity="{{ $invoice_item->quantity }}" data-invoice_item_id="{{$invoice_item->id}}" data-toggle="modal" data-target="#large">
                                                                     <i data-feather="edit-2" class="mr-50"></i>
                                                                   <span>Editt</span>
                                                                </a>
                                                                <a class="dropdown-item invoice-item-delete" data-target="#invoice-items-delete" data-mb_invoice-item-id="{{$invoice_item->id}}" data-toggle="modal">
                                                                    <i data-feather="trash" class="mr-50"></i>
                                                                    <span>Delete</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!----------------------------------------------- dropdown-menu end---------------------------------->
                                                    </td>
                                                    <td class="text-truncate">

                                                        <div class="avatar bg-light-primary rounded">
                                                            <div class="avatar-content">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-pocket avatar-icon font-medium-3">
                                                                    <path
                                                                        d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z">
                                                                    </path>
                                                                    <polyline points="8 10 12 14 16 10"></polyline>
                                                                </svg>
                                                            </div>
                                                        </div>&nbsp;{{ $invoice_item->title }}
                                                    </td>
                                                    <td id="quantity-{{ $invoice_item->id}}">{{ $invoice_item->quantity }}</td>
                                                    <td>{{ $invoice_item->price }}</td>
                                                    <td id="amount-{{ $invoice_item->id}}">{{ $invoice_item->amount }}</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                        <tr class="sub-head">
                                            <td colspan="3"> </td>
                                            <td>
                                                Sub Total
                                            </td>
                                            @foreach ($sum as $key => $total)
                                                @if ($key == $data->id)
                                                    <td id="total-{{$key}}">
                                                        {{ $total }} €
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr class="sub-head">
                                            <td colspan="3"> </td>
                                            <td>
                                                Paid
                                            </td>
                                            <td class="addons-paid-amount">
                                            {{ $data->paid_amount }} €
                                            </td>
                                        </tr>
                                        <tr class="sub-head">
                                            <td colspan="3"> </td>
                                            <td>
                                                Due
                                            </td>
                                            <td class="addons-due-amount">
                                            {{ $data->due_amount }} €
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                @endforeach
               <!--==============================ALL POPUP MODALS  =========================================================-->

                <!------------------------------ payment add/edit form  ----------------------------------------------------->

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
                                                <input type="date" name="transaction_date" class="form-control select-validation"
                                                    id="transaction_date" />
                                                <div class="error">
                                                    <span class="text-danger error-text transaction_date_error"></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="source_of_operation">Sourse of opration</label>
                                                    <select class="form-control select-validation" name="source_of_operation"
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
                                                    <select class="form-control select-validation" name="source_reference" id="basicSelect">
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
                                                    <select class="form-control select-validation" name="brand_of_payment"
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
                                                <input type="number" name="amount"  class="form-control validation" id="amount" />
                                                <div class="error">
                                                    <span class="text-danger error-text amount_error"></span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control select-validation" name="status" id="status">
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
                                                    <label for="back_issue_month">Back issue month</label>
                                                    <select name="back_issue_month[]" id="back_issue_month" class="select2 form-control select-validation" multiple>
                                                        <option value="" disabled>Select</option>
                                                        <option value="january">January</option>
                                                        <option value="february">February</option>
                                                        <option value="march">March</option>
                                                        <option value="april">April</option>
                                                        <option value="may">May</option>
                                                        <option value="june">June</option>
                                                        <option value="july">July </option>
                                                        <option value="august">August</option>
                                                        <option value="september">September</option>
                                                        <option value="october">October</option>
                                                        <option value="november">November</option>
                                                        <option value="december">December</option>
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
                                                    <select class="form-control select-validation" name="sponsor_id" id="sponsor_id">
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
                                                    <select class="form-control select-validation" name="promotion_id" id="promotion_id">
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
                                                    <select class="form-control select-validation" name="course_id" id="course_id">
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
                                        <!--  Comment -->
                                       <div  class="comment-list"></div>
                                        <!--/ Comment -->
                                    </div>
                                    <div class="mb-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label id=comment-edit-id >#ID</label>
                                                <textarea class="form-control mb-2 validation" rows="2" name="comment" placeholder="Comment"></textarea>
                                            </div>
                                            <div class="error">
                                                <span class="text-danger error-text comment_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="form-control" name="invoice_id" type="hidden" id="invoice_id">
                                    <input class="form-control" name="membership_id" type="hidden" id="membership_id">
                                    <input class="form-control" name="membership_payment_id" type="hidden"

                                        id="membership_payment_id">
                                        <input class="form-control" name="comment_id" type="hidden" id="comment_id">
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!------------------------------------------ payment add/edit form end ----------------------------------------------------------->
            <!--------------------------------------- membership payment delete conform modal------------------------------------>
             <div class="d-inline-block">
          <!-- Modal -->
                <div class="modal fade text-left modal-warning" id="warning" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel140">Warning Modal
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             Are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning payment-delete-conform"
                                    data-dismiss="modal">Yes</button>
                                    <button type="button" class="btn btn-warning"
                                    data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- --------------------------------------membership payment delete conform modal end--------------------------------------------------->
             <!----------------------------------------- comment delete conform modal----------------------------------->
             <div class="d-inline-block">
                <!-- Modal -->
                <div class="modal fade modal-info text-left" id="info" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel130">Info Modal</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             Are you sure ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info"
                                    data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-info comment-delete-conform"
                                    data-dismiss="modal">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-------------------------------------------------- comment delete conform modal end---------------------------------->
           <!--------------------------------------------------- addons edit form  --------------------------------------->
            <div class="modal-size-lg d-inline-block">

                <!-- Modal -->
                <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel17" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel17">Addon</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Basic multiple Column Form section start -->
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">quantity</label>
                                                <input type="number" id="quantity" class="form-control"
                                                    placeholder="quantity" name="quantity" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                            <button type="reset" class="btn btn-primary mr-1 invoice-item-update" style="float:right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Basic Floating Label Form section end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <!---------------------------------------------- addons edit form  end------------------------------------------------------->
          <!------------------------------------------------ invoice edit form  ---------------------------------------------------->
            <div class="modal-size-lg d-inline-block">
                <!-- Modal -->
                <div class="modal fade text-left" id="invoie-edit-form" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel17" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel17">Invoice Edit</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Basic multiple Column Form section start -->
                                <form class="form form-vertical" id="invoice-edit-form">
                                        <div class="row">
                                           <div class="col">
                                                <div class="form-group">
                                                    <label for="number-of-years">Number of years</label>
                                                    <input type="number" id="number-of-years" class="form-control"
                                                        name="number_of_years" placeholder="number_of_years" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="membership-start">Membership start</label>
                                                    <input type="date" id="membership-start" class="form-control"
                                                        name="membership_start" placeholder="membership_start" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="membership-end">Membership end</label>
                                                    <input type="date" id="membership-end" class="form-control"
                                                        name="membership_end" placeholder="membership_end" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="list-amount">List amount (€)</label>
                                                    <input type="text" id="list-amount" class="form-control"
                                                            name="list_amount" placeholder="list_amount" readonly/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="due-amount">Due amount (€)</label>
                                                     <input type="text" id="due-amount" class="form-control"
                                                            name="due_amount" placeholder="due_amount" readonly/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="paid-amount">Paid amount (€)</label>
                                                    <input type="text" id="paid-amount" class="form-control"
                                                        name="paid_amount" placeholder="paid_amount" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="invoice-id" name="invoice_id">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                        </div>
                                    </form>
                                <!-- Basic Floating Label Form section end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!--------------------------------------------- invoice edit form end  -------------------------------------------------->
          <!-------------------------------------------------- invoice-ALTER  ------------------------------------------------------>
          <div class="modal-size-lg d-inline-block">
                <!-- Modal -->
                <div class="modal fade text-left" id="invoie-alter" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel17" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel17">Addon</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Basic multiple Column Form section start -->
                                    <form class="form  invoice-alter">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="list_amount">List amount</label>
                                                    <input type="text" id="list-amount" class="form-control"
                                                        name="list_amount" placeholder="list amount" readonly/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="discount-amount">Discount amount</label>
                                                    <input type="text" id="discount-amount" class="form-control"
                                                        name="discount_amount" placeholder="discount" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="Comment">Comment</label>
                                                    <textarea class="form-control mb-2" rows="2" name="comment" placeholder="Comment"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id="invoice-id" class="form-control"
                                                        name="invoice_id"/>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 alter-submit">Submit</button>

                                            </div>
                                        </div>
                                    </form>
                                <!-- Basic Floating Label Form section end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!---------------------------------------------------- invoce-ALTER/  ---------------------------------------------------->
          <!--------------------------------------------- membership invoice item delete conform modal------------------------------------------>
          <div class="d-inline-block">
          <!-- Modal -->
                <div class="modal fade text-left modal-warning" id="invoice-items-delete" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel140" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel140">Warning Modal
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                             Are you sure?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning invoice-item-delete-conform"
                                    data-dismiss="modal">Yes</button>
                                    <button type="button" class="btn btn-warning"
                                    data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!--------------------------------------------- membership invoice item delete conform modal end------------------------------------------->
             <!--================================================ALL POPUP MODALS / =====================================================================-->
        </div>
        </div>

    <!-- END: Content-->
@endsection
@section('vendor-script')
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <!-- <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script> -->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <!-- <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script> -->

    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
@endsection
@section('page-script')

<script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-list.js') }}"></script>
    <style>
        .media {
            display: flex;
            align-items: flex-start;
            min-width: 200px;
        }

    </style>

@endsection
