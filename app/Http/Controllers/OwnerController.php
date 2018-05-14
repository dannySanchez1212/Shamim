<?php

namespace App\Http\Controllers;

use View;
use Redirect;
use Session;

use App\Owner;
use App\Http\Requests\OwnerUpdateRequest;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

class OwnerController extends Controller
{

 /////// prueba de las estados no eliminar mientras hay produccion de paginas
    public function PRUEBA($value){
       /* $countries = new Countries();
        $data = $countries->where('name.common',$value)
                    ->first()
                    ->hydrateStates()
                    ->states
                    ->sortBy('name')
                    ->pluck('name','postal');

     dd($data);*/

     // dd($value);
        $countries=Countries::all();
        $data=$countries->where('type.state',$value)
        ->first()
        ->hydrate('cities');
       // $data=$data->toarray();
        dd($data);
        $dato=$countries->where('cca3',$data[0])
        ->first()
        ->hydrate('cities')->cities->sortBy('name');
        dd($dato);
    }

   ///// 

   public function Estados(Request $request){

       
    $Select = $request->get('select');
    $value = $request->get('value');
    $dependent = $request->get('dependent');
    $countries = new Countries();


                if ($dependent=='state') {
                    $data = $countries->where('name.common',$value)
                    ->first()
                    ->hydrateStates()
                    ->states
                    ->sortBy('name')
                    ->pluck('name','postal');

                        $output = '<option value="">Select  '.ucfirst($dependent).'</option>';

                        foreach ($data as $key ) {

                            $output .= '<option value="'.$key.'">'.$key.'</option>';
                        }

                }


                if($dependent=='city'){
                    $Countrie = $request->get('Country');
                    $data = Countries::all();
                    $data = $countries->where('name.common',$Countrie)->pluck('cca3');

                    $dato = $countries->where('cca3',$data[0])
                    ->first()
                    ->hydrate('cities')
                    ->cities
                    ->pluck('name');


                        $output = '<option value="">Select'.ucfirst($dependent).'</option>';

                        foreach ($dato as $key ) {
                            if($key->adm1name==$value)
                            $output.= '<option value="'.$key->name.'">'.$key->name.'</option>';
                        }

                }

            echo $output;

   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::all();
        return View::make('owner.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owner = new Owner();
        $countries = new Countries();
        $Countrys = $countries->all()->pluck('name.common');
        return View::make('owner.save', compact('owner','Countrys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
        Owner::create([
            'company' => $request['company'],
            'company_logo' => $request['file']->store('public/logos'),
            'email' => $request['email'],
            'phone' => $request['phone'], 
            'address_line1' => $request['address_line1'], 
            'address_line2' => $request['address_line2'], 
            'city' => $request['city'], 
            'state' => $request['state'], 
            'country' => $request['country'], 
            'zip'=> $request['zip'],
        ]);
        Alert::success('Success', 'Owner created correctly');
        return redirect::to('owner/index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $countries = new Countries();

         $Countrys = $countries->all()->pluck('name.common');
         $owner = Owner::find($id);
        return View::make('owner.show',compact('owner', 'Countrys'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $owner = Owner::find($id);
        $countries = new Countries();
        $Countrys = $countries->all()->pluck('name.common');

        $company_logo = $owner->company_logo;
        $array_logo = explode("/", $company_logo); 
        $logo = $array_logo[2];

        return View::make('owner.edit',compact('owner','logo','Countrys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
      @return \Illuminate\Http\Response
     */
    public function update(OwnerUpdateRequest $request, $id)
    {
        $owner = Owner::find($id);
        $logo_New = $request['company_logoN'];

        if(is_null($logo_New))
            {
            $owner->fill([
            'company' => $request['company'],
            'email' => $request['email'],
            'phone' => $request['phone'], 
            'address_line1' => $request['address_line1'], 
            'address_line2' => $request['address_line2'], 
            'city' => $request['city'], 
            'state' => $request['state'], 
            'country' => $request['country'], 
            'zip'=> $request['zip'],
        ]);
            }
        else
            {
            $owner->fill([
            'company' => $request['company'],
            'company_logo' => $logo_New->store('public/logos'),
            'email' => $request['email'],
            'phone' => $request['phone'], 
            'address_line1' => $request['address_line1'], 
            'address_line2' => $request['address_line2'], 
            'city' => $request['city'], 
            'state' => $request['state'], 
            'country' => $request['country'], 
            'zip'=> $request['zip'],
        ]);
            }
        $owner->save();

        Alert::success('Success', 'Owner updated correctly');
        return redirect::to('owner/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
           
        if($request->ajax()){
                $id=$request->post('id');
              // $id=$request->get('id');

                 if($id=='null'){
                    Alert::warning('Warning', 'Error Owner Data');
                    return redirect::to('owner/index');
                 }else{

                       $_token=$request->get('_token');
                      
                        //dd($id);
                       // $token=$request->get('_token');
                        //dd($id);
                        $valor=Owner::find($id)->delete();
                        //dd($package);
                        //=$package->delete();
                        //dd($valor);
                        
                        Alert::success('Success', 'Owner Delete correctly')->autoClose(1800);
                        return redirect()->route('indexO');
                        }

                 }


           /* $Select = $request->get('id');
            dd($Select);
        Alert::warning('Are you sure?', 'Owner Successfully Removed')
        ->footer('<a href> is sure to delete ? </a>')
        ->showConfirmButton('Yes, Delete it!','#3085d6')
        ->showCancelButton('No, Keep it !','#aaa')
        ->showCloseButton(); 
        //Alert::warning('Warning', 'Owner successfully removed');
        //$owner = Owner::find($id);
        //$owner->delete();

        //Alert::success('Success', 'Owner successfully removed');
        return redirect::to('owner/index');   */   
    }

    /**
    * guarda un archivo en nuestro directorio local.
    *
    * @return Response
    */
   
}
