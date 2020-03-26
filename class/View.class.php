<?php

require_once ('Database.class.php');

class View extends Database
{
    public function headerTilePage(){
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Classroom Reservations</title>

            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="js/external/jquery/jquery.js"></script>
        </head>
        <body>
        <?php
    }

    public function footerTilePage(){
        ?>
        <script src="/js/main.js"></script>
        </body>
        </html>
        <?php
    }

    public function tableReservationsPage()
    {
        $this->headerTilePage();
        ?>
        <div class="container container-fluid">

            <h3 style="text-align: center; margin-top: 25px;">Classroom Reservations</h3>

            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <select id="building-name" class="form-control">
                        <?= $this->createSelect('building') ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <select id="class-room-number" class="form-control">
                        <!-- select options class room number -->
                    </select>
                </div>
                <div class="col-lg-4"></div>
            </div>

            <div class="row">
                <div class="col-lg-10">

                    <h4>Today: <?= Date('d-m-Y'); ?></h4>
                </div>
                <div class="col-lg-2">
                    <?php
                    echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
                    ?>
                    <a href="models/logout.php">Logout</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="table"></div>
                </div>
            </div>
        </div>
        <?php
        $this->footerTilePage();
    }
}