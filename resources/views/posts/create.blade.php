@extends('layouts.adminindex')
@section('caption','Create Post')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                        </div>

                        <form action="/posts" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('POST')

                            <div class="row">

                                <div class="col-md-4">

                                    <div class="row">
                                        <div class="col-md-12 mb-3 form-group mb-3">
                                            <label for="image" id="image-label">
                                                <div class="gallery"><span>Choose Image</span></div>
                                            </label>
                                            <input type="file" id="image" name="image" class="form-control" autocomplete="off" value="{{old('image')}}" hidden >
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="startdate" class="text-muted fw-bold mb-2">Start Date <span class="text-danger">*</span></label>
                                            <input type="date" id="startdate" name="startdate" class="form-control" value="{{old('startdate')}}" >
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="enddate" class="text-muted fw-bold mb-2">End Date <span class="text-danger">*</span></label>
                                            <input type="date" id="enddate" name="enddate" class="form-control" value="{{old('enddate')}}" >
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="starttime" class="text-muted fw-bold mb-2">Start Time <span class="text-danger">*</span></label>
                                            <input type="time" id="starttime" name="starttime" class="form-control" value="{{old('starttime')}}" >
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="endtime" class="text-muted fw-bold mb-2">End Time <span class="text-danger">*</span></label>
                                            <input type="time" id="endtime" name="endtime" class="form-control" value="{{old('endtime')}}" >
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <div class="row">

                                        {{-- ----------- --}}

                                        <div class="col-md-12 mb-3">
                                            <label for="title" class="text-muted fw-bold mb-2">Title <span class="text-danger">*</span></label>
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter Post Title" value="{{old('title')}}" >
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label for="type_id" class="text-muted fw-bold mb-2">Type <span class="text-danger">*</span></label>
                                            <select name="type_id" id="type_id" class="form-control form-control-sm rounded-0" >

                                                @foreach ($types as $type)
                                                    <option value={{$type->id}}>{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="fee" class="text-muted fw-bold mb-2">Fee <span class="text-danger">*</span></label>
                                            <input type="number" id="fee" name="fee" class="form-control" placeholder="Enter Class Fee" value="{{old('title')}}" >
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="content" class="text-muted fw-bold mb-2">Content <span class="text-danger">*</span></label>
                                            <textarea name="content" id="content" class="form-control form-control-sm" rows="5" placeholder="Say Something..." >{{old('content')}}</textarea>
                                        </div>

                                        <div class="col-md-3 mb-4">
                                            <label for="tag_id" class="text-muted fw-bold mb-2">Tag <span class="text-danger">*</span></label>
                                            <select name="tag_id" id="tag_id" class="form-control form-control-sm rounded-0" >

                                                @foreach ($tags as $tag)
                                                    <option value={{$tag->id}}>{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-4">
                                            <label for="attshow" class="text-muted fw-bold mb-2">Show on Att Show <span class="text-danger">*</span></label>
                                            <select name="attshow" id="attshow" class="form-control form-control-sm rounded-0" >

                                                @foreach ($attshows as $attshow)
                                                    <option value={{$attshow->id}}>{{$attshow->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3 mb-4">
                                            <label for="status_id" class="text-muted fw-bold mb-2">Status <span class="text-danger">*</span></label>
                                            <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0" >

                                                @foreach ($statuses as $status)
                                                    <option value={{$status->id}}>{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class=" col-md-3 d-flex justify-content-end align-items-center">
                                            <a href="{{route('posts.index')}}" class="btn btn-secondary ">Cancle</a>
                                            <button type="submit" class="btn btn-primary ms-3">Submit</button>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('css')

<style type="text/css">

.gallery {
    width: 100%;
    background-color: #eee;
    color: #aaa;

    display: flex;
    justify-content: center;
    align-items: center;

    text-align: center;
    padding: 10px 0;
}

.gallery.removetext span {
    display: none;
}

.gallery img {
    width: 150px;
    height: 150px;
    border: 2px dashed #aaa;
    border-radius: 10px;
    object-fit: cover;

    padding: 5px;
    margin: 0 5px;
}

#image-label{
    display: block;
    width: 100%;
}

</style>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

        let previewimages = function (input, output) {

            if (input.files) {

                let totalfiles = input.files.length;

                if (totalfiles > 0) {
                    $(output).addClass("removetext")
                } else {
                    $(output).remove("removetext")
                }

                for (let x = 0; x < totalfiles; x++) {

                    let filereader = new FileReader();
                    filereader.readAsDataURL(input.files[x])

                    filereader.onload = function (e) {

                        $(output).html("");
                        $($.parseHTML("<img>")).attr('src', e.target.result).appendTo(output);
                    }
                }

            }

        }
        // image from id
        $("#image").change(function () {
            previewimages(this, ".gallery");
        })

        });

    </script>
@endsection
