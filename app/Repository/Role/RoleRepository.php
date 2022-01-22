<?php

namespace App\Repository\Role;

use App\Repository\Role\RoleInterfaceRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleRepository implements RoleInterfaceRepository {

    public function index($request){

        $roles = Role::paginate(5);
        return view('dashboard.roles.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);

    }// ******* end index

    public function create(){

        $permission = Permission::get();
        return view('dashboard.roles.create',compact('permission'));

    }// ******* end create

    public function store($request){

        try{
            DB::beginTransaction();
            $role = Role::create(['name' => $request->input('name')]);
            $role->syncPermissions($request->input('permission'));
            toastr()->success('Successfully added');

            DB::commit();
            return redirect()->route('roles.index');
        }
        catch( Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('roles.index');
        }

    }// ******* end store

    public function show($id){

        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$id)->get();
        return view('dashboard.roles.show',compact('role','rolePermissions'));

    }// ******* end show

    public function edit($id){

        $role = Role::find($id);
        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")
        ->where("role_has_permissions.role_id",$id)->
        pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();

        return view('dashboard.roles.edit',compact('role','permission','rolePermissions'));

    }// ******* end edit

    public function update($request, $role){

        try{
            DB::beginTransaction();
            $role = Role::find($role->id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            toastr()->success('Edited successfully');

            DB::commit();
            return redirect()->route('roles.index');
        }
        catch( Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('roles.index');
        }

    }// ******* end update

    public function destroy($request){

        try{

            DB::beginTransaction();
            DB::table("roles")->where('id', $request->role_id)->delete();

            toastr()->success('Deleted successfully');
            DB::commit();
            return redirect()->route('roles.index');

        }
        catch( Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('roles.index');
        }

    }// ******* end destroy
}