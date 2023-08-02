<div class="mt-1">
    <div class="row mt-1">
        <div class="col-12">
            <h4 class="mb-1">
                <i data-feather='user-check'></i>
                <span class="align-middle">Subscriber</span>
            </h4>
        </div>
        <!-- Ingenta start tab -->
        <div class="col-12">
            <h5 class="mb-1">
                <span class="align-middle"><i data-feather='disc'></i>Ingenta</span>
            </h5>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <label for="website">Ingenta Format</label>
                <input id="yourself" type="text" class="form-control" value="">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <label for="website">Journal Online</label>
                <input id="yourself" type="text" class="form-control" value="">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <label for="website">Journal Paper</label>
                <input id="yourself" type="text" class="form-control" value="">
            </div>
        </div>
        <!-- /Ingenta end tab -->
    </div>
    <hr>
    <!-- Delivery start tab -->

    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
        <button type="submit" class="btn btn-primary add_new_delivery" id="add_new_delivery">
            Add New Delivery Details
        </button>
    </div>
    <input type="text" class="user_id" hidden value="{{ $user->id }}">
    <input type="text" class="address_id" hidden id="address_id" name="address_id" value="">
    <div class="col-12 ">
        <h5 class="mb-1  pb-2 pt-2">
            <span class="align-middle"><i data-feather='home'></i>Delivery Address</span>
        </h5>
    </div>
    <div class="col-9 pb-4">
        <p class="card-text">Just add an icon before your content to create a list group
            with icons
        </p>
        <ul class="list-group list-delivery-address">
            @foreach ($delivery_address as $delivery_address)


                <li
                    class="list-group-item d-flex justify-content-between align-item-left list-group-item
                         @if ($delivery_address->is_default == '1') list-group-item-success @endif">
                    {{ $delivery_address->address }}

                    <span>
                        <dd class="badge badge-primary badge-pill edit_address" data-id="{{ $delivery_address->id }}"
                            data-address="{{ $delivery_address->address }}"
                            data-postal_code="{{ $delivery_address->postal_code }}"
                            data-city="{{ $delivery_address->city }}" data-state="{{ $delivery_address->state }}"
                            data-country="{{ $delivery_address->country }}"
                            data-is_default="{{ $delivery_address->is_default }}"
                            class="badge badge-primary badge-pill edit_address">Edit</dd>
                        <dd class="badge badge-primary badge-pill" data-id="{{ $delivery_address->id }}"
                            data-address="{{ $delivery_address->address }}"
                            data-postal_code="{{ $delivery_address->postal_code }}"
                            data-city="{{ $delivery_address->city }}" data-state="{{ $delivery_address->state }}"
                            data-country="{{ $delivery_address->country }}"
                            data-is_default="{{ $delivery_address->is_default }}"
                            class="badge badge-primary badge-pill edit_address">Delete</dd>
                    </span>
                </li>

            @endforeach
        </ul>
    </div>


    <form class="row delivery-form" method="POST" id="delivery_form" action="{{ route('delivery.store') }}">

        <div class="col-md-6 ">
            <div class="form-group ">
                <label for="address">
                    Delivery Address
                </label>
                <input type="textarea" class="address form-control" id="address" rows="3" name="address"
                    placeholder="Delivery Address" value="">
                <span class="text-danger error-text address_error"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="postal_code">Delivery Postal Code</label>
                <input id="postal_code" type="text" class="postal_code form-control" name="postal_code" value="">
                <span class="text-danger error-text postal_code_error"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="city">Delivery Town City</label>
                <input id="city" type="text" class="city form-control" name="city" value="">
                <span class="text-danger error-text city_error"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="state">Delivery State</label>
                <input id="state" type="text" class="state form-control" name="state" value="">
                <span class="text-danger error-text state_error"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="country">Delivery Country</label>
                <select class="country form-control" id="country" name="country">
                    @foreach ($profile_country as $key => $profile_country)
                        <option value="{{ $profile_country->code_ISO }}">{{ $profile_country->label_eng }}</option>
                    @endforeach
                </select>
                <span class="text-danger error-text country_error"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="form-group">
                <label for="is_default">Default Address</label>
                <select class="is_default form-control" id="is_default" name="is_default">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                <span class="text-danger error-text is_default_error"></span>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea class="comments form-control" id="comments" rows="3" name="comments"
                    placeholder="Comments"></textarea>
            </div>
        </div>
    </form>
    <!-- /Delivery end tab -->
    <hr>
    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 save_delivery">
            Save And Continue
        </button><i>Fields * marked are required</i>
    </div>
</div>
