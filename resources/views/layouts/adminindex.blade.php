@include('layouts.adminheader')

{{-- Start Left Side Bar --}}
@include('layouts.adminleftsidebar')
{{-- End Left Side Bar --}}


{{-- Start Content Area --}}
<section>
   <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-9 pt-md-5 mt-md-3 ms-auto p-0 ">

                {{-- Start Inner Content Area --}}
                @yield('content')
                {{-- End Inner Content Area --}}

            </div>

        </div>
   </div>
</section>
{{-- End Content Area --}}

@include('layouts.adminfooter')
