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

                                    <form class="form-validate" id="membership-campaign" action="/membershipCampaign/store" method="POST">
                                        @csrf
                                        <input type="text" hidden value="{{$campaigns->id }}" id="id" name="id">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Reference</label>
                                                    <select class="form-control" id="reference" name="reference">
                                                        @foreach($campaign_reference as $campaign_reference)
                                                            <option value="{{($campaign_reference->reference)}}" @if($campaigns->reference==$campaign_reference->reference) selected @endif>
                                                                {{($campaign_reference->reference)}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text reference_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Campaign year</label>
                                                    <input type="text" id="campaign_year"
                                                           class="campaign_year form-control" name="campaign_year"
                                                           value="{{$campaigns->campaign_year}}" />
                                                    <span class="text-danger error-text campaign_year_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Title</label>
                                                    <input type="text" id="title_eng"
                                                           class="title form-control" name="title_eng"
                                                           value="{{$campaigns->title_eng}}" />
                                                    <span class="text-danger error-text title_eng_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Description</label>
                                                    <input type="text" id="description_eng"
                                                           class="title form-control" name="description_eng"
                                                           value="{{$campaigns->description_eng}}" />
                                                    <span class="text-danger error-text title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Category Excluded</label>
                                                    <select class="form-control" id="category_excluded" name="category_excluded" multiple="multiple">
                                                        @foreach($mb_category as $key=> $mb_category)
                                                            <option value="{{($mb_category->id)}}"
                                                                    @if($campaigns->category_excluded==$mb_category->id) selected @endif>
                                                                {{($mb_category->id)}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text category_excluded_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Category Included</label>
                                                    <input type="text" id="category_included"
                                                           class="category_included form-control" name="category_included"
                                                           value="{{$campaigns->category_included}}" />
                                                    <span class="text-danger error-text category_included_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Promotion Rate</label>
                                                    <input type="text" id="promotion_rate"
                                                           class="promotion_rate form-control" name="promotion_rate"
                                                           value="{{$campaigns->promotion_rate}}" />
                                                    <span class="text-danger error-text promotion_rate_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-bcc">Service</label>
                                                    <select class="form-control" id="service" name="service">
                                                        <option value="IJAEs" @if ($campaigns->service == 'IJAEs') selected @endif>IJAEs</option>
                                                        <option value="IJRwg" @if ($campaigns->service == 'IJRwg') selected @endif>IJRwg</option>
                                                        <option value="Course" @if ($campaigns->service == 'Course') selected @endif>Course</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-bcc">Button</label>
                                                    <select class="form-control" id="button_eng" name="button_eng">
                                                        <option value="Accept my free membership" @if ($campaigns->button_eng == 'Accept my free membership') selected @endif>Accept my free membership</option>
                                                        <option value="Save" @if ($campaigns->button_eng == 'Save') selected @endif>Save</option>
                                                    </select>
                                                </div>
                                            </div>
{{--                                            <div class="card-body">--}}
{{--                                                <p class="card-text mb-0">--}}
{{--                                                    Button--}}
{{--                                                </p>--}}
{{--                                                <div class="demo-inline-spacing">--}}
{{--                                                    <div class="custom-control custom-radio">--}}
{{--                                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">--}}
{{--                                                        <label class="custom-control-label" for="customRadio1">Accept my free membership</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="custom-control custom-radio">--}}
{{--                                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">--}}
{{--                                                        <label class="custom-control-label" for="customRadio2">Save</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Promotion years</label>
                                                    <input type="text" id="promotion_years"
                                                           class="promotion_years form-control" name="promotion_years"
                                                           value="{{$campaigns->promotion_years}}" />
                                                    <span class="text-danger error-text promotion_rate_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-bcc">Promotion Category</label>
                                                    <select class="form-control" id="promotion_category" name="promotion_category" multiple="multiple">
                                                        <option value="MO1" @if ($campaigns->promotion_category == 'MO1') selected @endif>MO1</option>
                                                        <option value="MO2" @if ($campaigns->promotion_category == 'MO2') selected @endif>MO2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Promotion url</label>
                                                    <input type="text" id="promotion_url"
                                                           class="promotion_url form-control" name="promotion_url"
                                                           value="{{$campaigns->promotion_url}}" />
                                                    <span class="text-danger error-text promotion_url_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Promotion email</label>
                                                    <input type="text" id="promotion_email"
                                                           class="promotion_email form-control" name="promotion_email"
                                                           value="{{$campaigns->promotion_email}}" />
                                                    <span class="text-danger error-text promotion_email_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-bcc">Display</label>
                                                    <select class="form-control" id="display" name="display">
                                                        <option value="Y" @if ($campaigns->display == 'Yes') selected @endif>Yes</option>
                                                        <option value="N" @if ($campaigns->display == 'No') selected @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>

                                                <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                                    <button type="submit"
                                                        class="save_campaign btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
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

    <script src="/app-assets/js/membership-campaign.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>


    <!-- END: Page JS-->

@endsection
