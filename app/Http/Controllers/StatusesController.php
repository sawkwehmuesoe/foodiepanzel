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


    public function create()
    {
        return view('statuses.create');
    }

    public function store(StatusCreateRequest $request)
    {
        // $this->validate($request,[
        //     'name'=>'required|unique:statuses,name',
        // ]);

        $user = Auth::user();
        $status = new Status();
        $status->name = $request['firstname'];
        $status->slug = Str::slug($request['name']);
        $status->user_id = $user->id;

        $status->save();
        return redirect(route('statuses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
