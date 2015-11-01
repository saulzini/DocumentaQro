@extends('app')

@section('content')
<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8" />
<head>
    <title>Recuperar contraseña | DocumentaQro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href=" {{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/font-awesome/css/font-awesome.css') }}">
</head>

<body>

					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

                   <div>
                    <div style="width:40%; margin:0 auto; background:#221E1F; margin-top:25px">
                        <div class="headerIS"><h4>Recordar contraseña</h4></div>
                        <div class="login">

                            <form class="form-horizontal"  role="form" method="POST" action="{{ url('/password/email') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <br>
                                <ul>
                                    <li>
                                        <div class="col-md-12"  style="text-align: center">
                                            <span class="un"><i class="fa fa-envelope-o fa-lg"></i></span><input placeholder="Correo electrónico" type="email" class="text" name="email" value="{{ old('email') }}">
                                        </div>
                                    </li>

                                    <li style="text-align: center">
                                        <button type="submit" class="btn" style="width:95%;">Enviar</button>
                                    </li>
                                </ul>
                                <li></li>
                            </form>
                        </div>
                    </div>
                </div>
</body>
</html>
@endsection
