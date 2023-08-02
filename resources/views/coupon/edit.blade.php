@extends('layouts.app')

@section('vendor-style')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
    <!-- END: Vendor CSS-->
@endsection

@section('page-style')


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/page-blog.css">
    <!-- END: Page CSS-->
@endsection

@section('content')

    <!-- BEGIN: Content-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Form -->
                                    <h3>Coupon Details</h3>
                                    <form class="form-validate" id="coupon" action="/coupon/store" method="POST">
                                        @csrf
                                        <input type="text" hidden value="{{$coupons->id }}" id="id" name="id">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Code</label>
                                                    <input type="text" id="code"
                                                        class="code form-control" name="code"
                                                        value="{{$coupons->code}}" />
                                                    <span class="text-danger error-text code_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Course id</label>
                                                    <input type="text" id="course_id"
                                                           class="course_id form-control" name="course_id"
                                                           value="{{$coupons->course_id}}" />
                                                    <span class="text-danger error-text course_id_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Reference</label>
                                                    <input type="text" id="reference"
                                                           class="reference form-control" name="reference"
                                                           value="{{$coupons->reference}}" />
                                                    <span class="text-danger error-text reference_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Tag</label>
                                                    <input type="text" id="reference"
                                                           class="tag form-control" name="tag"
                                                           value="{{$coupons->tag}}" />
                                                    <span class="text-danger error-text tag_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Is used</label>
                                                    <select class="form-control" id="is_used" name="is_used">
                                                        <option value="1" @if ($coupons->is_used == '1') selected @endif>Yes</option>
                                                        <option value="0" @if ($coupons->is_used == '0') selected @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Used date</label>
                                                    <input type="datetime" id="used_date"
                                                           class="used_date form-control" name="used_date"
                                                           value="{{$coupons->used_date}}" />
                                                    <span class="text-danger error-text used_date_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Is Active</label>
                                                    <select class="form-control" id="is_active" name="is_active">
                                                        <option value="1" @if ($coupons->is_active == '1') selected @endif>Yes</option>
                                                        <option value="0" @if ($coupons->is_active == '0') selected @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Email</label>
                                                    <input type="text" id="email"
                                                           class="email form-control" name="email"
                                                           value="{{$coupons->email}}" />
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Membership start date</label>
                                                    <input type="date" id="membership_start"
                                                           class="membership_start form-control" name="membership_start"
                                                           value="{{$coupons->membership_start}}" />
                                                    <span class="text-danger error-text membership_start_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Membership end date</label>
                                                    <input type="date" id="membership_end"
                                                           class="membership_end form-control" name="membership_end"
                                                           value="{{$coupons->membership_end}}" />
                                                    <span class="text-danger error-text membership_end_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title"> start date</label>
                                                    <input type="datetime" id="start_date"
                                                           class="start_date form-control" name="start_date"
                                                           value="{{$coupons->start_date}}" />
                                                    <span class="text-danger error-text start_date_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">end date</label>
                                                    <input type="datetime" id="end_date"
                                                           class="end_date form-control" name="end_date"
                                                           value="{{$coupons->end_date}}" />
                                                    <span class="text-danger error-text end_date_error"></span>
                                                </div>
                                            </div>

                                                <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                                    <button type="submit"
                                                        class="save_coupon btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                        Save changes
                                                    </button>
                                                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                                </div>
                                            </div>

                                    </form>

                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog Edit -->

            </div>
        </div>
    <!-- END: Content-->
@endsection


@section('vendor-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
@endsection



@section('page-script')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-list.js') }}"></script>

    <script src="{{ asset('app-assets/js/scripts/pages/page-blog-edit.js') }}"></script>

    <script src="/app-assets/js/coupon.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>


    <!-- END: Page JS-->

@endsection
