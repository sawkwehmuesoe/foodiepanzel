@extends('layouts.adminindex')
@section('caption','Days List')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                        </div>

                        <div class="col-md-12 mb-4">
                            <a href="#createmodal" class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal">Create</a>
                        </div>

                        <table id="mytable" class="table table-hover rounded shadow">

                            <thead class="">
                                <tr class="table-light">
                                    <th class="p-4 text-center text-muted fw-bold">No</th>
                                    <th class="p-4 text-center text-muted fw-bold">Name</th>
                                    <th class="p-4 text-center text-muted fw-bold">Status</th>
                                    <th class="p-4 text-center text-muted fw-bold">By</th>
                                    <th class="p-4 text-center text-muted fw-bold">Created At</th>
                                    <th class="p-4 text-center text-muted fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($days as $idx=>$day)
                                <tr>
                                    <td class="p-4 text-muted text-center">{{++$idx}}</td>
                                    <td class="p-4 text-muted text-center">{{$day->name}}</td>
                                    <td class="p-4 text-muted d-flex justify-content-center">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" {{$day->status_id === 3 ? 'checked' : '' }} >
                                        </div>
                                    </td>
                                    <td class="p-4 text-muted text-center">{{$userdata->name}}</td>
                                    <td class="p-4 text-muted text-center">{{$day->created_at->format('d M Y h:i:s')}}</td>

                                    <td class="text-center">
                                        <a href="javascript:void(0);" class="text-info editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{$day->id}}" data-name="{{$day->name}}" data-status="{{$day->status_id}}"><i class="fas fa-pen"></i></a>
                                        <a href="#" class="text-danger ms-2 delete-btns" data-idx="{{$day->id}}" data-idxname="{{$day->name}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    <form id="formdelete-{{$day->id}}" action="{{route('days.destroy',$day->id)}}" method="POST">
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

        {{-- START MODAL AREA --}}
            {{-- start create modal --}}
            <div id="createmodal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Create Form</h6>
                            <button type="text" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('days.store')}}" method="POST">

                                {{ csrf_field() }}

                                <div class="row align-items-end">

                                    <div class="col-md-6 form-group">
                                        <label for="name" class="text-muted fw-bold mb-2">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Day Name" value="{{old('name')}}" >
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="status_id">Status</label>
                                        <select name="status_id" id="status_id" class="form-control form-control-sm rounded-0">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class='col-md-3'>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end create modal --}}
        {{-- END MODAL AREA --}}


    {{-- START MODAL AREA --}}
        {{-- start edit modal --}}
            <div id="editmodal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title">Edit Form</h6>
                            <button type="text" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formaction" action="" method="POST">

                                {{ csrf_field() }}
                                {{ method_field('put') }}

                                <div class="row align-items-end">

                                    <div class="col-md-6 form-group">
                                        <label for="editname" class="text-muted fw-bold mb-2">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="editname" class="form-control" placeholder="Enter Type Name" value="{{old('name')}}" >
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="editstatus_id" class="text-muted fw-bold mb-2">Status <span class="text-danger">*</span></label>
                                        <select name="status_id" id="editstatus_id" class="form-control rounded">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status['id'] }}">{{ $status['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class='col-md-3'>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- end edit modal --}}
    {{-- END MODAL AREA --}}

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


            // Start Delete Item
            $('.delete-btns').click(function(){

                var getidx = $(this).data('idx');
                // console.log(getidx);
                var getidxname = $(this).data('idxname');

                if(confirm(`Are you sure !!! you want to Delete ${getidxname}`)){
                    $("#formdelete-"+getidx).submit();
                    return true;
                }else{
                    return false;
                }

            });
            // End Delete Item

            // Start Edit Form
                $(document).on('click','.editform',function(e){

                    $("#editname").val($(this).attr('data-name'));
                    $("#editstatus_id").val($(this).data('status'));

                    const getid = $(this).data('id');

                    $("#formaction").attr('action',`/days/${getid}`)

                    e.preventDefault();
                })
            // End Edit Form

        })

    </script>
@endsection
{{-- http://127.0.0.1:8000/days --}}
