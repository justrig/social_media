<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>post</title>
        <link rel="stylesheet" href="master.css" media="screen" title="no title">
    </head>
    <body bgcolor='black'>
        <a href="welcome.php"><p style='color: white; position: absolute; cursor: pointer'>
            <–– back
        </p></a>
        <div align='center'>
        <h1 style='color: white; font-family: sans-serif'>POST</h1>
        <?php
        error_reporting(0);
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        include('function.php');
        create_user_form();
        handle_user_form();

        function c($color){
            $r1 = rand(1, 900);
            $r2 = rand(1, 500);
            $r1 = $r1 . px;
            $r2 = $r2 . px;
            if ($r1 > 500) {
                $class = 'ci';
            } else {
                $class = 'cd';
            }
            print "<div class = '$class' style='transition: .5s; height: 100px; width: 100px; background-color: $color; border-radius: 100px; position: absolute; opacity: .8; left: $r1; top: $r2;'></div>";
        }
        print "</div>";
            c('pink');
            c('red');
            c('blue');
            c('green');
            c('yellow');
            c('orange');
            c('white');
            c('pink');
            c('brown');
            c('brown');
        ?>
    <style media="screen">
    .ci {
      animation: blinker 100s linear infinite;
    }

    @keyframes blinker {
      50% { margin-top: 10px; }
    }

    .cd {
      animation: blinker 200s linear infinite;
    }

    @keyframes blinker {
      50% { margin-left: 1000px; }
    }
    </body>
</html>
