<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use App\Repository\Role\RoleInterfaceRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    protected $role;


    function __construct(RoleInterfaceRepository $role){

        $this->role = $role;

        $this->middleware('permission:Permission-list', ['only' => ['index']]);
        $this->middleware('permission:Permission-show', ['only' => ['show']]);
        $this->middleware('permission:Permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:Permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:Permission-delete', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        return $this->role->index($request);
    }

    public function create()
    {
        return $this->role->create();
    }

    public function store(RoleRequest $request)
    {
        return $this->role->store($request);
    }

    public function show($id)
    {
        return $this->role->show($id);
    }

    public function edit($id)
    {

        return $this->role->edit($id);
    }

    public function update(RoleRequest $request, Role $role)
    {
        return $this->role->update($request, $role);
    }

    public function destroy(Request $request)
    {
        return $this->role->destroy($request);
    }
}