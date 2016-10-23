<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php
        print $_COOKIE['found_user'] . " | spade";
        ?></title>
    </head>
    <body>
        <form action="other_user.php" method="post">
            <input type="checkbox" name="subed">
            <input type="submit" name="save" value="save">
        </form>
        <?php
        error_reporting(0);
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $go = true;
        $found_user = $_COOKIE['found_user'];
        $query = "SELECT * FROM $found_user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                $num = $row['subs_count'] + 1;
                if ($row['subs'] == $found_user) {
                    $go = false;
                    print "<p>already subscribed to this user</p>";
                }
            }
        }

        if (isset($_POST['save'])) {
            if (isset($_POST['subed'])) {
                    if ($go == true) {
                        $user = $_COOKIE['username'];
                        $query = "INSERT INTO $user(subs) VALUES(
                            '{$_COOKIE['found_user']}'
                        )";
                        mysql_query($query);
                        if (mysql_query($query)) {
                            $subed = $_COOKIE['found_user'];
                            $query_two = "INSERT INTO $subed(subs_count) VALUES(
                                '{$num}'
                            )";
                            mysql_query($query_two);
                            print "subscribed!";
                    }
                }
            }
        }
        $other_user = $_COOKIE['found_user'];
        $query = "SELECT * FROM $other_user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (empty($row['subs_count'])) {
                    $subs_count = 0;
                } else {
                    $subs = $row['subs_count'];
                }
                if (empty($row['bio'])) {
                    $bio = 'spade user';
                } else {
                    $bio = $row['bio'];
                }
                if (empty($row['posts'])) {
                    $posts = 'this user has no recent posts';
                } else {
                    $posts = $row['posts'];
                }
            }
        }
        print '<p style = "border: 2px solid red; width: 200px;">subs: ' . $subs . "</p>";
        print '<p style = "color: red;"; width: 200px;"><strong style = "color: black">bio:</strong> ' . $bio . "</p>";
        print '<p style = "background-color: red; width: 200px;"><strong style = "text-decoration: underline"><b>most recent post: </b></strong>' . $posts . "</p>";
        print "<a href = 'other_older.php'>older posts</p>";
        ?>
    </body>
</html>
