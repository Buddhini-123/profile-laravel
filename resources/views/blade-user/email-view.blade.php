@extends('layouts.app')


@section('vendor-style')
 <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/jstree.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/editors/quill/katex.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/editors/quill/quill.snow.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/editors/quill/quill.bubble.css">
@endsection
@section('page-style')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-tree.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-file-manager.css">

    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-quill-editor.css">
<link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->
@endsection
@section('content')


    <!-- BEGIN: Content-->
    <div class="file-manager-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-file-manager">
                        <div class="sidebar-inner">
                            <!-- sidebar menu links starts -->
                            <!-- add file button -->
                            <div class="dropdown dropdown-actions">
                                <button class="btn btn-primary add-file-btn text-center btn-block" type="button"
                                    id="addNewFile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="align-middle">Add New</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="addNewFile">
                                    <div class="dropdown-item" data-toggle="modal" data-target="#new-folder-modal">
                                        <div class="mb-0">
                                            <i data-feather="folder" class="mr-25"></i>
                                            <span class="align-middle">Folder</span>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="mb-0" for="file-upload">
                                            <i data-feather="upload-cloud" class="mr-25"></i>
                                            <span class="align-middle">File Upload</span>
                                            <input type="file" id="file-upload" hidden />
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div for="folder-upload" class="mb-0">
                                            <i data-feather="upload-cloud" class="mr-25"></i>
                                            <span class="align-middle">Folder Upload</span>
                                            <input type="file" id="folder-upload" webkitdirectory mozdirectory hidden />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- add file button ends -->

                            <!-- sidebar list items starts  -->
                            <div class="sidebar-list">
                                <!-- links for file manager sidebar -->
                                <div class="list-group">
                                    <div class="my-drive"></div>

                                </div>

                                <!-- links for file manager sidebar ends -->


                            </div>
                            <!-- side bar list items ends  -->
                            <!-- sidebar menu links ends -->
                        </div>
                    </div>

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <!-- overlay container -->
                        <div class="body-content-overlay"></div>

                        <!-- file manager app content starts -->
                        <div class="file-manager-main-content">
                            <!-- search area start -->
                            <div class="file-manager-content-header d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-toggle d-block d-xl-none float-left align-middle ml-1">
                                        <i data-feather="menu" class="font-medium-5"></i>
                                    </div>
                                    <div class="input-group input-group-merge shadow-none m-0 flex-grow-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0">
                                                <i data-feather="search"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control files-filter border-0 bg-transparent"
                                            placeholder="Search" />
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="file-actions">
                                        <i data-feather="arrow-down-circle"
                                            class="font-medium-2 cursor-pointer d-sm-inline-block d-none mr-50"></i>
                                        <i data-feather="trash"
                                            class="font-medium-2 cursor-pointer d-sm-inline-block d-none mr-50"></i>
                                        <i data-feather="alert-circle"
                                            class="font-medium-2 cursor-pointer d-sm-inline-block d-none"
                                            data-toggle="modal" data-target="#app-file-manager-info-sidebar"></i>
                                        <div class="dropdown d-inline-block">
                                            <i class="font-medium-2 cursor-pointer" data-feather="more-vertical"
                                                role="button" id="fileActions" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            </i>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="fileActions">
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="move" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">Open with</span>
                                                </a>
                                                <a class="dropdown-item d-sm-none d-block" href="javascript:void(0);"
                                                    data-toggle="modal" data-target="#app-file-manager-info-sidebar">
                                                    <i data-feather="alert-circle" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">More Options</span>
                                                </a>
                                                <a class="dropdown-item d-sm-none d-block" href="javascript:void(0);">
                                                    <i data-feather="trash" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">Delete</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="plus" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">Add shortcut</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="folder-plus" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">Move to</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="star" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">Add to starred</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="droplet" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">Change color</span>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="download" class="cursor-pointer mr-50"></i>
                                                    <span class="align-middle">Download</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- search area ends here -->

                            <div class="file-manager-content-body">

                                  <!-- Snow Editor start -->
                            <section class="snow-editor">
                                <div class="row">
                                    <div class="col-12">


                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div id="snow-wrapper">
                                                            <div id="snow-container">
                                                                <div class="quill-toolbar">
                                                                    <span class="ql-formats">
                                                                        <select class="ql-header">
                                                                            <option value="1">Heading</option>
                                                                            <option value="2">Subheading</option>
                                                                            <option selected>Normal</option>
                                                                        </select>
                                                                        <select class="ql-font">
                                                                            <option selected>Sailec Light</option>
                                                                            <option value="sofia">Sofia Pro</option>
                                                                            <option value="slabo">Slabo 27px</option>
                                                                            <option value="roboto">Roboto Slab</option>
                                                                            <option value="inconsolata">Inconsolata</option>
                                                                            <option value="ubuntu">Ubuntu Mono</option>
                                                                        </select>
                                                                    </span>
                                                                    <span class="ql-formats">
                                                                        <button class="ql-bold"></button>
                                                                        <button class="ql-italic"></button>
                                                                        <button class="ql-underline"></button>
                                                                    </span>
                                                                    <span class="ql-formats">
                                                                        <button class="ql-list" value="ordered"></button>
                                                                        <button class="ql-list" value="bullet"></button>
                                                                    </span>
                                                                    <span class="ql-formats">
                                                                        <button class="ql-link"></button>
                                                                        <button class="ql-image"></button>
                                                                        <button class="ql-video"></button>
                                                                    </span>
                                                                    <span class="ql-formats">
                                                                        <button class="ql-formula"></button>
                                                                        <button class="ql-code-block"></button>
                                                                    </span>
                                                                    <span class="ql-formats">
                                                                        <button class="ql-clean"></button>
                                                                    </span>
                                                                </div>
                                                                <div class="editor">
                                                                    <h1 class="ql-align-center">Quill Rich Text Editor</h1>


                                                                    <p class="card-text"><br /></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                    </div>
                                </div>
                            </section>
                            <!-- Snow Editor end -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- File Info Sidebar Ends -->

                        <!-- File Dropdown Starts-->
                        <div class="dropdown-menu dropdown-menu-right file-dropdown">
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i data-feather="eye" class="align-middle mr-50"></i>
                                <span class="align-middle">Preview</span>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i data-feather="user-plus" class="align-middle mr-50"></i>
                                <span class="align-middle">Share</span>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i data-feather="copy" class="align-middle mr-50"></i>
                                <span class="align-middle">Make a copy</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i data-feather="edit" class="align-middle mr-50"></i>
                                <span class="align-middle">Rename</span>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                data-target="#app-file-manager-info-sidebar">
                                <i data-feather="info" class="align-middle mr-50"></i>
                                <span class="align-middle">Info</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i data-feather="trash" class="align-middle mr-50"></i>
                                <span class="align-middle">Delete</span>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <i data-feather="alert-circle" class="align-middle mr-50"></i>
                                <span class="align-middle">Report</span>
                            </a>
                        </div>
                        <!-- /File Dropdown Ends -->

                        <!-- Create New Folder Modal Starts-->
                        <div class="modal fade" id="new-folder-modal">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">New Folder</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" value="New folder"
                                            placeholder="Untitled folder" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mr-1"
                                            data-dismiss="modal">Create</button>
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Create New Folder Modal Ends -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
 <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@endsection

@section('VendorJS')
    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <script src="app-assets/vendors/js/extensions/jstree.min.js"></script>
    <!-- END: Page Vendor JS-->

    @endsection
@section('PageJS')
      <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/app-file-manager.js"></script>
    <script src="app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <script src="app-assets/js/scripts/forms/form-quill-editor.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function ()
        {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endsection


