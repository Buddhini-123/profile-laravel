@extends('layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <style>
    .required:after{
        content:'*';
        color:red;
        padding-left:5px;
    }
</style>
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <span class="d-none d-sm-block">Personal Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                    <span class="d-none d-sm-block">Address Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                    <span class="d-none d-sm-block">Settings</span>
                                </a>
                            </li>
                        </ul>

                        <form class="form-validate" method="POST" id="updateprofile">
                            @csrf
                            <div class="tab-content">
                                <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- Personal Details -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>PERSONAL DETAILS</h5>
                                            <input type="text" class="validation" hidden id="id" name="id" value="{{ $user->id }}" />
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="label_eng">Title</label>
                                                        <span class="required"></span>
                                                        <select name="title" id="title" class="form-control select-validation">
                                                            <option value="">select</option>
                                                            @foreach ($profile_titles as $key => $profile_title)
                                                            <option value="{{ $profile_title->id }}" @if ($user->title == $profile_title->id) selected @endif> {{ $profile_title->label_eng }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger error-text title_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="surname">Surname</label>
                                                        <span class="required"></span>
                                                        <input
                                                            type="text"
                                                            class="form-control dt-full validation"
                                                            id="surname"
                                                            value="{{ $user->surname }}"
                                                            placeholder="Surname"
                                                            name="surname"
                                                            aria-describedby="basic-icon-default-fullname2"
                                                        />
                                                        <span class="text-danger error-text surname_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default first_name">Firstname</label>
                                                        <span class="" class="required"></span>
                                                        <input
                                                            type="text"
                                                            id="first_name"
                                                            class="form-control validation"
                                                            value="{{ $user->first_name }}"
                                                            placeholder="Firstname"
                                                            aria-describedby="basic-icon-default-first_name"
                                                            name="first_name"
                                                        />
                                                        <span class="text-danger error-text first_name_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default second_name">Secondname</label>
                                                        <input
                                                            type="text"
                                                            id="second_name"
                                                            class="form-control dt validation"
                                                            placeholder="Secondname"
                                                            value="{{ $user->second_name }}"
                                                            aria-describedby="basic-icon-default-second_name"
                                                            name="second_name"
                                                        />
                                                        <span class="text-danger error-text second_name_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="qualification">Qualification</label>
                                                        <select id="qualification" name="qualification" class="form-control select-validation">
                                                            <option value="">select</option>
                                                            @foreach ($profile_qualifications as $profile_qualification)
                                                            <option value="{{ $profile_qualification->id }}" @if ($user->qualification == $profile_qualification->id) selected @endif> {{ $profile_qualification->label_eng }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger error-text qualification_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default job">Job Title</label>
                                                        <input
                                                            type="text"
                                                            id="job_title"
                                                            class="form-control dt validation"
                                                            placeholder="Job Title"
                                                            value="{{ $user->job_title }}"
                                                            aria-describedby="basic-icon-default-job_title"
                                                            name="job_title"
                                                        />
                                                        <span class="text-danger error-text job_title_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="user-type">Job category</label>
                                                        <select id="job_category" name="job_category" class="form-control select-validation">
                                                            @foreach ($profile_job_category as $key => $job_category)
                                                            <option value="{{ $job_category->id }}"
                                                            @if ($user->job_category == $job_category->id) selected @endif> {{ $job_category->label_eng }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger error-text job_category_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default organisation_id">Organization/institution</label>
                                                        <select class="select2-data-ajax form-control select-validation" id="organisation_id" name="organisation_id">
                                                            @if(isset($user->organisation_id))<option value="$user->organisation_id" selected>{{$user->institution}} </option>@endif
                                                            </select>
                                                        <span class="text-danger error-text organisation_id_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default department">Department</label>
                                                        <input
                                                            type="text"
                                                            id="department"
                                                            class="form-control validation"
                                                            value="{{ $user->department }}"
                                                            placeholder="Department"
                                                            aria-describedby="basic-icon-default-department"
                                                            name="department"
                                                        />
                                                        <span class="text-danger error-text department_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="user-type">Type of Organization</label>
                                                        <select id="type_of_institution" name="type_of_institution" class="form-control select-validation">
                                                            @foreach ($profile_organisation_types as $key => $profile_organisation_type)
                                                            <option value="{{ $profile_organisation_type->id }}" @if ($user->
                                                                type_of_institution == $profile_organisation_type->id) selected @endif> {{ $profile_organisation_type->label_eng }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger error-text type_of_institution_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-email">Primary Email</label>
                                                        <span class="required"></span>
                                                        <input type="text" id="email" class="form-control validation" placeholder="Primary Email" value="{{ $user->email }}" aria-describedby="basic-icon-default-email" name="email" />
                                                        <span class="text-danger error-text email_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="alternative_email" id="alternative_email">Alternative Email</label>
                                                        <input
                                                            type="text"
                                                            id="alternative_email"
                                                            class="form-control validation"
                                                            value="{{ $user->alternative_email }}"
                                                            placeholder="Alternative Email"
                                                            aria-describedby="basic-icon-default-alternative_email"
                                                            name="alternative_email"
                                                        />
                                                        <span class="text-danger error-text alternative_email_error"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- users edit media object start -->
                                            <div class="media mb-2">
                                                <img
                                                    src="{{ $user->image ? asset('app-assets/uploads/user/' .$user->image) : asset('app-assets/images/avatars/1.png') }}"
                                                    id="image_preview_container"
                                                    alt="users avatar"
                                                    class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer user_picture"
                                                    height="90"
                                                    width="90"
                                                />
                                                <div class="media-body mt-50">
                                                    <h4>{{ Auth::user()->name }}</h4>
                                                    <div class="col-12 d-flex mt-1 px-0">
                                                        <label class="btn btn-primary mr-75 mb-0" for="admin_image">
                                                            <b><span class="d-none d-sm-block" a href="javascript:void(0)" id="change_picture_btn">Change</span></b>
                                                            <input class="form-control validation" name="admin_image" id="admin_image" type="file" hidden accept="image/png, image/jpeg, image/jpg" />

                                                            <span class="d-block d-sm-none">
                                                                <i class="mr-0" data-feather="edit"></i>
                                                            </span>
                                                        </label>
                                                        <button class="btn btn-outline-secondary d-none d-sm-block" id="deleteCountryBtn">Remove</button>
                                                        <button class="btn btn-outline-secondary d-block d-sm-none">
                                                            <i class="mr-0" data-feather="trash-2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- users edit media object ends -->
                                        </div>
                                    </div>
                                    <!-- Modal to personal details Ends-->
                                    <!-- users edit account form ends -->
                                </div>

                                <!-- Account Tab ends -->

                                <!-- Information Tab starts -->
                                <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                    <!-- Address Details -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>ADDRESS DETAILS</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-city">City</label>
                                                        <span class="required"></span>
                                                        <input type="text" class="form-control validation" id="city" placeholder="City" name="city" value="{{ $user->city }}" aria-describedby="basic-icon-default-city" />
                                                        <span class="text-danger error-text city_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-address1">Address line</label>
                                                        <span class="required"></span>
                                                        <input
                                                            type="text"
                                                            id="address_line1"
                                                            class="form-control validation"
                                                            placeholder="Address Line"
                                                            value="{{ $user->address_line1 }}"
                                                            aria-describedby="basic-icon-default-address_line1"
                                                            name="address1"
                                                        />
                                                        <span class="text-danger error-text address1_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-address_line2">Address line2</label>
                                                        <input
                                                            type="text"
                                                            id="address_line2"
                                                            class="form-control validation"
                                                            placeholder="Address Line 2"
                                                            value="{{ $user->address_line2 }}"
                                                            aria-describedby="basic-icon-default-address_line2"
                                                            name="address_line2"
                                                        />
                                                        <span class="text-danger error-text address_line2_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-address_line3">Address line3</label>
                                                        <input
                                                            type="text"
                                                            id="address_line3"
                                                            class="form-control validation"
                                                            value="address_line3"
                                                            placeholder="Address Line 3"
                                                            aria-describedby="basic-icon-default-address_line3"
                                                            name="address_line3"
                                                        />
                                                        <span class="text-danger error-text address_line3_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-code">Postal code</label>
                                                        <input
                                                            type="number"
                                                            id="po_code"
                                                            class="form-control validation"
                                                            placeholder="Postal code<"
                                                            aria-describedby="basic-icon-default-po_code"
                                                            value="{{ $user->po_code }}"
                                                            name="po_code"
                                                        />
                                                        <span class="text-danger error-text po_code_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-state">State</label>
                                                        <input type="text" id="state" class="form-control validation" placeholder="State" aria-describedby="basic-icon-default-state" value="{{ $user->state }}" name="state" />
                                                        <span class="text-danger error-text title_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 form-group">
                                                    <label class="form-label" for="basic-icon-default-country">
                                                        <h5><i data-feather="flag"></i> Country</h5>
                                                    </label>
                                                    <select name="country" class="select-2 form-control select-validation" id="country">
                                                        <option value="">select</option>
                                                        @foreach ($profile_countries as $profile_country)
                                                        <option data-icon="globe" value="{{ $profile_country->code_ISO }}" @if ($user->country == $profile_country->code_ISO) selected @endif > {{ $profile_country->label_eng }} </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text country_error"></span>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label class="form-label" for="basic-icon-default-telephone_country_code">
                                                        <h5><i data-feather="flag"></i> Telephone code</h5>
                                                    </label>
                                                    <select name="telephone_country_code" class="select-2 form-control select-validation" id="telephone_country_code">
                                                        <option value="">select</option>
                                                        @foreach ($profile_phone_codes as $profile_phone_code)
                                                        <option data-icon="globe" value="{{ $profile_phone_code->phonecode }}"  @if ($user->telephone_country_code == $profile_phone_code->id) selected @endif> + {{ $profile_phone_code->phonecode }} ({{ $profile_phone_code->label_eng }})</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text telephone_country_code_error"></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-telephone">Telephone</label>
                                                        <span class="required"></span>
                                                        <input type="tel" id="telephone" value="{{ $user->telephone }}" class="form-control validation" placeholder="Telephone" aria-describedby="basic-icon-default-telephone" name="telephone" />
                                                        <span class="text-danger error-text telephone_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-language">Language</label>
                                                        <span class="required"></span>
                                                        <select name="language" class="form-control select-validation" id="language">
                                                            <option value="">select</option>
                                                            @foreach ($profile_languages as $profile_language)
                                                            <option value="{{ $profile_language->id }}" @if ($user->language == $profile_language->id) selected @endif> {{ $profile_language->label_eng }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger error-text language_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal to address details Ends-->
                                    <!-- users edit Info form ends -->
                                </div>
                                <!-- Information Tab ends -->

                                <!-- Social Tab starts -->
                                <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                    <!-- Settings -->

                                    <div class="card">
                                        <div class="card-body">
                                            <h5>SETTINGS</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group mb-2">
                                                            <label class="form-label" for="user-type">Profile Status</label>
                                                            <span class="required"></span>
                                                            <select id="status" class="form-control select-validation" name="status">
                                                                <option value="">select</option>
                                                                <option value="YES" @if($user->status == 'YES')  selected @endif>YES</option>
                                                                <option value="NO" @if ($user->status == 'NO') selected @endif>NO</option>
                                                                <option value="PENDING" @if($user->status == 'PENDING')  selected @endif>PENDING</option>
                                                                <option value="SUSPEND" @if ($user->status == 'SUSPEND') selected @endif>SUSPEND</option>
                                                                <option value="PASS_RESET" @if ($user->status == 'PASS_RESET') selected @endif>PASS_RESET</option>
                                                            </select>
                                                            <span class="text-danger error-text status_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-origin">Origin</label>
                                                        <span class="required"></span>
                                                        <select id="origin" class="form-control select-validation" name="origin">
                                                            <option value="">select</option>
                                                            @foreach ($profile_origins as $profile_origin)
                                                            <option value="{{ $profile_origin->id }}" @if ($user->origin == $profile_origin->id) selected @endif> {{ $profile_origin->label_eng }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-danger error-text origin_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="marketing_opt">Marketing Opt</label>
                                                        <select id="marketing_opt" name="marketing_opt" class="form-control select-validation">
                                                            <option value="">select</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        <span class="text-danger error-text marketing_opt_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label" for="deceased">Deceased</label>
                                                        <select id="deceased" name="deceased" class="form-control select-validation">
                                                            <option value="">select</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        <span class="text-danger error-text deceased_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    @php
                                                    if($user->id >0) {
                                                         $uroles = $user->getRoleNames();
                                                         foreach ($uroles as $key => $role)
                                                         {
                                                             $uroles[] = $role;
                                                        }
                                                        } else{
                                                            $uroles=null;

                                                        }

                                                     @endphp
                                                    <label class="form-label" for="decresed">
                                                        <label for="blog-edit-title">Role</label>
                                                    </label>
                                                    <select id="role" name="role[]" class="select-2 form-control select-validation" multiple>
                                                        <option value="" disabled>Select</option>

                                                        @foreach ($roles as $key => $role)
                                                        @if($role)
                                                        <option data-icon="globe"   value="{{ $role->id }}"> {{ $role->name }} </option>
                                                        @endif
                                                        @endforeach

                                                    </select>
                                                    <span class="text-danger error-text role_error"></span>

                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="basic-icon-default-heard_about">Comments</label>
                                                        <fieldset class="form-label-group mb-10">
                                                            <textarea type="text" class="form-control validation" id="heard_about" name="comment"placeholder="Add Comment"></textarea>
                                                            <label for="label-textarea3">{{ $user->heard_about }}</label>
                                                        </fieldset>
                                                        <span class="text-danger error-text comment_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group">
                                        <label class="d-block mb-1">Choose</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" value="0" id="skip-validation" name="save_type_as" class="custom-control-input validation" />
                                            <label class="custom-control-label" for="skip-validation">Skip Validation</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" value="1" id="save-as-member" name="save_type_as" class="custom-control-input validation" checked />
                                            <label class="custom-control-label" for="save-as-member">Save as member</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 update_pro">Save Changes</button>
                                    <a type="button"     href="/membership/edit/{{$user->id}}"  class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        Create membership
                                                            </a>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                                <!-- Modal to Settings Ends-->
                                <!-- users edit social form ends -->
                            </div>
                        </form>
                        <!-- BEGIN: Add jQuery-->
                        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
                        <!-- END: Add jQuery-->

                        <!-- BEGIN: Add JS-->
                        <script src="/app-assets/js/profile-edit.js"></script>
                        <script src="/app-assets/js/change-image.js"></script>
                        <script src="/app-assets/js/delete-image.js"></script>
                        <script src="/app-assets/js/user_profile.js"></script>
                        <script src="/app-assets/js/sweetalert.min.js"></script>
                        <!-- ENS: Add JS-->
                        <!-- Social Tab ends -->
                    </div>
                </div>
            </section>

            <section class="basic-timeline">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5>Reset Password</h5>
                                <div class="demo-inline-spacing pb-2">
                                    <div class="avatar bg-primary">
                                        <div class="avatar-content">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-calendar avatar-icon"
                                            >
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="avatar bg-secondary">
                                        <div class="avatar-content">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-github avatar-icon"
                                            >
                                                <path
                                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"
                                                ></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="avatar bg-success">
                                        <div class="avatar-content">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-inbox avatar-icon"
                                            >
                                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-camera avatar-icon"
                                            >
                                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                                <circle cx="12" cy="13" r="4"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="avatar bg-light-warning">
                                        <div class="avatar-content">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-award avatar-icon"
                                            >
                                                <circle cx="12" cy="8" r="7"></circle>
                                                <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="avatar bg-light-info">
                                        <div class="avatar-content">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-star avatar-icon"
                                            >
                                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <label for="basic-default-password1">Password</label>
                                <div class="input-group input-group-merge form-password-toggle mb-2">
                                    <input type="password" class="form-control" id="basic-default-password1" placeholder="Your Password" aria-describedby="basic-default-password1" />
                                    <div class="input-group-append">
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-sm-row pt-1">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-cart mr-0 mr-sm-1 mb-1 mb-sm-0 waves-effect waves-float waves-light">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="14"
                                            height="14"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-shopping-cart mr-50"
                                        >
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                        <span class="add-to-cart">Send New Password</span>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-outline-secondary btn-wishlist mr-0 mr-sm-1 mb-1 mb-sm-0 waves-effect">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="14"
                                            height="14"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-heart mr-50"
                                        >
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                        <span>One Time Password </span>
                                    </a>
                                </div>
                                <ul class="list-group mt-2">
                                    <li class="list-group-item d-flex">
                                        <span class="mr-1">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-instagram font-medium-2"
                                            >
                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                            </svg>
                                        </span>
                                        <span>Cupcake sesame snaps dessert marzipan.</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="mr-1">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-facebook font-medium-2"
                                            >
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>
                                        </span>
                                        <span>Jelly beans jelly-o gummi bears chupa chups marshmallow.</span>
                                    </li>
                                    <li class="list-group-item d-flex">
                                        <span class="mr-1">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="14"
                                                height="14"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="feather feather-twitter font-medium-2"
                                            >
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>
                                        </span>
                                        <span>Bonbon macaroon gummies pie jelly</span>
                                    </li>
                                </ul>
                                <p class="card-text mt-3">Avatar info inside tooltip variant</p>
                                <div class="avatar-group mt-1">
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" data-original-title="Vinnie Mostowy" class="avatar pull-up">
                                        <img src="/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="32" width="32" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" data-original-title="Elicia Rieske" class="avatar pull-up">
                                        <img src="/app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="32" width="32" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" data-original-title="Julee Rossignol" class="avatar pull-up">
                                        <img src="/app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="32" width="32" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" data-original-title="Darcey Nooner" class="avatar pull-up">
                                        <img src="/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="32" width="32" />
                                    </div>
                                    <div data-toggle="tooltip" data-popup="tooltip-custom" data-placement="top" data-original-title="Jenny Looper" class="avatar pull-up">
                                        <img src="/app-assets/images/portrait/small/avatar-s-20.jpg" alt="Avatar" height="32" width="32" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                <!--  Add new organization Form start -->
    @include('modal.organization-create-form');
    <!-- Add new organization Form end -->
        </div>
    </div>
    <!-- users edit ends -->


@endsection

@section('PageJS')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
    <!-- END: Page JS-->
    <script src="/app-assets/js/scripts/forms/form-ajax-remote-data.js"></script>
    <script>
        function formatText(icon) {
            return $(
                '<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-pull-request"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><line x1="6" y1="9" x2="6" y2="21"></line></svg> ' +
                icon.text + '</span>');
        };

        $('.select2-icon').select2({
            width: "50%",
            templateSelection: formatText,
            templateResult: formatText
        });
    </script>
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
