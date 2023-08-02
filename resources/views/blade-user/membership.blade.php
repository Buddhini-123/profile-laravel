@extends('layouts.app')
@section('content')
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view">


                    <!-- User Timeline & Permissions Starts -->
                    <div class="row">


                        <div class="col-md-12">
                            <!-- User New MB -->
                            <div class="card">
                                <section class="app-user-edit">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-pane" id="information" aria-labelledby="information-tab"
                                                 role="tabpanel">
                                                <form class="form-validate" id="addmembership">
                                                    <div class="row mt-1">
                                                        <div class="col-12">
                                                            <h4 class="mb-1">
                                                                <i data-feather="user"
                                                                   class="font-medium-4 mr-25"></i>
                                                                <span class="align-middle">Membership</span>
                                                            </h4>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">

                                                                <input type="text" hidden id="id" name="id" value="{{$user->id}}">
                                                                <input type="text" hidden value="{{$membership->membership_id = (Auth::user()->id)}}">
                                                                <label for="status">Membership Renewal Type</label>
                                                                <select class="form-control" value="" id="renewal_type" name="">
                                                                    @foreach($membership as $key=> $membership)
                                                                        <option value="{{$membership->membership_renewal_type}}">{{($membership->membership_renewal_type)}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobile">Membership renewal
                                                                    category</label>
                                                                <input id="renewal_cateory" type="text" class="form-control"
                                                                       value="{{$membership->membership_renewal_category}}" name=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="history">Membership history</label>
                                                                <input id="history" type="text" class="form-control"
                                                                       value="{{$membership->membership_history}}" name="history"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="website">Skype</label>
                                                                <input id="skype" type="text" class="form-control"
                                                                       value="{{$membership->skype}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="website">About Yourself</label>
                                                                <input id="yourself" type="text" class="form-control"
                                                                       value="{{$membership->about_yourself}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="website">Paper Journal Quantity</label>
                                                                <input id="paper_journal" type="text" class="form-control"
                                                                       value="{{$membership->quantity_paper_journal}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="website">Prop Working Groups</label>
                                                                <input id="prop_working" type="text" class="form-control"
                                                                       value="{{$membership->prop_working_groups}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="website">Reference</label>
                                                                <input id="reference" type="text" class="form-control"
                                                                       value="{{$membership->reference}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label for="website">Origin</label>
                                                                <select class="form-control" value="" id="origin" name="">
                                                                @foreach($membership7 as $key=> $membership7)
                                                                    <option value="{{($membership7->origin)}}">{{($membership7->origin)}}</option>
                                                                @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="status">Renewal Status</label>
                                                                <select class="form-control" value="" id="renewal_status" name="">
                                                                    @foreach($membership1 as $key=> $membership1)
                                                                        <option value="{{($membership1->renewal_status)}}">{{($membership1->renewal_status)}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span
                                                                    class="text-danger error-text status_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="status">Validity Status</label>
                                                                <select class="form-control" value="" id="validity_status" name="">
                                                                    @foreach($membership2 as $key=> $membership2)
                                                                        <option value="{{($membership2->validity_status)}}">{{($membership2->validity_status)}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span
                                                                    class="text-danger error-text status_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="status">Payment Source</label>
                                                                <select class="form-control" value="" id="payment_source_tag" name="">
                                                                    @foreach($membership3 as $key=> $membership3)
                                                                        <option value="{{($membership3->payment_source_tag)}}">{{($membership3->payment_source_tag)}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span
                                                                    class="text-danger error-text status_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="status">Current Membership
                                                                    Category</label>
                                                                <select class="form-control" value="" id="current_membership_category" name="" multiple="multiple">
                                                                    @foreach($membership4 as $key=> $membership4)
                                                                        <option value="{{($membership4->current_membership_category)}}">{{($membership4->current_membership_category)}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span
                                                                    class="text-danger error-text status_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="status">Share Profile</label>
                                                                <select class="form-control" value="" id="share_profile_agreed" name="">
                                                                    @foreach($membership5 as $key=> $membership5)
                                                                        <option value="{{($membership5->share_profile_agreed)}}">{{($membership5->share_profile_agreed)}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span
                                                                    class="text-danger error-text status_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="status">Membership Status</label>
                                                                <select class="form-control" value="" id="membership_status"
                                                                        name="status">
                                                                    @foreach($membership6 as $key=> $membership6)
                                                                        <option value="{{($membership6->membership_status)}}">{{($membership6->membership_status)}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span
                                                                    class="text-danger error-text membership_status_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-6">
                                                            <div class="form-group">
                                                                <label class="d-block mb-1" id="preffered">Preffered Method of
                                                                    Contact</label>
                                                                <div
                                                                    class="custom-control custom-checkbox custom-control-inline">
                                                                    <input type="checkbox"
                                                                           class="custom-control-input"
                                                                           id="email"/>
                                                                    <label class="custom-control-label"
                                                                           for="email">Email</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-checkbox custom-control-inline">
                                                                    <input type="checkbox"
                                                                           class="custom-control-input" id="message"
                                                                    />
                                                                    <label class="custom-control-label"
                                                                           for="message">Message</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-checkbox custom-control-inline">
                                                                    <input type="checkbox"
                                                                           class="custom-control-input"
                                                                           id="phone"/>
                                                                    <label class="custom-control-label" for="phone">Phone</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                            <button type="submit"
                                                                    class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 update_mem">
                                                                Save
                                                                Changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- /Membership end tab -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- User New MB Ends -->
                                </section>
                            </div>

                        </div>
            <!-- /User Invoice Ends-->

                    </div>
                </section>
            </div>
    <!-- BEGIN: Add jQuery-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <!-- END: Add jQuery-->

    <!-- BEGIN: Add JS-->
    <script src="/app-assets/js/profile.js"></script>
    <script src="/app-assets/js/user_view.js"></script>
    <script src="/app-assets/js/membership.js"></script>
    <script src="/app-assets/js/sweetalert.min.js"></script>
    <!-- ENS: Add JS-->
@endsection
