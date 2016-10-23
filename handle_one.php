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
            $blank[] = "BQ";
        }
        if ($value == '2') {
            $blank[] = "N#";
        }
        if ($value == '3') {
            $blank[] = "69";
        }
        if ($value == '4') {
            $blank[] = "B!";
        }
        if ($value == '5') {
            $blank[] = "NH";
        }
        if ($value == '6') {
            $blank[] = "CS";
        }
        if ($value == '7') {
            $blank[] = "IA";
        }
        if ($value == '8') {
            $blank[] = "AI";
        }
        if ($value == '9') {
            $blank[] = "BJ";
        }
        if ($value == '0') {
            $blank[] = "BF";
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
        print "<p style = 'color: red; font-family: sans-serif; font-size: 30px; text-align: center; margin-top: 260px;'>Either account does not exsist, or you entered something wrong</p>";
        print "<a style = 'text-decoration: none' href = 'index.html'><p style = 'color: red; text-align: center'>[ home ]</p></a>";
    }
?>
