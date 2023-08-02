<section class="app-user-edit">
    <div class="card">
        <div class="card-body">
            <form class="form-validate" id="">
                <div class="row mt-1">
                    <div class="col-12">
                        <h4 class="mb-1">
                            <i data-feather='unlock'
                               class="font-medium-4 mr-25"></i>
                            <span class="align-middle">Permission - Permission according to roles</span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="selectMembership">Membership type</label>
                                <select class="form-control form-control-lg mb-1"
                                        id="selectMembership" name="selectMembership">
                                    @foreach($mb_category_type as $type)
                                        <option value="">{{($type->type_of_membership)}}</option>
                                    @endforeach
                                    {{--
                                    <option value="Associate">Associate</option>
                                    --}}
                                    {{--
                                    <option value="Organisational">Organisational--}}
                                    {{--
                                 </option>
                                 --}}
                                    {{--
                                    <option value="Indivituals">Indivituals</option>
                                    --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless"
                               id="customer_data" name="customer_data">
                            <thead class="thead-light">
                            <tr>
                                <th>Module</th>
                                <th>1 YEAR</th>
                                <th> 2 YEAR</th>
                                <th> 3 YEAR</th>
                            </tr>
                            </thead>
                            <tbody id="listdetails" name="listdetails">
                            @foreach($mb_categories_associate as $mb_category)
                                <tr>
                                    <td>
                                        {{$mb_category->label_eng}}
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{$mb_category->id}}">{{($mb_category->price_1year)}}
                                                €</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{($mb_category->id)}}">{{($mb_category->price_2year)}}
                                                €</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{($mb_category->id)}}">{{($mb_category->price_3year)}}
                                                €</label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tbody id="listdetails1" name="listdetails1">
                            @foreach($mb_category_organization as $mb_category)
                                <tr>
                                    <td>
                                        {{$mb_category->label_eng}}
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{$mb_category->id}}">{{($mb_category->price_1year)}}
                                                €</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{($mb_category->id)}}">{{($mb_category->price_2year)}}
                                                €</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{($mb_category->id)}}">{{($mb_category->price_3year)}}
                                                €</label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tbody id="listdetails2" name="listdetails2">
                            @foreach($mb_category_indivitual as $mb_category)
                                <tr>
                                    <td>
                                        {{$mb_category->label_eng}}
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{$mb_category->id}}">{{($mb_category->price_1year)}}
                                                €</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{($mb_category->id)}}">{{($mb_category->price_2year)}}
                                                €</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                   class="custom-control-input"
                                                   id="{{($mb_category->id)}}"/>
                                            <label class="custom-control-label"
                                                   for="{{($mb_category->id)}}">{{($mb_category->price_3year)}}
                                                €</label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fp-default">Start Date</label>
                                <input type="text" id="fp-default" name="fp-default"
                                       class="form-control flatpickr-basic"
                                       placeholder="YYYY-MM-DD"/>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="fp-default">End Date</label>
                                <input type="text" id="fp-default" name="fp-default"
                                       class="form-control flatpickr-basic"
                                       placeholder="YYYY-MM-DD"/>
                            </div>
                            <div class="col-12 mb-5">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                           id="inlineCheckbox1" name="inlineCheckbox1"
                                           value="checked" checked/>
                                    <label class="form-check-label"
                                           for="inlineCheckbox1">Checked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                           id="inlineCheckbox2" name="inlineCheckbox2"
                                           value="unchecked"/>
                                    <label class="form-check-label"
                                           for="inlineCheckbox2">Unchecked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox"
                                           id="inlineCheckbox3" name="inlineCheckbox3"
                                           value="checked-disabled" checked disabled/>
                                    <label class="form-check-label"
                                           for="inlineCheckbox3">Checked
                                        disabled</label>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary">Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- User New MB Ends -->
</section>
