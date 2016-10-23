<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>new note | spade</title>
        <link rel="stylesheet" href="notes.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body align='center'>
        <a href="notes.php"><p style = 'color: white; text-align: center; margin-top: 50px; position: absolute; top: -15px; left: 40px'> <–– back</p></a>
        <form action="new_note.php" method="post">
            <h4>Title</h4><input type="text" name="title" id = 'titleinput'>
            <h4>Note</h4><textarea name="body" rows="8" cols="40" id = 'bodyinput'></textarea><br><br>
            <input type="submit" name="submit" value="add" id='submit'>
        </form>
        <?php
            $no = false;
            if (isset($_POST['submit'])) {
                if (empty($_POST['title']) OR empty($_POST['body'])) {
                    print "<p style = 'color: red'>PLEASE FILL IN THE TITLE AND BODY TEXT</p>";
                }
                $len = strlen($_POST['body']);
                if ($len > 210) {
                    print "<p style = 'color: red'>NOTE IS TO LONG</p>";
                    $no = true;
                }
            }
            mysql_connect('localhost', 'emilio', 'k421k421');
            mysql_select_db('spade');
            if (isset($_POST['submit'])){
                if (!empty($_POST['title']) AND !empty($_POST['body'])) {
                    if ($no == false) {
                        //this is so you can use this: ' in your notes
                        $_POST['title'] = str_replace("'", "\'", $_POST['title']);
                        $_POST['body'] = str_replace("'", "\'", $_POST['body']);
                        $query_two = "INSERT INTO {$_COOKIE['username']} (notes_title, notes_body) VALUES(
                            '{$_POST['title']}', '{$_POST['body']}')";
                        header('Location: view_note.php');
                    }
                }
            }
            mysql_query($query_two);
            mysql_close();
        ?>
    </body>
    </html>
    <?php
    include('footer.html');
    ?>
