<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="/html/ltr/vertical-menu-template/index.html">
                    <span class="brand-logo">
                        <img src="/app-assets/images/logo/logo.png" class="mr-0" alt="Toast image" height="18"
                            width="25">
                    </span>
                    <h2 class="brand-text">Membership</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/dashboard"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span
                        class="badge badge-light-warning badge-pill ml-auto mr-1">2</span></a>

            </li>
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages"><i data-feather='users'></i> User</span><i
                    data-feather="more-horizontal"></i>

            <li class=" nav-item  @if ('profile-search' == request()->path())  active @endif">
                <a class="d-flex align-items-center " href="/user/search"><i data-feather="user"></i><span
                        class="menu-title text-truncate" data-i18n="User">Search</span></a>

            </li>
            <li class=" nav-item  @if ('profile-search' == request()->path())  active @endif">
                <a class="d-flex align-items-center " href="/organisations"><i data-feather="user"></i><span
                        class="menu-title text-truncate" data-i18n="User">Organization</span></a>

            </li>

            <li class="sub-menu-item">
                <a href="/role"><i data-feather='award'></i> Auth Roles</a>
            </li>
            <li class="sub-menu-item">
                <a href="/user/create"><i data-feather='user-plus'></i> Add new</a>
            </li>


            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"><i data-feather='share-2'></i>
                    Membership</span><i data-feather="more-horizontal"></i>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span
                        class="menu-title text-truncate" data-i18n="User">Search</span></a>
                <ul class="menu-content">
                    <li class="{{ 'view' == request()->path() ? 'active' : '' }}"><a class="d-flex align-items-center"
                            href="/membership/search"><i data-feather='cloud'></i><span class="menu-item text-truncate"
                                data-i18n="Membership">Membership Search</span></a>
                    </li>
                    <li class="{{ '#' == request()->path() ? 'active' : '' }}"><a class="d-flex align-items-center"
                            href="/membership/search">
                            <i data-feather='trending-up'></i><span class="menu-item text-truncate"
                                data-i18n="Profile">Transaction Search</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ 'invoice-list' == request()->path() ? 'active' : '' }}"><a class="d-flex align-items-center"
                    href="/invoice-list"><i data-feather='layers'></i><span class="menu-item text-truncate"
                        data-i18n="Profile">Invoices</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"><i data-feather='book-open'></i>
                    Journal</span><i data-feather="more-horizontal"></i>

            <li class="{{ 'invoice-list' == request()->path() ? 'active' : '' }}"><a class="d-flex align-items-center"
                    href="/invoice-list"><i data-feather='list'></i><span class="menu-item text-truncate"
                        data-i18n="Profile"> Invoices</span></a>
            </li>
            <li class="{{ 'product' == request()->path() ? 'active' : '' }}"><a class="d-flex align-items-center"
                    href="/journal">
                    <i data-feather='book-open'></i>
                    <span class="menu-item text-truncate" data-i18n="Profile"> Union Journal</span></a>
            </li>
            <li class="{{ 'product' == request()->path() ? 'active' : '' }}"><a class="d-flex align-items-center"
                                                                                href="/product">
                    <i data-feather='package'></i>
                    <span class="menu-item text-truncate" data-i18n="Profile"> Product</span></a>
            </li>
            <li class="{{ 'imports' == request()->path() ? 'active' : '' }}"><a class="d-flex align-items-center"
                    href="/imports"><i data-feather='paperclip'></i><span class="menu-item text-truncate"
                        data-i18n="Profile"> Item</span></a>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-shield">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Pre-defined
                </span>
                <i data-feather="more-horizontal"></i>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/3">
                    <i data-feather='hexagon'></i>
                    <span class="menu-title text-truncate" data-i18n="User">Processors</span></a>
                <ul class="menu-content">
                    <li class="{{ 'processor' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/processor"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Profile">Search</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather='codesandbox'></i><span
                        class="menu-title text-truncate" data-i18n="Processors">Automations</span></a>
                <ul class="menu-content">
                    <li class="{{ 'automation' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">Search</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-shield">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Courses
                </span>
                <i data-feather="more-horizontal"></i>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/course/show">
                    <i data-feather='hexagon'></i>
                    <span class="menu-title text-truncate" data-i18n="User">Courses</span></a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather='codesandbox'></i><span
                        class="menu-title text-truncate" data-i18n="Processors">Applications</span></a>
                <ul class="menu-content">
                    <li class="{{ 'course' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/course"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">All</span></a>
                    </li>
                    <li class="{{ 'automation' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">PROSPECT</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">SUBMITTED</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">REVIEW</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">ACCEPTED</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">BY FACULTY</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">WAITLISTED</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">CONFIRMED</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">ATTENDANCE</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">INVOICE</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">SENT</span></a>
                    </li>
                    <li class="{{ 'user-profile' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/automation"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Automations">CLOSED</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="CMS">
                    <i data-feather='pen-tool'></i>
                    CMS
                </span>
                <i data-feather="more-horizontal"></i>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/post/show">
                    <i data-feather='type'></i>
                    <span class="menu-title text-truncate" data-i18n="User">List</span></a>

            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/templates">
                    <i data-feather='book-open'></i>
                    <span class="menu-title text-truncate" data-i18n="User">Templates</span></a>

            </li>
        </ul>



        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-shield">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Globle Configuration
                </span>
                <i data-feather="more-horizontal"></i>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/configuration"><i data-feather='settings'></i><span
                        class="menu-title text-truncate" data-i18n="User">Configuration</span></a>
                <ul class="menu-content">
                    <li class="{{ 'configuration' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/configuration"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Profile">Search</span></a>
                    </li>
                    {{-- <li class="sub-menu-item"> --}}
                    {{-- <a href="/settings/signup-settings"> <i class="fa fa-terminal"></i>&nbsp;Signup settings</a> --}}
                    {{-- </li> --}}
                    {{-- <li class="sub-menu-item"> --}}
                    {{-- <a href="/settings/gparams-settings"> <i class="fa fa-terminal"></i>&nbsp;App settings</a> --}}
                    {{-- </li> --}}
                    {{-- <li class="sub-menu-item"> --}}
                    {{-- <a href="/settings/gparams-settings?config=layout_params"> <i class="fa fa-terminal"></i> --}}
                    {{-- &nbsp;Layout settings</a> --}}
                    {{-- </li> --}}
                    {{-- <li class="sub-menu-item"> --}}
                    {{-- <a href="/publication/admin"> <i class="fa fa-terminal"></i>&nbsp;Publications </a> --}}
                    {{-- </li> --}}
                    {{-- <li class="sub-menu-item"> --}}
                    {{-- <a href="/manager/clear-cache"> <i class="fa fa-cog"></i>&nbsp;Clear cache --}}
                    {{-- </a> --}}
                    {{-- </li> --}}
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/parameter"><i data-feather='sliders'></i>
                    <span class="menu-title text-truncate" data-i18n="User">Globle </span></a>

            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/email/show"> <span class="menu-title text-truncate"
                        data-i18n="User"><i data-feather='mail'></i>Email </span></a>

            </li>
        </ul>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-shield">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    Statistics
                </span>
                <i data-feather="more-horizontal"></i>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><span class="menu-title text-truncate"
                        data-i18n="User"><i data-feather='bar-chart'></i>Saved
                        Statistics</span></a>
                <ul class="menu-content">
                    <li class="{{ 'statistics' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/statistics"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Profile">Search</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather='pie-chart'></i><span
                        class="menu-title text-truncate" data-i18n="User">General Statistic </span></a>
                <ul class="menu-content">
                    <li class="{{ 'general' == request()->path() ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/general"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Profile">Roles</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">
                    <i data-feather='pen-tool'></i>
                    Tools
                </span><i data-feather="more-horizontal"></i>
            <li class=" nav-item">
            <li class="sub-menu-item">
                <a href="/coupon"> <i data-feather='map'></i></i>Coupon</a>
            </li>
            <li class="sub-menu-item">
                <a href="/campaign"> <i data-feather='life-buoy'></i></i>Campaign</a>
            </li>
            <li class="sub-menu-item">
                <a href="/csv_imports"> <i data-feather='upload-cloud'></i>CSV
                    imports</a>
            </li>


            <li class="sub-menu-item">
                <a href="/imports"><i data-feather='upload-cloud'></i>Imports Beneficiary</a>
            </li>
        </ul>


        </li>
    </div>
</div>
