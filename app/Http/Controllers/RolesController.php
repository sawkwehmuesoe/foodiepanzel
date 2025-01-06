<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('roles.index',compact('roles'));
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:statuses,name',
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $role = new Role();
        $role->name = $request['name'];
        $role->slug = Str::slug($request['name']);
        $role->user_id = $user_id;

        $role->save();
        return redirect(route('statuses.index'));
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>'required|unique:statuses,name,'.$id
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $role = Role::findOrFail($id);
        $role->name = $request['name'];
        $role->slug = Str::slug($request['name']);
        $role->user_id = $user_id;

        $role->save();
        return redirect(route('statuses.index'));
    }


    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back();
    }
}
