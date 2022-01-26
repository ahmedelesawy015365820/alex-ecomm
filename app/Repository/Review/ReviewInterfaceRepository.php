<?php

namespace App\Repository\Review;

interface ReviewInterfaceRepository {

    public function index();

    public function show($review);

    public function edit($review);

    public function update($request, $review);

    public function destroy($request);

}