<div class="modal fade text-left" id="inlineForm1" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Inline Login
                    Form</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/update-role/{{$roles->id}}" id="role-update" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{ method_field('PUT')}}

                <input type="hidden" name="id" id="id" value="{{$roles->id}}">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$roles->name}}">
                    <span class="text-danger error-text name_error"></span>
                </div>

                <div class="form-group">
                    <label>Guard Name</label>
                    <input type="text" name="guard_name" id="guard_name" class="form-control" value="{{$roles->guard_name}}" >
                    <span class="text-danger error-text guard_name_error"></span>
                </div>


                <button type="submit" name="submit" class="btn btn-primary btn-lg">Update Data</button>
            </form>
        </div>
    </div>
</div>
<script src="/app-assets/js/update-role.js"></script>
