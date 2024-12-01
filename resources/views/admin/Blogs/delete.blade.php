<div class="modal fade" id="delete_message_{{ $blog['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> هل انت متاكذ من حذف المقال </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('admin/blog/delete/' . $blog['id']) }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for=""> العنوان </label>
                    <input type="text" name="name" class="form-control" disabled readonly
                        value="{{ $blog['name'] }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> رجوع</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
