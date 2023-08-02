
<!--card-body-->
<div class="card-body">
    <form class="form-validate" method="POST" id="scientific_form" action="{{route('savedata') }}">
        <input name="uid" id="uid" type="hidden" value="{{$user->id}}"/>
        <section id="floating-label-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h5 class="card-title mb-1">Union Region </h5>
                            <i>(Linked to user profile)</i>
                            <div class="form-label-group">
                                <select class="form-control" id="union_region" name="union_region">
                                    @foreach($mb_union_regions as $key=> $mb_union_regions)
                                        <option value="{{$mb_union_regions->label_eng}}">{{($mb_union_regions->label_eng)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h5 class="card-title mb-1">Scientific Section </h5>
                            <i>(Select your primary section with voting rights)</i>
                            <div class="form-label-group">
                                <select class="form-control" id="scientific_section"
                                        name="scientific_section">
                                    @foreach($mb_scientific_sections as $mb_scientific_section)
                                        <option
                                            value="{{($mb_scientific_section->abr)}}"
                                            @if($membership_data->prop_scientific_section== $mb_scientific_section->abr)
                                            selected
                                            @endif
                                        >{{($mb_scientific_section->label_eng)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <h5 class="card-title  ">Which other sections/sub sections would you like to receive
            information about
        </h5>
        <i>(Select as many as you wish)<span style="color:#ff0000">*</span></i>
        <section id="floating-label-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12 mb-1">
                        </div>
                        <input type="text" hidden name="id" class="s-id" value="{{$mb_scientific_section->id = ($user->id)}}">
                        @php
                        (explode("|",$membership_data->prop_list_serves ));
                        @endphp
                        @foreach($mb_scientific_sections as $mb_scientific_section)
                            <div class="col-sm-6 col-12">
                                <div class="form-label-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="sub_scientific_section[]" class="s-section"
                                               value="{{$mb_scientific_section->abr}}"
                                               id="sub_{{$mb_scientific_section->abr}}"
                                               @if (in_array($mb_scientific_section->abr,explode("|",$membership_data->prop_list_serves )))
                                               checked
                                            @endif
                                        />
                                        <label class="custom-control-label"  for="sub_{{$mb_scientific_section->abr}}"
                                               @if($membership_data->prop_list_serves==$mb_scientific_section->label_eng) checked @endif>
                                            {{$mb_scientific_section->label_eng}} {{$mb_scientific_section->abr}}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <h4 class="card-title mb-2">Working Groups(Please select up to 3 groups)</h4>
        <section id="floating-label-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @php
                        (explode("|",$membership_data->prop_working_groups ));
                        @endphp
                        @foreach($mb_scientific_sections_NWk as $mb_scientific_section)
                            <div class="col-sm-6 col-12">
                                <div class="form-label-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="working_groups[]" class="s-section1" value="{{$mb_scientific_section->abr}}"
                                               id="wg_{{($mb_scientific_section->abr)}}"
                                               @if (in_array($mb_scientific_section->abr,explode("|",$membership_data->prop_working_groups )))
                                               checked
                                            @endif
                                        >
                                        <label class="custom-control-label"
                                               for="wg_{{($mb_scientific_section->abr)}}">{{($mb_scientific_section->label_eng)}} {{($mb_scientific_section->abr)}}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <div class="custom-control custom-control-secondary custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="share_profile_agreed" name="contact_shared" value="Y"
                   @if($membership_data->share_profile_agreed== 'Y')
                   selected
                @endif
            >
            <label class="custom-control-label" for="colorCheck4"><b>I agree for my contact
                    details to be shared with other members in the online Union Member
                    Directory and to be included in the Union list-serves</b></label>
        </div>
        <hr>
        <button type="submit"
                class="btn btn-primary mr-1 data-submit waves-effect waves-float waves-light update_scientific">
            Save and Continue
        </button>
        <i>Fields * marked are required</i>
    </form>
</div>
<!--/card-body-->
