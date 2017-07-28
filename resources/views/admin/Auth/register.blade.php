@extends('admin.layouts.appLogin')
@section('content')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{url('admin/register')}}" method="post">
    {{csrf_field()}}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" placeholder="Full name">
        
            @if ($errors->has('name'))
                            <span class="help-block cls-error">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        
            @if ($errors->has('email'))
                            <span class="help-block cls-error">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">

            @if ($errors->has('password'))
                            <span class="help-block cls-error">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
        
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="confirm_password" placeholder="Retype password">
        
            @if ($errors->has('confirm_password'))
                            <span class="help-block cls-error">
                                <strong>{{ $errors->first('confirm_password') }}</strong>
                            </span>
                        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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


