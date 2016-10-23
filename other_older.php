<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php
        print $_COOKIE['found_user'] . " | spade"
        ?></title>
    </head>
    <body>
        <h1>older posts:</h1>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $other_user = $_COOKIE['found_user'];
        $query = "SELECT * FROM $other_user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                print "<p>" . $row['posts'] . "</p>";
            }
        }
        ?>
    </body>
</html>
