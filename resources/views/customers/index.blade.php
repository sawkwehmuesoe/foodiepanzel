@extends('layouts.adminindex')
@section('caption','Customers List')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-10 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                            <a href="{{route('customers.create')}}" class="d-block btn btn-primary">Add Customer</a>
                        </div>

                        <table id="mytable" class="table rounded">

                            <thead class="">
                                <tr class="table-light">
                                    <th class="p-4">No</th>
                                    <th class="p-4">Reg Number</th>
                                    <th class="p-4">Customer Name</th>
                                    <th class="p-4">Remark</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4">By</th>
                                    <th class="p-4">Created At</th>
                                    <th class="p-4">Updated At</th>
                                    <th class="p-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $idx=>$customer)
                                <tr>
                                    <td class="p-4">{{++$idx}}</td>
                                    <td class="p-4"><a href="{{route('customers.show',$customer->id)}}">{{$customer->regnumber}}</a></td>
                                    <td class="p-4">{{$customer->firstname}} {{$customer->lastname}}</td>
                                    <td class="p-4">{{Str::limit($customer->remark,10)}}</td>
                                    <td class="p-4">{{$customer->status->name}}</td>
                                    <td class="p-4">{{$userdata->name}}</td>
                                    <td class="p-4">{{$customer->created_at->format('d M Y')}}</td>
                                    <td class="p-4">{{$customer->updated_at->format('d M Y')}}</td>
                                    <td>
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
