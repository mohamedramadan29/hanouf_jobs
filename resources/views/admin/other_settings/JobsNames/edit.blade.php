<div class="modal" id="edit_model_{{$job['id']}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> تعديل المسمي الوظيفي   </h6>
                <button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"
                  action="{{url('admin/job/update/'.$job['id'])}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for=""> المسمي الوظيفي   </label>
                        <input class="form-control" name="title" type="text"
                               value="{{$job['title']}}">
                    </div>

                    <div class="form-group">
                        <label for=""> الحالة </label>
                        <select name="status" id="" class="form-control">
                            <option value=""> -- حدد -- </option>
                            <option @if($job['status'] == 1) selected @endif value="1"> فعال </option>
                            <option @if($job['status'] == 0) selected @endif value="0">غير فعال   </option>
                        </select>
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
