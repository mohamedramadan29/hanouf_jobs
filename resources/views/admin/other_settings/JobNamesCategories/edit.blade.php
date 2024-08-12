<div class="modal" id="edit_model_{{$category['id']}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> تعديل  التصنيف </h6>
                <button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"
                  action="{{url('admin/jobcategory/update/'.$category['id'])}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">  اسم التصنيف   </label>
                        <input class="form-control" name="name" type="text"
                               value="{{$category['name']}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit"> تعديل
                    </button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                            type="button">رجوع
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
