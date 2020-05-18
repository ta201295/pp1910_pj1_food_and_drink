<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đăng ký tài khoản</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('template_admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block "></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản</h1>
              </div>
              @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
              <form class="user" method="post" action="{{route('register')}}">
              {{ csrf_field() }}
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 sb-sm-0">
                    <input type="text" class="form-control form-control-user" name='name' required="" placeholder="Tên" value="{{old('name')}}">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name='phone' required="" placeholder="Số điện thoại" value="{{old('phone')}}">
                  </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name='email' required="" placeholder="Địa chỉ Email..." value="{{old('email')}}">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name='password' required="" placeholder="Mật khẩu">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name='password_confirmation' required="" placeholder="Nhập lại mật khẩu">
                  </div>
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Đăng ký tài khoản">
                <hr>
                {{-- <a href="#" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Đăng ký với tài khoản Google
                </a>
                <a href="#" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Đăng ký với tài khoản Facebook
                </a>
              </form>
              <hr> --}}
              
              <div class="text-center">
                <a class="small" href="{{route('login')}}">Bạn đã có tài khoản? Đăng nhập!</a>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('template_admin/js/jquery.min.js')}}"></script>
  <script src="{{url('template_admin/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('template_admin/js/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('template_admin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>