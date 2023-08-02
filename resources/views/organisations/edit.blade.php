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
                                    <form id="organization-edit" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $organization->id }}" name="organization_id" />
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Account Name</label>
                                                    <input type="text" id="account_name" class="form-control validation" name="account_name" value="{{ $organization->account_name }}" />
                                                    <span class="text-danger error-text account_name_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Phone</label>
                                                    <input type="text" id="phone" class="form-control validation" name="phone" value="{{ $organization->phone }}" />
                                                    <span class="text-danger error-text phone_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">CEO</label>
                                                    <input type="text" id="ceo" class="form-control validation" name="ceo" value="{{ $organization->ceo }}" />
                                                    <span class="text-danger error-text ceo_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Type</label>
                                                    <input type="text" id="type" class="form-control validation" name="type" value="{{ $organization->type }}" />
                                                    <span class="text-danger error-text type_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Website </label>
                                                    <input type="text" id="website" class="form-control validation" name="website" value="{{ $organization->website }}" />
                                                    <span class="text-danger error-text website_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug">Geographic area of interest</label>
                                                    <select class="select-2 form-control" name="mb_union_region[]" id="mb_union_region" multiple>
                                                        @foreach($mb_union_regions as $mb_union_region)
                                                        <option value="{{$mb_union_region->code}}">{{$mb_union_region->label_eng}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text mb_union_region_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-cautions">Cautions</label>
                                                    <input type="text" id="cautions" class="form-control validation" name="cautions" value="{{ $organization->cautions }}" />
                                                    <span class="text-danger error-text cautions_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug">Description</label>
                                                    <textarea type="text" id="description" class="form-control validation" name="description">{{ $organization->description }}</textarea>
                                                    <span class="text-danger error-text description_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-primary_contact">Primary Contact</label>
                                                    <input type="text" id="primary_contact" class="form-control validation" name="primary_contact" value="{{ $organization->primary_contact }}" />
                                                    <span class="text-danger error-text primary_contact_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug">Common Area of interest</label>
                                                    <textarea type="text" id="common_area_of_interest" class="form-control validation" name="common_area_of_interest">{{ $organization->common_area_of_interest }}</textarea>
                                                    <span class="text-danger error-text common_area_of_interest_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="basic-icon-default-country">Billing Country</label>
                                                    <select name="billing_country" class="form-control select-validation" id="billing_country">
                                                        @foreach ($profile_countries as $profile_country)
                                                        <option value="{{ $profile_country->code_ISO }}" @if ($organization->billing_country == $profile_country->label_eng) selected @endif> {{ $profile_country->label_eng }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text billing_country_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug">Billing city</label>
                                                    <input type="text" id="billing_city" class="form-control validation" name="billing_city" value="{{ $organization->billing_city }}" />
                                                    <span class="text-danger error-text billing_city_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-primary_contact">Billing state</label>
                                                    <input type="text" id="billing_country" class="form-control validation" name="billing_state" value="{{ $organization->billing_state }}" />
                                                    <span class="text-danger error-text billing_state_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-billing_postal_code">Billing postal code</label>
                                                    <input type="text" id="billing_postal_code" class="form-control validation" name="billing_postal_code" value="{{ $organization->billing_postal_code }}" />
                                                    <span class="text-danger error-text billing_postal_code_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                    UPDATE
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

    <script src="/app-assets/js/organisations.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>

    <script src="/app-assets/js/scripts/forms/form-org-edit.js"></script>
    <!-- END: Page JS-->

@endsection
