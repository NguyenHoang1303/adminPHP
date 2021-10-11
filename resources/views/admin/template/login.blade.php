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
                <form method="POST" name="login" action="/admin/login">
                    @csrf
                    <h1>Login</h1>
                    @if(Session::has('loginFail'))
                        <div class="error ">{{ session()->get('loginFail') }}</div>
                    @endif
                    <div class="mb-4">
                        <input type="text" class="form-control mb-0" name="email" value="{{ Request::old('email') }}"
                               placeholder="Username"/>
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control mb-0" name="password" value="{{ Request::old('password') }}"
                               placeholder="Password"/>
                        @if($errors->has('password'))
                            <div class="error">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div>
                        <button style="font-size: 12px; margin-top: 20px;
                         border: none;background-color: #f7f7f7; text-shadow: 0 1px 0 #fff;">Login
                        </button>
                        <a style="font-size: 12px; margin-top: 20px;
                         border: none;background-color: #f7f7f7; text-shadow: 0 1px 0 #fff; text-decoration: none; color: #000000"
                        >Lost your password?
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="/admin/register" class="to_register"> Create Account </a>
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
