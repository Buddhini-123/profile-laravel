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
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Blog Edit</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a>
                                    </li>
                                    <li class="breadcrumb-item active">Edit
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i
                                        class="mr-1" data-feather="check-square"></i><span
                                        class="align-middle">Todo</span></a><a class="dropdown-item"
                                    href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span
                                        class="align-middle">Chat</span></a><a class="dropdown-item"
                                    href="app-email.html"><i class="mr-1" data-feather="mail"></i><span
                                        class="align-middle">Email</span></a><a class="dropdown-item"
                                    href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span
                                        class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="avatar mr-75">
                                            <img src="app-assets/images/portrait/small/avatar-s-9.jpg" width="38"
                                                height="38" alt="Avatar" />
                                        </div>
                                    </div>
                                    <!-- Form -->

                                    <form class="form-validate" id="email" action="">
                                        <input type="text" hidden value="{{ $post_data->id }}" id="id">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Title</label>
                                                    <input type="text" id="title" class="title form-control" name="title"
                                                        value="{{ $post_data->title }}" />
                                                    <span class="text-danger error-text title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Sub Title</label>
                                                    <input type="text" id="sub_title" class="sub_title form-control"
                                                        name="sub_title" value="{{ $post_data->sub_title }}" />
                                                    <span class="text-danger error-text sub_title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Slug</label>
                                                    <input type="text" id="slug" class="slug form-control" name="slug"
                                                        value="{{ $post_data->slug }}" />
                                                    <span class="text-danger error-text slug_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-url">Url</label>
                                                    <input type="text" id="url" class="banner form-control" name="url"
                                                        value="{{ $post_data->url }}" />
                                                    <span class="text-danger error-text url_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Status</label>
                                                    <select class="form-control" id="status">
                                                        <option value="1" @if ($post_data->status == '1') selected @endif>Published</option>
                                                        <option value="1" @if ($post_data->status == '1') selected @endif>Pending</option>
                                                        <option value="0" @if ($post_data->status == '0') selected @endif>Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Type</label>
                                                    <select class="form-control" id="type" name="type">
                                                        <option value="Elections" @if ($post_data->type == 'Elections') selected @endif> Elections
                                                        </option>
                                                        <option value="Membership" @if ($post_data->type == 'Membership') selected @endif>Membership
                                                        </option>
                                                        <option value="Common" @if ($post_data->type == 'Common') selected @endif>Common</option>
                                                        <option value="Organisational Membership" @if ($post_data->type == 'Organisational Membership') selected @endif>
                                                            Organisational Membership</option>
                                                        <option value="Membership Profile" @if ($post_data->type == 'Membership Profile') selected @endif>
                                                            Membership Profile</option>
                                                        <option value="Myportal" @if ($post_data->type == 'Myportal') selected @endif>Myportal</option>
                                                        <option value="Dinner" @if ($post_data->type == 'Dinner') selected @endif>Dinner</option>
                                                        <option value="Awards" @if ($post_data->type == 'Awards') selected @endif>Awards</option>
                                                        <option value="Courses" @if ($post_data->type == 'Courses') selected @endif>Courses</option>
                                                        <option value="Privacy" @if ($post_data->type == 'Privacy') selected @endif>Privacy</option>
                                                        <option value="Transaction" @if ($post_data->type == 'Transaction') selected @endif>Transaction
                                                        </option>
                                                        <option value="Subscriber" @if ($post_data->type == 'Subscriber') selected @endif>Subscriber
                                                        </option>
                                                        <option value="Campaign" @if ($post_data->type == 'Campaign') selected @endif>Campaign</option>
                                                        <option value="Journal" @if ($post_data->type == 'Journal') selected @endif>Journal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mb-2">
                                                    <label>Content</label>
                                                    <div id="blog-editor-wrapper">
                                                        <div id="blog-editor-container">
                                                            <div class="editor">
                                                                <p id="content">
                                                                    {!! $post_data->content !!}
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit"
                                                    class="save_post btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
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

    <script src="/app-assets/js/post.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>


    <!-- END: Page JS-->

@endsection
