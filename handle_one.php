<?php
print "<style>body{background-color:black;}</style>";
$wrong = false;
mysql_connect('localhost', 'emilio', 'k421k421');
mysql_select_db('spade');

if (isset($_POST['submit'])) {

    //decrypter
    $dstring = $_POST['password'];
    $darr = str_split($dstring, 1);
    $blank = array();
    foreach ($darr as $key => $value) {
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
        if ($value == '1') {
            $blank[] = "!!";
        }
        if ($value == '2') {
            $blank[] = "@@";
        }
        if ($value == '3') {
            $blank[] = "PJ";
        }
        if ($value == '4') {
            $blank[] = "JD";
        }
        if ($value == '5') {
            $blank[] = "IN";
        }
        if ($value == '6') {
            $blank[] = "@4";
        }
        if ($value == '7') {
            $blank[] = "C$";
        }
        if ($value == '8') {
            $blank[] = "JJ";
        }
        if ($value == '9') {
            $blank[] = "NK";
        }
        if ($value == '0') {
            $blank[] = "##";
        }
    }
    $check = implode("", $blank);
    $query = "SELECT * FROM users";
    mysql_query($query);
    if (empty($_POST['username']) OR empty($_POST['password']))
        $wrong = true;
    }
    $qq = "SELECT * FROM users";
    if ($r = mysql_query($qq)) {
        while ($row = mysql_fetch_array($r)) {
            if ($row['username'] == $_POST['username']) {
                if ($row['password'] == $check) {
                    session_start();
                    $_SESSION['username'] = $_POST['username'];
                    header('Location: welcome.php');
                } else {
                    $wrong = true;
                }
            } else {
                $wrong = true;
            }
        }
    } else {
        $wrong = true;
    }

    if ($wrong) {
        print "<p style = 'color: red; font-family: sans-serif; font-size: 30px; text-align: center; margin-top: 260px;'>You messed up doing something, let me try to help. uhhhh..... try again</p>";
        print "<a style = 'text-decoration: none' href = 'index.php'><p style = 'color: red; text-align: center'>[ try again ]</p></a>";
    }
?>
