<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TypesController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $statuses = Status::whereIn("id",[3,4])->get();
        // $statuses = Status::all()
        return view('types.index',compact('types','statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>'required|unique:types,name',
            "status_id"=>'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $type = new Type();
        $type->name = $request['name'];
        $type->slug = Str::slug($request['name']);
        $type->status_id = $request['status_id'];
        $type->user_id = $user_id;

        $type->save();
        return redirect(route('types.index'));

    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>'required|unique:types,name,'.$id,
            "status_id"=>'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $type = Type::findOrFail($id);
        $type->name = $request['name'];
        $type->slug = Str::slug($request['name']);
        $type->status_id = $request['status_id'];
        $type->user_id = $user_id;

        $type->save();
        return redirect(route('types.index'));
    }


    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->back();
    }
}
