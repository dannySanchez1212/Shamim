<?php
////import Swal from 'sweetalert2';
namespace App\Http\Controllers;

use View;
use Redirect;
use Session;

use App\Package;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use RealRashid\SweetAlert\Facades\Alert;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        return View::make('package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $package = new Package();
        $companys = DB::table('owners')->pluck('company');           

        return View::make('package.save',compact('package','companys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_id = DB::table('owners')->whereCompany($request['owner_id'])->value('id');
        Package::create([
            'owner_id'=>$company_id, 
            'name'=>$request['name'],
            'user_group'=>$request['user_group'], 
        ]);
        Alert::success('Success', 'Package created correctly');
        return redirect::to('package/index');
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
        $package = Package::find($id);
        $companys = DB::table('owners')->pluck('company');
        
        $owner_id = $package->owner_id;
        $company_name = DB::table('owners')->whereId($owner_id)->value('company');

        return View::make('package.edit',compact('package','companys','company_name'));
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
        $company_id = DB::table('owners')->whereCompany($request['owner_id'])->value('id');

        $package = Package::find($id);
        $package->fill([
            'owner_id'=>$company_id, 
            'name'=>$request['name'],
            'user_group'=>$request['user_group'],
        ]); 
        $package->save();

        Alert::success('Success', 'Package updated correctly');
        return redirect::to('package/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      // dd($request);
               if($request->ajax()){
                $id=$request->post('id');
              // $id=$request->get('id');

                 if($id=='null'){
                    Alert::warning('Warning', 'Error Package Data');
                    return redirect::to('package/index');
                 }else{

                       $_token=$request->get('_token');
                      
                        //dd($id);
                       // $token=$request->get('_token');
                        //dd($id);
                        $valor=Package::find($id)->delete();
                        //dd($package);
                        //=$package->delete();
                        //dd($valor);
                        
                        Alert::success('Success', 'Package Delete correctly')->autoClose(1800);
                        return redirect()->route('package.index');
                        }

                 }

    }



    /* public function destroyP($id) 
    {
      // dd($request);
               //if($request->ajax()){
               // $id=$request->post('id');
                $valor=Package::find($id)->delete();
              // $id=$request->get('id');

                 if($valor=='null'){
                    Alert::success('Success', 'Package Delete correctly')->autoClose(1800);
                    return redirect()->route('package.index');
                 }else{
                        Alert::success('Success', 'Package Delete correctly')->autoClose(1800);
                        return redirect()->route('package.index');
                        }

                // }

    }*/
}
