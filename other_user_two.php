<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php
        print $_COOKIE['found_user'] . " | spade";
        ?></title>
    </head>
    <body>
        <?php
        print "<h2>" . $_COOKIE['found_user'] . "</h2>";
        ?>
        <?php
        //connect and stuff like that
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        //how to subscribe
        $already_subscribed = null;
        $user = $_COOKIE['username'];
        $found_user = $_COOKIE['found_user'];
        $queryx = "SELECT * FROM $user";
        if ($r = mysql_query($queryx)) {
            while ($row = mysql_fetch_array($r)) {
                //if the user is already subscribed
                if ($row['subs'] == $found_user) {
                    $already_subscribed == true;
                } else {
                    $already_subscribed == false;
                }
            }
        }
        if ($already_subscribed){
            print "<div style = 'background-color: #80e770; height: 30px; width: 100px; ' align = 'center'><p>subscribed!</p></div>";
        } elseif(!$already_subscribed) {
            print "<form action= 'other_user.php' method= 'post'>
                <input type='submit' name='confirm' value = 'subscribe'>
            </form>";
            if (isset($_POST['confirm'])) {
                    $user = $_COOKIE['username'];
                    $found_user = $_COOKIE['found_user'];
                    $already_subscribed == false;
                    $in_query = "INSERT INTO $user(subs) VALUES(
                        '{$found_user}'
                    )";
                    mysql_query($in_query);
                    if (mysql_query($in_query)) {
                        $already_subscribed = true;
                        print "<div style = 'background-color: #80e770; height: 30px; width: 100px; ' align = 'center'><p>subscribed!</p></div>";
                    }
                }
            }

        //posts and stuff like that
        print "<p>posts:</p>";
        $found_user = $_COOKIE['found_user'];
        $query = "SELECT * FROM $found_user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                print "<p><strong style = 'color: red'>" . $row['posts'] . "</strong></p>";
            }
        }
        mysql_close();
        ?>
    </body>
</html>
