<div class="card">
    <div class="card-header">
        <h4 class="card-title">Opportunity</h4>
        <p class="card-text mt-1">
            Toasts are slightly translucent, too, so they blend over whatever they might
            appear over. For browsers that
            support the backdrop-filter CSS property, we’ll also attempt to blur the
            elements under a toast.
        </p>
    </div>
    <!-- User Oppertunity Box Starts -->
    <div class="card-body bg-primary rounded-bottom  ">
        <div class=" row">
         
            @foreach($membership_prop_category as $data)
            <div class="col-md-4">
                <div class="toast show toast-wrapper toast-translucent mt-1  " role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/app-assets/images/logo/logo.png" class="mr-1" alt="Toast image"
                             height="18" width="25" />
                        <strong class="mr-auto">Membership prop category</strong>
                        <small class="text-muted">{{$data->start_date}}</small>
                        <button type="button" class="ml-1 close" data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">{{ Helper::getLabel('mb_category', $data->membership_category) }}
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($courses_application as $data)
            <div class="col-md-4">
                <div class="toast show toast-wrapper toast-translucent mt-1  " role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/app-assets/images/logo/logo.png" class="mr-1" alt="Toast image"
                             height="18" width="25" />
                        <strong class="mr-auto">courses application</strong>
                        <small class="text-muted">{{$data->create_date}}</small>
                        <button type="button" class="ml-1 close" data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">{{ $data->course_name}}
                    </div>
                </div>
            </div>
            @endforeach
            <!--/User Oppertunity Box Starts -->
            <!-- User Oppertunity Box Starts -->
            <!-- <div class="col-md-4">
                <div class="toast show toast-wrapper toast-translucent mt-1  " role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/app-assets/images/logo/logo.png" class="mr-1" alt="Toast image"
                             height="18" width="25" />
                        <strong class="mr-auto">Union Admin</strong>
                        <small class="text-muted">11 mins ago</small>
                        <button type="button" class="ml-1 close" data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">Hello, world! This is a toast message. Hope you're doing
                    </div>
                </div>
            </div> -->
            <!--/User Oppertunity Box Starts -->
            <!-- User Oppertunity Box Starts -->
            <!-- <div class="col-md-4">
                <div class="toast show toast-wrapper toast-translucent mt-1  " role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/app-assets/images/logo/logo.png" class="mr-1" alt="Toast image"
                             height="18" width="25" />
                        <strong class="mr-auto">Union Admin</strong>
                        <small class="text-muted">11 mins ago</small>
                        <button type="button" class="ml-1 close" data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">Hello, world! This is a toast message. Hope you're doing
                    </div>
                </div>
            </div> -->
            <!--/User Oppertunity Box Starts -->
            <!-- User Oppertunity Box Starts -->
            <!-- <div class="col-md-4">
                <div class="toast show toast-wrapper toast-translucent mt-1  " role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/app-assets/images/logo/logo.png" class="mr-1" alt="Toast image"
                             height="18" width="25" />
                        <strong class="mr-auto">Union Admin</strong>
                        <small class="text-muted">11 mins ago</small>
                        <button type="button" class="ml-1 close" data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">Hello, world! This is a toast message. Hope you're doing
                    </div>
                </div>
            </div> -->
            <!--/User Oppertunity Box Starts -->
            <!-- User Oppertunity Box Starts -->
            <!-- <div class="col-md-4">
                <div class="toast show toast-wrapper toast-translucent mt-1  " role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/app-assets/images/logo/logo.png" class="mr-1" alt="Toast image"
                             height="18" width="25" />
                        <strong class="mr-auto">Union Admin</strong>
                        <small class="text-muted">11 mins ago</small>
                        <button type="button" class="ml-1 close" data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">Hello, world! This is a toast message. Hope you're doing
                    </div>
                </div>
            </div> -->
            <!--/User Oppertunity Box Starts -->
            <!-- User Oppertunity Box Starts -->
            <!-- <div class="col-md-4">
                <div class="toast show toast-wrapper toast-translucent mt-1  " role="alert"
                     aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="/app-assets/images/logo/logo.png" class="mr-1" alt="Toast image"
                             height="18" width="25" />
                        <strong class="mr-auto">Union Admin</strong>
                        <small class="text-muted">11 mins ago</small>
                        <button type="button" class="ml-1 close" data-dismiss="toast"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">Hello, world! This is a toast message. Hope you're doing
                    </div>
                </div>
            </div> -->
            <!--/User Oppertunity Box Starts -->
        </div>
    </div>
</div>
