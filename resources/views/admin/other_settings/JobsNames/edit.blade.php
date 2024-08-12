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
                        <label for=""> حدد التصنيف  </label>
                        <select name="cat_id" id="" class="form-control">
                            <option value="" selected disabled> -- حدد -- </option>
                            @foreach($JobCategories as $category)
                                <option @if($job['cat_id'] == $category['id']) selected @endif value="{{$category['id']}}"> {{$category['name']}} </option>
                            @endforeach
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
