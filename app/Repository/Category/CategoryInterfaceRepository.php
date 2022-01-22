<?php

namespace App\Repository\Category;

interface CategoryInterfaceRepository {

    public function index($request);

    public function store($request);

    public function update($request, $category);

    public function destroy($category);

}
