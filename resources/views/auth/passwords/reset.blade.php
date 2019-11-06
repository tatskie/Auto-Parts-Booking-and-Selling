<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>South Road by CFF Login & Register</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset('assets/ico/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('assets/ico/apple-touch-icon-57-precomposed.png')}}">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            
                            <div class="description">
                                    
                                    @if (count($errors) > 0)

                                            @foreach ($errors->all() as $error)
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $error }}</strong>
                                            </span>
                                            @endforeach
                                        

                                    @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            
                            <div class="form-box">
                                <div class="form-top">
                                    <br>
                                    @if (session()->has('status'))
                                        <div class="alert alert-dismissable alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>
                                                {!! session()->get('status') !!}
                                            </strong>
                                        </div>
                                    @endif
                                    <div class="form-top-left">
                                        <h3>Reset Password</h3>
                                        <p>Enter email and password:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    
                        <form class="login-form" role="form" method="POST" action="{{ url('/password/reset') }}">
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Email</label>
                                            <input type="text" name="email" placeholder="Enter Email..." class="form-username form-control" id="form-username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Password</label>
                                            <input type="password" name="password" placeholder="Enter Password..." class="form-username form-control" id="form-username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Confirm Password</label>
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password..." class="form-username form-control" id="form-username" required>
                                        </div>
                                        <button type="submit" class="btn">Reset Password!</button>
                                    </form>

                                </div>
                            </div>
                        
                           
                            
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="footer-border"></div>
                        <p>Alright reserved! <a href="#" target="_blank"><strong>South Road</strong></a> 
                             <i class="fa fa-smile-o"></i></p>
                    </div>
                    
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>


    


