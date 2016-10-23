<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>find | spade</title>
        <link rel="stylesheet" href="social.css" charset="utf-8">
    </head>
    <body align='center'>
        <a href="search.php"><div id='search' style='height: 100px; width: 200px; background-color: white; margin: auto; border-radius: 10px;'><img style='height: 100px; width: 200px; background-color: white; margin: auto; border-radius: 10px;' src='search.png'></div></a>
        <p>––––– communities ––––</p>
        <div id = 'box'>
        <a href = "music.php"><div class="coms">
            <img src="Music.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='music'/>
        </div></a>
        <a href = "sports.php"><div class="coms">
            <img src="Sports.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='sports'/>
        </div></a>
        <a href = "politics.php"><div class="coms">
            <img src="Politics.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='politics'/>
        </div></a>
        <a href = "fashion.php"><div class="coms">
            <img src="Fashion.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='fashion'/>
        </div></a>
        <a href = "art.php"><div class="coms">
            <img src="art.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='art'/>
        </div></a>
        <a href = "food.php"><div class="coms">
            <img src="food.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='food'/>
        </div></a>
        <a href = "tech.php"><div class="coms">
            <img src="tech.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='tech'/>
        </div></a>
        <a href = "science.php"><div class="coms">
            <img src="science.png" style = "margin-bottom: 20px; border: 1px solid white; height: 100px; width 200px;" alt='science'/>
        </div></a>
    </div>
    <?php
    include('function.php');
    back('welcome.php');
    post();
    ?>
    </body>
</html>
