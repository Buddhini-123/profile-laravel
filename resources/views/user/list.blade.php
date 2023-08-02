@extends('layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
@endsection
@section('content')
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

                                        @include('user.inc.search')
                                        <table class=" table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>User</th>
                                                    <th>Email</th>
                                                    <th>Institution</th>
                                                    <th>Country</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            <tbody>
                                                @foreach ($search as $user)

                                                    <thead>
                                                        <tr>

                                                            <td>
                                                                {{ Helper::getLabel('profile_title', $user->title) }}
                                                                {{ $user->first_name }}
                                                                {{ $user->second_name }}
                                                                {{ $user->surname }}
                                                            </td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->institution }}</td>
                                                            <td>{{ Helper::getLabel('profile_country', $user->country) }}</td>
                                                            <td>{{ $user->status }}</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn btn-sm dropdown-toggle hide-arrow"
                                                                        data-toggle="dropdown">
                                                                        <i data-feather="more-vertical"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="open-myModal1 dropdown-item"
                                                                            href="/user/edit/{{ $user->user_id }}"
                                                                            data-id="{{ $user->user_id }}"
                                                                            data-name="{{ $user->name }}">
                                                                            <i data-feather="edit-2"
                                                                                class="mr-50"></i>
                                                                            <span>Edit</span>
                                                                        </a>
                                                                        <a class="open-myModal1 dropdown-item"
                                                                            href="/membership/edit/{{ $user->user_id }}">
                                                                            <i data-feather="edit-2"
                                                                                class="mr-50"></i>
                                                                            <span>Edit Membership</span>
                                                                        </a>
                                                                        <a class="dropdown-item" value=""
                                                                            href="/invoice/{{ $user->user_id }}">
                                                                            <i data-feather="edit-2"
                                                                                class="mr-50"></i>
                                                                            <span>Invoice</span>
                                                                        </a>
                                                                        <a class="dropdown-item" value=""
                                                                            href="/delete-permission/{{ $user->user_id}}">
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
                                                        {{ $search -> links() }}
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
