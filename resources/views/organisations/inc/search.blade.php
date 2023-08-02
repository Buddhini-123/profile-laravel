<form class="form-validate" id="" method="post" action="/user/list">
    <div class="row mt-1">

        @csrf

        <div class="col-lg-4 col-md-6">
            <div class="form-group">

                <label for="basic-icon-default">Search</label>
                <input id="query" name="query" class="form-control dt" type="text"
                    value="{{ request()->session()->exists('search.organization.query')
                        ? request()->session()->get('search.organization.query')
                        : '' }}">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <label class="form-label" for="country">Country</label>
            <select name="country" class="select-2  form-control" id="country">
                <option data-icon="globe" value="">
                    Select
                </option>

                @foreach (Helper::getList('profile_country') as $profile_country)


                    <option data-icon="globe" value="{{ $profile_country->code_ISO }}"
                        {{ request()->session()->get('search.organization.country') == $profile_country->code_ISO
                            ? 'selected'
                            : '' }}>

                        {{ $profile_country->label_eng }}
                    </option>
                @endforeach

            </select>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <label class="form-label" for="type">Organization</label>
                <select class="select2-data-ajax form-control   " id="institution" name="institution">
                    <option
                        value="{{ request()->session()->exists('search.organization.institution')
                            ? request()->session()->get('search.organization.institution')
                            : '' }}"
                        selected="selected">
                        {{ request()->session()->exists('search.organization.institution')
                            ? request()->session()->get('search.organization.account_name')
                            : '' }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="form-group">
                <label class="form-label" for="type">Order By</label>
                <select id="order_by" name="order_by" class="form-control">
                    <option value="ASC"
                        {{ request()->session()->get('search.organization.order_by') == 'ASC'
                            ? 'selected'
                            : '' }}>
                        ASC
                    </option>
                    <option value="DESC"
                        {{ request()->session()->get('search.organization.order_by') == 'DESC'
                            ? 'selected'
                            : '' }}>
                        DESC
                    </option>

                </select>
            </div>
        </div>


        <div class="col-lg-12 col-md-6 pt-0 pb-1 pr-0 text-right ">
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                Search
            </button>
            <button type="reset" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                Reset
            </button>
        </div>
    </div>
</form>
