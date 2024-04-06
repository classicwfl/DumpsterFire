<?php

require dirname(__FILE__) . '/includes/vars.php';
require dirname(__FILE__) . "/includes/connectdb.php";
require dirname(__FILE__) . "/includes/results.php";

$objDumpsterFires = new DumpsterFires($conn);

$theAqi = $objDumpsterFires->getLatestAqi();

//$theAqi = 160; //Use this to test.

//Heading language

$heading["best"] = [
    "The world is simply beautiful.", 
    "Taking a breath today is actually enjoyable.",
    "Is this what air was like before farts and pollution were invented?",
    "It's like getting a spa treatment for your lungs right now."
];

$heading["good"] = [
    "The air is cleaner than my glasses.",
    "Maybe just a bit too much pine-sol, but otherwise good.",
    "If Lacroix was air, it'd be this.",
    "It's pleasant; like good elevator music."
];

$heading["fair"] = [
    "At least it's not a snowglobe and ashtray combined.",
    "I mean.. It's not horrible.",
    "Not entirely unlike sorta clean air.",
    "Breathing now is like a gentle reminder from your lungs that they exist."
];

$heading["notgood"] = [
    "The air is about like Woodstock in the 70s, but you don't get high.",
    "Peter Piper picked a peck of plentiful particulates. Gross.",
    "No matter how bad your day is, it's not worth taking a deep breathe. Just seethe.",
    "The air quality is a real-life version of the 'Guess That Smell' game show."
];

$heading["bad"] = [
    "Dammit, was there a flashmob of gassy smokers?",
    "Did I just deep-throat Satan? This shit burns.",
    "Help! I'm being hotboxed by the cigar-smoking, poker-playing dogs!",
    "If the air had a slogan, it'd be 'Where breathing is an extreme sport'."
];

$heading["shit"] = [
    "Hold your breathe.. and, well, wear goggles. And hazmat suits.",
    "Imagine Satan sharting into your snorkel.",
    "I think at this point I'm sealing up the doors and windows.",
    "The air quality is so toxic that it's been nominated for 'Worst Supporting Atmosphere'."
];

$heading["fucked"] = [
    "This may as well be a dumpster fire.",
    "If we go outside we're gonna die.",
    "What the fuck are you doing here? GET TO THE NUCLEAR SHELTER.",
    "Even indoor plants would rather be in a vacuum right now."
];

switch ($theAqi) {
    case ($theAqi < 20):
        $quality = 'best';
        break;
    case ($theAqi < 50):
        $quality = 'good';
        break;
    case ($theAqi < 70):
        $quality = 'fair';
        break;
    case ($theAqi < 85):
        $quality = 'notgood';
        break;
    case ($theAqi < 100):
        $quality = 'bad';
        break;
    case ($theAqi < 150):
        $quality = 'shit';
        break;
    case ($theAqi >= 150):
        $quality = 'fucked';
        break;
}

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

        <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">

        <meta property="og:image" content="https://classicwfl.com/projects/dumpsterfire/assets/dumpsterfireposter.jpg">
        <meta property="og:image:width" content="1600">
        <meta property="og:image:height" content="900">

        <!-- If you're deploying this for youself, please remove this! --> 
        <link rel="stylesheet" href="https://use.typekit.net/<?php echo $_ENV['TYPEKIT']; ?>.css">

        <link rel="stylesheet" href="prod/css/styles.css">
        <script src="prod/js/js_main.js"></script>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $_ENV['ANALYTICSID']; ?>"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo $_ENV['ANALYTICSID']; ?>');
        </script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="df_artWrapper" aria-hidden="true" class="df_artWrapper df_artWrapper--<?php echo $quality ?>"></div>
        <div class="df_contentWrap"><h1><?php echo $heading[$quality][rand(0,3)]; ?></div>
        <div id="df_moteContainer" aria-hidden="true" class="df_moteContainer" data-stat="<?php echo $theAqi; ?>" data-quality="<?php echo $quality; ?>"></div>
        <div class="df_location">Currently Tracking: Gaza</div>
        <div class="df_about">
            <button aria-hidden="true">What is this?</button>
            <div class="df_aboutInner">
                <div class="df_aboutInner__text">
                    <p><strong>This is the Dumpster Fire project.</strong> This project tracks the air quality in various locations around the world that are experiencing disasters prone to cause air quality issues.</p>
                    <p>Sometimes we have a real problem with air quality: Wildfires, pollution, and more make the air unacceptable for many folks.. And in some cases, downright dangerous for even healthy people. If there ever is another moment like that again, I want to showcase it's impact in a meaningful way.</p>
                    <p><a href="https://github.com/classicwfl/DumpsterFire" target="_blank">Grab the source code here</a>.</p>
                </div>
            </div>
        </div>
    </body>
</html>