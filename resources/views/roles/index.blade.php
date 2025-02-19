@extends('layouts.adminindex')
@section('caption','Role List')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                            <a href="{{route('roles.create')}}" class="d-block btn btn-primary">Create Roles</a>
                        </div>

                        <table id="mytable" class="table table-hover rounded shadow">

                            <thead class="">
                                <tr class="table-light">
                                    <th class="p-4 text-center text-muted fw-bold">No</th>
                                    <th class="p-4 text-center text-muted fw-bold"> Name</th>
                                    <th class="p-4 text-center text-muted fw-bold">Status</th>
                                    <th class="p-4 text-center text-muted fw-bold">By</th>
                                    <th class="p-4 text-center text-muted fw-bold">Created At</th>
                                    <th class="p-4 text-center text-muted fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $idx=>$role)
                                <tr>
                                    <td class="p-4 text-muted text-center">{{++$idx}}</td>
                                    <td class="p-4 text-muted"><div class="d-flex align-items-center"><img src="{{asset($role->image)}}" class="rounded-circle tableimages me-3" alt="{{$role->name}}" width="40" height="40" /><a href="{{route('roles.show',$role->id)}}" class="text-success link-underline link-underline-opacity-0">{{$role->name}}</a></div></td>
                                    <td class="p-4 text-muted text-center">{{$role->status->name}}</td>
                                    <td class="p-4 text-muted text-center">{{$userdata->name}}</td>
                                    <td class="p-4 text-muted text-center">{{$role->created_at->format('d M Y h:i:s')}}</td>

                                    <td class="text-center">
                                        <a href="{{route('roles.edit',$role->id)}}" class="text-info"><i class="fas fa-pen"></i></a>
                                        <a href="#" class="text-danger ms-2 delete-btns" data-idx="{{$role->id}}" data-idxname="{{$role->name}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    <form id="formdelete-{{$role->id}}" action="{{route('roles.destroy',$role->id)}}" method="POST">
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
