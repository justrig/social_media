<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>your account</title>
        <link rel="stylesheet" href="master.css" media="screen" title="no title">
    </head>
    <body style = 'background-color: black'>
        <a href="welcome.php"><p style='color: white; position: absolute; cursor: pointer'>
            <–– back
        </p></a>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        session_start();
        $user = $_SESSION['username'];
        $sql = "SELECT * FROM $user";
        if ($r = mysql_query($sql)) {
            while ($row = mysql_fetch_array($r)) {
                $u = $row['username'];
            }
        }
        $ntwelve = 0;
        $query = "SELECT * FROM $u";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                $ntwelve +=$row['subs_count'];
            }
        }
        print "<div id ='contain_profile'>";
        include('function.php');
        post();
        print "<div id = 'block'></div>";
        print strtoupper("<h1 style = 'display: inline; font-family: helvetica; color: white; margin-left: 100px'>" . $_SESSION['username'] . "</h1>");
        print "<p style='color: white; font-family: sans-serif; display: inline; margin-left: 20px;'>SUBS: " . $ntwelve . "</p>";
        print "<hr style = 'width: 600px; margin-left: 100px;'>";
        error_reporting(0);
        $query = "SELECT * FROM $user ORDER BY date_entered DESC";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                //prints the users posts
                print '<div style="margin-left: 100px; transition: .2s; cursor: default; width: 200px;" id="post_box"><p style = "background-color: #5184f0;text-align: center"><strong style = "text-decoration: underline;"><b></b></strong>' . $row['posts'] . "</p></div>";
            }
        }
        print "<div id = 'block'></div>";
        print "</div>";
        ?>
    </body>
</html>
