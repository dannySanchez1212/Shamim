<?php

namespace App\Http\Controllers;

use View;
use Session;
use Redirect;

use App\UserOwner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use RealRashid\SweetAlert\Facades\Alert;

class UserOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersO = UserOwner::all();
        return View::make('userO.index', compact('usersO'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userO = new UserOwner();
        $companys = DB::table('owners')->pluck('company');
        $roles = DB::table('roles')->pluck('value');
        $locations = DB::table('locations')->pluck('name');
        

        return View::make('userO.save',compact('userO','companys','locations','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner_id = DB::table('owners')->whereCompany($request['owner_id'])->value('id');
        $role_id = DB::table('roles')->whereValue($request['role_id'])->value('id');
        $location_id = DB::table('locations')->whereName($request['location_id']) ->value('id');

        UserOwner::create([
            'owner_id'=>$owner_id, 
            'name'=>$request['name'],
            'role_id'=>$role_id,  
            'phone'=>$request['phone'],
            'localtion_id'=>$location_id,
            'email'=>$request['email'],
            'password'=>$request['password'],
            'is_active'=>$request['is_active'],
            'is_locked'=>$request['is_locked'],
            'locked_duration'=>$request['locked_duration'], 
        ]);

        Alert::success('Success', 'User Owner created correctly');
        return redirect::to('userO/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userO = UserOwner::find($id);
        $companys = DB::table('owners')->pluck('company');
        $roles = DB::table('roles')->pluck('value');
        $locations = DB::table('locations')->pluck('name');

        $owner_id = $userO->owner_id;
        $company_name = DB::table('owners')->whereId($owner_id)->value('company');

        $role_id = $userO->role_id;
        $role_name = DB::table('roles')->whereId($role_id)->value('value');

        $location_id = $userO->location_id;
        $location_name = DB::table('locations')->whereId($location_id)->value('name');

        return View::make('userO.edit', compact('userO','companys','roles','locations','company_name','role_name','location_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $owner_id = DB::table('owners')->whereCompany($request['owner_id'])->value('id');
        $role_id = DB::table('roles')->whereValue($request['role_id'])->value('id');
        $location_id = DB::table('locations')->whereName($request['location_id'])->value('id');

        $userO = UserOwner::find($id);
        $userO->fill([
            'owner_id'=>$owner_id, 
            'name'=>$request['name'],
            'role_id'=>$role_id,  
            'phone'=>$request['phone'],
            'localtion_id'=>$location_id,
            'email'=>$request['email'],
            'password'=>$request['password'],
            'is_active'=>$request['is_active'],
            'is_locked'=>$request['is_locked'],
            'locked_duration'=>$request['locked_duration'], 
        ]); 
        $userO->save();

        Alert::success('Success', 'User Owner updated correctly');
        return redirect::to('userO/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Alert::warning('Are you sure?', 'User Owner Successfully Removed')
        ->footer('<a href> is sure to delete ? </a>')
        ->showConfirmButton('Yes, Delete it!','#3085d6')
        ->showCancelButton('No, Keep it !','#aaa')
        ->showCloseButton(); 
       // $userO = UserOwner::find($id);
        //$userO->delete();

        //Alert::success('Success', ' successfully removed');        
        //Session::flash('message','User Owner successfully removed');
        return redirect::to('userO/index');
    }
}
