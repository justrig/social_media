<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>create new</title>
        <link rel="stylesheet" href="master.css" charset="utf-8">
    </head>
    <body>
    <a href="index.html"><p style = 'color: white; text-align: center; margin-top: 50px; position: absolute; top: -15px; left: 40px'> <–– back</p></a>
    <div id = 'new_case'>
        <h1 id = 'new_title'>Create new account</h1>
        <p class = 'new_text'>Username</p>
    <form action="create_new.php" method="post">
        <input type="text" name="username" class = 'new_input'>
        <p class = 'new_text'>password</p>
        <input type="password" name="password" class = 'new_input'>
        <p class = 'new_text'>confirm</p>
        <input type="password" name="confirm" class = 'new_input'>
        <input type="submit" name="submit" value="create account" class = 'submit'>
    </form>
    </div>
    <?php
    //encrypts password
    $string = $_POST['password'];
    $arr = str_split($string);
    $blank = array();
    foreach ($arr as $key => $value) {
        if ($value == 'a') {
            $blank[] = "!@";
        }
        if ($value == 'b') {
            $blank[] = "G%";
        }
        if ($value == 'c') {
            $blank[] = "XF";
        }
        if ($value == 'd') {
            $blank[] = "CN";
        }
        if ($value == 'e') {
            $blank[] = "EX";
        }
        if ($value == 'f') {
            $blank[] = "%T";
        }
        if ($value == 'g') {
            $blank[] = "ED";
        }
        if ($value == 'h') {
            $blank[] = "F$";
        }
        if ($value == 'i') {
            $blank[] = "4G";
        }
        if ($value == 'j') {
            $blank[] = "BQ";
        }
        if ($value == 'k') {
            $blank[] = "B@";
        }
        if ($value == 'l') {
            $blank[] = "@2";
        }
        if ($value == 'm') {
            $blank[] = "%5";
        }
        if ($value == 'n') {
            $blank[] = "8G";
        }
        if ($value == 'o') {
            $blank[] = "O0";
        }
        if ($value == 'p') {
            $blank[] = "CC";
        }
        if ($value == 'q') {
            $blank[] = "J%";
        }
        if ($value == 'r') {
            $blank[] = "5F";
        }
        if ($value == 's') {
            $blank[] = "1S";
        }
        if ($value == 't') {
            $blank[] = "1&";
        }
        if ($value == 'u') {
            $blank[] = "!M";
        }
        if ($value == 'v') {
            $blank[] = "TT";
        }
        if ($value == 'w') {
            $blank[] = "U8";
        }
        if ($value == 'x') {
            $blank[] = "C+";
        }
        if ($value == 'y') {
            $blank[] = "@$";
        }
        if ($value == 'z') {
            $blank[] = "@#";
        }
        if ($value == ' ') {
            $blank[] = "C&";
        }
    }
    $final = implode("", $blank);

    $go = true;
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['confirm'])) {
            print "<p style = 'color: red; text-align: center; margin-top: 40px;'>please fill out all sections</p>";
            $go = false;
        }
        $name = $_POST['username'];
        if ($_POST['password'] !== $_POST['confirm']) {
            print "<p style = 'color: red; text-align: center; margin-top: 40px;'>passwords do not match up, please try again</p>";
            $go = false;
        }
        if (preg_match('/\s/', $_POST['username'])){
            print "<p style = 'color: red; text-align: center; margin-top: 40px;'>username cannot have spaces in it, please try again</p>";
            $go = false;
        }
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        $query = 'CREATE TABLE users(
            username TEXT NOT NULL,
            password TEXT NOT NULL
        )';
        mysql_query($query);
        //checks if username exists
        $user_check = "SELECT * FROM users";
        if ($r = mysql_query($user_check)) {
            while ($row = mysql_fetch_array($r)) {
                if ($_POST['username'] == $row['username']) {
                    print "<p style = 'color: red; text-align: center; margin-top: 40px;'>username already exsists</p>";
                    $go = false;
                }
            }
        }
    }
    if (strlen($_POST['username']) > 11) {
        $go = false;
        print "<p style = 'color: red; text-align: center; margin-top: 40px;'>username is too long, try a new one</p>";
    }

    if (isset($_POST['submit'])) {
            if ($go) {
                $query_two = "INSERT INTO users(username, password) VALUES(
                    '{$_POST['username']}', '{$final}'
                )";
                mysql_query($query_two);
                $query_three = "CREATE TABLE $name(
                    date_entered DATETIME,
                    notes_title TEXT,
                    notes_body TEXT,
                    posts TEXT,
                    bio TEXT,
                    subscribed_to_you TEXT,
                    subs_count INT,
                    subs TEXT,
                    username TEXT,
                    notifications TEXT,
                    chats TEXT
                )";
                mysql_query($query_three);
                $query_128 = "INSERT INTO $name(username) VALUES(
                    '{$_POST['username']}'
                )";
                mysql_query($query_128);
                header("Location: index.html");
            }
        }
    ?>
    </body>
</html>
