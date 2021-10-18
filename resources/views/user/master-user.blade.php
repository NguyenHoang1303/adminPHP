<!DOCTYPE html>
<html lang="en">

<head>
   @include('user.include.head')
    @yield('page-css')
</head>

<body class="animsition">

<!-- Header -->
@include('user.include.header')
@yield('content')
<!-- Subscribe -->
@include('user.include.subscribe')

<!-- Footer -->
@include('user.include.footer')


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
{{--    lnr lnr-chevron-up--}}
        <span class="symbol-btn-back-to-top">
			<span class="lnr lnr-arrow-up"></span>
        </span>
</div>



<!--===============================================================================================-->
@include('user.include.script')
@yield('page-script')
</body>

</html>
