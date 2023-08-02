@extends('layouts.app')
@section('content')
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view">
                    <!-- User Card & Plan Starts -->
                    <div class="row">
                        <!-- User Card starts-->
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            @include('blade-user.include.profile.summary')
                        </div>
                        <!-- /User Card Ends-->
                        <!-- Plan Card starts-->
                        <div class="col-xl-3 col-lg-4 col-md-5">
                            @include('blade-user.include.profile.plan_card')
                        </div>
                        <!-- /Plan CardEnds -->
                    </div>
                    <!-- User Timeline & Permissions Starts -->
                    <div class="row">
                        <!-- information starts -->
                        @include('blade-user.include.profile.information')
                        <!-- information Ends -->
                        <div class="col-md-9">
                            <!-- User Oppertunity Starts -->
                            @include('blade-user.include.profile.opportunity')
                            <!--/ User Oppertunity Starts -->
                        </div>
                        <div class="col-md-12">
                            <!-- User New MB -->
                            <div class="card">
                                <section class="app-user-edit">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-pills" role="tablist">
                                                <!-- Permission Tab Link starts -->
                                                <li class="nav-item">
                                                    <a class="nav-link d-flex align-items-center active"
                                                       id="account-tab"
                                                       data-toggle="tab" href="#account" aria-controls="account"
                                                       role="tab"
                                                       aria-selected="true">
                                                        <i data-feather='unlock'></i><span class="d-none d-sm-block">Membership Profile</span>
                                                    </a>
                                                </li>
                                                <!-- /Permission Tab Link ends -->
                                                <!-- Subscriber Tab Link starts -->
                                                <li class="nav-item">
                                                    <a class="nav-link d-flex align-items-center" id="subscriber-tab"
                                                       data-toggle="tab"
                                                       href="#subscriber" aria-controls="subscriber" role="tab"
                                                       aria-selected="false">
                                                        <i data-feather='user-check'></i><span class="d-none d-sm-block">Subscriber Profile</span>
                                                    </a>
                                                </li>
                                                <!-- /Subscriber Tab Link ends -->
                                                <!-- Addons Tab Link starts -->
                                                <li class="nav-item">
                                                    <a class="nav-link d-flex align-items-center" id="addons-tab"
                                                       data-toggle="tab"
                                                       href="#addons" aria-controls="addons" role="tab"
                                                       aria-selected="false">
                                                        <i data-feather='dollar-sign'></i><span class="d-none d-sm-block">Addons</span>
                                                    </a>
                                                </li>
                                                <!-- /Addons Tab Link ends -->
                                                <!-- Membership Tab Link starts -->
                                                <li class="nav-item">
                                                    <a class="nav-link d-flex align-items-center" id="information-tab"
                                                       data-toggle="tab"
                                                       href="#information" aria-controls="information" role="tab"
                                                       aria-selected="false">
                                                        <i data-feather='users'></i><span class="d-none d-sm-block">Configuration</span>
                                                    </a>
                                                </li>
                                                <!-- /Membership Tab Link ends -->
                                            </ul>
                                            <div class="tab-content">
                                                <!-- Permission Tab starts -->
                                                <div class="tab-pane active" id="account" aria-labelledby="account-tab"
                                                     role="tabpanel">
                                                   @include('blade-user.include.profile.permission_tab')
                                                </div>

                                                <!-- /Permission end tab -->
                                                <!-- Membership start tab -->
                                                <div class="tab-pane" id="information" aria-labelledby="information-tab"
                                                     role="tabpanel">
                                                    @include('blade-user.include.profile.membership_tab')
                                                </div>
                                                <!-- /Membership end tab -->
                                                <!-- Subscriber start tab -->
                                                <div class="tab-pane" id="subscriber" aria-labelledby="subscriber-tab"
                                                     role="tabpanel">
                                                    @include('blade-user.include.profile.subscriber')
                                                </div>
                                                <!-- /Subscriber end tab -->
                                                <!-- Addons start tab -->
                                                <div class="tab-pane" id="addons" aria-labelledby="addons-tab"
                                                     role="tabpanel">
                                                    @include('blade-user.include.profile.addons')
                                                </div>
                                                <!-- /Addons end tab -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- User New MB Ends -->
                                </section>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- User New MB -->
                            <div class="card">
                                @include('blade-user.include.profile.permission_price')
                            </div>
                            <!-- User Timeline & Permissions Ends -->
                            <!-- User Invoice Starts-->
                            <div class="row invoice-list-wrapper">
                                @include('blade-user.include.profile.user_invoice')
                            </div>
                            <!-- /User Invoice Ends-->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    <!-- BEGIN: Add jQuery-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- END: Add jQuery-->
    <!-- BEGIN: Add JS-->
    <script src="/app-assets/js/profile.js"></script>
    <script src="/app-assets/js/scientific.js"></script>
    <script src="/app-assets/js/user_view.js"></script>
    <script src="/app-assets/js/delivery-address.js"></script>
    <script src="/app-assets/js/membership.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>
    <!-- ENS: Add JS-->
@endsection
