<?php

/**
 * Project :            text_searching_algorithms.php
 * File:                result_multi_search.php
 * Description:         TEMPLATE : Multi-search results
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
        <script src="<?php echo get_jquery_url(); ?>"></script>
        <script src="<?php echo get_highcharts_url(); ?>"></script>
    </head>
    <body>
        <h1>Text searching algorithms - Execution times</h1>
        <p>
            <div id="time_chart" style="width:100%; height:400px;"></div>
        </p>
        <p><h3>Results :</p>
        <?php
            for($i = 0; $i < MULTI_SEARCH_NUMBER_ITERATION; ++$i) {
                echo 'Text ' . $i . ' : ' . was_found_n($needle, $results['count'][$i]);
            }
        ?>
        </p>
    </body>

<script type="text/javascript">
    $(function () {
        $('#time_chart').highcharts({
            title: {
                text: <?php echo '\'Searching for <strong><em>' . $needle . '</em></strong> in ' . $n . ' texts\''; ?>,
                x: -20 //center
            },
            subtitle: {
                text: 'Execution time / text length',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Text length (chars)'
                },
                categories: [<?php echo $results['categories']; ?>]
            },
            yAxis: {
                title: {
                    text: 'Time (sec)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: 'sec'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [<?php echo $results['series']; ?>]
        });
    });
</script>

</html>