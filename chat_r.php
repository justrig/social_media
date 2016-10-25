<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>chat</title>
        <?php
        session_start();
        if (isset($_POST['chat'])) {
            $_SESSION['chat_name'] = $_POST['chat'];
            header('Location: chat_r.php');
        }

        ?>
    </head>
    <body>
        <h1><?php
        $o = (explode("_", $_SESSION['chat_name']));
        foreach ($o as $key => $value) {
            if ($value != $_SESSION['username']) {
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
        $chat_name = $_SESSION['chat_name'];
        if (isset($_POST['send'])) {
            $insert_message = "INSERT INTO $chat_name(message, username, date_entered) VALUES(
                '{$_POST['message']}', '{$_SESSION['username']}', NOW()
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
