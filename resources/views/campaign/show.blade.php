@extends('layouts.app')

@section('title', 'To-Do')



@section('vendor-style')
    <!-- vendor css files -->

    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset('app-assets/css/base/pages/app-todo.css') }}">
@endsection
@section('content')

    <!-- BEGIN: Content-->
    <div class="todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                            <div class="add-task">
                                <a href="/membershipcampaign/create" class="btn btn-primary btn-block">Add Campaign</a>
                            </div>
                            <div class="sidebar-menu-list">
                                <div class="list-group list-group-filters">
                                    @foreach ($campaign as $campaign)
                                        <div style="display: flex;">
                                            <a href="javascript:void(0)" class="list-group-item list-group-item-action"
                                               style="width: 60%">
                                                <i data-feather="mail" class="font-medium-3 mr-50"></i>
                                                <span class="align-middle" id="reference"
                                                      data-reference="{{ $campaign->reference }}">{{ $campaign->reference }}</span>
                                            </a>
                                            <a href="/membershipcampaign/edit/{{ $campaign->id }}"
                                               style="margin-top: 8px">
                                                <div class="badge badge-pill badge-light-primary">Edit</div>
                                            </a>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="mt-3 px-2 d-flex justify-content-between">
                                    <h6 class="section-label mb-1">Tags</h6>
                                    <i data-feather="plus" class="cursor-pointer"></i>
                                </div>
                                <div class="list-group list-group-labels">
                                    <a href="javascript:void(0)"
                                       class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-primary mr-1"></span>Team
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-success mr-1"></span>Low
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-warning mr-1"></span>Medium
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-danger mr-1"></span>High
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-info mr-1"></span>Update
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">


                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list email-list" id="todo-task-list">
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                        <a href="/campaign/create" class="btn btn-primary mt-2 mb-sm-0 mr-0 mr-sm-1">Add
                                            Campaign Beneficiary</a>
                                    </div>
                                    @foreach ($campaign_beneficiary_data as $campaign_beneficiary_data)
                                        <li class="todo-items">
                                            <div class="todo-title-wrapper">
                                                <div class="todo-title-area">
                                                    <i data-feather="more-vertical" class="drag-icon"></i>
                                                    <div class="title-wrapper">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox"
                                                                   class="body click_category custom-control-input"
                                                                   id="body"/>
                                                            <label class="click_category custom-control-label"
                                                                   for="{{ $campaign_beneficiary_data->id }}"></label>
                                                        </div>
                                                        <span
                                                            class="click_category todo-title">{{ $campaign_beneficiary_data->email }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="todo-item-action">
                                                    <div class="badge-wrapper mr-1">
                                                        <a href="/campaign/edit/{{ $campaign_beneficiary_data->id }}"
                                                           class="btn btn-flat-warning waves-effect">Edit </a>
                                                    </div>
                                                    <small
                                                        class="text-nowrap text-muted mr-1">{{ $campaign_beneficiary_data->date_creation }}</small>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="no-results">
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                            <!-- Todo List ends -->
                        </div>


                    </div>
                </div>
            </div>
        </div>
    <!-- END: Content-->

@endsection

@section('vendor-script')
    <!-- vendor js files -->
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('app-assets/js/scripts/pages/app-todo.js') }}"></script>
    <script src="/app-assets/js/campaign-beneficiary.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>
@endsection
