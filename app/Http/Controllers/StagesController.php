<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class StagesController extends Controller
{
    public function index()
    {
        $stages = Stage::all();
        return view('stages.index',compact('stages'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>'required|unique:stages,name',
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $stage = new Stage();
        $stage->name = $request['name'];
        $stage->slug = Str::slug($request['name']);
        $stage->user_id = $user_id;

        $stage->save();
        return redirect(route('stages.index'));

    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>'required|unique:genders,name,'.$id,
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $stage = Stage::findOrFail($id);
        $stage->name = $request['name'];
        $stage->slug = Str::slug($request['name']);
        $stage->user_id = $user_id;

        $stage->save();
        return redirect(route('stages.index'));
    }


    public function destroy(string $id)
    {
        $stage = Stage::findOrFail($id);
        $stage->delete();
        return redirect()->back();
    }
}
