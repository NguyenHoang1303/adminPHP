<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
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
			<span class="fa fa-arrow-up"></span>
        </span>
</div>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6185ed436bb0760a49415dd7/1fjpidjsm';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!--===============================================================================================-->
@include('user.include.script')
@yield('page-script')
<script src="https://kit.fontawesome.com/c704dbde0e.js" crossorigin="anonymous"></script>
</body>

</html>
