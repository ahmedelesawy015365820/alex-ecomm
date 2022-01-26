<div class="modal fade" id="create-new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title f-w-600" id="exampleModalLabel">Create SubCategory</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subCategory.store') }}" method="post">
                    @csrf
                    <div class="d-flex flex-wrap">
                        <div class="col-6 form-group">
                            <label for="validationCustom01" class="mb-1">Name_Ar:</label>
                            <input class="form-control name-ar" name="name_ar" required id="validationCustom01" type="text">
                        </div>
                        <div class="col-6 form-group">
                            <label for="validationCustom01" class="mb-1">Name_En:</label>
                            <input class="form-control name-en" name="name_en" required  id="validationCustom01" type="text">
                        </div>
                        <div class="col-6 form-group">
                            <label for="validationCustom01" class="mb-1">Slug_Ar:</label>
                            <input class="form-control slug-ar" name="slug_ar" required id="validationCustom01" type="text">
                        </div>
                        <div class="col-6 form-group">
                            <label for="validationCustom01" class="mb-1">Slug_En:</label>
                            <input class="form-control slug-en" name="slug_en" required id="validationCustom01" type="text">
                        </div>
                        <div class="col-6" style="margin-bottom: 20px">
                            <label for="validationCustom01" class="mb-1">Category:</label>
                            <select class="custom-select" name="category_id" id="validationCustom01">
                            <option selected value="">Choose...</option>
                            @foreach ($selectCategory as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-6 selectsubcategory  subcategory_id">
                            <label for="validationCustom02" class="mb-1">SubCategory:</label>
                            <select class="custom-select" name="subcategory_id" id="inputGroupSelect02">
                            <option selected value="">Choose...</option>
                            </select>
                        </div>
                        <div class="col-6 selectchild  child_id">
                            <label for="validationCustom03" class="mb-1">Child:</label>
                            <select class="custom-select" name="child_id" id="inputGroupSelect01">
                            <option selected value="">Choose...</option>
                            </select>
                        </div>
                        <div class="col-6 selectsubchild subchild_id">
                            <label for="validationCustom01" class="mb-1">SubChild:</label>
                            <select class="custom-select" name="subchild_id" id="inputGroupSelect03">
                            <option selected value="">Choose...</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="checkbox checkbox-primary col-md-7">
                                <input id="status" name="status" type="checkbox" value="1">
                                <label for="status">Status</label>
                            </div>
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
