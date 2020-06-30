<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Requests\CountryRequest; 

class CountryController extends Controller
{
    public function index(){
        $country= Country::get();
      
        return view("country.index")->with("country",$country);
    }
    public function create(){
        return view("country.create");
    }
    
    public function postCreate(CountryRequest $request){
       

     /*   $request->validate([
            'name' => 'required',
            'ISO2' => ['required','max:2'],
            'code' => 'required',
            'area' => 'required',
            'population' => 'required'
        ]);

      */
        /*Country::insert([
            'name' => $request->name,
            'ISO2' => $request->ISO2,
            'code' => $request->code,
            'area' => $request->area,
            'population' => $request->population
        ]);*/
        
        Country::create($request->all());

     \Session::flash("msg","s:Country Added successfuly");
        
        return redirect(asset('/country'));
    }
    public function delete($id){
        Country::where('id',$id)->delete();
        \Session::flash("msg","w:Country Deleted successfuly");
        return redirect(asset('/country'));

    }

    public function edit($id){
        $country = Country::find($id);
        return view("country.edit")->withCountry($country); 

    }
    public function postEdit(CountryRequest $request ,$id){
      /*  $request = request();
        $request->validate([
            'name' => 'required',
            'ISO2' => ['required','max:2'],
            'code' => 'required',
            'area' => 'required',
            'population' => 'required'
        ]);
*/
    
        Country::where('id', $id)->update([
            'name' => $request->name,
            'ISO2' => $request->ISO2,
            'code' => $request->code,
            'area' => $request->area,
            'population' => $request->population
        ]);

        \Session::flash("msg", "s:Country Updated successfully");
        return redirect(route('country'));
    }    



}
