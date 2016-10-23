<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Notifications | Spade</title>
        <link rel="stylesheet" href="master.css" media="screen" title="no title">
    </head>
    <body style="background-color: black;">
        <a href="welcome.php"><p style='color: white; position: absolute; margin-top: 10px; margin-left: 10px; cursor: pointer'>
            <–– back
        </p></a>
        <div class="center_contain">
        <h1 style = 'color: white; font-family: helvetica; text-decoration: underline; font-size: 33px;'>NOTIFICATIONS</h1>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $user = $_COOKIE['username'];
        $query = "SELECT * FROM $user ORDER BY date_entered DESC";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (!empty($row['notifications'])) {
                    print "<div id = 'notification'><p id='not_text' style='color: #8498ff; font-size: 17px;'>" . $row['notifications'] . "</p>";
                    print "<hr style = 'width: 200px; margin-left: 0px;'></div>";
                }
            }
        }
        ?>
        </div>
    </body>
</html>
