@extends('admin.layouts.appLogin')
@section('content')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}"><b>E</b>SHOPPER</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
@if(Session::has('errorlogin'))
    <div class="alert-box danger">
        <h2>{{ Session::get('errorlogin') }}</h2>
    </div>
@endif
    <form action="{{url('admin/login')}}" method="post">
    {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        @if ($errors->has('email'))
                            <span class="help-block cls-error">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        @if ($errors->has('password'))
                            <span class="help-block cls-error">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
        
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{url('admin/js/jquery.min.js')}}"></script>
<script src="{{url('admin/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{url('admin/js/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
@endsection


