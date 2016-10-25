<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>create chat | spade</title>
    </head>
    <body>
        <form action="new_chat.php" method="post">
            <input type="text" name="chat_req">
            <input type="submit" name="submit" value="find">
        </form>
        <?php
        session_start();
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $user = $_SESSION['username'];
        //finds name
        $query = "SELECT * FROM users";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (isset($_POST['submit'])) {
                    if ($row['username'] == $_POST['chat_req']) {
                        print "<form action = 'chat.php' method='post'><input type ='submit' name ='user_req' value = '" . $row['username'] . "'></form>";
                    } else {
                        //user doesn't exist
                    }
                }
            }
        }
        ?>
    </body>
</html>
