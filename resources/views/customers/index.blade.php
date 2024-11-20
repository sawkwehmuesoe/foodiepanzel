@extends('layouts.adminindex')
@section('caption','Customers List')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                            <a href="{{route('customers.create')}}" class="d-block btn btn-primary">Add Customer</a>
                        </div>

                        <table id="mytable" class="table rounded shadow">

                            <thead class="">
                                <tr class="table-light">
                                    <th class="p-4 text-center text-muted fw-bold">No</th>
                                    <th class="p-4 text-center text-muted fw-bold">Account Id</th>
                                    <th class="p-4 text-center text-muted fw-bold">Customer Name</th>
                                    <th class="p-4 text-center text-muted fw-bold">Email</th>
                                    <th class="p-4 text-center text-muted fw-bold">Address</th>
                                    <th class="p-4 text-center text-muted fw-bold">Status</th>
                                    <th class="p-4 text-center text-muted fw-bold">By</th>
                                    <th class="p-4 text-center text-muted fw-bold">Created At</th>
                                    <th class="p-4 text-center text-muted fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $idx=>$customer)
                                <tr>
                                    <td class="p-4 text-muted text-center">{{++$idx}}</td>
                                    <td class="p-4 text-muted text-center"><a href="{{route('customers.show',$customer->id)}}" class="text-success link-underline link-underline-opacity-0">{{$customer->accountid}}</a></td>
                                    <td class="p-4 text-muted text-center">{{$customer->firstname}} {{$customer->lastname}}</td>
                                    <td class="p-4 text-muted text-center">{{$customer->email}}</td>
                                    {{-- <td class="p-4 text-muted text-center">{{Str::limit($customer->remark,10)}}</td> --}}
                                    <td class="p-4 text-muted text-center">{{Str::limit($customer->address,20)}}</td>
                                    <td class="p-4 text-muted text-center">{{$customer->status->name}}</td>
                                    <td class="p-4 text-muted text-center">{{$userdata->name}}</td>
                                    <td class="p-4 text-muted text-center">{{$customer->created_at->format('d M Y h:i:s')}}</td>

                                    <td class="text-center">
                                        <a href="{{route('customers.edit',$customer->id)}}" class="text-info"><i class="fas fa-pen"></i></a>
                                        <a href="#" class="text-danger ms-2 delete-btns" data-idx="{{$customer->regnumber}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    <form id="formdelete-{{$customer->regnumber}}" action="{{route('customers.destroy',$customer->id)}}" method="POST">
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
                // console.log(getidx);

                if(confirm(`Are you sure !!! you want to Delete ${getidx}`)){
                    $("#formdelete-"+getidx).submit();
                    return true;
                }else{
                    return false;
                }

            });

        })

    </script>
@endsection
