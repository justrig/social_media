<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>social | spade</title>
        <link rel="stylesheet" href="social.css" charset="utf-8">
    </head>
    <body>
        <a href="find.php"><div class = 'soc_div'><p id = 'social_text'>find</p></div>
        <a href="com.php"><div class = 'soc_div'><p id = 'social_text'>my community</p></div>
        <a href="chat.php"><div class = 'soc_div'><p id = 'social_text'>chat</p></div>
        <a href="friends.php"><div class = 'soc_div'><p id = 'social_text'>friends</p></div>
        <?php
        include('function.php');
        post();
        ?>
    </body>
</html>
