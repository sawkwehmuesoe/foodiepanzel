<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index',compact('cities'));
    }

    public function store(Request $request) //StatusCreateRequest
    {
        $this->validate($request,[
            'name'=>'required|unique:cities,name',
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $city = new City();
        $city->name = $request['name'];
        $city->slug = Str::slug($request['name']);
        $city->user_id = $user_id;

        $city->save();
        return redirect(route('cities.index'));
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required|unique:cities,name,'.$id
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $city = City::findOrFail($id);
        $city->name = $request['name'];
        $city->slug = Str::slug($request['name']);
        $city->user_id = $user_id;

        $city->save();
        return redirect(route('cities.index'));
    }


    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->back();
    }
}
