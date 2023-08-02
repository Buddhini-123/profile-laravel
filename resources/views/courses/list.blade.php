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

                @foreach ($membership as $data)
                    <div class="divider divider-left">
                        <div class="divider-text"><i data-feather="arrow-down"></i> 2022</div>
                    </div>

                    <section class="invoice-list-wrapper">

                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><i data-feather='anchor'></i></th>
                                            <th>Type</th>
                                            <th><i data-feather='award'></i> Title</th>
                                            <th><i data-feather='calendar'></i> Start</th>
                                            <th><i data-feather='dollar-sign'></i> Currency</th>
                                            <th><i data-feather='triangle'></i>Location</th>
                                            <th><i data-feather="dollar-sign"></i>Course Fee</th>
                                            <th><i data-feather='dollar-sign'></i>Accommodation Fee</th>
                                            <th><i data-feather='calendar'></i>Updated</th>
                                            <th class="cell-fit"><i data-feather='toggle-right'></i> Language</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td width="3%">
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                        data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="open-myModal1 dropdown-item" href="/invoice-edit">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Alter</span>
                                                        </a>
                                                        <a class="open-myModal1 dropdown-item" href="/invoice-edit">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                    </div> {{ $data->id }}
                                                </div>
                                            </td>
                                            <td width="5%">
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
                                                </div>{{ $data->type }}
                                            </td>
                                            <td width="20%">{{ $data->course_title }}</td>
                                            <td width="10%">{{ $data->start_date }}</td>
                                            <td>{{ $data->currency }}</td>
                                            <td>{{ $data->location }}</td>
                                            <td>{{ $data->course_fee }}</td>
                                            <td>{{ $data->accommodation_fee }}</td>
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
                                                </div> {{ date('d-m-Y', strtotime($data->updated_at)) }}
                                            </td>
                                            <td>{{ $data->language }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="10">
                                                <ul class="nav nav-tabs course_click" role="tablist" name="course_click" id="course_click">
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-statusid="1">
                                                        <a class="nav-link active" id="homeIcon-tab" data-toggle="tab"
                                                            href="#homeIcon" aria-controls="home" role="tab"
                                                            aria-selected="true"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Prospect<br>&nbsp;</span></a>
                                                    </li>
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-statusid="2">
                                                        <a class="nav-link" id="profileIcon-tab" data-toggle="tab"
                                                            href="#profileIcon" aria-controls="profile" role="tab"
                                                            aria-selected="false"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Application<br> Submitted</span></a>
                                                    </li>
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-status="{{$data->status}}" data-statusid="3">
                                                        <a class="nav-link" id="disabledIcon-tab" data-toggle="tab"
                                                           href="#disabledIcon" aria-controls="disabled" role="tab"
                                                           aria-selected="false"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Review<br>&nbsp;</span></a>
                                                    </li>
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-status="{{$data->status}}" data-statusid="4">
                                                        <a class="nav-link" id="aboutIcon-tab" data-toggle="tab"
                                                            href="#aboutIcon" aria-controls="about" role="tab"
                                                            aria-selected="false"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Accepted <br>by Faculty</span></a>
                                                    </li>
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-status="{{$data->status}}" data-statusid="5">
                                                        <a class="nav-link" id="waitlistedIcon-tab" data-toggle="tab"
                                                            href="#aboutIcon" aria-controls="about" role="tab"
                                                            aria-selected="false"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Waitlisted <br>by Faculty</span></a>
                                                    </li>
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-status="{{$data->status}}" data-statusid="6">
                                                        <a class="nav-link" id="attendanceIcon-tab" data-toggle="tab"
                                                            href="#attendanceIcon" aria-controls="about" role="tab"
                                                            aria-selected="false"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Confirmed <br>Attendance</span></a>
                                                    </li>
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-status="{{$data->status}}" data-statusid="7">
                                                        <a class="nav-link" id="invoiceIcon-tab" data-toggle="tab"
                                                            href="#invoiceIcon" aria-controls="about" role="tab"
                                                            aria-selected="false"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Invoice <br>Sent</span></a>
                                                    </li>
                                                    <li class="nav-item" data-id="{{$data->app_id}}" data-status="{{$data->status}}" data-statusid="8">
                                                        <a class="nav-link" id="closedIcon-tab" data-toggle="tab"
                                                            href="#closedIcon" aria-controls="about" role="tab"
                                                            aria-selected="false"><i data-feather='chevron-right'></i>
                                                            <span class="tablist">Closed<br>&nbsp;</span></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="sub-head">

                                            <td colspan="4" rowspan="1" style=" vertical-align: text-top;">
                                                <div class="card  mb-0">

                                                    <div class="card-body" style="position: relative;">
                                                        <h6 class="section-label">Additional Information</h6>


                                                        <div class="transaction-item">
                                                            <div class="media pb-2">
                                                                <div class="">
                                                                    <div class="avatar-content">
                                                                        <img class="mr-1"
                                                                            src="app-assets/images/icons/json.png"
                                                                            alt="data.json" height="23">
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title"> supporting file</h6>
                                                                    <small>{{ $data->supporting_file }}</small>
                                                                </div>
                                                            </div>

                                                        </div>




                                                        <div class="d-flex justify-content-between mb-1">
                                                            <div class="d-flex align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-circle font-medium-1 text-primary">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                </svg>
                                                                <span class="font-weight-bold ml-75">Language Read</span>
                                                            </div>
                                                            @if($data->knowledge_read == '1')
                                                            <span>EXCELLENT</span>
                                                            @elseif($data->knowledge_read == '2')
                                                                <span>GOOD</span>
                                                            @elseif($data->knowledge_read == '3')
                                                                <span>AVERAGE</span>
                                                            @else
                                                                <span>BASIC</span> @endif
                                                        </div>
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <div class="d-flex align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-circle font-medium-1 text-warning">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                </svg>
                                                                <span class="font-weight-bold ml-75">Language Spoken</span>
                                                            </div>
                                                            @if($data->knowledge_spoken == '1')
                                                                <span>EXCELLENT</span>
                                                            @elseif($data->knowledge_spoken == '2')
                                                                <span>GOOD</span>
                                                            @elseif($data->knowledge_spoken == '3')
                                                                <span>AVERAGE</span>
                                                            @else
                                                                <span>BASIC</span> @endif
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-circle font-medium-1 text-danger">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                </svg>
                                                                <span class="font-weight-bold ml-75">Language
                                                                    Written</span>
                                                            </div>
                                                            @if($data->knowledge_written == '1')
                                                                <span>EXCELLENT</span>
                                                            @elseif($data->knowledge_written == '2')
                                                                <span>GOOD</span>
                                                            @elseif($data->knowledge_written == '3')
                                                                <span>AVERAGE</span>
                                                            @else
                                                                <span>BASIC</span> @endif
                                                        </div>

                                                    </div>
                                                    <div class="card-body" style="position: relative;">

                                                        <div class="media mb-2">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">
                                                                    <i data-feather='message-square'></i>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Challenges Faced 1</h6>
                                                                <small>{{ $data->challenges_you_face_1 }}</small>
                                                            </div>
                                                        </div>

                                                        <div class="media mb-2">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">
                                                                    <i data-feather='message-square'></i>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Challenges Faced 2</h6>
                                                                <small>{{ $data->challenges_you_face_2 }}</small>
                                                            </div>
                                                        </div>

                                                        <div class="media mb-2">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">
                                                                    <i data-feather='message-square'></i>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0 challenges_you_face_3">Challenges Faced 3</h6>
                                                                <small>{{ $data->challenges_you_face_3 }}</small>
                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                                </th>
                                            <td colspan="3" rowspan="1" style=" vertical-align: text-top;">


                                                <div class="card card-app-design mb-0">
                                                    <div class="card-body">
                                                        <div class="design-group">
                                                            <h6 class="section-label">Applicant</h6>

                                                            <div class="d-flex justify-content-between mb-1">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar ">
                                                                        <img src="app-assets/images/portrait/small/avatar-s-9.jpg"
                                                                            width="34" height="34" alt="Avatar">
                                                                    </div>
                                                                    <span class="font-weight-bold ml-75">Language
                                                                        Read</span>
                                                                </div>

                                                                <span class="d-flex justify-content-between  ">


                                                                    <div class="badge badge-light-warning mr-1">Figma</div>

                                                                </span>
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
                                                                            ry="2">
                                                                        </rect>
                                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Curriculum Vitae</h6>
                                                                <small>{{ $data->cv_file }}</small>
                                                            </div>
                                                        </div>
                                                        <div class="media mt-1">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-map-pin avatar-icon font-medium-3">
                                                                        <path
                                                                            d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                                        </path>
                                                                        <circle cx="12" cy="10" r="3"></circle>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Applicant Address </h6>
                                                                <small>{{ $data->address_line1 }} ,{{ $data->address_line2 }},
                                                                    {{ $data->address_line3 }}</small>

                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="card-body">
                                                        <div class="design-group">
                                                            <h6 class="section-label">Sponsor</h6>

                                                            <div class="d-flex justify-content-between mb-1">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar ">
                                                                        <img src="app-assets/images/portrait/small/avatar-s-9.jpg"
                                                                            width="34" height="34" alt="Avatar">
                                                                    </div>
                                                                    <span class="font-weight-bold ml-75">Language
                                                                        Read</span>
                                                                </div>

                                                                <span class="d-flex justify-content-between  ">


                                                                    <div class="badge badge-light-warning mr-1">Figma</div>

                                                                </span>
                                                            </div>




                                                        </div>

                                                        <div class="media mt-1">
                                                            <div class="avatar bg-light-primary rounded mr-1">
                                                                <div class="avatar-content">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-map-pin avatar-icon font-medium-3">
                                                                        <path
                                                                            d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                                        </path>
                                                                        <circle cx="12" cy="10" r="3"></circle>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="mb-0">Sponsor Address </h6>
                                                                <small>{{ $data->address_line }} ,{{ $data->city }},
                                                                    {{ $data->country }}</small>

                                                            </div>
                                                        </div>


                                                    </div>


                                                    <div class="card-body">

                                                        <div class="design-group">
                                                            <div class="badge badge-light-warning mr-1">Figma</div>
                                                            <div class="badge badge-light-primary">Wireframe</div>
                                                        </div>

                                                        <div class="design-planning-wrapper">
                                                            <div class="design-planning">
                                                                <p class="card-text mb-25">Due Date</p>
                                                                <h6 class="mb-0">12 Apr, 21</h6>
                                                            </div>
                                                            <div class="design-planning">
                                                                <p class="card-text mb-25">Budget</p>
                                                                <h6 class="mb-0">$49251.91</h6>
                                                            </div>
                                                            <div class="design-planning">
                                                                <p class="card-text mb-25">Cost</p>
                                                                <h6 class="mb-0">$840.99</h6>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </td>

                                            <td colspan="3" rowspan="1" style=" vertical-align: text-top;">
                                                <div class="card card-transaction  mb-0">
                                                    <div class="card-header">
                                                        <h6 class="section-label">Payment</h6>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-more-vertical font-medium-3 cursor-pointer">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="12" cy="5" r="1"></circle>
                                                            <circle cx="12" cy="19" r="1"></circle>
                                                        </svg>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="transaction-item">
                                                            <div class="media">
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
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Wallet</h6>
                                                                    <small>Starbucks</small>
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-danger">- $74</div>
                                                        </div>
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar bg-light-success rounded">
                                                                    <div class="avatar-content">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-check avatar-icon font-medium-3">
                                                                            <polyline points="20 6 9 17 4 12"></polyline>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Bank Transfer</h6>
                                                                    <small>Add Money</small>
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-success">+ $480</div>
                                                        </div>
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar bg-light-danger rounded">
                                                                    <div class="avatar-content">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-dollar-sign avatar-icon font-medium-3">
                                                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                                                            <path
                                                                                d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                                            </path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Paypal</h6>
                                                                    <small>Add Money</small>
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-success">+ $590</div>
                                                        </div>
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar bg-light-warning rounded">
                                                                    <div class="avatar-content">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-credit-card avatar-icon font-medium-3">
                                                                            <rect x="1" y="4" width="22" height="16" rx="2"
                                                                                ry="2"></rect>
                                                                            <line x1="1" y1="10" x2="23" y2="10"></line>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Mastercard</h6>
                                                                    <small>Ordered Food</small>
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-danger">- $23</div>
                                                        </div>
                                                        <div class="transaction-item">
                                                            <div class="media">
                                                                <div class="avatar bg-light-info rounded">
                                                                    <div class="avatar-content">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                            height="14" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-trending-up avatar-icon font-medium-3">
                                                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18">
                                                                            </polyline>
                                                                            <polyline points="17 6 23 6 23 12"></polyline>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h6 class="transaction-title">Transfer</h6>
                                                                    <small>Refund</small>
                                                                </div>
                                                            </div>
                                                            <div class="font-weight-bolder text-success">+ $98</div>
                                                        </div>
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-primary btn-block waves-effect waves-float waves-light">Invoice</button>

                                                </div>



                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10">

                                                <div class="card-body invoice-padding py-0">
                                                    <!-- Invoice Note starts -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group mb-2">
                                                                <label for="note"
                                                                    class="form-label font-weight-bold">Note:</label>
                                                                <textarea class="form-control" rows="2"
                                                                          id="note">{{ $data->reference }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Invoice Note ends -->
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                @endforeach


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
                                                    <label for="brand_of_payment">Brand of payment</label>
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
    <script src="/app-assets/js/course.js"></script>
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
