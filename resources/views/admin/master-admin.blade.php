<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.head')
    @yield('page-css')
</head>

<body class="nav-md">
<button onclick="topFunction()" id="btnToTop" title="Go to top"><i class="fa fa-arrow-up"></i></button>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/admin" class="site_title"><i class="fa fa-paw"></i> <span>Fresh vegetables</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="/admin/images/jjjj.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <?php
                        $admin = array();
                        if (Session::has('loginId'))
                            {
                                $admin = DB::table('admins')->find(Session::get('loginId'));
                            }
                        ?>
                        @if($admin != null && ($admin->fullname) != null)
                            <h2>{{$admin->fullname}}</h2>
                        @else
                            <h2>Admin</h2>
                        @endif

                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                <!-- sidebar menu -->
            @include('admin.include.left-menu')
            <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
    @include('admin.include.top-navigation')
    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col">
            <div class="">
                @yield('breadcrumb')
                <div class="clearfix"></div>
                @yield('page-content')
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
    @include('admin.include.footer')
    <!-- /footer content -->
    </div>
</div>
@include('admin.include.script')
@yield('page-script')
<script>
    //Get the button
    var mybutton = document.getElementById("btnToTop");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
</body>
</html>
