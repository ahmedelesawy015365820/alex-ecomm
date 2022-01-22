<?php

namespace App\Repository\User;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserInterfaceRepository {

    public function index($request)
    {

        $data = User::whereAuth(1)->when($request->search,function ($q) use ($request){

            return $q->where('id','!=','1')
                    ->where('first_name','like',"%". $request->search ."%")
                    ->orWhere('last_name','like',"%". $request->search ."%")
                    ->orWhere('username','like',"%". $request->search ."%");

        })->orderBy('id','DESC')->paginate(5);

        return view('dashboard.users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);

    }//*****end index

    public function create(){

        $roles = DB::table('roles')->where('name','!=','SuperAdmin')->get();

        return view('dashboard.users.create',compact('roles'));

    }//*****end create

    public function store($request)
    {

        try{
            DB::beginTransaction();
            $input = $request->all();
            $input['auth'] = 1;
            $user = User::create($input);
            $user->assignRole($request->input('roles_name'));
            toastr()->success('Successfully added');

            DB::commit();
            return redirect()->route('users.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('users.index');
        }

    }//*****end store

    public function edit($user)
    {

        $user = User::find($user->id);

        $roles = DB::table('roles')->where('name','!=','SuperAdmin')->get();

        $userRole = $user->roles->pluck('name','name')->all();

        return view('dashboard.users.edit',compact('user','roles','userRole'));

    }//*****end edit

    public function update($request, $user)
    {
        try{
            DB::beginTransaction();
            $user->update($request->validated());
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            $user->assignRole($request->input('roles_name'));
            toastr()->success('Edited successfully');

            DB::commit();
            return redirect()->route('users.index');

        }
        catch(\Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('roles.index');
        }

    }//*****end update

    public function destroy($user)
    {
        try{

            DB::beginTransaction();

            if($user->image != '')
                Storage::disk('profile')->delete($user->username.'/'. $user->image );

            $user->delete();

            toastr()->success('Deleted successfully');
            DB::commit();
            return redirect()->route('users.index');

        }
        catch( \Exception $ex){

            toastr()->error($ex);
            DB::rollBack();
            return redirect()->route('users.index');
        }
    }//*****end destroy


}