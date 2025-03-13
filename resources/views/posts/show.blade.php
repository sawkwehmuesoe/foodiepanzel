@extends('layouts.adminindex')
@section('caption','Show Post')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                            <a href="{{route('posts.index')}}" class="d-block btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class=" bg-white p-4 pt-5 rounded">

                                    <div class="d-flex flex-column align-items-center mb-4">

                                        <div class="mb-4 text-center">
                                            <p class="h5">Post | {{$post->title}}</p>
                                            <span>Status - {{$post->status->name}}</span>
                                        </div>


                                        <div class="roleprofiles mb-4">
                                            <img src="{{asset($post->image)}}" alt="{{$post->name}}">
                                        </div>

                                    </div>

                                    @if (!$post->checkenroll($userdata->id))
                                        <div class="d-grid mb-4">
                                            <a href="#createmodal" class="d-block btn btn-info" data-bs-toggle="modal">Enroll</a>
                                        </div>
                                    @endif


                                    <div class="detail-carts">

                                        <p class="h6 fw-bold ms-3">Detail</p mb-4>

                                        <hr/>

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item my-2">
                                                <p class="mb-2 fw-semibold">Posted</p>
                                                <p class="mb-2 fw-semibold"><i class="fa-solid fa-user"></i> <span class="text-muted">{{$userdata->name}}</span></p>
                                            </li>
                                            <li class="list-group-item my-2">
                                                <p class="mb-2 fw-semibold">Tag</p>
                                                <span class="text-muted"><i class="fa-solid fa-tags"></i> {{$post->tag->name}}</span>
                                            </li>
                                            <li class="list-group-item my-2">

                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="mb-2 fw-semibold">Type</p>
                                                        <span class="text-muted"><i class="fa-brands fa-typo3"></i> {{$post->type->name}}</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="mb-2 fw-semibold">Fees</p>
                                                        <span class="text-muted"><i class="fa-solid fa-coins"></i> {{$post->fee}} Kyats</span>
                                                    </div>
                                                </div>


                                            </li>
                                            <li class="list-group-item my-2">

                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="mb-2 fw-semibold">Start Date</p>
                                                        <span class="text-muted"><i class="fa-solid fa-calendar-days"></i> {{$post->startdate}}</span>
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="mb-2 fw-semibold">End Date</p>
                                                        <span class="text-muted"><i class="fa-solid fa-calendar-days"></i> {{$post->enddate}}</span>
                                                    </div>
                                                </div>

                                            </li>

                                            <li class="list-group-item my-2">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="mb-2 fw-semibold">Start Time</p>
                                                        <span class="text-muted"><i class="fa-solid fa-clock"></i> {{$post->starttime}}</span>
                                                    </div>

                                                    <div class="text-end">
                                                        <p class="mb-2 fw-semibold">End Time</p>
                                                        <span class="text-muted"><i class="fa-solid fa-clock"></i> {{$post->endtime}}</span>
                                                    </div>
                                                </div>

                                            </li>
                                       </ul>

                                       <hr>

                                       <div class="d-flex justify-content-between">
                                                <p class="mb-2"><span class="text-muted"><i class="fa-solid fa-calendar-week"></i> {{$post->created_at->format('d M Y | h:i:s')}}</span></p>
                                                <p class="mb-2 text-end"><span class="text-muted"><i class="fa-solid fa-calendar-week"></i> {{$post->updated_at->format('d M Y | h:i:s')}}</span></p>
                                       </div>

                                       <div class="">
                                            <i class="fas fa-calendar fa-sm"></i>
                                            <span>
                                                @foreach ($dayables as $dayable)
                                                    {{$dayable["name"]}}
                                                @endforeach
                                            </span>


                                       </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-7">

                                <div class="bg-white p-4 rounded remarks">

                                    <ul class="list-group text-center rounded-0">
                                        <li class="list-group-item p-4 fw-bold z-0">Information</li>
                                    </ul>

                                    {{-- start remark  --}}
                                    <div class="remark-contents">

                                        @if ($post->content)
                                            <div class="border">
                                                <p class="remark-items">
                                                    {!! $post->content !!}
                                                </p>
                                            </div>
                                        @else
                                            <div class="text-center mt-2">
                                                <p>Nothing to show</p>
                                            </div>
                                        @endif


                                    </div>
                                    {{-- end remark  --}}

                                    {{-- start comment --}}
                                    <div class="card-box rounded-0">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="list-group chat-boxs">
                                                        @foreach ($comments as $comment)
                                                            <li class="list-group-item mt-2">
                                                                <div class="d-flex justify-content-between my-3">
                                                                    <p class="comment-usernames">{{$comment->user["name"]}}</p>
                                                                    <p class="comment-times">{{$comment->created_at->diffForHumans()}}</p>
                                                                </div>
                                                                <div>
                                                                   <span class="text-muted comments">{{$comment->description}}</span>
                                                                </div>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="card-body border-top">
                                                    <form action="{{route('comments.store')}}" method="POST">
                                                        @csrf

                                                        <div class="col-md-12 d-flex justify-content-between">
                                                            <textarea name="description" id="description" class="form-control border-0 rounded-0" rows="1" style="resize:none" placeholder="Comment here..."></textarea>
                                                            <button type="submit" class="btn btn-info btn-sm text-light ms-3"><i class="fas fa-paper-plane px-1"></i></button>
                                                        </div>
                                                        {{-- Start Hidden Field  --}}
                                                        <input type="hidden" name="commentable_id" id="commentable_id" value="{{$post->id}}">
                                                        <input type="hidden" name="commentable_type" id="commentable_type" value=" App\Models\Post">
                                                        {{-- End Hidden Field  --}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end comment --}}

                                </div>

                                <div class=" bg-white p-4 pt-5 rounded tabs">

                                    <h2>Tabs</h2>

                                    <ul class="nav tab-nav">
                                        <li class="tab-nav-items">
                                            <button type="button" id="autoclick" class="tablinks active" onclick="gettabs(event,'home')">Home</button>
                                        </li>
                                        <li class="tab-nav-items">
                                            <button type="button" class="tablinks" onclick="gettabs(event,'profile')">Profile</button>
                                        </li>
                                        <li class="tab-nav-items">
                                            <button type="button" class="tablinks" onclick="gettabs(event,'contact')">Contact</button>
                                        </li>
                                        <li class="tab-nav-items">
                                            <button type="button" class="tablinks" onclick="gettabs(event,'setting')">Setting</button>
                                        </li>

                                    </ul>

                                    <div class="tab-content">

                                        <div id="home" class="tab-panels">
                                            <span class="btn-close"></span>
                                            <h3>This is Home Information</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>

                                        <div id="profile" class="tab-panels">
                                            <span class="btn-close"></span>
                                            <h3>This is Profile Information</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>

                                        <div id="contact" class="tab-panels">
                                            <span class="btn-close"></span>
                                            <h3>This is Contact Information</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>

                                        <div id="setting" class="tab-panels">
                                            <span class="btn-close"></span>
                                            <h3>This is Setting Information</h3>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- End Content Area --}}

    {{-- Start Model Area --}}
    <div id="createmodal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Enroll Form</h6>
                    <button type="text" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('enrolls.store')}}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="row align-items-end">

                            <div class="col-md-12 mb-3 form-group mb-3">
                                <label for="image" id="image-label"><div class="gallery"><span>Choose Image</span></div></label>
                                <input type="file" id="image" name="image" class="form-control" autocomplete="off" value="{{old('image')}}" hidden >
                            </div>

                            <div class="col-md-10 form-group">
                                <label for="remark" class="text-muted fw-bold mb-2">Remark <span class="text-danger">*</span></label>
                                <textarea name="remark" id="remark" class="form-control" placeholder="Enter Remark" rows="3" >{{old('remark')}}</textarea>
                            </div>

                            <div class='col-md-2'>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                            {{-- Start Hidden Field  --}}
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            {{-- End Hidden Field  --}}

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Model Area --}}

@endsection

@section('css')
<style type="text/css">

    .roleprofiles{
        width: 250px;
        height: 250px;
        border-radius: 15px;

        overflow: hidden;
    }

    .roleprofiles img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* start comment area  */

    .chat-boxs{
        height: 400px;
        overflow-y: scroll;
    }

    .comments{
        font-size: 16px;
    }

    .comment-usernames{
        text-transform: capitalize;
        font-weight: bold;
    }

    .comment-times{
        font-style: italic;
        font-size: 14px;
        font-weight: bold;
    }

    /* end comment area */

    /* start image preview */

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

    /* end image preview */


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

