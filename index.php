<?php

require dirname(__FILE__) . '/includes/vars.php';
require dirname(__FILE__) . "/includes/connectdb.php";
require dirname(__FILE__) . "/includes/results.php";

$objDumpsterFires = new DumpsterFires($conn);

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>How much of a dumpster fire is the air quality?</title>
        <meta name="description" content="A unique air quality index meter: How much of a dumpster fire is the air quality today?">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="prod/css/styles.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="df_stat"><?php echo $objDumpsterFires->getLatestAqi(); ?></div>
        <div class="df_artWrapper df_artWrapper--fucked"></div>

        <script src="prod/js/js_main.js" async defer></script>
    </body>
</html>