@extends('layouts.adminindex')
@section('caption','Create Roles')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                        </div>

                        <form action="/roles" method="POST">

                            @csrf
                            @method('POST')

                            <div class="row">

                                <div class="col-md-4">

                                    <label for="image" id="image-label">
                                        <div class="gallery"><span>Choose Image</span></div>
                                    </label>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 form-group">
                                            <label for="image" class="text-muted fw-bold mb-2">Image</label>
                                            <input type="file" id="image" name="image" class="form-control" autocomplete="off" value="{{old('image')}}" >
                                        </div>

                                        {{-- ----------- --}}

                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="text-muted fw-bold mb-2">Name <span class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Role Name" value="{{old('firstname')}}" >
                                        </div>


                                        <div class="col-md-6 mb-3">
                                            <label for="status_id" class="text-muted fw-bold mb-2">Status <span class="text-danger">*</span></label>
                                            <select type="text" name="status_id" id="status_id" class="form-control form-control-sm rounded-0" >

                                                @foreach ($statuses as $status)
                                                    <option value={{$status->id}}>{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class='col-md-12 mt-3'>

                                            <div class="d-flex justify-content-end">
                                                <a href="{{route('roles.index')}}" class="btn btn-secondary ">Cancle</a>
                                                <button type="submit" class="btn btn-primary ms-3">Submit</button>
                                            </div>

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
    height: 100%;
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
    height: 100%;
}

</style>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function () {

        let previewimages = function (input, output) {

            // console.log(input,output);



            if (input.files) {

                let totalfiles = input.files.length;
                // console.log(totalfiles);

                if (totalfiles > 0) {
                    $(output).addClass("removetext")
                } else {
                    $(output).remove("removetext")
                }

                for (let x = 0; x < totalfiles; x++) {
                    // console.log(x);

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
