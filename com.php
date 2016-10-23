<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>my community</title>
    </head>
    <body style = 'background-color: black'>
        <h1 style = 'color: white; font-family: sans-serif; text-align: center'>My community</h1>
        <br>
        <br>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $user = $_COOKIE['username'];
        $query = "SELECT * FROM $user";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                $subs = $row['subs'];
                $query_two = "SELECT * FROM $subs ORDER BY date_entered DESC";
                if ($ro = mysql_query($query_two)) {
                    while ($rowo = mysql_fetch_array($ro)) {
                        if (!empty($rowo['username'])) {
                            if (!empty($rowo['post'])) {
                                print "<div style = 'border: 2px solid gray; background-color: white; border-radius: 10px; margin: auto; width: 600px;'><p style = 'text-align: center'>" . $rowo['post'] . " - " . $rowo['username'] . " - " .$rowo['com_name'] . "</p></div><br><hr style = 'width: 100px'><br>";
                            }
                        }
                            if (!empty($rowo['posts'])) {
                                print "<div style = 'border: 2px solid gray; background-color: white; border-radius: 10px; margin: auto; width: 600px;'><p style = 'text-align: center'>" . $rowo['posts'] . " - " . $rowo['username'] . "</p></div><br><hr style = 'width: 100px'><br>";
                            }
                    }
                }
            }
        }
        ?>
    </body>
</html>
