@extends('layouts.adminindex')
@section('caption', 'Stage List')
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
                            <form action="{{ route('stages.store') }}" method="POST">

                                {{ csrf_field() }}
                                @method('POST')

                                <div class="row align-items-end">

                                    <div class="col-md-6 form-group">
                                        <label for="name" class="text-muted fw-bold mb-2">Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Enter Gender Name" value="{{ old('name') }}">
                                    </div>


                                    <div class='col-md-6'>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-secondary ms-3">Cancel</button>
                                            <button type="submit" class="btn btn-primary ms-3">Submit</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <table id="mytable" class="table rounded shadow">

                            <thead class="">
                                <tr class="table-light">
                                    <th class="p-4 text-center text-muted fw-bold">No</th>
                                    <th class="p-4 text-center text-muted fw-bold">Name</th>
                                    <th class="p-4 text-center text-muted fw-bold">By</th>
                                    <th class="p-4 text-center text-muted fw-bold">Created At</th>
                                    <th class="p-4 text-center text-muted fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stages as $idx => $stage)
                                    <tr>
                                        <td class="p-4 text-muted text-center">{{ ++$idx }}</td>
                                        <td class="p-4 text-muted text-center">{{ $stage->name }}</td>
                                        <td class="p-4 text-muted text-center">{{ $userdata->name }}</td>
                                        <td class="p-4 text-muted text-center">
                                            {{ $stage->created_at->format('d M Y h:i:s') }}</td>

                                        <td class="text-center">
                                            <a href="javascript:void(0);" class="text-info editform" data-bs-toggle="modal"
                                                data-bs-target="#editmodal" data-id={{ $stage->id }}
                                                data-name={{ $stage->name }}><i class="fas fa-pen"></i></a>
                                            <a href="#" class="text-danger ms-2 delete-btns"
                                                data-idx="{{ $stage->name }}"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <form id="formdelete-{{ $stage->name }}"
                                            action="{{ route('stages.destroy', $stage->id) }}" method="POST">
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
    {{-- start edit modal --}}
    <div id="editmodal" class="modal fade">
        <div class="modal-dialog modal-sm modal-dialog-centered">
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

                            <div class="col-md-8 form-group">
                                <label for="editname" class="text-muted fw-bold mb-2">Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" id="editname" class="form-control"
                                    placeholder="Enter Status Name" value="{{ old('name') }}">
                            </div>


                            <div class='col-md-4'>
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

                if(confirm(`Are you sure !!! you want to Delete ${getidx}`)){
                    $("#formdelete-"+getidx).submit();
                    return true;
                }else{
                    return false;
                }

            });
            // End Delete Item

            // Start Edit Form
                $(document).on('click','.editform',function(e){

                    $("#editname").val($(this).data('name'))

                    const getid = $(this).data('id');

                    $("#formaction").attr('action',`/stages/${getid}`)

                    e.preventDefault();
                })
            // End Edit Form

        })

    </script>
@endsection
