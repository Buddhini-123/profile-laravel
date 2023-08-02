<form class="form-validate" id="addmembership">
    <div class="row mt-1">
        <div class="col-12">
            <h4 class="mb-1">
                <i data-feather="user"
                   class="font-medium-4 mr-25"></i>
                <span class="align-middle">Membership</span>
            </h4>
        </div>
        {{--
  <form class="form-validate" method="GET" id="renewal_type" action="{{route('find-renewal') }}">--}}
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <input type="text" hidden id="id" name="id" value="{{$user->id}}">
                <input type="text" hidden value="{{$membership->membership_id = ($user->id)}}" name="membership_id">
                <label for="mobile">Membership Renewal
                    Type</label>
                <select class="form-control"  id="membership_renewal_type" name="membership_renewal_type">
                    @foreach($mb_category_group as $mb_category_group)
                        <option value="{{$mb_category_group->name}}"
                                @if($membership_data->membership_renewal_type==$mb_category_group->name) selected @endif>
                            {{($mb_category_group->name)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text membership_renewal_type_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status" class="membership_renewal_type" id="membership_renewal_type">Membership Renewal Category</label>
                <select class="form-control" value="" id="membership_renewal_type" name="membership_renewal_category">
                    @foreach($mb_category as $key=> $mb_category)
                        <option value="{{($mb_category->type_of_category)}}"
                                @if($membership_data->membership_renewal_category==$mb_category->type_of_category) selected @endif>
                            {{($mb_category->type_of_category)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text membership_renewal_category_error"></span>
            </div>
        </div>
        {{--                                                            </form>--}}

        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <label for="website">Skype</label>
                <input id="skype" type="text" class="form-control" name="skype"
                       value="{{$membership_data->skype}}">
                <span class="text-danger error-text skype_error"></span>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <label for="website">About Yourself</label>
                <input id="yourself" type="text" class="form-control" name="yourself"
                       value="{{$membership_data->about_yourself}}">
                <span class="text-danger error-text yourself_error"></span>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <label for="website">Paper Journal Quantity</label>
                <input id="paper_journal" type="text" class="form-control" name="quantity_paper_journal"
                       value="{{$membership_data->quantity_paper_journal}}">
                <span class="text-danger error-text quantity_paper_journal_error"></span>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <label for="website">Reference</label>
                <input id="reference" type="text" class="form-control" name="reference"
                       value="{{$membership_data->reference}}">
                <span class="text-danger error-text reference_error"></span>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <label for="website">Origin</label>
                <select class="form-control" id="origin" name="origin">
                    @foreach($profile_origin as $key=> $profile_origin)
                        <option value="{{($profile_origin->label_eng)}}"
                                @if($membership_data->origin==$profile_origin->label_eng) selected @endif>
                            {{($profile_origin->label_eng)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text origin_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Renewal Status</label>
                <select class="form-control" id="renewal_status" name="renewal_status">
                    @foreach($membership_renewal_status as $key=> $membership_renewal_status)
                        <option value="{{($membership_renewal_status->renewal_status)}}"
                                @if($membership_data->renewal_status==$membership_renewal_status->renewal_status) selected @endif>
                            {{($membership_renewal_status->renewal_status)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text renewal_status_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Validity Status</label>
                <select class="form-control" id="validity_status" name="validity_status">
                    @foreach($membership_validity_status as $key=> $membership_validity_status)
                        <option value="{{($membership_validity_status->validity_status)}}"
                                @if($membership_data->validity_status==$membership_validity_status->validity_status) selected @endif>
                            {{($membership_validity_status->validity_status)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text validity_status_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Payment Source</label>
                <select class="form-control" value="" id="payment_source_tag" name="payment_source_tag">
                    @foreach($membership_paymentt as $key=> $membership_paymentt)
                        <option value="{{($membership_paymentt->payment_source_tag)}}"
                                @if($membership_data->payment_source_tag==$membership_paymentt->payment_source_tag) selected @endif>
                            {{($membership_paymentt->payment_source_tag)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text payment_source_tag_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Current Membership Category</label>
                <select class="form-control" id="current_membership_category" name="current_membership_category" multiple="multiple">
                    @foreach($membership_current_membership as $key=> $membership_current_membership)
                        <option value="{{($membership_current_membership->current_membership_category)}}"
                                @if($membership_data->current_membership_category==$membership_current_membership->current_membership_category) selected @endif>
                            {{($membership_current_membership->current_membership_category)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text current_membership_category_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Share Profile</label>
                <select class="form-control" id="share_profile_agreed" name="share_profile_agreed">
                    @foreach($membership_share_profile as $key=> $membership_share_profile)
                        <option value="{{($membership_share_profile->share_profile_agreed)}}"
                                @if($membership_data->share_profile_agreed==$membership_share_profile->share_profile_agreed) selected @endif>
                            {{($membership_share_profile->share_profile_agreed)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text share_profile_agreed_error"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Membership Status</label>
                <select class="form-control" id="membership_status"
                        name="membership_status">
                    @foreach($membership_status as $key=> $membership_status)
                        <option value="{{($membership_status->membership_status)}}"
                                @if($membership_data->membership_status==$membership_status->membership_status) selected @endif>
                            {{($membership_status->membership_status)}}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text membership_status_error"></span>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="form-group">
                <label class="d-block mb-1" id="preffered" name="preffered[]">Preffered Method of
                    Contact</label>
                @php
                (explode("|",$membership_data->preferred_method_of_contact ));
                @endphp
                <div
                    class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" value="email" id="email"
                           class="custom-control-input"
                           name="preffered[]"
                           @if($membership_data->preferred_method_of_contact=='email') checked @endif/>
                    <label class="custom-control-label"
                           for="email">Email</label>
                </div>
                <div
                    class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" value="message" id="message"
                           class="custom-control-input" name="preffered[]"
                           @if($membership_data->preferred_method_of_contact=='message') checked @endif/>
                    <label class="custom-control-label"
                           for="message">Message</label>
                </div>
                <div
                    class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" value="phone" id="phone"
                           class="custom-control-input" name="preffered[]"
                           @if($membership_data->preferred_method_of_contact=='phone') checked @endif/>
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
