<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>spade | home</title>
        <link rel="stylesheet" href="master.css" media="screen" title="master!" charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="movement.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="bodydiv">
            <?php
            $d = date('d') - 1;
            $date = date('D  M ' . $d . ' , Y');
            print "<p style = 'color: #d11141; font-family: \"bungee\"'>" . $date . "</p>";
            ?>
            <h1 id ='index_title'>Plumebin</h1>
            <hr>
            <a href="log_in.html"><div class="buttonone"><p>log in</p></div></a>
            <a href='about.html'><div class="buttontwo"><p>about</p></div></a>
            <a href='comboard.php'><div class="buttonthree"><p>community board</p></div></a>
        </div>
    </body>
</html>
