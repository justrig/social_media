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
    <body bgcolor = 'black'>
        <a href="chat.php"><p style='color: white; position: absolute; cursor: pointer'>
            <–– back
        </p></a>
        <div style='height: 500px; width: 600px; margin: auto;'>
        <h1 style = 'font-family: sans-serif; color: white;'><?php
        $o = (explode("_", $_SESSION['chat_name']));
        foreach ($o as $key => $value) {
            if ($value != $_SESSION['username']) {
                print strtoupper($value);
            }
        }


        ?></h1>
        <form action="chat_r.php" method="post">
            <input type="text" name="message" style='border: 2px solid white; background-color: black; outline: none; color: white;'>
            <input type="submit" name="send" value="send" style = 'background-color: blue; border: 2px solid blue; color: white; border-radius: 10px;'>
        </form>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $chat_name = $_SESSION['chat_name'];
        if (isset($_POST['send'])) {
            if (!empty($_POST['message'])) {
                $_POST['message'] = str_replace("'", "\'", $_POST['message']);
                $insert_message = "INSERT INTO $chat_name(message, username, date_entered) VALUES(
                    '{$_POST['message']}', '{$_SESSION['username']}', NOW()
                )";
                mysql_query($insert_message);
            }
        }

        //prints out messages form database
        $get_messages = "SELECT * FROM $chat_name ORDER BY date_entered DESC";
        if ($r = mysql_query($get_messages)) {
            while ($row = mysql_fetch_array($r)) {
                print "<p style = 'color: white; font-family: sans-serif;'>" . $row['message'] . " - <strong style='color: red; text-decoration: underline;'>" . $row['username'] . "</strong></p>";
            }
        }

        ?>
        </div>
    </body>
</html>
