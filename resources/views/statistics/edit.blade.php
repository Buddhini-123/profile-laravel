@extends('layouts.app')

@section('vendor-style')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" href="yearpicker.css">

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
                            <h2 class="content-header-title float-left mb-0">Edit Statistics</h2>
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
                                    </div>
                                    <!-- Form -->

                                    <form class="form-validate" id="statistic" action="/statistics/create" method="GET">
                                        <input type="text" hidden value="{{ $statistic_data->id }}" id="id" name="id">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Title</label>
                                                    <input type="text" id="title" class="title form-control" name="title"
                                                           value="{{ $statistic_data->title }}" />
                                                    <span class="text-danger error-text title_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-title">Project</label>
                                                    <input type="text" id="project" class="project form-control"
                                                           name="project" value="{{ $statistic_data->project }}" />
                                                    <span class="text-danger error-text project_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-url">Task</label>
                                                    <input type="text" id="task" class="task form-control" name="task"
                                                           value="{{ $statistic_data->task }}" />
                                                    <span class="text-danger error-text task_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Order by</label>
                                                    <select class="form-control" id="order_by" name="order_by">
                                                        <option value="1" @if ($statistic_data->order_by == '1') selected @endif>ASC</option>
                                                        <option value="0" @if ($statistic_data->order_by == '0') selected @endif>DESC</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="1" @if ($statistic_data->status == '1') selected @endif>Yes</option>
                                                        <option value="0" @if ($statistic_data->status == '0') selected @endif>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-url">Icon</label>
                                                    <select class="form-control" value="" id="icon" name="icon">
                                                        <option value="activity">activity</option>
                                                        <option value="airplay">airplay</option>
                                                        <option value="anchor">anchor</option>
                                                        <option value="archive">archive</option>
                                                        <option value="aperture">aperture</option>
                                                        <option value="align-right">align-right</option>
                                                        <option value="align-left">align-left</option>
                                                        <option value="align-center">align-center</option>
                                                        <option value="align-justify">align-justify</option>
                                                        <option value="arrow-down-circle">arrow-down-circle</option>
                                                        <option value="arrow-down-left">arrow-down-left</option>
                                                        <option value="arrow-down-right">arrow-down-right</option>
                                                        <option value="arrow-down">arrow-down</option>
                                                        <option value="arrow-left-circle">arrow-left-circle</option>
                                                        <option value="arrow_left">arrow_left</option>
                                                        <option value="arrow_right">arrow_right</option>
                                                        <option value="arrow-right-circle">arrow-right-circle</option>
                                                        <option value="arrow-up-circle">arrow-up-circle</option>
                                                        <option value="award">award</option>
                                                        <option value="at-sign">at-sign</option>
                                                        <option value="bar-chart">bar-chart</option>
                                                        <option value="book">book</option>
                                                        <option value="box">box</option>
                                                        <option value="bold">bold</option>
                                                        <option value="bluetooth">bluetooth</option>
                                                        <option value="clipboard">clipboard</option>
                                                        <option value="clock">clock</option>
                                                        <option value="cloud">cloud</option>
                                                        <option value="code">code</option>
                                                        <option value="copy">copy</option>
                                                        <option value="crop">crop</option>
                                                        <option value="disc">disc</option>
                                                        <option value="database">database</option>
                                                        <option value="delete">delete</option>
                                                    </select>
                                                    <span class="text-danger error-text icon_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-url">SQL</label>
                                                    <textarea id="sql" class="sql form-control" name="sql">{{ $statistic_data->sql }}</textarea>
                                                    <span class="text-danger error-text sql_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <p>Year</p>
                                                    <select id='date-dropdown' name="year" class="form-control col-md-12 col-12 mb-2"
                                                            >{{ $statistic_data->year }}
                                                    </select>
                                                    <span class="text-danger error-text year_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-url">Selection</label>
                                                    <textarea id="selection" class="selection form-control" name="selection"
                                                            >{{ $statistic_data->selection }}</textarea>
                                                    <span class="text-danger error-text selection_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-url">Comment</label>
                                                    <textarea id="comment" class="comment form-control" name="comment"
                                                           >{{ $statistic_data->comment }}</textarea>
                                                    <span class="text-danger error-text comment_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit"
                                                        class="save_statistic btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
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

    <script src="/app-assets/js/statistic.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>
    <script src="/path/to/cdn/jquery.slim.min.js"></script>
    <script src="yearpicker.js" async></script>

    <script>
        let dateDropdown = document.getElementById('date-dropdown');

        let currentYear = new Date().getFullYear();
        let earliestYear = 1970;

        while (currentYear >= earliestYear) {
            let dateOption = document.createElement('option');
            dateOption.text = currentYear;
            dateOption.value = currentYear;
            dateDropdown.add(dateOption);
            currentYear -= 1;
        }
    </script>

    <!-- END: Page JS-->

@endsection
