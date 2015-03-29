<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                search.php
 * Description:         TEMPLATE : Search form
 * Author:              Pierre DARGHAM
 * Project URI:         https://github.com/pierre-dargham/text_searching_algorithms.php
 *
*/

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo STYLESHEET_URL; ?>">
        <title>Text searching algorithms</title>
    </head>

    <body>
        <h1>Text searching algorithms</h1>

        <form name="search" action="./index.php" method="POST">

        <p>
        <label for='algorithm'>Algorithm : </label>
        <select name="algorithm">
            <?php

            foreach(registred_algorithms() as $name => $func) {
                echo '<option value="'.$name.'">'.$name.'</option>';
            }

            ?>
        </select>
        </p>

        <p>
            <label for='needle'>Search for : </label><br />
            <input type="text" name="needle" />
        </p>

        <p>
            <label for='source'>In text : </label><br>
            <input type="radio" name="source" value="lorem_ipsum" />Generated lorem ipsum<br />
            <input type="radio" name="source" value="user_text" />Custom text :<br />
            <textarea name="user_text"></textarea>
        </p>

        <p>
        <input type="submit" name="search" value="Search" />
        </p>

        <p>
            <a href="?mode=multisearch">Multi-search and time comparison</a>
        </p>

        </form>

    </body>
</html>