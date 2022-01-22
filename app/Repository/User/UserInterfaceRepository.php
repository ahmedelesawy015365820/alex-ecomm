<?php

namespace App\Repository\User;

interface UserInterfaceRepository {

    public function index($request);

    public function create();

    public function store($request);

    public function edit($user);

    public function update($request, $user);

    public function destroy($user);

}
