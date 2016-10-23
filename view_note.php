<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>view notes | spade</title>
        <link rel="stylesheet" href="notes.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body align='center'>
        <?php
        @mysql_connect('localhost', 'emilio', 'k421k421');
        @mysql_select_db('spade');
        $account = $_COOKIE['username'];
        $query = "SELECT * FROM $account";
        if ($r = mysql_query($query)) {
            while ($row = mysql_fetch_array($r)) {
                if (!empty($row['notes_title']) AND !empty($row['notes_body'])) {
                    print "<div style ='border: 2px red solid;
                                        border-radius: 10px;
                                        width: 900px;
                                        margin: auto;
                                        margin-top: 20px;
                                        '><h3 style = 'color: white;
                                                       font-family: sans-serif;'>{$row['notes_title']}</h3>
                                                       <p style = 'color: white; font-family: sans-serif;'>{$row['notes_body']}</p></div>";
                }
            }
        }
        mysql_close();
        ?>
    </body>
    </html>
    <?php
    include('footer.html');
    ?>
