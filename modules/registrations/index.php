<?php
require_once('class/Database.class.php');
$database = new Database();
?>
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
    <link rel="stylesheet" href="modules/registrations/css/regform.css"/>
</head>
<body>

<div class="container">
    <div class="row main-form" style="margin-top: 75px;">
        <form class="" method="post" action="#">

            <h1>Registration</h1>

            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="name" id="name"
                               placeholder="Enter your First Name" required/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user fa" aria-hidden="true"></i>
                        </span>
                        <input type="text" class="form-control" name="name" id="name"
                               placeholder="Enter your Last Name" required/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-users fa" aria-hidden="true"></i>
                        </span>
                        <select class="form-control">
                            <option value="0" selected>- Select your course -</option>
                            <?= $database->createSelect('course') ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope fa" aria-hidden="true"></i>
                                </span>
                        <select class="form-control">
                            <option value="0" selected>- Select your class -</option>
                            <?= $database->createSelect('unit') ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                                </span>
                        <input type="password"
                               class="form-control"
                               name="password"
                               id="password"
                               placeholder="Enter your Password"
                               required
                        />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="cols-sm-10">
                    <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock fa-lg" aria-hidden="true"></i>
                                </span>
                        <input type="password"
                               class="form-control"
                               name="confirm"
                               id="confirm"
                               placeholder="Confirm your Password"
                               required
                        />
                    </div>
                </div>
            </div>

            <div class="form-group ">

                <button type="submit"
                        id="button"
                        class="btn btn-primary btn-lg btn-block login-button">
                    Register
                </button>

                <div style="margin-top: 5px;">
                    <a href="/" style="color: white;">Back</a>
                </div>

            </div>

        </form>
    </div>
</div>
</body>
</html>