@extends('layouts.adminindex')
@section('caption','Create Customers')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-10 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                        </div>

                        <form action="/customers" method="POST">

                            @csrf
                            @method('POST')

                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <label for="firstname" class="text-muted fw-bold mb-2">First Name <span class="text-danger">*</span></label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter Your First Name" value="{{old('firstname')}}" >
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="lastname" class="text-muted fw-bold mb-2">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter Your Last Name" value="{{old('lastname')}}" autocomplete="off" >
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="regnumber" class="text-muted fw-bold mb-2">Reg Number <span class="text-danger">*</span></label>
                                    <input type="text" id="regnumber" name="regnumber" class="form-control" placeholder="Enter Your Reg Number" value="{{old('regnumber')}}" autocomplete="off" >
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="remark" class="text-muted fw-bold mb-2">Remark</label>
                                    <textarea name="remark" id="remark" class="form-control p-3" rows=5 placeholder="Write Something..." autocomplete="off" >{{old('remark')}}</textarea>
                                </div>

                                <div class='col-md-12 mt-3'>

                                    <div class="d-flex justify-content-end">
                                        <a href="{{route('customers.index')}}" class="btn btn-secondary ">Cancle</a>
                                        <button type="submit" class="btn btn-primary ms-3">Submit</button>
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
