<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class StagesController extends Controller
{
    public function index()
    {
        $stages = Stage::all();
        $statuses = Status::whereIn('id',[3,4])->get();
        return view('stages.index',compact('stages','statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>'required|unique:stages,name',
            "status_id"=>'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $stage = new Stage();
        $stage->name = $request['name'];
        $stage->slug = Str::slug($request['name']);
        $stage->status_id = $request['status_id'];
        $stage->user_id = $user_id;

        $stage->save();
        return redirect(route('stages.index'));

    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>'required|unique:genders,name,'.$id,
            "status_id"=>'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $stage = Stage::findOrFail($id);
        $stage->name = $request['name'];
        $stage->slug = Str::slug($request['name']);
        $stage->status_id = $request['status_id'];
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
