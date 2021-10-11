<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.include.head')
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" name="Register" action="/admin/register">
                    @csrf
                    <h1>Create Account</h1>
                    @if(Session::has('success'))
                        <div class="success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(Session::has('emailExist'))
                        <div class="error">
                            {{ session()->get('emailExist') }}
                        </div>
                    @endif
                    <div class="mb-4">
                        <input type="email" class="form-control mb-0" value="{{ Request::old('email') }}" placeholder="Email" name="email"/>
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control mb-0" value="{{ Request::old('password') }}" placeholder="Password" name="password"/>
                        @if($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <input type="text" class="form-control mb-0" value="{{ Request::old('fullname') }}" placeholder="Full name" name="fullname"/>
                        @if($errors->has('fullname'))
                            <div class="error">{{ $errors->first('fullname') }}</div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <input type="text" class="form-control mb-0" value="{{ Request::old('phone') }}" placeholder="Phone number" name="phone"/>
                        @if($errors->has('phone'))
                            <div class="error">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div>
                        <button style="font-size: 12px; margin-top: 20px;
                         border: none;background-color: #f7f7f7; text-shadow: 0 1px 0 #fff;">Register
                        </button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="/admin/login" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><i class="fa fa-university" aria-hidden="true"></i> Spring HeroBank!</h1>
                            <p>©2016 All Rights Reserved. Spring HeroBank! is an anti-slip bank for FPT students.
                                Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
