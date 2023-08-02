<div class="card user-card">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                <div class="user-avatar-section">
                    <div class="d-flex justify-content-start">
                        <img class="img-fluid rounded"
                            src="{{ $user->image ? asset('app-assets/uploads/user/' . $user->image) : asset('app-assets/images/avatars/1.png') }}"
                            height="104" width="104" alt="User avatar" /> 
                        <div class="d-flex flex-column ml-1">
                            <div class="user-info mb-1">
                                <h4 class="mb-0">{{ $user->surname }}</h4>
                                <span class="card-text">{{ $user->email }}</span>
                            </div>
                            <div class="d-flex flex-wrap">
                                <a href="/user/edit" class="btn btn-primary">Edit</a>
                                <button class="btn btn-outline-danger ml-1">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center user-total-numbers">
                    <div class="d-flex align-items-center mr-2">
                        <div class="color-box bg-light-primary">
                            <i data-feather="dollar-sign" class="text-primary"></i>
                        </div>
                        <div class="ml-1">
                            <h5 class="mb-0">23.3k</h5>
                            <small>Monthly Sales</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="color-box bg-light-success">
                            <i data-feather="trending-up" class="text-success"></i>
                        </div>
                        <div class="ml-1">
                            <h5 class="mb-0">$99.87K</h5>
                            <small>Annual Profit</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                <div class="user-info-wrapper">
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather="user" class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Username</span>
                        </div>
                        <p class="card-text mb-0">{{ $user->surname }}</p>
                    </div>
                    <div class="d-flex flex-wrap my-50">
                        <div class="user-info-title">
                            <i data-feather="check" class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Status</span>
                        </div>
                        <p class="card-text mb-0">{{ $user->status }}</p>
                    </div>
                    <div class="d-flex flex-wrap my-50">
                        <div class="user-info-title">
                            <i data-feather="star" class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Role</span>
                        </div>
                        <p class="card-text mb-0"> </p>
                    </div>
                    <div class="d-flex flex-wrap my-50">
                        <div class="user-info-title">
                            <i data-feather="flag" class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Country</span>
                        </div>
                        <p class="card-text mb-0">England</p>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather="phone" class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                        </div>
                        <p class="card-text mb-0">{{ $user->telephone }}</p>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather='mail' class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Email</span>
                        </div>
                        <p class="card-text mb-0">{{ $user->email }}</p>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather='globe' class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Language</span>
                        </div>
                        <p class="card-text mb-0">{{ $user->language }}</p>
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <i data-feather='home' class="mr-1"></i>
                            <span class="card-text user-info-title font-weight-bold mb-0">Address</span>
                        </div>
                        <p class="card-text mb-0">{{ $user->address_line1 }}
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <span class="card-text user-info-title font-weight-bold mb-0"></span>
                        </div>
                        <p class="card-text mb-0">{{ $user->address_line2 }}
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="user-info-title">
                            <span class="card-text user-info-title font-weight-bold mb-0"></span>
                        </div>
                        <p class="card-text mb-0">{{ $user->address_line3 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
