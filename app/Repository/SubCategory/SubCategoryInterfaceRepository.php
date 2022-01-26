<?php

namespace App\Repository\SubCategory;

interface SubCategoryInterfaceRepository {

    public function index($request);

    public function store($request);

    public function update($request, $category);

    public function destroy($category);

    public function categryselect($id);

}