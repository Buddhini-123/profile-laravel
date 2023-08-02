@extends('layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection
@section('content')
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="app-user-list">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills  mt-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center active" id="information-tab"
                                        data-toggle="tab" href="#information" aria-controls="information" role="tab"
                                        aria-selected="false">
                                        <i data-feather="info"></i><span class="d-none d-sm-block">Membership Search</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center " id="account-tab" data-toggle="tab"
                                        href="#account" aria-controls="account" role="tab" aria-selected="true">
                                        <i data-feather='trending-up'></i><span class="d-none d-sm-block">Transaction
                                            Search</span>
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <!-- Account Tab starts -->
                                <div class="tab-pane  " id="account" aria-labelledby="account-tab" role="tabpanel">
                                    <!-- Advanced Search -->
                                    <div id="advanced-search-datatable">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header border-bottom">
                                                        <h4 class="card-title">Advanced Search</h4>
                                                    </div>
                                                    <!--Search Form -->
                                                    <form method="post" action="/membership/transaction-list">
                                                        @csrf
                                                        <div class="card-body mt-2">
                                                            <div class="col-sm-6 col-12 padding">
                                                                <label for="basic-icon-default-ids">
                                                                    <h5>Ids comma separated value(#)</h5>
                                                                </label>
                                                                <input id="basic-icon-default-ids"  value="{{ $session_transaction_data->ids ?? '' }}" name="ids" class="form-control dt-ids" type="text" />
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="fp-default">
                                                                            <h5>Payment start date</h5>
                                                                        </label>
                                                                        <input type="date" id="fp-default" value="{{ $session_transaction_data->payment_start_date ?? '' }}" name="payment_start_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="fp-default">
                                                                            <h5>Payment end date</h5>
                                                                        </label>
                                                                        <input type="date" id="fp-default" value="{{ $session_transaction_data->payment_end_date ?? '' }}" name="payment_end_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                                                    </div>
                                                                    <div class="col-md-6 form-group padding">
                                                                        <label for="fp-default">
                                                                            <h5>Membership start date(#)</h5>
                                                                        </label>
                                                                        <input type="date" id="fp-default" value="{{ $session_transaction_data->membership_start ?? '' }}" name="membership_start" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label for="fp-default">
                                                                            <h5>Membership end date(#)</h5>
                                                                        </label>
                                                                        <input type="date" id="fp-default" value="{{ $session_transaction_data->membership_end ?? '' }}"  name="membership_end" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                                                    </div>

                                                                    <div class="col-sm-12 col-12">
                                                                        <h5>Member validity regardless payment date(#)</h5>
                                                                        <div class="demo-inline-spacing pb-2">
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="13" name="membership_history[]" class="custom-control-input" id="14"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('13', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="14">2013</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="14" name="membership_history[]" class="custom-control-input" id="15"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('14', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="15">2014</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="15" name="membership_history[]" class="custom-control-input" id="16"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('15', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="16">2015</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="16" name="membership_history[]" class="custom-control-input" id="17"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('16', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="17">2016</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="17" name="membership_history[]" class="custom-control-input" id="18"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('17', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="18">2017</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="18" name="membership_history[]" class="custom-control-input" id="19"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('18', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="19">2018</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="19" name="membership_history[]" class="custom-control-input" id="20"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('19', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="20">2019</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="20" name="membership_history[]" class="custom-control-input" id="21"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('20', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="21">2020</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="21" name="membership_history[]" class="custom-control-input" id="22"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('21', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="22">2021</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="22" name="membership_history[]" class="custom-control-input" id="23"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('22', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="23">2022</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="23" name="membership_history[]" class="custom-control-input" id="24"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('23', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="24">2023</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="24" name="membership_history[]" class="custom-control-input" id="25"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('24', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="25">2024</label>
                                                                            </div>
                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox" value="25" name="membership_history[]" class="custom-control-input" id="26"
                                                                                {{ (isset($session_transaction_data->membership_history) ? in_array('25', $session_transaction_data->membership_history) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="26">2025</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 pb-3">
                                                                        <label for="basic-icon-default-comments">
                                                                            <h5>Comments</h5>
                                                                        </label>
                                                                        <input id="basic-icon-default-comments" name="comments" class="form-control form-control dt-comments" type="text" />
                                                                    </div>

                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Type of operation(#)</h5>
                                                                        </label>
                                                                        <select name="source_of_operation" class="form-control">
                                                                        <option  value="" >Select </option>
                                                                            <option value="ONLINE" {{ (isset($session_transaction_data->source_of_operation) ? $session_transaction_data->source_of_operation : null == 'ONLINE') ? 'selected' : '' }}>ONLINE</option>
                                                                            <option value="BACK_OFFICE"{{ (isset($session_transaction_data->source_of_operation) ? $session_transaction_data->source_of_operation : null == 'BACK_OFFICE') ? 'selected' : '' }}>BACK OFFICE</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Invoice status(#)</h5>
                                                                        </label>
                                                                        <select  name="invoice_status" class="form-control">
                                                                        <option  value="" >Select </option>
                                                                            <option value="1" {{ (isset($session_transaction_data->invoice_status) ? $session_transaction_data->invoice_status : null == '1') ? 'selected' : '' }} >PAID</option>
                                                                            <option value="0" {{ (isset($session_transaction_data->invoice_status) ? $session_transaction_data->invoice_status : null == '0') ? 'selected' : '' }} >NOT PAID</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <h5>Payment Source</h5>

                                                                        <section class="vuexy-checkbox-color">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="card">
                                                                                        <div class="demo-inline-spacing">
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="CASH" class="custom-control-input" id="cash"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('CASH', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="cash">CASH</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="CARD" class="custom-control-input" id="card"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('CARD', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="card">CARD</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="BANK" class="custom-control-input" id="bank"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('BANK', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="bank">BANK</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="EXCEPTION" class="custom-control-input" id="exception"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('EXCEPTION', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="exception">EXCEPTION</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="WAITING" class="custom-control-input" id="watting"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('WAITING', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="watting">WAITING</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="INTERNAL" class="custom-control-input" id="internal"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('INTERNAL', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="internal">INTERNAL</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="CAMPAIGN" class="custom-control-input" id="campaign"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('CAMPAIGN', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="campaign">CAMPAIGN</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="COURSE" class="custom-control-input" id="course"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('COURSE', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="course">COURSE</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="INFERENCE" class="custom-control-input" id="inference"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('INFERENCE', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="inference">INFERENCE</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="COMPLETE" class="custom-control-input" id="complete"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('COMPLETE', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="complete">COMPLETE</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="IJTLD" class="custom-control-input" id="ijtld"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('IJTLD', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="ijtld">IJTLD</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                                                <input type="checkbox" name="source_reference[]" value="STAFF" class="custom-control-input" id="staff"
                                                                                                   {{(isset($session_transaction_data->source_reference) ? in_array('STAFF', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                                <label class="custom-control-label" for="staff">STAFF</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                    </div>
                                                                    <div class="col-md-6 padding">
                                                                        <h5>Brand of payment(#)</h5>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <div class="demo-inline-spacing">
                                                                                        <div class="custom-control custom-control-primary custom-checkbox">
                                                                                            <input type="checkbox" name="brand_of_payment[]" value="VISA"  class="custom-control-input" id="visa"
                                                                                             {{(isset($session_transaction_data->source_reference) ? in_array('VISA', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                            <label class="custom-control-label" for="visa">VISA</label>
                                                                                        </div>
                                                                                        <div class="custom-control custom-control-primary custom-checkbox">
                                                                                            <input type="checkbox" name="brand_of_payment[]" value="MASTER"  class="custom-control-input" id="master"
                                                                                             {{(isset($session_transaction_data->source_reference) ? in_array('MASTER', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                            <label class="custom-control-label" for="master">MASTER</label>
                                                                                        </div>
                                                                                        <div class="custom-control custom-control-primary custom-checkbox">
                                                                                            <input type="checkbox" name="brand_of_payment[]" value="AMEX"  class="custom-control-input" id="amex"
                                                                                             {{(isset($session_transaction_data->source_reference) ? in_array('AMEX', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                            <label class="custom-control-label" for="amex">AMEX</label>
                                                                                        </div>
                                                                                        <div class="custom-control custom-control-primary custom-checkbox">
                                                                                            <input type="checkbox" name="brand_of_payment[]" value="CB"  class="custom-control-input" id="cb"
                                                                                             {{(isset($session_transaction_data->source_reference) ? in_array('CB', $session_transaction_data->source_reference) : null) ? 'checked' : '' }}/>
                                                                                            <label class="custom-control-label" for="cb">CB</label>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                    </div>
                                                                    <div class="col-sm-6 col-12">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Income Level</h5>
                                                                        </label>
                                                                        <div class="demo-inline-spacing">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="L" class="custom-control-input" value="" name="world_bank_income_group[]" id="customCheck1"
                                                                                {{(isset($session_transaction_data->world_bank_income_group) ? in_array('L', $session_transaction_data->world_bank_income_group) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="customCheck1">L</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="LM" class="custom-control-input" name="world_bank_income_group[]" id="customCheck2"
                                                                                {{(isset($session_transaction_data->world_bank_income_group) ? in_array('LM', $session_transaction_data->world_bank_income_group) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="customCheck2">LM</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="UH" class="custom-control-input" name="world_bank_income_group[]" id="customCheck3"
                                                                                {{(isset($session_transaction_data->world_bank_income_group) ? in_array('UH', $session_transaction_data->world_bank_income_group) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="customCheck3">UH</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="H" class="custom-control-input" name="world_bank_income_group[]" id="customCheck4"
                                                                                {{(isset($session_transaction_data->world_bank_income_group) ? in_array('H', $session_transaction_data->world_bank_income_group) : null) ? 'checked' : '' }}/>
                                                                                <label class="custom-control-label" for="customCheck4">H</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Membership renewal type</h5>
                                                                        </label>
                                                                        <select  name="renewal_status" class="form-control">
                                                                        <option  value="" >Select </option>
                                                                            <option value="NEW" {{(isset($session_transaction_data->renewal_status) ? $session_transaction_data->renewal_status : null == 'NEW') ? 'selected' : '' }}>NEW</option>
                                                                            <option value="RENEW" {{ (isset($session_transaction_data->renewal_status) ? $session_transaction_data->renewal_status : null == 'RENEW') ? 'selected' : '' }}>RENEW</option>
                                                                            <option value="REJOIN" {{(isset($session_transaction_data->renewal_status) ? $session_transaction_data->renewal_status : null == 'REJOIN') ? 'selected' : '' }}>REJOIN</option>
                                                                            <option value="CONTINUE" {{ (isset($session_transaction_data->renewal_status) ? $session_transaction_data->renewal_status : null == 'CONTINUE') ? 'selected' : '' }}>CONTINUE</option>
                                                                        </select>
                                                                    </div>

                                                                    <hr />
                                                                    <div class="col-md-3 form-group">
                                                                        <label class="form-label" for="operation">
                                                                            <h5>Sort key</h5>
                                                                        </label>
                                                                        <select id="sortkey" name="sortkey" class="form-control">
                                                                            <option  value="" >Select </option>
                                                                            <option value="transaction_date" {{(isset($session_transaction_data->sortkey) ? $session_transaction_data->sortkey : null == 'transaction_date') ? 'selected' : '' }}>Transaction date</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Sort by</h5>
                                                                        </label>
                                                                        <select id="sortby" name="sortby" class="form-control">
                                                                            <option  value="" >Select </option>
                                                                            <option value="ASC" {{(isset($session_transaction_data->sortby) ? $session_transaction_data->sortby : null == 'ASC') ? 'selected' : '' }}>ASC</option>
                                                                            <option value="DESC" {{(isset($session_transaction_data->sortby) ? $session_transaction_data->sortby : null == 'DESC') ? 'selected' : '' }}>DESC</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group"></div>
                                                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                                                        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                                            Search
                                                                        </button>
                                                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- users edit account form ends -->

                                <!-- Account Tab ends -->
                                <!-- Information Tab starts -->
                                <div class="tab-pane active" id="information" aria-labelledby="information-tab"
                                    role="tabpanel">
                                    <!-- users edit Info form start -->
                                    <div id="advanced-search-datatable">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header border-bottom">
                                                        <h4 class="card-title">Advanced Search</h4>
                                                    </div>

                                                    <form method="post" action="/membership/list">
                                                        @csrf
                                                        <div class="card-body mt-2">
                                                            <div class=" col-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label"
                                                                            for="basic-icon-default-secondname">
                                                                            <h5><i data-feather='pocket'></i> CU
                                                                                Number(#)</h5>
                                                                        </label>
                                                                        <input type="number"
                                                                            value="{{ $session_data->id ?? '' }}"
                                                                            id="basic-icon-default-secondname"
                                                                            class="form-control dt-secondname"
                                                                            aria-describedby="basic-icon-default-email2"
                                                                            name="id" />
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label"
                                                                            for="basic-icon-default-secondname">
                                                                            <h5> <i data-feather='user'></i> First And Last
                                                                                Name
                                                                                Contains(#)</h5>
                                                                        </label>
                                                                        <input type="text"
                                                                            value="{{ $session_data->name ?? '' }}"
                                                                            id="basic-icon-default-secondname"
                                                                            class="form-control dt-secondname"
                                                                            aria-describedby="basic-icon-default-email2"
                                                                            name="name" />
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label"
                                                                            for="basic-icon-default-secondname">
                                                                            <h5><i data-feather='at-sign'></i> mail
                                                                                Address Contains(#)</h5>
                                                                        </label>
                                                                        <input type="text"
                                                                            value="{{ $session_data->email ?? '' }}"
                                                                            id="basic-icon-default-secondname"
                                                                            class="form-control dt-secondname"
                                                                            aria-describedby="basic-icon-default-email2"
                                                                            name="email" />
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label"
                                                                            for="basic-icon-default-secondname">
                                                                            <h5>
                                                                                <i data-feather='archive'></i>
                                                                                Organization/institution(#)
                                                                            </h5>
                                                                        </label>
                                                                        <div class="form-group">
                                                                            <select
                                                                                class="select2-data-ajax form-control   "
                                                                                id="institution" name="institution">

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label"
                                                                            for="basic-icon-default-country">
                                                                            <h5><i data-feather="flag"></i> Country(#)</h5>
                                                                        </label>
                                                                        <select name="country"
                                                                            class="select-2 form-control" id="country">
                                                                            <option value="" selected="true">Select</option>
                                                                            @foreach ($profile_countries as $profile_country)
                                                                                <option data-icon="globe"
                                                                                    value="{{ $profile_country->code_ISO }}"
                                                                                    {{ (isset($session_data->country) ? $session_data->country : null == $profile_country->code_ISO) ? 'selected' : '' }}>
                                                                                    {{ $profile_country->label_eng }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label"
                                                                            for="basic-icon-default-secondname">
                                                                            <h5><i data-feather='users'></i> Job Title(#)
                                                                            </h5>
                                                                        </label>
                                                                        <input type="text" id="job_title"
                                                                            class="form-control"
                                                                            aria-describedby="basic-icon-default"
                                                                            name="job_title" />
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="decresed">
                                                                            <h5><i data-feather="briefcase"></i> Area of
                                                                                Specialism(#)</h5>
                                                                        </label>
                                                                        <select id="profile_job_category"
                                                                            name="profile_job_category"
                                                                            class="select-2 form-control">
                                                                            <option value="" selected="true">Select</option>
                                                                            @foreach ($profile_job_categories as $profile_job_category)
                                                                                <option data-icon="command"
                                                                                    value="{{ $profile_job_category->label_eng }}"
                                                                                    {{ (isset($session_data->profile_job_category) ? $session_data->profile_job_category : null == $profile_job_category->label_eng) ? 'selected' : '' }}>
                                                                                    {{ $profile_job_category->label_eng }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="label_eng">
                                                                            <h5><i data-feather="briefcase"></i> Type of
                                                                                Institution(#)</h5>
                                                                        </label>
                                                                        <select id="profile_organisation_types"
                                                                            name="profile_organisation_type"
                                                                            class="select-2 form-control">
                                                                            <option value="" selected="true">Select</option>
                                                                            @foreach ($profile_organisation_types as $profile_organisation_type)
                                                                                <option data-icon="command"
                                                                                    value="{{ $profile_organisation_type->id }}"
                                                                                    {{ (isset($session_data->profile_organisation_type) ? $session_data->profile_organisation_type : null == $profile_organisation_type->id) ? 'selected' : '' }}>
                                                                                    {{ $profile_organisation_type->label_eng }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12   mt-2">
                                                                <h5><i data-feather='calendar'></i> Membership history(#)
                                                                </h5>
                                                            </div>
                                                            <section class="col-md-12 form-group pb-2">
                                                                <div class="demo-inline-spacing">
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="13"
                                                                            {{ (isset($session_data->membership_history) ? in_array('13', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2013" />

                                                                        <label class="custom-control-label"
                                                                            for="2013">2013</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="14"
                                                                            {{ (isset($session_data->membership_history) ? in_array('14', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2014" />

                                                                        <label class="custom-control-label"
                                                                            for="2014">2014</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="15"
                                                                            {{ (isset($session_data->membership_history) ? in_array('15', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2015" />

                                                                        <label class="custom-control-label"
                                                                            for="2015">2015</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="16"
                                                                            {{ (isset($session_data->membership_history) ? in_array('16', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2016" />

                                                                        <label class="custom-control-label"
                                                                            for="2016">2016</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="17"
                                                                            {{ (isset($session_data->membership_history) ? in_array('17', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2017" />

                                                                        <label class="custom-control-label"
                                                                            for="2017">2017</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="18"
                                                                            {{ (isset($session_data->membership_history) ? in_array('18', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2018" />

                                                                        <label class="custom-control-label"
                                                                            for="2018">2018</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="19"
                                                                            {{ (isset($session_data->membership_history) ? in_array('19', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2019" />

                                                                        <label class="custom-control-label"
                                                                            for="2019">2019</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="20"
                                                                            {{ (isset($session_data->membership_history) ? in_array('20', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2020" />

                                                                        <label class="custom-control-label"
                                                                            for="2020">2020</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="21"
                                                                            {{ (isset($session_data->membership_history) ? in_array('21', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2021" />

                                                                        <label class="custom-control-label"
                                                                            for="2021">2021</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="22"
                                                                            {{ (isset($session_data->membership_history) ? in_array('22', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2022" />

                                                                        <label class="custom-control-label"
                                                                            for="2022">2022</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="23"
                                                                            {{ (isset($session_data->membership_history) ? in_array('23', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2023" />

                                                                        <label class="custom-control-label"
                                                                            for="2023">2023</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="24"
                                                                            {{ (isset($session_data->membership_history) ? in_array('24', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2024" />

                                                                        <label class="custom-control-label"
                                                                            for="2024">2024</label>
                                                                    </div>
                                                                    <div
                                                                        class="custom-control custom-control-primary custom-checkbox">
                                                                        <input type="checkbox" name="membership_history[]"
                                                                            value="25"
                                                                            {{ (isset($session_data->membership_history) ? in_array('25', $session_data->membership_history) : null) ? 'checked' : '' }}
                                                                            class="custom-control-input" id="2025" />

                                                                        <label class="custom-control-label"
                                                                            for="2025">2025</label>
                                                                    </div>
                                                                </div>
                                                            </section>

                                                            <div class="divider divider-left pb-2 pt-2">
                                                                <div class="divider-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-arrow-down-right">
                                                                        <line x1="7" y1="7" x2="17" y2="17"></line>
                                                                        <polyline points="17 7 17 17 7 17"></polyline>
                                                                    </svg>
                                                                    Property
                                                                </div>
                                                            </div>

                                                            <div class=" col-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="decresed">
                                                                            <h5>
                                                                                Membership Type(#)</h5>
                                                                        </label>
                                                                        <select id="type_of_membership"
                                                                            name="type_of_membership"
                                                                            class="select-2 form-control">
                                                                            <option value="" selected="true">Select</option>
                                                                            @foreach ($mb_category as $key => $mb_membership_category)
                                                                                <option
                                                                                    value="{{ $mb_membership_category->id }}"
                                                                                    {{ (isset($session_data->type_of_membership) ? $session_data->type_of_membership : null == $mb_membership_category->id) ? 'selected' : '' }}
                                                                                    data-icon="command">
                                                                                    {{ $mb_membership_category->type_of_membership }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="decresed">
                                                                            <h5>Union Region(#)</h5>
                                                                        </label>
                                                                        <select id="mb_union_regions" name="mb_union_region"
                                                                            class="select-2 form-control">
                                                                            <option value="" selected="true">Select</option>
                                                                            @foreach ($mb_union_regions as $key => $mb_union_region)
                                                                                <option data-icon='globe'
                                                                                    {{ (isset($session_data->mb_union_region) ? $session_data->mb_union_region : null == $key) ? 'selected' : '' }}
                                                                                    value="{{ $key }}">
                                                                                    {{ $mb_union_region->label_eng }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5> Membership
                                                                                category(#)
                                                                            </h5>
                                                                        </label>

                                                                        <div class="form-group">
                                                                            <select class="select-2 form-control"
                                                                                name="mb_category" id="mb_category">
                                                                                <optgroup label="Individuals"
                                                                                    data-select2-id="174">
                                                                                    <option value="" selected="true">Select
                                                                                    </option>
                                                                                    @foreach ($mb_category as $key => $mb_membership_category)
                                                                                        <option
                                                                                            value="{{ $mb_membership_category->id }}"
                                                                                            {{ (isset($session_data->mb_category) ? $session_data->mb_category : null == $mb_membership_category->id) ? 'selected' : '' }}
                                                                                            data-icon='package'>
                                                                                            {{ $mb_membership_category->label_eng }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </optgroup>

                                                                                <optgroup label="Organisational members"
                                                                                    data-select2-id="174">
                                                                                    @foreach ($mb_category as $key => $mb_membership_category)
                                                                                        <option
                                                                                            value="q{{ $key }}"
                                                                                            {{ (isset($session_data->mb_category) ? $session_data->mb_category : null == $mb_membership_category->id) ? 'selected' : '' }}
                                                                                            data-icon='package'>
                                                                                            {{ $mb_membership_category->label_eng }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </optgroup>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5>
                                                                                Scientific Section And Subsection(#)</h5>
                                                                        </label>
                                                                        <select class="select-2 form-control"
                                                                            name="mb_scientific_section"
                                                                            id="mb_scientific_sections">
                                                                            <option value="" selected="true">Select</option>
                                                                            @foreach ($mb_scientific_sections as $key => $mb_scientific_section)
                                                                                <option value="{{ $key }}"
                                                                                    {{ (isset($session_data->mb_scientific_section) ? $session_data->mb_scientific_section : null == $key) ? 'selected' : '' }}
                                                                                    data-icon='codesandbox'>
                                                                                    {{ $mb_scientific_section->label_eng }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5>List
                                                                                Serves(#)</h5>
                                                                        </label>

                                                                        <select class="select-2 form-control"
                                                                            name="list_serves" id="list_serves">
                                                                            <option value="">Select</option>

                                                                            @foreach ($union_department as $key => $union_departments)
                                                                                <option value="{{ $key }}"
                                                                                    {{ isset($session_data->list_serves) ? ($session_data->list_serves == $key ? 'selected' : '') : ' ' }}
                                                                                    data-icon='grid'>
                                                                                    {{ $union_departments->name_eng }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="type">
                                                                            <h5> Working
                                                                                Groups(#)</h5>
                                                                        </label>
                                                                        <select class="select-2 form-control"
                                                                            name="profile_job_category"
                                                                            id="profile_job_categories">
                                                                            <option value="">Select</option>
                                                                            @foreach ($profile_job_categories as $key => $profile_job_category)
                                                                                <option value="{{ $key }}"
                                                                                    {{ (isset($session_data->profile_job_category) ? $session_data->profile_job_category : null == $key) ? 'selected' : '' }}
                                                                                    data-icon='feather'>
                                                                                    {{ $profile_job_category->label_eng }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="divider divider-left pb-2 pt-2">
                                                                <div class="divider-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-arrow-down-right">
                                                                        <line x1="7" y1="7" x2="17" y2="17"></line>
                                                                        <polyline points="17 7 17 17 7 17"></polyline>
                                                                    </svg>
                                                                    Configurations
                                                                </div>
                                                            </div>
                                                            <div class=" col-12">
                                                                <div class="row">

                                                                    <div class="col-md-6 form-group  pb-3">
                                                                        <label class="form-label"
                                                                            for="basic-icon-default-secondname">
                                                                            <h5> Group Sponser
                                                                            </h5>
                                                                        </label>
                                                                        <select class="select-2 form-control"
                                                                            id="group_sponser">
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-group  pb-3">
                                                                        <label for="fp-default">
                                                                            <h5>Membership Valid
                                                                                Date(#)</h5>
                                                                        </label>
                                                                        <input type="date" id="fp-default"
                                                                            name="membership_valid_date"
                                                                            class="form-control flatpickr-basic" />
                                                                    </div>


                                                                    <div class="col-sm-6 col-12  pb-3">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Validity status(#)</h5>
                                                                        </label>
                                                                        <div class="demo-inline-spacing">
                                                                            <div
                                                                                class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox"
                                                                                    name="validity_status[]"
                                                                                    {{ (isset($session_data->validity_status) ? in_array('ACTIVE', $session_data->validity_status) : null) ? 'checked' : '' }}
                                                                                    value="ACTIVE"
                                                                                    class="custom-control-input" id="30" />
                                                                                <label class="custom-control-label"
                                                                                    for="30">ACTIVE</label>
                                                                            </div>
                                                                            <div
                                                                                class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox"
                                                                                    name="validity_status[]"
                                                                                    {{ (isset($session_data->validity_status) ? in_array('TORENEW', $session_data->validity_status) : null) ? 'checked' : '' }}
                                                                                    value="TORENEW"
                                                                                    class="custom-control-input" id="31" />
                                                                                <label class="custom-control-label"
                                                                                    for="31">
                                                                                    TORENEW</label>
                                                                            </div>
                                                                            <div
                                                                                class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox"
                                                                                    name="validity_status[]"
                                                                                    {{ (isset($session_data->validity_status) ? in_array('LAPSED', $session_data->validity_status) : null) ? 'checked' : '' }}
                                                                                    value="LAPSED"
                                                                                    class="custom-control-input" id="32" />
                                                                                <label class="custom-control-label"
                                                                                    for="32">
                                                                                    LAPSED</label>
                                                                            </div>
                                                                            <div
                                                                                class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox"
                                                                                    name="validity_status[]"
                                                                                    {{ (isset($session_data->validity_status) ? in_array('PROSPECT', $session_data->validity_status) : null) ? 'checked' : '' }}
                                                                                    value="PROSPECT"
                                                                                    class="custom-control-input" id="33" />
                                                                                <label class="custom-control-label"
                                                                                    for="33">
                                                                                    PROSPECT</label>
                                                                            </div>
                                                                            <div
                                                                                class="custom-control custom-control-primary custom-checkbox">
                                                                                <input type="checkbox"
                                                                                    name="validity_status[]"
                                                                                    {{ (isset($session_data->validity_status) ? in_array('RESIGNED', $session_data->validity_status) : null) ? 'checked' : '' }}
                                                                                    value="RESIGNED"
                                                                                    class="custom-control-input" id="34" />
                                                                                <label class="custom-control-label"
                                                                                    for="34">
                                                                                    RESIGNED</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-12  pb-3">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Membership Income Level(##)</h5>
                                                                        </label>
                                                                        <div class="demo-inline-spacing">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="world_bank_income_group[]"
                                                                                    value="L"
                                                                                    {{ (isset($session_data->world_bank_income_group) ? in_array('L', $session_data->world_bank_income_group) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input"
                                                                                    id="world_bank_income_group-L" />
                                                                                <label class="custom-control-label"
                                                                                    for="world_bank_income_group-L">L</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="world_bank_income_group[]"
                                                                                    value="LM"
                                                                                    {{ (isset($session_data->world_bank_income_group) ? in_array('LM', $session_data->world_bank_income_group) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input"
                                                                                    id="world_bank_income_group-LM" />
                                                                                <label class="custom-control-label"
                                                                                    for="world_bank_income_group-LM">LM</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="world_bank_income_group[]"
                                                                                    value="UH"
                                                                                    {{ (isset($session_data->world_bank_income_group) ? in_array('UH', $session_data->world_bank_income_group) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input"
                                                                                    id="world_bank_income_group-UH" />
                                                                                <label class="custom-control-label"
                                                                                    for="world_bank_income_group-UH">UH</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" name="world_bank_income_group[]"
                                                                                    value="H"
                                                                                    {{ (isset($session_data->world_bank_income_group) ? in_array('H', $session_data->world_bank_income_group) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input"
                                                                                    id="world_bank_income_group-H" />
                                                                                <label class="custom-control-label"
                                                                                    for="world_bank_income_group-H">H</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-12 pb-3">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Membership admin status(#)</h5>
                                                                        </label>
                                                                        <div class="demo-inline-spacing padding">
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="Y"
                                                                                    name="membership_status[]"
                                                                                    {{ (isset($session_data->membership_status) ? in_array('Y', $session_data->membership_status) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input"
                                                                                    id="yes" />
                                                                                <label class="custom-control-label"
                                                                                    for="yes">Yes</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="N"
                                                                                    name="membership_status[]"
                                                                                    {{ (isset($session_data->membership_status) ? in_array('N', $session_data->membership_status) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input" id="no" />
                                                                                <label class="custom-control-label"
                                                                                    for="no">No</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="P"
                                                                                    name="membership_status[]"
                                                                                    {{ (isset($session_data->membership_status) ? in_array('P', $session_data->membership_status) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input"
                                                                                    id="pending" />
                                                                                <label class="custom-control-label"
                                                                                    for="pending">Pending</label>
                                                                            </div>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="U"
                                                                                    name="membership_status[]"
                                                                                    {{ (isset($session_data->membership_status) ? in_array('U', $session_data->membership_status) : null) ? 'checked' : '' }}
                                                                                    class="custom-control-input"
                                                                                    id="undefined" />
                                                                                <label class="custom-control-label"
                                                                                    for="undefined">Undefined</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="decresed">
                                                                            <h5>User Admin Status</h5>
                                                                        </label>
                                                                        <div class="demo-inline-spacing padding">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" name="admin_status"
                                                                                    class="custom-control-input"
                                                                                    id="admin-yes" />
                                                                                <label class="custom-control-label"
                                                                                    for="admin-yes">Yes</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" name="admin_status"
                                                                                    class="custom-control-input"
                                                                                    id="admin-no" />
                                                                                <label class="custom-control-label"
                                                                                    for="admin-no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 form-group">
                                                                        <label class="form-label" for="decresed">
                                                                            <h5>With
                                                                                out staff</h5>
                                                                        </label>
                                                                        <div class="demo-inline-spacing padding">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" name="staff"
                                                                                    class="custom-control-input"
                                                                                    id="staff-yes" />
                                                                                <label class="custom-control-label"
                                                                                    for="staff-yes">Yes</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" name="staff"
                                                                                    class="custom-control-input"
                                                                                    id="staff-no" />
                                                                                <label class="custom-control-label"
                                                                                    for="staff-no">No</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-12  pb-3">
                                                                        <label class="form-label" for="type">
                                                                            <h5>Shared Membership Profile(#)</h5>
                                                                        </label>
                                                                        <div class="demo-inline-spacing">
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" {{ (isset($session_data->share_profile_agreed) ? in_array('1', $session_data->share_profile_agreed) : null) ? 'checked' : '' }}
                                                                                    name="share_profile_agreed" value="1"
                                                                                    class="custom-control-input" id="y" />
                                                                                <label class="custom-control-label"
                                                                                    for="y">Yes</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio">
                                                                                <input type="radio" {{ (isset($session_data->share_profile_agreed) ? in_array('0', $session_data->share_profile_agreed) : null) ? 'checked' : '' }}
                                                                                    name="share_profile_agreed" value="0"
                                                                                    class="custom-control-input" id="n" />
                                                                                <label class="custom-control-label"
                                                                                    for="n">No</label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="divider divider-left pb-2 pt-2">
                                                                <div class="divider-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-arrow-down-right">
                                                                        <line x1="7" y1="7" x2="17" y2="17"></line>
                                                                        <polyline points="17 7 17 17 7 17"></polyline>
                                                                    </svg>
                                                                    Sort By(#)
                                                                </div>
                                                            </div>
                                                            <div class=" col-12  pb-3">
                                                                <div class="row">
                                                                    <div class="input-group input-group-lg mb-1 col-md-6">
                                                                        <select name="sort_key_1" id="sort_key_1"
                                                                            class="form-control">
                                                                            <option value="">Select</option>
                                                                            <option value="first_name"
                                                                                {{ (isset($session_data->sort_key_1) ? $session_data->sort_key_1 : null == 'first_name') ? 'selected' : '' }}>
                                                                                name</option>
                                                                            <option value="email"
                                                                                {{ (isset($session_data->sort_key_1) ? $session_data->sort_key_1 : null == 'email') ? 'selected' : '' }}>
                                                                                email</option>
                                                                            <option value="organization"
                                                                                {{ (isset($session_data->sort_key_1) ? $session_data->sort_key_1 : null == 'organization') ? 'selected' : '' }}>
                                                                                organization</option>
                                                                            <option value="country"
                                                                                {{ (isset($session_data->sort_key_1) ? $session_data->sort_key_1 : null == 'country') ? 'selected' : '' }}>
                                                                                country</option>

                                                                        </select>
                                                                        <select name="sort_type_1" id="sort_type_1"
                                                                            class="form-control">
                                                                            <option value="asc"
                                                                                {{ (isset($session_data->sort_type_1) ? $session_data->sort_type_1 : null == 'asc') ? 'selected' : '' }}>
                                                                                ASC</option>
                                                                            <option value="desc"
                                                                                {{ (isset($session_data->sort_type_1) ? $session_data->sort_type_1 : null == 'desc') ? 'selected' : '' }}>
                                                                                DESC</option>
                                                                        </select>

                                                                    </div>
                                                                    <div class="input-group input-group-lg mb-1 col-md-6">
                                                                        <select name="sort_key_2" id="sort_key_2"
                                                                            class="form-control">
                                                                            <option value="">Select</option>
                                                                            <option value="first_name"
                                                                                {{ (isset($session_data->sort_key_2) ? $session_data->sort_key_2 : null == 'first_name') ? 'selected' : '' }}>
                                                                                name</option>
                                                                            <option value="email"
                                                                                {{ (isset($session_data->sort_key_2) ? $session_data->sort_key_2 : null == 'email') ? 'selected' : '' }}>
                                                                                email</option>
                                                                            <option value="organization"
                                                                                {{ (isset($session_data->sort_key_2) ? $session_data->sort_key_2 : null == 'organization') ? 'selected' : '' }}>
                                                                                organization</option>
                                                                            <option value="country"
                                                                                {{ (isset($session_data->sort_key_2) ? $session_data->sort_key_2 : null == 'country') ? 'selected' : '' }}>
                                                                                country</option>
                                                                        </select>
                                                                        <select name="sort_type_2" id="sort_type_2"
                                                                            class="form-control">
                                                                            <option value="asc"
                                                                                {{ (isset($session_data->sort_type_2) ? $session_data->sort_type_2 : null == 'asc') ? 'selected' : '' }}>
                                                                                ASC</option>
                                                                            <option value="desc"
                                                                                {{ (isset($session_data->sort_type_2) ? $session_data->sort_type_2 : null == 'desc') ? 'selected' : '' }}>
                                                                                DESC</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-12 d-flex flex-sm-row flex-column mt-2 pl-0">
                                                                    <button type="submit"
                                                                        class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                                                        Search
                                                                    </button>
                                                                    <button type="reset" class="btn btn-outline-secondary">
                                                                        Reset
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <!-- users edit Info form ends -->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Information Tab ends -->

                                <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                                    <div class="modal-dialog">
                                        <form class="add-new-user modal-content pt-0" method="POST" id="add"
                                            action="{{ url('/membership/search') }}">
                                            @csrf
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">×
                                            </button>
                                            <div class="modal-header mb-1">
                                                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                                            </div>
                                            <div class="modal-body flex-grow-1">
                                                <div class="form-group">
                                                    <input type="text" hidden value="$user->id">
                                                    <label class="form-label" for="basic-icon-default-fullname">Full
                                                        Name</label>
                                                    <input type="text" class="form-control dt-full-name"
                                                        id="basic-icon-default-fullname" placeholder="John Doe" name="name"
                                                        aria-label="John Doe"
                                                        aria-describedby="basic-icon-default-fullname2" />
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="basic-icon-default-uname">Username</label>
                                                    <input type="text" id="basic-icon-default-uname"
                                                        class="form-control dt-uname" placeholder="Web Developer"
                                                        aria-label="jdoe1" aria-describedby="basic-icon-default-uname2"
                                                        name="username" />
                                                    <span class="text-danger error-text username_error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label"
                                                        for="basic-icon-default-email">Email</label>
                                                    <input type="text" id="basic-icon-default-email"
                                                        class="form-control dt-email" placeholder="john.doe@example.com"
                                                        aria-label="john.doe@example.com"
                                                        aria-describedby="basic-icon-default-email2" name="email" />
                                                    <span class="text-danger error-text email_error"></span>
                                                    <small class="form-text text-muted"> You can use letters, numbers &
                                                        periods
                                                    </small>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="role">User Role</label>
                                                    <select id="role" name="role" class="form-control">
                                                        <option value="subscriber">Subscriber</option>
                                                        <option value="editor">Editor</option>
                                                        <option value="maintainer">Maintainer</option>
                                                        <option value="author">Author</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                    <span class="text-danger error-text role_error"></span>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="plan">Select Plan</label>
                                                    <select id="plan" name="plan" class="form-control">
                                                        <option value="basic">Basic</option>
                                                        <option value="enterprise">Enterprise</option>
                                                        <option value="company">Company</option>
                                                        <option value="team">Team</option>
                                                    </select>
                                                    <span class="text-danger error-text plan_error"></span>
                                                </div>
                                                <button type="submit" class="btn btn-primary mr-1 data-submit">Submit
                                                </button>
                                                <button type="reset" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- BEGIN: Add jQuery-->
                                <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
                                <!-- END: Add jQuery-->

                                <!-- BEGIN: Add JS-->
                                <script src="/app-assets/js/profile.js"></script>
                                <script src="/app-assets/js/sweetalert.min.js"></script>
                                <!-- ENS: Add JS-->

                                <!-- Modal to add new user Ends-->
                            </div>
                        </div>
                    </div>
                    <!-- list section end -->
                </section>

                <!-- users list ends -->

            </div>
        </div>
    <!--  Add new organization Form start -->
    @include('modal.organization-create-form');
    <!-- Add new organization Form end -->
@endsection
@section('PageJS')
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="/app-assets/js/scripts/forms/form-ajax-remote-data.js"></script>
    <!-- END: Page JS-->

    <script>
        function formatText(icon) {
            return $(
                '<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-pull-request"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><line x1="6" y1="9" x2="6" y2="21"></line></svg> ' +
                icon.text + '  </span>');
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
