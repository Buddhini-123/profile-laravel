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
                                    <li class="breadcrumb-item"><a href="#">Home</a>
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
                                        <div class="media-body">
                                            <h6 class="mb-25">{{ $email_data->sender_eng }}</h6>
                                            <p class="card-text">{{ $email_data->date_created }}</p>
                                        </div>
                                    </div>
                                    <!-- Form -->

                                    <form class="form-validate" id="email" action="">
                                        <input type="text" hidden value="{{ $email_data->id }}" id="id">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Title</label>
                                                    <input type="text" id="title" class="title form-control" name="title"
                                                        value="{{ $email_data->title_eng }}" />
                                                    <span class="text-danger error-text title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Title Identifier</label>
                                                    <input type="text" id="title_identifier"
                                                        class="title_identifier form-control" name="title_identifier"
                                                        value="{{ $email_data->title_identifier }}" />
                                                    <span class="text-danger error-text title_identifier_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Email Identifier</label>
                                                    <input type="text" id="email_identifier"
                                                        class="email_identifier form-control" name="email_identifier"
                                                        value="{{ $email_data->email_identifier }}" />
                                                    <span class="text-danger error-text email_identifier_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Sender Email</label>
                                                    <input type="text" id="sender_email" class="sender_email form-control" name="sender_email"
                                                        value="{{ $email_data->sender_email }}" />
                                                    <span
                                                        class="text-danger error-text sender_email_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Sender </label>
                                                    <input type="text" id="sender_eng" class="sender_email form-control" name="sender"
                                                        value="{{ $email_data->sender_eng }}" />
                                                    <span
                                                        class="text-danger error-text sender_error"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-slug">Slug</label>
                                                    <input type="text" id="banner" class="banner form-control" name="banner"
                                                        value="{{ $email_data->banner }}" />
                                                    <span class="text-danger error-text banner_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-reply_to">Reply to</label>
                                                    <input type="text" id="reply_to" class="reply_to form-control" name="reply_to"
                                                        value="{{ $email_data->reply_to }}" />
                                                    <span class="text-danger error-text reply_to_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-bcc">bcc</label>
                                                    <select class="form-control" id="bcc">
                                                        <option value="1" @if ($email_data->bcc == 'Yes') selected @endif>Yes</option>
                                                        <option value="0" @if ($email_data->bcc == 'No') selected @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-cc">cc</label>
                                                    <select class="form-control" id="cc">
                                                        <option value="1" @if ($email_data->cc == 'Yes') selected @endif>Yes</option>
                                                        <option value="0" @if ($email_data->cc == 'No') selected @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Type</label>
                                                    <select class="form-control" id="type">
                                                        <option value="Elections" @if ($email_data->type == 'Elections') selected @endif> Elections</option>
                                                        <option value="Membership" @if ($email_data->type == 'Membership') selected @endif>Membership</option>
                                                        <option value="0" @if ($email_data->type == 'Common') selected @endif>Common</option>
                                                        <option value="0" @if ($email_data->type == 'Organisational Membership') selected @endif>Organisational Membership</option>
                                                        <option value="0" @if ($email_data->type == 'Membership Profile') selected @endif>Membership Profile</option>
                                                        <option value="0" @if ($email_data->type == 'Myportal') selected @endif>Myportal</option>
                                                        <option value="0" @if ($email_data->type == 'Dinner') selected @endif>Dinner</option>
                                                        <option value="0" @if ($email_data->type == 'Awards') selected @endif>Awards</option>
                                                        <option value="0" @if ($email_data->type == 'Courses') selected @endif>Courses</option>
                                                        <option value="0" @if ($email_data->type == 'Privacy') selected @endif>Privacy</option>
                                                        <option value="0" @if ($email_data->type == 'Transaction') selected @endif>Transaction</option>
                                                        <option value="0" @if ($email_data->type == 'Subscriber') selected @endif>Subscriber</option>
                                                        <option value="0" @if ($email_data->type == 'Campaign') selected @endif>Campaign</option>
                                                        <option value="0" @if ($email_data->type == 'Journal') selected @endif>Journal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Status</label>
                                                    <select class="form-control" id="status">
                                                        <option value="1" @if ($email_data->status == '1') selected @endif>Published</option>
                                                        <option value="1" @if ($email_data->status == '1') selected @endif>Pending</option>
                                                        <option value="0" @if ($email_data->status == '0') selected @endif>Draft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mb-2">
                                                    <label>Content</label>
                                                    <div id="blog-editor-wrapper">
                                                        <div id="blog-editor-container" name="body">
                                                            <div class="editor">
                                                                <p id="body_eng" name="body">
                                                                    {!! $email_data->body_eng !!}
                                                                    <span class="text-danger error-text body_error"></span>
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-reply_to">Footer</label>
                                                    <input type="text" id="footer" class="reply_to form-control"
                                                        value="{{ $email_data->footer_eng }}" name="footer" />
                                                    <span class="text-danger error-text footer_error"></span>
                                                </div>
                                            </div>


                                            {{-- <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">Featured Image</h4>
                                                    <div class="media flex-column flex-md-row">
                                                        <img src="app-assets/images/slider/03.jpg" id="blog-feature-image"
                                                            class="rounded mr-2 mb-1 mb-md-0" width="170" height="110"
                                                            alt="Blog Featured Image" />
                                                        <div class="media-body">
                                                            <small class="text-muted">Required image resolution 800x400,
                                                                image size 10mb.</small>
                                                            <p class="my-50">
                                                                <a href="javascript:void(0);"
                                                                    id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                            </p>
                                                            <div class="d-inline-block">
                                                                <div class="form-group mb-0">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="blogCustomFile" accept="image/*" />
                                                                        <label class="custom-file-label"
                                                                            for="blogCustomFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2 mb-4">
                                                    <label for="blog-edit-login">Login</label>
                                                    <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="yes" name="login" value="1"
                                                                @if ($email_data->login) checked @endif;
                                                                class="yes custom-control-input" />
                                                            <label class="yes custom-control-label" for="yes">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="no" name="login" value="0"
                                                                class="no custom-control-input"
                                                                @if (!$email_data->login) checked @endif; />
                                                            <label class="no custom-control-label" for="no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                                    <button type="submit"
                                                        class="save_email btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
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

    <script src="/app-assets/js/email.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>


    <!-- END: Page JS-->

@endsection
