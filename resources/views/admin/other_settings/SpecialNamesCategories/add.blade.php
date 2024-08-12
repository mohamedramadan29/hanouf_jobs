<div class="modal" id="add_job_name_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">  اضافة تصنيف جديد   </h6>
                <button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"
                  action="{{url('admin/specialcategory/add')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">  الاسم   </label>
                        <input class="form-control" name="name" type="text"
                               value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">  اضافة
                    </button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                            type="button">رجوع
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
