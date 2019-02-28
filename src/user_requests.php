<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PlayGain Apex Tournament</title>
    <meta name="description"
          content="Grapple your teammates and join the battle for the prize pool of $1000. Challenge your skills and let the competitive nature go wild.">
    <meta name="keywords"
          content="Playgain, Apex Legends, Tournaments, Competitive">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="site.webmanifest">
    <link rel="icon" target="_blank" href="img/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" target="_blank" href="img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/favicon.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="css/main.css">

</head>

<body>

<div class="container-fluid mb-3">
    <div class="container pt-5">
        <?php
        $mysqli = new mysqli('localhost', 'u0663678_default', 'keANP!q7', 'u0663678_default');
        $mysqli->set_charset("utf8");
        $sql = 'SELECT * FROM `u0663678_default`.` user_requests`';

        $result = mysqli_query($mysqli, $sql) or die(mysqli_error());

        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $email = $row['email'];
            echo "<div class='row'><div class='col-2'><p class='h2'>" . $i . "</p></div><div class='col-5'><p class='h2'>" . $name . "</p></div><div class='col-5'><p class='h2'>" . $email . "</p></div></div>";
            $i++;
        }

        mysqli_close($mysqli);
        ?>
    </div>
</div>

<!--Scripts-->
<script src="js/main.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js"
        integrity="sha384-R5JkiUweZpJjELPWqttAYmYM1P3SNEJRM6ecTQF05pFFtxmCO+Y1CiUhvuDzgSVZ"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.carousel').carousel(
            {
                interval: false,
            }
        );
        $('.rules-next').click(function (e) {
            e.preventDefault();
            $('.carousel').carousel('next');
        });
        $('.rules-back').click(function (e) {
            e.preventDefault();
            $('.carousel').carousel('prev');
        });
        $('.rules-link').click(function (e) {
            $('.carousel').carousel(1);
        });
        $('.join-link').click(function (e) {
            $('.carousel').carousel(0);
        });
    });
    $(document).ready(function ($) {
        setTimeout(function () {
            $('.preloader-wrapper').fadeOut();
            $('body').removeClass('preloader-site');
        }, 1000);
    });

</script>
</body>

</html>
