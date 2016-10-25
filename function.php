<?php
//this is for all the functions used in spade.
//include this file in others if you want to use the functions.

#string replaces
function replace($var, $word, $replacement){
    $var = str_replace($word, $replacement, $var);
};


#create subscribe
function com_subscribe($color, $community_name){
    print '<br><br>';
    $name = $community_name . ".php";
    print "<form action = '$name' method = 'post'>";
    print "<input type = 'submit' style = 'height: 40px; width: 150px; border-radius: 20px; background-color: $color; margin: auto; outline: none; color: white' name = 'subscribe' value = 'subscribe'></input></form>";
}

#subscribe for communities
function handle($community_name){
    mysql_connect('localhost', 'emilio', 'k421k421');
    mysql_select_db('spade');
    session_start();
    $user = $_SESSION['username'];
    $query23 = "SELECT * FROM $user";
    if ($r = mysql_query($query23)) {
        while ($row = mysql_fetch_array($r)) {
            if ($row['subs'] == $community_name) {
                //already subscribed
                $subed = true;
            }
        }

    if (isset($_POST['subscribe'])) {
            if (!$subed) {
                $query = "INSERT INTO $user(subs) VALUES(
                '{$community_name}'
                )";
                mysql_query($query);
                $query_two = "INSERT INTO $community_name(subs) VALUES(
                '{$user}'
                )";
                mysql_query($query_two);
                print "<p style = 'color: #86dd83'>subscribed!</p>";
            } else {
                print "<p style = 'color: red;'>already subscribed!</p>";
            }
        }
    }
}


//handles user link
function handle_found(){
    if (isset($_POST['submit'])) {
        $found_user = $_POST['submit'];
        $_SESSION['found_user'] = $found_user;
        header("Location: other_user.php");
    }
}

#create community
function create_community($community_name, $community_caption){
    print "<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
            <title>$community_name | spade</title>
        </head>
        <body align='center' style = 'background-color: black'>
            <p style = 'color: white; font-family: sans-serif; font-size: 20px;'>$community_caption</p>
            <hr style = 'width: 300px;'>
        </body>
    </html>
";
    $path = $community_name . ".php";
    mysql_connect('localhost', 'emilio', 'k421k421');
    mysql_select_db('spade');
    $c = $community_name;
    $com_print = "SELECT * FROM $c ORDER BY date_entered DESC";
    if ($r = mysql_query($com_print)) {
        while ($row = mysql_fetch_array($r)){
            if (!empty($row['post'])) {
                if (!empty($row['username'])) {
                    print "<form action = '$path' method = 'post'>";
                    print "<p style = 'color: white'>" . $row['post'] . " <strong style = 'color: yellow'>-</strong> <strong style = 'text-decoration: underline; color: #ff7676'>" . "<input type='hidden' name = 'found_user' value = '" . $row['username'] . "'><input type = 'submit' name = 'submit' style = 'color: white; background-color: transparent; border: 1px solid black; outline: none; text-decoration: underline' value = '" . $row['username'] .  "'>" . "</strong></p><hr style =  'width: 100px;'>";
                    print "</form>";
                }
            }
        }
    }
    com_subscribe('#86dd83', $community_name);
    handle($community_name);
    create_form($community_name);
    handle_form($community_name);
    handle_found();
}


#creates a form for posting onto communities
function create_form($com){
    $path = $com . ".php";
    print "<br><br><form action = '$path' method='post'><textarea name = 'post' style='color: white; border: 2px solid white; background-color: transparent; outline: none; text-align: center'></textarea><br><br><input type = 'submit' name = 'post_message' value = 'post' style='background-color: black; border: 2px solid red; outline: none; color: white'></form>";
}

#handles the form above and inserts info into db.^
function handle_form($com){
    if (isset($_POST['post_message'])) {
        if (!empty($_POST['post_message'])) {
            $query = "CREATE TABLE $com(
                date_entered DATETIME,
                post TEXT,
                username TEXT,
                subs TEXT,
                com_name TEXT
            )";
            mysql_query($query);
            $_POST['post'] = str_replace("'", "\'", $_POST['post']);
            $query = "INSERT INTO $com(date_entered, post, username, com_name) VALUES(
                NOW(), '{$_POST['post']}', '{$_SESSION['username']}', '{$com}'
            )";
            mysql_query($query);
            $user = $_SESSION['username'];
            $query_two = "INSERT INTO $user(date_entered, posts, username) VALUES(
                NOW(), '{$_POST['post']}', '{$_SESSION['username']}'
            )";
            mysql_query($query_two);
            header('Location: you.php');
        }
    }
}




#back to home button
function back($location){
    print "<a href = '$location'><p style = 'position: absolute; top: 20px; left: 30px; color: white; font-size: 13px;'><–– back</p></a>";
}


#creates a form for posting onto user account
function create_user_form(){
    $path = 'user_post.php';
    print "<br><br><form action = '$path' method='post'><textarea name = 'post' style='color: white; border: 2px solid white; background-color: transparent; outline: none; text-align: center'></textarea><br><br><input type = 'submit' name = 'post_message' value = 'post' style='background-color: black; border: 2px solid red; outline: none; color: white'></form>";
}

#handles the form above and inserts info into db.^
function handle_user_form(){
    if (isset($_POST['post_message'])) {
        if (!empty($_POST['post'])) {
            session_start();
            $user = $_SESSION['username'];
            $_POST['post'] = str_replace("'", "\'", $_POST['post']);
            $query_two = "INSERT INTO $user(date_entered, posts, username) VALUES(
                NOW(), '{$_POST['post']}', '{$user}'
            )";
            if (mysql_query($query_two)) {
                header('location: you.php');
            } else {
                print "<p style='color:white'>sorry bud, we messed up something in the code 8()</p>";
                print mysql_error();
            }
        }
    }
}

#makes the button to get to user_post.php
function post(){
    print "<a href ='user_post.php'><div id = 'post' style = 'color: black; opacity: .8; height: 50px; width: 50px; background-color: red; left: 910px; top: 12px; border-radius: 100px; border: 2px solid white; position: fixed; transition: .2s'></div></a>";
    print "<style>#post:hover{box-shadow: 2px 4px white}</style>";
}
?>
