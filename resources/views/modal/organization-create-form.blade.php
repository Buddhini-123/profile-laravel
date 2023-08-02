<section id="form-and-scrolling-components">
    <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Add new organization</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-new-organization" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-title">Account Name</label>
                                            <input type="text" id="account_name" class="form-control validation"
                                                name="account_name" value="" />
                                            <span class="text-danger error-text account_name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-title">Phone</label>
                                            <input type="text" id="phone" class="form-control validation" name="phone"
                                                value="" />
                                            <span class="text-danger error-text phone_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-title">CEO</label>
                                            <input type="text" id="ceo" class="form-control validation" name="ceo"
                                                value="" />
                                            <span class="text-danger error-text ceo_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-title">Type</label>
                                            <input type="text" id="type" class="form-control validation" name="type"
                                                value="" />
                                            <span class="text-danger error-text type_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-title">Website </label>
                                            <input type="text" id="website" class="form-control validation"
                                                name="website" value="" />
                                            <span class="text-danger error-text website_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label" for="decresed">
                                            <label for="blog-edit-title">Geographic area of interest</label>
                                        </label>
                                        <select id="mb_union_regions" name="mb_union_region[]"
                                            class="select-2 form-control select-validation" multiple>
                                            <option value="" disabled>Select</option>

                                            @foreach ($mb_union_regions as $key => $mb_union_region)
                                                <option data-icon="globe" value="{{ $key }}">
                                                    {{ $mb_union_region->label_eng }} </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text mb_union_region_error"></span>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-cautions">Cautions</label>
                                            <input type="text" id="cautions" class="form-control validation"
                                                name="cautions" value="" />
                                            <span class="text-danger error-text cautions_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label" for="basic-icon-default-secondname">
                                            <label for="blog-edit-primary_contact">Primary Contact</label>
                                        </label>
                                        <div class="form-group">
                                            <select name="primary_contact" class="js-organisations-data-ajax"></select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-4 row col-12">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="basic-icon-default-country">Billing
                                            Country</label>
                                        <select name="billing_country" class="select2 form-control select-validation"
                                            id="billing_country">
                                            @foreach ($profile_countries as $profile_country)
                                                <option value="{{ $profile_country->code_ISO }}">
                                                    {{ $profile_country->label_eng }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error-text billing_country_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="blog-edit-slug">Billing city</label>
                                        <input type="text" id="billing_city" class="form-control validation"
                                            name="billing_city" value="" />
                                        <span class="text-danger error-text billing_city_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="blog-edit-primary_contact">Billing state</label>
                                        <input type="text" id="billing_country" class="form-control validation"
                                            name="billing_state" value="" />
                                        <span class="text-danger error-text billing_state_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mb-2">
                                        <label for="blog-edit-billing_postal_code">Billing postal code</label>
                                        <input type="text" id="billing_postal_code" class="form-control validation"
                                            name="billing_postal_code" value="" />
                                        <span class="text-danger error-text billing_postal_code_error"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group mb-2">
                                        <label for="blog-edit-slug">Description</label>
                                        <textarea type="text" id="description" class="form-control validation"
                                            name="description"></textarea>
                                        <span class="text-danger error-text description_error"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mb-2">
                                        <label for="blog-edit-slug">Common Area of interest</label>
                                        <textarea type="text" id="common_area_of_interest"
                                            class="form-control validation" name="common_area_of_interest"></textarea>
                                        <span class="text-danger error-text common_area_of_interest_error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column mt-6">
                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                    Save
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
