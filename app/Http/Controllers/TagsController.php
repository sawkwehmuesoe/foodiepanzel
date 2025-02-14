<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $statuses = Status::whereIn("id",[1,2])->get();
        // $statuses = Status::all()
        return view('tags.index',compact('tags','statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "name"=>'required|unique:tags,name',
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $tag = new Tag();
        $tag->name = $request['name'];
        $tag->slug = Str::slug($request['name']);
        $tag->status_id = $request['status_id'];
        $tag->user_id = $user_id;

        $tag->save();
        return redirect(route('tags.index'));

    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            "name"=>'required|unique:genders,name,'.$id,
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $tag = Tag::findOrFail($id);
        $tag->name = $request['name'];
        $tag->slug = Str::slug($request['name']);
        $tag->status_id = $request['status_id'];
        $tag->user_id = $user_id;

        $tag->save();
        return redirect(route('tags.index'));
    }


    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back();
    }
}
