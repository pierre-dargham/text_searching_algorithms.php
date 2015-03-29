<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                result.php
 * Description:         TEMPLATE : Single-search results
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
        <p>
            <strong>
                Algorithm : <?php echo $_POST['algorithm']; ?><br />
                Execution time : <?php echo $time; ?> seconds<br />
                Results : <?php echo was_found($_POST['needle'], $results['positions']); ?><br />
            </strong>
        </p>
        <p>
            <?php echo $text; ?>
        </p>
    </body>
</html>