<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StatusCreateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StatusesController extends Controller
{

    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index',compact('statuses'));
    }

    public function store(Request $request) //StatusCreateRequest
    {
        $this->validate($request,[
            'name'=>'required|unique:statuses,name',
            "status_id"=>'required|in:3,4'
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $status = new Status();
        $status->name = $request['name'];
        $status->slug = Str::slug($request['name']);
        $status->user_id = $user_id;

        $status->save();
        return redirect(route('statuses.index'));
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required|unique:statuses,name,'.$id
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $status = Status::findOrFail($id);
        $status->name = $request['name'];
        $status->slug = Str::slug($request['name']);
        $status->user_id = $user_id;

        $status->save();
        return redirect(route('statuses.index'));
    }


    public function destroy(string $id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return redirect()->back();
    }
}
