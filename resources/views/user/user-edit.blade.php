@extends('layouts.app')

@section('content')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="app-user-edit">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                                        href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i data-feather="user"></i><span class="d-none d-sm-block">Account</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                                        href="#information" aria-controls="information" role="tab" aria-selected="false">
                                        <i data-feather="info"></i><span class="d-none d-sm-block">Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab"
                                        href="#social" aria-controls="social" role="tab" aria-selected="false">
                                        <i data-feather="share-2"></i><span class="d-none d-sm-block">Social</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Account Tab starts -->
                                <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <img src="{{ Auth::user()->image ? asset('app-assets/uploads/user/' . Auth::user()->image) : asset('app-assets/images/avatars/1.png') }}"
                                            id="image_preview_container" alt="users avatar"
                                            class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer user_picture"
                                            height="90" width="90" />
                                        <div class="media-body mt-50">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary mr-75 mb-0" for="admin_image">
                                                    <b><span class="d-none d-sm-block" a href="javascript:void(0)"
                                                            id="change_picture_btn">Change</span></b>
                                                    <input class="form-control" name="admin_image" id="admin_image"
                                                        type="file" hidden accept="image/png, image/jpeg, image/jpg" />

                                                    <span class="d-block d-sm-none">
                                                        <i class="mr-0" data-feather="edit"></i>
                                                    </span>
                                                </label>
                                                <button class="btn btn-outline-secondary d-none d-sm-block"
                                                    id="">Remove</button>
                                                <button class="btn btn-outline-secondary d-block d-sm-none">
                                                    <i class="mr-0" data-feather="trash-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <!-- users edit account form start -->
                                    <form class="form-validate" method="POST" id="edit" action="{{ route('edit') }}">
                                        @csrf
                                        <input type="hidden" class="form-control" placeholder="id"
                                            value="{{ Auth::user()->id }}" name="id" id="id" />
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" placeholder="Username"
                                                        value="{{ Auth::user()->username }}" name="username"
                                                        id="username" />
                                                    <span class="text-danger error-text username_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        value="{{ Auth::user()->name }}" name="name" id="name" />
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">E-mail</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        value="{{ Auth::user()->email }}" name="email" id="email" />
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" value="{{ Auth::user()->status }}"
                                                        id="status" name="status">
                                                        <option value="Active">Active</option>
                                                        <option value="Blocked">Blocked</option>
                                                        <option value="Deactivated">Deactivated</option>
                                                    </select>
                                                    <span class="text-danger error-text status_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    @php
                                                        $uroles = Auth::user()->getRoleNames();
                                                        foreach ($uroles as $key => $role) {
                                                            $uroles[] = $role;
                                                        }
                                                    @endphp
                                                    <select class="form-control" id="role" name="role[]"
                                                        multiple="multiple">

                                                        @foreach ($roles as $role)
                                                            {{-- <option @if (in_array($role->name, $uroles)) selected @endif  value="{{$role->name}}">{{$role->name}}</option> --}}
                                                            <option @if ($uroles->contains($role->name)) selected @endif value="{{ $role->name }}">
                                                                {{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger error-text role_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="action">Company</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ Auth::user()->action }}" placeholder="Company name"
                                                        id="action" name="action" />
                                                    <span class="text-danger error-text action_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="table-responsive border rounded mt-1">
                                                    <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                                        <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                                        <span class="align-middle">Permission</span>
                                                    </h6>
                                                    <table class="table table-striped table-borderless">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Module</th>
                                                                <th>Read</th>
                                                                <th>Write</th>
                                                                <th>Create</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Admin</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="admin-read" checked />
                                                                        <label class="custom-control-label"
                                                                            for="admin-read"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="admin-write" />
                                                                        <label class="custom-control-label"
                                                                            for="admin-write"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="admin-create" />
                                                                        <label class="custom-control-label"
                                                                            for="admin-create"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="admin-delete" />
                                                                        <label class="custom-control-label"
                                                                            for="admin-delete"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Staff</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="staff-read" />
                                                                        <label class="custom-control-label"
                                                                            for="staff-read"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="staff-write" checked />
                                                                        <label class="custom-control-label"
                                                                            for="staff-write"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="staff-create" />
                                                                        <label class="custom-control-label"
                                                                            for="staff-create"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="staff-delete" />
                                                                        <label class="custom-control-label"
                                                                            for="staff-delete"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Author</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="author-read" checked />
                                                                        <label class="custom-control-label"
                                                                            for="author-read"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="author-write" />
                                                                        <label class="custom-control-label"
                                                                            for="author-write"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="author-create" checked />
                                                                        <label class="custom-control-label"
                                                                            for="author-create"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="author-delete" />
                                                                        <label class="custom-control-label"
                                                                            for="author-delete"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Contributor</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="contributor-read" />
                                                                        <label class="custom-control-label"
                                                                            for="contributor-read"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="contributor-write" />
                                                                        <label class="custom-control-label"
                                                                            for="contributor-write"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="contributor-create" />
                                                                        <label class="custom-control-label"
                                                                            for="contributor-create"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="contributor-delete" />
                                                                        <label class="custom-control-label"
                                                                            for="contributor-delete"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>User</td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="user-read" />
                                                                        <label class="custom-control-label"
                                                                            for="user-read"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="user-create" />
                                                                        <label class="custom-control-label"
                                                                            for="user-create"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="user-write" />
                                                                        <label class="custom-control-label"
                                                                            for="user-write"></label>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                            id="user-delete" checked />
                                                                        <label class="custom-control-label"
                                                                            for="user-delete"></label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit"
                                                    class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                    Changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit account form ends -->
                                </div>
                                <!-- Account Tab ends -->

                                <!-- Information Tab starts -->
                                <div class="tab-pane" id="information" aria-labelledby="information-tab"
                                    role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <form class="form-validate" id="edit">
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <h4 class="mb-1">
                                                    <i data-feather="user" class="font-medium-4 mr-25"></i>
                                                    <span class="align-middle">Personal Information</span>
                                                </h4>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="birth">Birth date</label>
                                                    <input id="birth" type="text" class="form-control birthdate-picker"
                                                        name="dob" placeholder="YYYY-MM-DD" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="mobile">Mobile</label>
                                                    <input id="mobile" type="text" class="form-control"
                                                        value="&#43;6595895857" name="phone" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <input id="website" type="text" class="form-control"
                                                        placeholder="Website here..."
                                                        value="https://rowboat.com/insititious/Angelo" name="website" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="languages">Languages</label>
                                                    <select id="languages" class="form-control">
                                                        <option value="English">English</option>
                                                        <option value="Spanish">Spanish</option>
                                                        <option value="French" selected>French</option>
                                                        <option value="Russian">Russian</option>
                                                        <option value="German">German</option>
                                                        <option value="Arabic">Arabic</option>
                                                        <option value="Sanskrit">Sanskrit</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block mb-1">Gender</label>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="male" name="gender"
                                                            class="custom-control-input" />
                                                        <label class="custom-control-label" for="male">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="female" name="gender"
                                                            class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="female">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="d-block mb-1">Contact Options</label>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="email-cb"
                                                            checked />
                                                        <label class="custom-control-label" for="email-cb">Email</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="message"
                                                            checked />
                                                        <label class="custom-control-label" for="message">Message</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox custom-control-inline">
                                                        <input type="checkbox" class="custom-control-input" id="phone" />
                                                        <label class="custom-control-label" for="phone">Phone</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="mb-1 mt-2">
                                                    <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
                                                    <span class="align-middle">Address</span>
                                                </h4>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="address-1">Address Line 1</label>
                                                    <input id="address-1" type="text" class="form-control"
                                                        value="A-65, Belvedere Streets" name="address" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="address-2">Address Line 2</label>
                                                    <input id="address-2" type="text" class="form-control"
                                                        placeholder="T-78, Groove Street" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="postcode">Postcode</label>
                                                    <input id="postcode" type="text" class="form-control"
                                                        placeholder="597626" name="zip" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input id="city" type="text" class="form-control" value="New York"
                                                        name="city" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input id="state" type="text" class="form-control" name="state"
                                                        placeholder="Manhattan" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input id="country" type="text" class="form-control" name="country"
                                                        placeholder="United States" />
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit"
                                                    class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                    Changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit Info form ends -->
                                </div>
                                <!-- Information Tab ends -->

                                <!-- Social Tab starts -->
                                <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                    <!-- users edit social form start -->
                                    <form class="form-validate" method="POST" action="{{ route('edit') }}">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 form-group">
                                                <label for="twitter-input">Twitter</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">
                                                            <i data-feather="twitter" class="font-medium-2"></i>
                                                        </span>
                                                    </div>
                                                    <input id="twitter-input" type="text" class="form-control"
                                                        value="https://www.twitter.com/adoptionism744"
                                                        placeholder="https://www.twitter.com/"
                                                        aria-describedby="basic-addon3" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 form-group">
                                                <label for="facebook-input">Facebook</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon4">
                                                            <i data-feather="facebook" class="font-medium-2"></i>
                                                        </span>
                                                    </div>
                                                    <input id="facebook-input" type="text" class="form-control"
                                                        value="https://www.facebook.com/adoptionism664"
                                                        placeholder="https://www.facebook.com/"
                                                        aria-describedby="basic-addon4" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 form-group">
                                                <label for="instagram-input">Instagram</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon5">
                                                            <i data-feather="instagram" class="font-medium-2"></i>
                                                        </span>
                                                    </div>
                                                    <input id="instagram-input" type="text" class="form-control"
                                                        value="https://www.instagram.com/adopt-ionism744"
                                                        placeholder="https://www.instagram.com/"
                                                        aria-describedby="basic-addon5" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 form-group">
                                                <label for="github-input">Github</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon9">
                                                            <i data-feather="github" class="font-medium-2"></i>
                                                        </span>
                                                    </div>
                                                    <input id="github-input" type="text" class="form-control"
                                                        value="https://www.github.com/madop818"
                                                        placeholder="https://www.github.com/"
                                                        aria-describedby="basic-addon9" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 form-group">
                                                <label for="codepen-input">Codepen</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon12">
                                                            <i data-feather="codepen" class="font-medium-2"></i>
                                                        </span>
                                                    </div>
                                                    <input id="codepen-input" type="text" class="form-control"
                                                        value="https://www.codepen.com/adoptism243"
                                                        placeholder="https://www.codepen.com/"
                                                        aria-describedby="basic-addon12" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 form-group">
                                                <label for="slack-input">Slack</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon11">
                                                            <i data-feather="slack" class="font-medium-2"></i>
                                                        </span>
                                                    </div>
                                                    <input id="slack-input" type="text" class="form-control"
                                                        value="@adoptionism744" placeholder="https://www.slack.com/"
                                                        aria-describedby="basic-addon11" />
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                <button type="submit"
                                                    class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                    Changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- users edit social form ends -->
                                </div>
                                <!-- BEGIN: Add jQuery-->
                                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
                                <!-- END: Add jQuery-->

                                <!-- BEGIN: Add JS-->
                                <script src="/app-assets/js/profile-edit.js"></script>
                                <script src="/app-assets/js/change-image.js"></script>
                                {{-- <script src="/app-assets/js/delete-image.js"></script> --}}
                                <script src="/app-assets/js/sweetalert.min.js"></script>
                                <!-- ENS: Add JS-->
                                <!-- Social Tab ends -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->

            </div>
        </div>
    </div>

@endsection
