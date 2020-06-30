<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use Session;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view("city.index")->with("cities",$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view("city.create")->with("countries",$countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
       /* $request->validate([
            'name' => 'required',
            'latlng' => 'required',
            'country_id' => 'required',
            

        ]);*/

    /*    City::insert([
            'name' => $request->name,
            'latlng' =>  $request->latlng,
            'country_id' =>  $request->country_id,
            'active' => $request->active??0
        ]);*/
        if(!$request->active ){
            $request['active']=0;
        }
        City::create($request->all());

        session()->flash("msg", "s: City Created Successfully");
        return redirect(route("cities.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        if(!$city){
            session()->flash("msg", "e: City was not found");
            return redirect(route("cities.index"));
        }
        $countries = country::all();
        return view("city.show")->withCity($city)->withCountries($countries);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        if(!$city){
            session()->flash("msg", "e: City was not found");
            return redirect(route("cities.index"));
        }
        $countries = Country::all();
        return view("city.edit")->withCity($city)->withCountries($countries);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        
     /*   $request->validate([
            'name' => 'required',
            'latlng' => 'required',
            'country_id' => 'required',
            

        ]);*/

        /*
        City::where('id', $id)->update([
            'name' => $request->name,
            'latlng' =>  $request->latlng,
            'country_id' =>  $request->country_id,
            'active' => $request->active??0
        ]);*/

        if(!$request->active ){
            $request['active']=0;
        }
        $city=City::find($id);
        $city->update($request->all());

        session()->flash("msg", "i: City Updated Successfully");
        return redirect(route("cities.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::destroy($id);
        session()->flash("msg", "w: City Deleted Successfully");
        return redirect(route("cities.index"));
    }
}
