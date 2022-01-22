<form class="form-inline" action="{{ route('category.index') }}" method="GET">
    <div class="form-group mb-2">
      <input type="text"
        name="search"
        class="form-control form-control"
        value="{{ request()->search }}"
        placeholder="search"
      >
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <select name="status" class="form-control form-control">
            <option value="">-Status-</option>
            <option value="1" {{request()->status == 1 ? 'selected' : ''}}>Active</option>
            <option value="0" {{request()->status == 0 ? 'selected' : ''}}>Inactive</option>
        </select>
      </div>
    <button type="submit" class="btn btn-sm btn-primary mb-2">search</button>
</form>
