<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>chats</title>
    </head>
    <body bgcolor='black'>
        <a href="social.php"><p style='color: white; position: absolute; cursor: pointer'>
            <–– back
        </p></a>
        <div class="contain_chats" style='width: 550px; margin: auto;'>
        <p><a href = 'new_chat.php' style='font-size: 40px; color: white; text-decoration: none; display: inline; float: right; margin-top: -10px;'> + </a></p>
        <?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        session_start();
        $user = $_SESSION['username'];

        //prints out chats
        print "<h2 style='color: white; font-family: sans-serif; display: inline;'>THE DM's</h2>";
        print "<hr>";
        $query = "SELECT * FROM $user ORDER BY date_entered DESC";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (!empty($row['chats'])) {
                    //prints links to chats
                    $o = (explode("_", $row['chats']));
                    foreach ($o as $key => $value) {
                        if ($value != $_SESSION['username']) {
                            print "<form action ='chat_r.php' method = 'post'><input type = 'submit' style=' background-color: transparent; border: 1px solid black; color: white; font-family: sans-serif; font-size: 20px; cursor: pointer' value ='" . $value . "'>";
                            print "<input type='hidden' name = 'chat' value = '" . $row['chats'] . "'></form><br>";
                        }
                    }
                } elseif($row['chats'] == 'NULL'){
                    print "<p>you have no DM's!<a href = 'new_chat.php'>" . " " . "start one.</a></p>";
                }
            }
        }
        //creates the chat
        if (isset($_POST['user_req'])) {
            $go = true;

            //defines some variables
            $user_req = $_POST['user_req'];
            $user = $_SESSION['username'];
            $chat_name = $user . "_" . $user_req;

            //checks if chat already exists
            $check = "SELECT * FROM $user";
            if ($r = mysql_query($check)) {
                while ($row = mysql_fetch_array($r)) {
                    if ($chat_name == $row['chats']) {
                        $go = false;
                    }
                }
            }

            if ($go) {
                //gives other person chat.
                $alert_other = "INSERT INTO $user_req(chats, date_entered) VALUES(
                    '{$chat_name}', NOW()
                )";
                mysql_query($alert_other);

                //gives user chat
                $start_user = "INSERT INTO $user(chats, date_entered) VALUES(
                    '{$chat_name}', NOW()
                )";
                mysql_query($start_user);

                //creates chat tables
                $create = "CREATE TABLE $chat_name(
                    message TEXT NOT NULL,
                    username TEXT NOT NULL,
                    date_entered DATETIME NOT NULL
                )";
                mysql_query($create);

                //refreshes the page to update new tables
                header('Location: chat.php');
            }
        }


        ?>
    </div>
    </body>
</html>
