@extends('layouts.adminindex')
@section('caption','Show Role')
@section('content')

    <div class="container-fluid">

        <div class="col-md-12">

            <div class="row">

                <div class="col-md-11 mx-auto">

                    <div id="list-boxs">

                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="fs-3 fw-bold">@yield('caption')</h3>
                            <a href="{{route('roles.index')}}" class="d-block btn btn-secondary"><i class="fa-solid fa-arrow-left"></i></a>
                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class=" bg-white p-4 pt-5 rounded">

                                    <div class="d-flex flex-column align-items-center mb-4">

                                        <div class="mb-4 text-center">
                                            <p class="h5">Role | {{$role->name}}</p>
                                            <span>Status - {{$role->status->name}}</span>
                                        </div>


                                        <div class="roleprofiles mb-4">
                                            <img src="{{asset($role->image)}}" alt="{{$role->name}}">
                                        </div>

                                    </div>

                                    <div class="detail-carts">

                                        <p class="h6 fw-bold ms-3">Detail</p>

                                        <hr/>

                                       <div class="d-flex justify-content-between">
                                            <div class="my-2">
                                                <p class="mb-2 fw-semibold"><i class="fa-solid fa-user"></i> <span class="text-muted">{{$userdata->name}}</span></p>
                                            </div>

                                            <div class="my-2">
                                                <p class="mb-2"><span class="text-muted">{{$role->created_at->format('d M Y h:i:s')}}</span></p>
                                                <p class="mb-2"><span class="text-muted">{{$role->updated_at->format('d M Y h:i:s')}}</span></p>

                                            </div>
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

                                        <div class="text-center mt-2">
                                            <p>Nothing to show</p>
                                        </div>

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

</style>
@endsection

