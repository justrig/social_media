<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>chat</title>
        <?php
        if (isset($_POST['chat'])) {
            setcookie('chat_name', $_POST['chat']);
            header('Location: chat_r.php');
        }

        ?>
    </head>
    <body>
        <h1><?php
        $o = (explode("_", $_COOKIE['chat_name']));
        foreach ($o as $key => $value) {
            if ($value != $_COOKIE['username']) {
                print $value;
            }
        }


        ?></h1>
        <form action="chat_r.php" method="post">
            <input type="text" name="message">
            <input type="submit" name="send" value="send">
        </form>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $chat_name = $_COOKIE['chat_name'];
        if (isset($_POST['send'])) {
            $insert_message = "INSERT INTO $chat_name(message, username, date_entered) VALUES(
                '{$_POST['message']}', '{$_COOKIE['username']}', NOW()
            )";
            mysql_query($insert_message);
        }

        //prints out messages form database
        $get_messages = "SELECT * FROM $chat_name ORDER BY date_entered DESC";
        if ($r = mysql_query($get_messages)) {
            while ($row = mysql_fetch_array($r)) {
                print "<p>" . $row['message'] . " - " . $row['username'] . "</p>";
            }
        }

        ?>
    </body>
</html>
