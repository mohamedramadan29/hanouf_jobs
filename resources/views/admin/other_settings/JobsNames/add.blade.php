<div class="modal" id="add_job_name_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> اضافة مسمي وظيفي   </h6>
                <button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"
                  action="{{url('admin/job/add')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">  المسميات الوظيفية <span class="badge badge-danger bg-danger"> افصل بين كل مسمي والاخر ب ( , ) </span>   </label>
                        <textarea required name="titles" id=""  class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for=""> حدد التصنيف  </label>
                        <select name="cat_id" id="" class="form-control">
                            <option value="" selected disabled> -- حدد -- </option>
                            @foreach($JobCategories as $category)
                                <option value="{{$category['id']}}"> {{$category['name']}} </option>
                            @endforeach
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
