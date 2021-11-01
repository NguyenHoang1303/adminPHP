@extends('user.master-user')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="/user/vendor/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendor/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="/user/css/util.css">
    <link rel="stylesheet" type="text/css" href="/user/css/main.css">
@endsection
@section('content')

    <!-- Error -->
    <div class="bg12 how-height1 pos-relative how4 flex-col-c-m p-rl-15 p-tb-50">
        <img class="ab-t-l" src="/user/images/other-14.jpg" alt="IMG">
        <img class="ab-t-r" src="/user/images/other-15.jpg" alt="IMG">
        <img class="ab-b-l" src="/user/images/other-17.jpg" alt="IMG">
        <img class="ab-b-r" src="/user/images/other-16.jpg" alt="IMG">

        <span class="txt-l-701 cl6 txt-center p-b-30 respon1">
			Oops!
		</span>

        <span class="txt-l-114 cl6 txt-center p-b-30 respon15">
			404-ERROR
		</span>

        <span class="txt-s-122 cl9 txt-center p-b-50">
			{{$error ?? ''}}
		</span>

        <a href="/home" class="flex-c-m txt-s-107 cl0 bg10 size-a-30 hov-btn2 trans-04">
            back to home
        </a>
    </div>

@endsection
@section('page-script')
    {{--    <script src="/user/vendor/lightbox2/js/lightbox.min.js"></script>--}}
    <!--===============================================================================================-->
    <script src="/user/vendor/noui/nouislider.min.js"></script>
    <!--===============================================================================================-->
    <script src="/user/js/main.js"></script>
    <script>

    </script>
@endsection
