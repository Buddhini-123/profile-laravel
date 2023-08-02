@extends('layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <!-- list section start -->
                                    <div class="card">

                                        <table class=" table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Reference</th>
                                                <th>Live host</th>
                                                <th>Alternative email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            <tbody>
                                            @foreach ($journal as $journals)

                                                <thead>
                                                <tr>

                                                    <td>
                                                        {{ $journals->reference }}
                                                    </td>
                                                    <td>
                                                        {{ $journals->live_host }}
                                                    </td>
                                                    <td>
                                                        {{ $journals->alternative_email }}
                                                    </td>
                                                    <td>
                                                        {{ $journals->status }}
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                    class="btn btn-sm dropdown-toggle hide-arrow"
                                                                    data-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="open-myModal1 dropdown-item"
                                                                   href="/journal/edit/{{$journals->id}}"
                                                                   data-id="" data-name="">
                                                                    <i data-feather="edit-2"
                                                                       class="mr-50"></i>
                                                                    <span>Edit</span>
                                                                </a>
                                                                <a class="dropdown-item" value="" href="">
                                                                    <i data-feather="trash"
                                                                       class="mr-50"></i>
                                                                    <span>Delete</span>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                </thead>
                                            @endforeach
                                        </table>

                                    </div>
                                    <!-- E-commerce Pagination Starts -->
                                    <section id="ecommerce-pagination">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center mt-2">
                                                        {{ $journal->links() }}
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- E-commerce Pagination Ends -->

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <!-- Page js files -->
    <script src="/app-assets/js/search.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>
@endsection


@section('PageJS')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/search.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
    <!-- END: Page JS-->

    <style>
        .select2-container--classic .select2-selection--single .select2-selection__rendered i,
        .select2-container--classic .select2-selection--single .select2-selection__rendered svg,
        .select2-container--default .select2-selection--single .select2-selection__rendered i,
        .select2-container--default .select2-selection--single .select2-selection__rendered svg {
            font-size: 1.15rem;
            height: 2rem;
            width: 2rem;
            padding: 2px;
            margin-right: 0.5rem;
            color: #fff;
            background-color: #253b71;
            border-radius: 3px;
        }

        .select2-container--classic .select2-selection--single,
        .select2-container--default .select2-selection--single {
            min-height: 2.714rem;
            padding: 3px;
            border: 1px solid #D8D6DE;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            /* padding: 2px 0px; */
            color: #444;
            border: 1px;
            background-color: #253b711f;
            line-height: 28px;
            border-radius: 5px;
        }

    </style>
@endsection
