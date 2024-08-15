@include('layouts.adminheader')

{{-- Start Left Side Bar --}}
@include('layouts.adminleftsidebar')
{{-- End Left Side Bar --}}

{{-- Start Content Area --}}
@yield('content')
{{-- End Content Area --}}


@include('layouts.adminfooter')
