@extends('layouts.app')
@section('content')
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Roles Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <button type="submit" data-toggle="modal" data-target="#inlineForm"
                                            class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-float waves-light">
                                        + New Role
                                    </button>

                                </div>
                            </div>
                            <div class="success_message"></div>
                            <div class="table-responsive">

                                <table class="table" id="role_table">
                                    <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Users</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    @foreach ($roles as $role)
                                    <tbody id="new">
                                        <tr>
                                            <td>
                                                <img src="app-assets/images/icons/angular.svg" class="mr-75" height="20"
                                                     width="20" alt="Angular"/>
                                                <span class="font-weight-bold">{{$role->name}} </span>
                                            </td>

                                            <td>
                                                <div class="avatar-group">
                                                    <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                         data-placement="top" title="" class="avatar pull-up my-0"
                                                         data-original-title="Lilian Nenez">
                                                        <img src="app-assets/images/portrait/small/avatar-s-5.jpg"
                                                             alt="Avatar" height="26" width="26"/>
                                                    </div>
                                                    <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                         data-placement="top" title="" class="avatar pull-up my-0"
                                                         data-original-title="Alberto Glotzbach">
                                                        <img src="app-assets/images/portrait/small/avatar-s-6.jpg"
                                                             alt="Avatar" height="26" width="26"/>
                                                    </div>
                                                    <div data-toggle="tooltip" data-popup="tooltip-custom"
                                                         data-placement="top" title="" class="avatar pull-up my-0"
                                                         data-original-title="Alberto Glotzbach">
                                                        <img src="app-assets/images/portrait/small/avatar-s-7.jpg"
                                                             alt="Avatar" height="26" width="26"/>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-pill badge-light-primary mr-1">Active</span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                            data-toggle="dropdown">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="open-myModal1 dropdown-item" data-toggle="modal"
                                                           data-target="#editForm" href="/edit-roles/{{$role->id}}"
                                                           data-roleid="{{$role->id}}"
                                                           data-rolename="{{$role->name}}"

                                                           >
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" value=""
                                                           href="/delete-role/{{$role->id}}">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                           data-target="#inlineForm4" href="/alterrole/{{$role->id}}">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Alter</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>




                                    </tbody>

                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Tables end -->
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <button type="submit" data-toggle="modal" data-target="#editPermission"
                                            class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-float waves-light">
                                        + New Permission
                                    </button>
                                </div>

                                <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                    <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                    <span class="align-middle">Permission</span>
                                </h6>
                                <table class="table table-striped table-borderless" id="permission_table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Module</th>
                                        <th>Read</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="new1">

                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td data-tdpermission="{{$permission->id}}">{{$permission->name}}</td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                               class="custom-control-input" id="admin-read"
                                                               name="admin-read"
                                                               checked/>
                                                        <label class="custom-control-label"
                                                               for="admin-read"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                                data-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="open-myModal1 dropdown-item" data-toggle="modal"
                                                               data-target="#editPermission" href="/edit-permission/{{$permission->id}}"
                                                               data-id="{{$permission->id}}"
                                                               data-name="{{$permission->name}}"
                                                               data-guard-name="{{$permission->guard_name}}"
                                                            >
                                                                <i data-feather="edit-2" class="mr-50"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                            <a class="dropdown-item" value=""
                                                               href="/delete-permission/{{$permission->id}}">
                                                                <i data-feather="trash" class="mr-50"></i>
                                                                <span>Delete</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <button type="submit"
                                            class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-float waves-light">
                                        Save
                                        Changes
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    <!-- Modal Role -->
         <div class="open-AddBookDialog modal fade text-left" id="editForm"
                                             role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">Update
                                                            Form</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/updaterole/{{$role->id}}" id="role-update"
                                                          method="POST"
                                                          enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="text" hidden value="{{$role->id}}">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="role-name" id="role-name"
                                                                       class="form-control" value="{{$role->name}}">
                                                                <span class="text-danger error-text name_error"></span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Guard Name</label>
                                                                <input type="text" name="guard_name" id="guard_name"
                                                                       class="form-control"
                                                                       value="{{$role->guard_name}}">
                                                                <span
                                                                    class="text-danger error-text guard_name_error"></span>
                                                            </div>
                                                                 <button type="submit" name="submit"
                                                                class="btn btn-primary btn-lg" id="update_data" value="{{ $role->id }}">Update Data
                                                        </button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal fade text-left" id="inlineForm4" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">Alter Permission
                                                            Form</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <h6 class="py-1 mx-1 mb-0 font-medium-2">
                                                        <i data-feather="lock" class="font-medium-3 mr-25"></i>
                                                        <span class="align-middle">Permission</span>
                                                    </h6>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" value="">{{$role->name}}</label>
                                                    </div>
                                                    <div>


                                                    </div>

                                                </div>

                                            </div>
                                        </div>


                  <!-- Modal Role Add-->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Add Role
                        Form</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="modal-content pt-0" method="POST" id="roles" action="{{ route('roles') }}">
                    @csrf
                    <div class="modal-body">
                        <ul id="saveform_errList"></ul>
                        <label>Role: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Name" name="name" id="name"
                                   class="form-control"/>
                            <span class="text-danger error-text name_error"></span>
                        </div>

                        <label>Guard Name: </label>
                        <div class="form-group">
                            <input type="text" placeholder="Guard Name" name="guard_name" id="guard_name"
                                   class="form-control"/>
                            <span class="text-danger error-text guard_name_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary save" id="save"
                        >Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

                <!-- Modal Add Permission-->


            <div class="open-AddBookDialog modal fade text-left" id="editPermission"
                 role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Update   Permission Details</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/update-permission/{{$permission->id}}" id="update-permission"
                              method="POST"
                              enctype="multipart/form-data">
                                  @csrf
                            <div class="modal-body">
                                <input type="text" id="permission-id" hidden value="{{$permission->id}}">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="permission-name" id="permission-name"   class="form-control" value="{{$permission->name}}">
                                    <span class="text-danger error-text permission-name_error"></span>
                                </div>

                                <div class="form-group">
                                    <label>Guard Name</label>
                                    <input type="text" name="permission-guard-name" id="permission-guard-name"
                                           class="form-control"
                                           value="{{$permission->guard_name}}">
                                    <span
                                        class="text-danger error-text guard_name_error"></span>
                                </div>
                                <button type="submit" name="submit"
                                        class="btn btn-primary btn-lg update_permission">Update Data
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- BEGIN: Add jQuery-->
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
            <!-- END: Add jQuery-->

            <!-- BEGIN: Add JS-->
            <script src="/app-assets/js/role-add.js"></script>
            <script src="/app-assets/js/update-role.js"></script>
            <script src="/app-assets/js/sweetalert.min.js"></script>
            <script src="/app-assets/js/permission.js"></script>
            <!-- ENS: Add JS-->
            <!-- Social Tab ends -->

 </section>

    <!-- users edit ends -->

@endsection

