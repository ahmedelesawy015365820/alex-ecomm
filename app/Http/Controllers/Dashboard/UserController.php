<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Repository\User\UserInterfaceRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    function __construct(UserInterfaceRepository $user){

        $this->user = $user;

        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

    }


    public function index(Request $request)
    {
        return $this->user->index($request);
    }

    public function create()
    {
        return $this->user->create();
    }

    public function store(UserRequest $request)
    {
        return $this->user->store($request);
    }

    public function edit(User $user)
    {
        return $this->user->edit($user);
    }

    public function update(UserRequest $request, User $user)
    {
        return $this->user->update($request,$user);
    }

    public function destroy(User $user)
    {
        return $this->user->destroy($user);
    }
}