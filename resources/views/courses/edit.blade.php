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

                                    <form class="form-validate" id="course" action="/course/store" method="POST">
                                        @csrf
                                        <input type="text" hidden value="{{$courses->id }}" id="id" name="id">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Type</label>
                                                    <input type="text" id="dt_update"
                                                           class="type form-control" name="type"
                                                           value="{{$courses->type}}" />
                                                    <span class="text-danger error-text type_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Title</label>
                                                    <input type="text" id="title"
                                                        class="reference_campaign form-control" name="title"
                                                        value="{{$courses->title}}" />
                                                    <span class="text-danger error-text title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Detail</label>
                                                    <input type="text" id="detail"
                                                           class="detail form-control" name="detail"
                                                           value="{{$courses->detail}}" />
                                                    <span class="text-danger error-text detail_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Location</label>
                                                    <input type="text" id="location"
                                                           class="location form-control" name="location"
                                                           value="{{$courses->location}}" />
                                                    <span class="text-danger error-text location_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Currency</label>
                                                    <select class="form-control" id="currency" name="currency">
                                                        <option value="Euro" @if ($courses->currency == 'Euro') selected @endif>Euro</option>
                                                        <option value="USD" @if ($courses->currency == 'USD') selected @endif>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Course fee</label>
                                                    <input type="text" id="course_fee"
                                                           class="currency form-control" name="course_fee"
                                                           value="{{$courses->course_fee}}" />
                                                    <span class="text-danger error-text course_fee_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Residential Package Fee</label>
                                                    <input type="text" id="residential_package_fee"
                                                           class="currency form-control" name="residential_package_fee"
                                                           value="{{$courses->residential_package_fee}}" />
                                                    <span class="text-danger error-text residential_package_fee_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Accommodation Fee</label>
                                                    <input type="text" id="accommodation_fee"
                                                           class="accommodation_fee form-control" name="accommodation_fee"
                                                           value="{{$courses->accommodation_fee}}" />
                                                    <span class="text-danger error-text accommodation_fee_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Reference</label>
                                                    <input type="text" id="reference"
                                                           class="reference form-control" name="reference"
                                                           value="{{$courses->reference}}" />
                                                    <span class="text-danger error-text reference_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Language</label>
                                                    <select name="language" class="form-control" id="language">
                                                        @foreach ($profile_languages as $profile_language)
                                                            <option value="{{ $profile_language->id }}"
                                                                    @if ($courses->language == $profile_language->id) selected @endif>
                                                                {{ $profile_language->label_eng }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text language_error"></span>
                                                </div>
                                            </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                                    <button type="submit"
                                                        class="save_course btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
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

    <script src="/app-assets/js/course.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>


    <!-- END: Page JS-->

@endsection
