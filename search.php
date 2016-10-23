<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>search | spade</title>
    </head>
    <body align = 'center' style = 'background-color: black;'>
        <a href = 'find.php'><p style = 'color: white; position: absolute;'>
            <–– back
        </p></a>
    <div style='margin: auto; width: 500px;'>
        <form action="search.php" method="post">
            <p style = 'color: white;'>search for users:
                <br>
                <br>
                <input type="text" name="user" style = 'background-color: black; color: red; border: 2px solid white; outline: none'>
                <br>
                <br>
                <input type="submit" name="submit" value="search" style = 'background-color: transparent; color: red; border: 1px solid black; outline: none;'>
            </p>
        </form>
        <br>
        <br>
        <hr style = 'width: 200px;'>
        <br>
    </div>
    <style media="screen">
        a{
            color: red;
        }
    </style>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        if (isset($_POST['submit'])) {
            $user_check = "SELECT * FROM users";
            if ($r = mysql_query($user_check)) {
                while ($row = mysql_fetch_array($r)) {
                    if ($_POST['user'] == $row['username']) {
                        $found_user = $row['username'];
                        session_start();
                        $_SESSION['found_user'] = $found_user;
                        print "<a href = 'other_user.php'><p>{$row['username']}</p></a>";
                    }
                }
            }
        }
        ?>
    </body>
</html>
