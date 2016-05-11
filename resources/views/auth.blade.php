<!DOCTYPE html>
<html>
    <head>
        <title>Авторизация</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-social.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> 
    </head>
    <body>
        
    <div id="main-container" class="container-fluid">
      <div class="row">
        <div id="auth-form">
         <a class="btn btn-block btn-social btn-github" href="{!!URL::to('github')!!}">
            <span class="fa fa-github"></span>войти с помощью Github
        </a>

        <a class="btn btn-block btn-social btn-facebook" href="{!!URL::to('facebook')!!}">
            <span class="fa fa-facebook"></span> Sign in with Facebook
        </a>

        </div>
      </div>
    </div>

    </body>
</html>