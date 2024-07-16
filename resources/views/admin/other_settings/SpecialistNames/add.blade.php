<div class="modal" id="add_job_name_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> اضافة تخصص   </h6>
                <button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"
                  action="{{url('admin/special/add')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for=""> اسم التخصص  </label>
                        <input class="form-control" name="title" type="text"
                               value="">
                    </div>

                    <div class="form-group">
                        <label for=""> الحالة </label>
                        <select name="status" id="" class="form-control">
                            <option value=""> -- حدد -- </option>
                            <option value="1"> فعال </option>
                            <option value="0">غير فعال   </option>
                        </select>
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
