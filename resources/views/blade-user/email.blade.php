@extends('layouts.app')

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
                                    <!-- profile search start -->

                                    <form class="form-validate" id="email" action="">
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <h4 class="mb-1">
                                                    <span class="align-middle">Email</span>
                                                </h4>
                                            </div>
                                            <input hidden type="text" id="id">

                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="title_identifier">Title Identifier
                                                    </label>
                                                    <input id="title_identifier" class="form-control dt"
                                                           type="text"
                                                    />
                                                    <span class="text-danger error-text title_identifier_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="email_identifier">Email Identifier
                                                    </label>
                                                    <input id="email_identifier" class="form-control dt"
                                                           type="text"
                                                    />
                                                    <span class="text-danger error-text email_identifier_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="sender_email">Sender Email
                                                    </label>
                                                    <input id="sender_email" class="form-control dt"
                                                           type="text"
                                                    />
                                                    <span class="text-danger error-text sender_email_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="sender_eng">Sender
                                                    </label>
                                                    <input id="sender_eng" class="form-control dt"
                                                           type="text"
                                                    />
                                                    <span class="text-danger error-text sender_eng_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="title">Email title
                                                    </label>
                                                    <textarea id="title" class="form-control dt"
                                                    ></textarea>
                                                </div>
                                                <span class="text-danger error-text title_error"></span>
                                            </div>
                                            <div class="col-lg-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="body">Email body
                                                    </label>
                                                    <textarea id="body" class="form-control dt"
                                                ></textarea>
                                                </div>
                                                <span class="text-danger error-text body_error"></span>
                                            </div>
                                            <div class="col-lg-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="footer">Email footer
                                                    </label>
                                                    <textarea id="footer" class="form-control dt"
                                                    ></textarea>
                                                </div>
                                                <span class="text-danger error-text footer_error"></span>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="type">Type</label>
                                                    <select id="type" class="form-control">
                                                        @foreach($email as $email)
                                                            <option value="{{$email->type}}"
                                                            >{{($email->type)}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text type_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status
                                                    </label>
                                                    <input id="status" class="form-control dt"
                                                           type="text"
                                                    />
                                                    <span class="text-danger error-text status_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label for="banner">Banner
                                                    </label>
                                                    <input id="banner" class="form-control dt"
                                                           type="text"
                                                    />
                                                    <span class="text-danger error-text banner_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="cc">cc</label>
                                                    <select id="cc" class="form-control">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <span class="text-danger error-text cc_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="bcc">bcc</label>
                                                    <select id="bcc" class="form-control">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <span class="text-danger error-text bcc_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit"
                                                        class=" btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /profile search ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    <!-- BEGIN: Add jQuery-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- END: Add jQuery-->
    <!-- BEGIN: Add JS-->
    <script src="/app-assets/js/email.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>
    <!-- ENS: Add JS-->

@endsection
