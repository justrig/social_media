<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>create chat | spade</title>
    </head>
    <body bgcolor='black'>
        <a href = 'chat.php'><p style = 'color: white; position: absolute;'>
            <–– back
        </p></a>
        <div style="width: 600px; height: 700px; margin: auto;" align='center'>
        <form action="new_chat.php" method="post">
            <h1 style='color: white; font-family: sans-serif'>NEW DM</h1>
            <input type="text" name="chat_req" style = 'background-color: black; color: red; border: 2px solid white; outline: none; margin-top: 110px; height: 40px; width: 200px; font-size: 30px;'>
            <br>
            <br>
            <input type="submit" name="submit" value="FIND" style = 'background-color: transparent; color: red; border: 1px solid black; outline: none; font-size: 26px;'>
            <hr style='width: 150px;'>
            <br>
            <br>
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
                        print "<form action = 'chat.php' method='post'><input style = 'color: red; background-color: black; border: 2px solid black; font-size: 25px; text-decoration: underline' type ='submit' name ='user_req' value = '" . $row['username'] . "'></form>";
                    } else {
                        //user doesn't exist
                    }
                }
            }
        }
        ?>
    </body>
</html>
