@extends('layouts.adminindex')
@section('caption','Attendances List')
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
                            <form action="{{route('attendances.store')}}" method="POST">

                                {{ csrf_field() }}
                                @method('POST')

                                <div class="row align-items-end">

                                    <div class="col-md-3 form-group">
                                        <label for="classdate" class="text-muted fw-bold mb-2">Class Date <span class="text-danger">*</span></label>
                                        <input type="date" id="classdate" name="classdate" class="form-control" value="{{old('classdate')}}" >
                                    </div>

                                    <div class="col-md-3">
                                        <label for="post_id" class="text-muted fw-bold mb-2">Class</label>
                                        <select name="post_id" id="post_id" class="form-control">
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="attcode" class="text-muted fw-bold mb-2">Attendance Code <span class="text-danger">*</span></label>
                                        <input type="text" id="attcode" name="attcode" class="form-control" value="{{old('attcode')}}" >
                                    </div>


                                    <div class='col-md-3'>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-secondary ms-3">Cancel</button>
                                            <button type="submit" class="btn btn-primary ms-3">Submit</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <table id="mytable" class="table table-hover rounded shadow">

                            <thead class="">
                                <tr class="table-light">
                                    <th class="p-4 text-center text-muted fw-bold">No</th>
                                    <th class="p-4 text-center text-muted fw-bold">Customer Id</th>
                                    <th class="p-4 text-center text-muted fw-bold">Class</th>
                                    <th class="p-4 text-center text-muted fw-bold">Att Code</th>
                                    <th class="p-4 text-center text-muted fw-bold">By</th>
                                    <th class="p-4 text-center text-muted fw-bold">Class Date At</th>
                                    <th class="p-4 text-center text-muted fw-bold">Created At</th>
                                    <th class="p-4 text-center text-muted fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($attendances as $idx=>$attendance)
                                <tr>
                                    <td class="p-4 text-muted text-center">{{++$idx}}</td>
                                    <td class="p-4 text-muted text-center">{{$attendance->post->title}}</td>
                                    <td class="p-4 text-muted text-center">{{$attendance->attcode}}</td>
                                    <td class="p-4 text-muted text-center">{{$userdata->name}}</td>
                                    <td class="p-4 text-muted text-center">{{$attendance->classdate}}</td>
                                    <td class="p-4 text-muted text-center">{{$attendance->created_at->format('d M Y h:i:s')}}</td>

                                    <td class="text-center">
                                        <a href="javascript:void(0);" class="text-info editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{$attendance->id}}" data-name="{{$attendance->name}}" data-postid="{{$attendance->post->id}}" data-attcode="{{$attendance->attcode}}"><i class="fas fa-pen"></i></a>
                                    </td>

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
                                {{ method_field('PUT') }}

                                <div class="row align-items-end">



                                    <div class="col-md-7 form-group">
                                        <label for="editpost_id" class="text-muted fw-bold mb-2">Class <span class="text-danger">*</span></label>
                                        <select name="post_id" id="editpost_id" class="form-control rounded">
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="editattcode" class="text-muted fw-bold mb-2">Att Code <span class="text-danger">*</span></label>
                                        <input type="text" id="editattcode" name="attcode" class="form-control" value="{{old('attcode')}}" >
                                    </div>


                                    <div class='col-md-2'>
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

                    $("#editattcode").val($(this).data('attcode'));
                    $("#editpost_id").val($(this).data('postid'));

                    const getid = $(this).data('id');

                    $("#formaction").attr('action',`/attendances/${getid}`)

                    e.preventDefault();
                })
            // End Edit Form

        })

    </script>
@endsection
{{-- http://127.0.0.1:8000/attendances --}}
