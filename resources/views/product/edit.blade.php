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

                                    <form class="form-validate" id="product" action="">
                                        @csrf
                                        <input type="text" hidden value="{{ $item_data->id }}" id="id">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-bcc">Product</label>
                                                    <select class="form-control" id="product_id">
                                                            @foreach ($product_data as $product_data)
                                                                <option value="{{ $product_data->id }}"
                                                                        @if ($item_data->product_id == $product_data->id) selected @endif>
                                                                    {{ $product_data->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Name</label>
                                                    <input type="text" id="name"
                                                        class="name form-control" name="name"
                                                        value="{{$item_data->name}}" />
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Description</label>
                                                    <input type="text" id="description"
                                                           class="name form-control" name="description"
                                                           value="{{$item_data->description}}" />
                                                    <span class="text-danger error-text description_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-price">Price</label>
                                                    <input type="text" id="price"
                                                           class="price form-control" name="price"
                                                           value="{{$item_data->price}}" />
                                                    <span class="text-danger error-text price_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-bcc">Display</label>
                                                    <select class="form-control" id="status">
                                                        <option value="1" @if ($item_data->status == 'Yes') selected @endif>Yes</option>
                                                        <option value="0" @if ($item_data->status == 'No') selected @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>

                                                <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                                    <button type="submit"
                                                        class="save_product btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
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

    <script src="/app-assets/js/journal.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>


    <!-- END: Page JS-->

@endsection
