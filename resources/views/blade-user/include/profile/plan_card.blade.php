<div class="card plan-card border-primary">
    <div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
        <h5 class="mb-0">Current Plan</h5>
        <span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top"
              title="Expiry Date">{{$date->toDateString()}}, <span class="nextYear"></span>
                        </span>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-1">
            <div class="media">
                <div class="avatar mr-1">
                    <img src="{{ $user->image ? asset('app-assets/uploads/user/' . $user->image) : asset('app-assets/images/avatars/1.png') }}" alt="Avatar" width="42" height="42">
                </div>
                <div class="media-body">
                    <h5 class="mb-0">{{$user->first_name}}&nbsp{{$user->surname}}</h5>
                    <small class="text-muted">Updated {{$user->last_update}}</small>
                </div>
            </div>
            <div class="badge badge-pill badge-light-primary">{{$user->job_title}}</div>
        </div>
        <p>Need a designer to form branding essentials for my business.
        </p>
        <div class="apply-job-package bg-light-primary rounded">
            <div>
                <sup class="text-body"><small>$</small></sup>
                <h2 class="d-inline mr-25">9,800</h2>
                <sub class="text-body"><small>/ month</small></sub>
            </div>
        </div>
        <a type="button" href="/user/edit/{{ $user->id }}" class="btn btn-primary btn-block waves-effect waves-float waves-light  mt-2">Edit user profile</a>
    </div>
</div>
