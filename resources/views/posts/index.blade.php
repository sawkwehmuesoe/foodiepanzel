@extends('layouts.adminindex')
@section('caption','Post List')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                            <a href="{{route('posts.create')}}" class="d-block btn btn-primary">Create Post</a>
                        </div>

                        <div class="table-inners overflow-auto">
                            <table id="mytable" class="table table-hover rounded shadow">

                                <thead class="">
                                    <tr class="table-light">
                                        <th class="p-4 text-center text-muted fw-bold">No</th>
                                        <th class="p-4 text-center text-muted fw-bold">Title</th>
                                        <th class="p-4 text-center text-muted fw-bold">Start Date</th>
                                        <th class="p-4 text-center text-muted fw-bold">End Date</th>
                                        <th class="p-4 text-center text-muted fw-bold">Start Time</th>
                                        <th class="p-4 text-center text-muted fw-bold">End Time</th>
                                        <th class="p-4 text-center text-muted fw-bold">Fee</th>
                                        <th class="p-4 text-center text-muted fw-bold">Type</th>
                                        <th class="p-4 text-center text-muted fw-bold">Tag</th>
                                        <th class="p-4 text-center text-muted fw-bold">Att Form</th>
                                        <th class="p-4 text-center text-muted fw-bold">Status</th>
                                        <th class="p-4 text-center text-muted fw-bold">By</th>
                                        <th class="p-4 text-center text-muted fw-bold">Created At</th>
                                        <th class="p-4 text-center text-muted fw-bold">Updated At</th>
                                        <th class="p-4 text-center text-muted fw-bold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $idx=>$post)
                                    <tr>
                                        <td class="p-4 text-muted text-center">{{++$idx}}</td>
                                        <td class="p-4 text-muted"><div class="d-flex align-items-center"><img src="{{asset($post->image)}}" class="rounded-circle tableimages me-3" alt="{{Str::limit($post->title,10)}}" width="40" height="40" /><a href="{{route('posts.show',$post->id)}}" class="text-success link-underline link-underline-opacity-0">{{$post->title}}</a></div></td>
                                        <td class="p-4 text-muted text-center">{{$post->startdate}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->enddate}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->starttime}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->endtime}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->fee}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->type->name}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->tag->name}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->attstatus['name']}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->status->name}}</td>
                                        <td class="p-4 text-muted text-center">{{$userdata->name}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->created_at->format('d M Y h:i:s')}}</td>
                                        <td class="p-4 text-muted text-center">{{$post->updated_at->format('d M Y h:i:s')}}</td>
                                        <td class="text-center">
                                            <a href="{{route('posts.edit',$post->id)}}" class="text-info"><i class="fas fa-pen"></i></a>
                                            <a href="#" class="text-danger ms-2 delete-btns" data-idx="{{$post->id}}" data-idxname="{{$post->name}}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <form id="formdelete-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('css')
<style type="text/css">

    h3{
        text-shadow: 2px 2px 3px #abe0c2;
    }

</style>
@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function(){

            $('.delete-btns').click(function(){

                var getidx = $(this).data('idx');
                var getidxname = $(this).data('idxname');
                // console.log(getidx);

                if(confirm(`Are you sure !!! you want to Delete ${getidxname}`)){
                    $("#formdelete-"+getidx).submit();
                    return true;
                }else{
                    return false;
                }

            });

        })

    </script>
@endsection
