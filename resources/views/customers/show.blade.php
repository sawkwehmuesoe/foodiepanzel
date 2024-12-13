@extends('layouts.adminindex')
@section('caption','Show Customers')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                            <a href="{{route('customers.index')}}" class="d-block btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class=" bg-white p-4 pt-5 rounded">

                                    <div class="d-flex flex-column align-items-center mb-4">
                                        <div class="customerprofiles mb-4">
                                            <img src="https://preview.keenthemes.com/keen/demo1/assets/media/avatars/300-6.jpg" alt="">
                                        </div>

                                        <p class="h5">{{$customer->firstname}} {{$customer->lastname}}</p>
                                        <span>Status - On</span>


                                    </div>

                                    <div class="detail-carts">

                                        <p class="h6 fw-bold ms-3">Detail</p>

                                        <hr/>

                                       <ul class="list-group list-group-flush">
                                            <li class="list-group-item my-2">
                                                <p class="mb-2 fw-semibold">Account Id</p>
                                                <span class="text-muted">{{$customer->accountid}}</span>
                                            </li>
                                            <li class="list-group-item my-2">
                                                <p class="mb-2 fw-semibold">Email</p>
                                                <span class="text-muted">{{$customer->email}}</span>
                                            </li>
                                            <li class="list-group-item my-2">
                                                <p class="mb-2 fw-semibold">Address</p>
                                                <span class="text-muted">{{$customer->address}}</span>
                                            </li>
                                            <li class="list-group-item my-2">
                                                <p class="mb-2 fw-semibold">Language</p>
                                                <span class="text-muted">English</span>
                                            </li>
                                            <li class="list-group-item my-2">
                                                <p class="mb-2 fw-semibold">Last Login</p>
                                                <span class="text-muted">{{$customer->updated_at->format('d M Y h:i:s')}}</span>
                                            </li>
                                       </ul>

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
                                        <h2>Remark Here</h2>
                                        <p class="remark-items">
                                            {{$customer->remark}}
                                        </p>
                                    </div>
                                    {{-- end remark  --}}

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

@endsection

@section('css')
<style type="text/css">

    .customerprofiles{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
    }

    .customerprofiles img{
        width: 100%;
        height: 100%
    }

</style>
@endsection

