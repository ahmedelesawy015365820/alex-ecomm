<div class="modal fade" id="create-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-600" id="exampleModalLabel">Create Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Name_Ar:</label>
                            <input class="form-control name-ar" name="name_ar" required id="validationCustom01" type="text">
                        </div>
                    </div>
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Name_En:</label>
                            <input class="form-control name-en" name="name_en" required  id="validationCustom01" type="text">
                        </div>
                    </div>
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Slug_Ar:</label>
                            <input class="form-control slug-ar" name="slug_ar" required id="validationCustom01" type="text">
                        </div>
                    </div>
                    <div class="form">
                        <div class="form-group">
                            <label for="validationCustom01" class="mb-1">Slug_En:</label>
                            <input class="form-control slug-en" name="slug_en" required id="validationCustom01" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-primary col-md-7">
                            <input id="status" name="status" type="checkbox" value="1">
                            <label for="status">Status</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
