<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>walk | spade</title>
        <link rel="stylesheet" href="personal.css" media="screen" title="no title" charset="utf-8">
        <style>
        input:hover{
            border: 2px solid white;
            color: white;
        }
        </style>
    </head>
    <body align = 'center'>
        <h3 style = 'color: white'>How far are you walking?</h3>"
        <form action="walk.php" method="post">
            <input type="text" name="miles" style = 'border: 2px solid white; background-color: black; margin: auto; outline: none; color: white'><br><br><br>
            <input type="submit" name="submit" value="calulate" style = 'border: 2px solid #90ea75; background-color: black; color: #90ea75; outline: none'>
        </form>
        <br>
        <br>
        <br>
        <?php
            if (isset($_POST['submit'])) {
                if (!is_numeric($_POST['miles'])) {
                    print "<p style = 'color: red'>Print the number of miles you will walk today</p>";
                } else {
                    error_reporting(0);
                    $one_mile_time = 20;
                    if ($_POST['miles'] > 1) {
                        $total = $_POST['miles'] * $one_mile_time;
                        for ($n=0; $n < $_POST['miles']; $n++) {
                            $total++;
                        }
                        if ($_POST['miles'] > 100) {
                            print "<p style = 'color: red'>Maybe you should take a car</p>";
                        }
                        if ($_POST['miles'] > 3) {
                            $total_hours = floor(($total / 60));//total in hours
                            $total_minutes = $total % 60; //remander in minutes
                            $total = "<p style = 'color: #90ea75'>It should take about " . $total_hours . " hours, and " . $total_minutes . " minutes</p>";
                        }
                    } else {
                        $total = $_POST['miles'] * $one_mile_time;
                    }
                    if ($_POST['miles'] > 3) {
                        print $total;
                    } else {
                        print "<p style = 'color: #90ea75'>It should be around " . $total . " minutes</p>";
                    }
                }
            }
        ?>
    </body>
    </html>
<?php
    include('footer.html');
?>
