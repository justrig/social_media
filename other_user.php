<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php session_start(); print $_SESSION['found_user'] . " | spade";?></title>
        <link rel="stylesheet" href="master.css" media="screen" title="no title">
    </head>
    <body>
        <a href = 'search.php'><p style = 'color: white; position: absolute; cursor: pointer'>
            <–– back
        </p></a>
        <?php
        error_reporting(0);
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $other_user = $_SESSION['found_user'];
        print "<div id ='contain_profile'>";
        print "<div id = 'block'></div>";
        $ntwelve = 0;
        $query = "SELECT * FROM $other_user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                $ntwelve +=$row['subs_count'];
            }
        }
        print strtoupper("<h1 style = 'display: inline; font-family: helvetica; color: white; margin-left: 100px'>" . $_SESSION['found_user'] . "</h1>");
        print "<p style='color: white; font-family: sans-serif; display: inline; margin-left: 20px;'>SUBS: " . $ntwelve . "</p>";
        print "<form action = 'other_user.php' method='post'>";
        $other_user = $_SESSION['found_user'];
        $user = $_SESSION['username'];
        $query23 = "SELECT * FROM $user";
        if ($r = mysql_query($query23)) {
            while ($row = mysql_fetch_array($r)) {
                if ($row['subs'] == $other_user) {
                    //already subscribed
                    $subed = true;
                }
            }
            if ($subed) {
                print "<input type = 'submit' name = 'subscribe' value = 'UNSUBSCRIBE' style='display:inline; margin-left: 100px; border: 2px solid black; background-color: red; color: white; font-family: helvetica; outline: none; margin-top: 10px;'>";
            } else {
                print "<input type = 'submit' name = 'subscribe' value = 'SUBSCRIBE' style='display:inline; margin-left: 100px; border: 2px solid black; background-color: green; color: white; font-family: helvetica; outline: none; margin-top: 10px;'>";
            }
        if (isset($_POST['subscribe'])) {
                if (!$subed) {
                    $query = "INSERT INTO $user(subs, date_entered) VALUES(
                    '{$other_user}', NOW()
                    )";
                    mysql_query($query);
                    $sub_message = $user . " subscribed to you";
                    $query_two = "INSERT INTO $other_user(subscribed_to_you, subs_count, date_entered, notifications) VALUES(
                    '{$user}', '1', NOW(), '{$sub_message}'
                    )";
                    mysql_query($query_two);
                    header('Location: other_user.php');
                } else {
                    print "<input type = 'submit' name = 'subscribe' value = 'SUBSCRIBE' style='display:inline; margin-left: 100px; border: 2px solid black; background-color: green; color: white; font-family: helvetica; outline: none; margin-top: 10px;'>";
                    $user = $_SESSION['username'];
                    $other_user = $_SESSION['found_user'];
                    $delete_query = "DELETE FROM $user WHERE subs='$other_user'";
                    mysql_query($delete_query);

                    $qw = "DELETE FROM $other_user WHERE subscribed_to_you='$user'";
                    mysql_query($qw);

                    $qt = "DELETE FROM $other_user WHERE notifications='$user'";
                    mysql_query($qt);

                    $subed = false;
                    header('Location: other_user.php');
                }
            }
        }
        print "</form>";
        print "<br>";
        print "<hr style = 'width: 600px; margin-left: 100px; margin-top: -10px;'>";
        $other_user = $_COOKIE['found_user'];
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $name = $_COOKIE['found_user'];
        $query = "SELECT * FROM $name ORDER BY date_entered DESC";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (empty($row['subs'])) {
                    $subs = 0;
                } else {
                   print "<p style = 'color: white; margin-top: 20px; margin-left: 100px;'>" . $row['subs_count'] . "</p>";
                }
                if (empty($row['bio'])) {
                    $bio = 'spade user';
                } else {
                    $bio = $row['bio'];
                }
                if (empty($row['posts'])) {
                    $posts = 'this user has no posts';
                } else {
                    //prints the users posts
                    print '<div style="margin-left: 100px; transition: .2s; cursor: default; width: 200px;" id="post_box"><p style = "background-color: #5184f0;text-align: center"><strong style = "text-decoration: underline;"><b></b></strong>' . $row['posts'] . "</p></div>";
                }
            }
        }
        print "<div id = 'block'></div>";
        print "</div>";

        ?>
    </body>
</html>
