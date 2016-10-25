<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>welcome | spade</title>
        <link rel="stylesheet" href="old_in.css" media="screen" title="in" charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="movement.js" charset="utf-8"></script>
    </head>
    <body style='background-color: black'>
    <div id='big' align='center'>
        <a href = 'notes.php'><div id = 'mains' class="notes"><p>NOTES</p></div></a>
        <a href = 'you.php'><div id = 'mains' class="chat"><p>YOU</p></div></a>
        <h1 id="name" style='color: white; font-family: sans-serif'><?php
        mysql_connect('localhost', 'emilio', 'k421k421');
        mysql_select_db('spade');
        session_start();
        $us = $_SESSION['username'];
        print $us;
        ?></h1>
        <a href="notifications.php"><div id = 'mains' class="notifications"><p>*</p></div></a>
        <a href = 'personal.php'><div id = 'mains' class="personal"><p>FEATURES</p></div></a>
        <a href = 'social.php'><div id = 'mains' class="jobs"><p>SOCIAL</p></div></a>
        <a href = 'log_out.php'><div id = 'mains' class="logout"><a href = 'log_out.php'><p id = 'log_text'>LOG OUT</p></a></div></a>
    </div>
    </body>
</html>
