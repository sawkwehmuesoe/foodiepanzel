<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EnrollsController extends Controller
{
    public function index()
    {
        $enrolls = Enroll::orderBy("updated_at",'desc')->get();
        return view('enrolls.index',compact('enrolls'));
    }


    public function create()
    {
        $stage = Stage::whereIn('id',[3,4])->get();
        return view('enrolls.create',compact('statuses'));
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $user = Auth::user();
        $user_id = $user->id;

        $enroll = new Enroll();
        $enroll->post_id = $request['post_id'];
        $enroll->remark = $request['remark'];
        // $enroll->stage_id = $request['stage_id'];
        $enroll->user_id = $user_id;

        // Single Image Upload
        // if(file_exists($request['image'])){
        if ($request->hasFile('image')) {

            $file = $request['image'];
            $fname = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id).$enroll['id'].$fname;
            $file->move(public_path('assets/img/enrolls'),$imagenewname);
            // $file->move(public_path('enrolls/img'),$imagenewname);

            $filepath = 'assets/img/enrolls/'.$imagenewname;
            $enroll->image = $filepath;
        }

        $enroll->save();
        return redirect()->back();
    }


    public function show(string $id)
    {
        $enroll = Enroll::findOrFail($id);
        return view('enrolls.show',compact('role'));
    }


    public function edit(string $id)
    {

        $enroll = Enroll::findOrFail($id);
        $stages = Stage::whereIn('id',[1,2,3])->get();
        return view('enrolls.edit',compact('enroll','stages'));

    }


    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'=>['required','max:50','unique:enrolls,name,'.$id],
            'image'=>['nullable','image','mimes:jpg,jpeg,png','max:1024'],
            'stage_id'=>['required','in:1,2,3']
        ]);

        $user = Auth::user();
        $user_id = $user['id'];
        $enroll = Enroll::findOrFail($id);
        $enroll->name = $request['name'];
        $enroll->slug = Str::slug($request['name']);
        $enroll->stage_id = $request['stage_id'];
        $enroll->user_id = $user_id;


        // Remove Old Image
        if($request->hasFile('image')){
            $path = $enroll->image;

            if(File::exists($path)){
                File::delete($path);
            }
        }


        // Single Image Upload
        // if(file_exists($request['image'])){
        if ($request->hasFile('image')) {

            $file = $request['image'];
            $fname = $file->getClientOriginalName();
            $imagenewname = uniqid($user_id).$enroll['id'].$fname;
            $file->move(public_path('assets/img/enrolls'),$imagenewname);
            // $file->move(public_path('enrolls/img'),$imagenewname);

            $filepath = 'assets/img/enrolls/'.$imagenewname;
            $enroll->image = $filepath;
        }

        $enroll->save();

        return redirect(route('enrolls.index'));
    }


    public function destroy(string $id)
    {
        $enroll = Enroll::findOrFail($id);

        // Remove Old Image

        $path = $enroll->image;

        if(File::exists($path)){
            File::delete($path);
        }

        $enroll->delete();

        return redirect()->back();
    }
}
