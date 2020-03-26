<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classroom Reservations</title>

    <!-- path from main index -->
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="modules/authorization/css/authform.css">

</head>
<body>
<div class="container container-fluid">

    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" action="/modules/authorization/models/login.php" method="post">
                <span class="heading">LogIn</span>
                <div class="form-group">
                    <input type="text"
                           class="form-control"
                           id="inputEmail"
                           name="login"
                           placeholder="Your login"
                           required
                    >
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-group help">
                    <input type="password"
                           class="form-control"
                           id="inputPassword"
                           name="password"
                           placeholder="Your password"
                           required
                    >
                    <i class="fa fa-lock"></i>
                </div>
                <div class="form-group">
                    <a type="button" href="/?reg">Registration</a>
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
            </form>
        </div>
    </div><!-- /.row -->
</div>
</body>
</html>