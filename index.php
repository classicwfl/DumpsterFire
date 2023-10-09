<?php

require dirname(__FILE__) . '/includes/vars.php';
require dirname(__FILE__) . "/includes/connectdb.php";
require dirname(__FILE__) . "/includes/results.php";

$objDumpsterFires = new DumpsterFires($conn);

$theAqi = $objDumpsterFires->getLatestAqi();

//$theAqi = 130; //Use this to test.

//Heading language

$heading["best"] = [
    "The world is simply beautiful.", 
    "Taking a breath today is actually enjoyable.",
    "Is this what the air was like before farts and pollution were invented?"
];

$heading["good"] = [
    "It's cleaner than my glasses outside.",
    "Maybe just a bit too much pine-sol, but otherwise good.",
    "Not quite as good as a new Glade plug-in, but good enough."
];

$heading["fair"] = [
    "At least it's not a snowglobe and ashtray combined.",
    "I mean.. It's not horrible.",
    "Not entirely unlike sorta clean air."
];

$heading["notgood"] = [
    "The air is about like Woodstock in the 70s, but you don't get high.",
    "Peter Piper picked a peck of plentiful particulates. Gross.",
    "No matter how bad your day is, it's not worth taking a deep breathe. Just seethe."
];

$heading["bad"] = [
    "Dammit, was there a flashmob of gassy smokers?",
    "Did I just deep-throat Satan? This shit burns.",
    "Help! I'm being hotboxed by the cigar-smoking, poker-playing dogs!"
];

$heading["shit"] = [
    "Hold your breathe.. and, well, wear goggles. And hazmat suits.",
    "I imagine the neighbor's kid made a giant real volcano for a science fair project.",
    "I think at this point I'm sealing up the doors and windows."
];

$heading["fucked"] = [
    "This is literally a dumpster fire.",
    "If we go outside we're gonna die.",
    "What the fuck are you doing here? GET TO THE NUCLEAR SHELTER."
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

        <!-- If you're deploying this for youself, please remove this! --> 
        <link rel="stylesheet" href="https://use.typekit.net/cld2uzu.css">

        <link rel="stylesheet" href="prod/css/styles.css">
        <script src="prod/js/js_main.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="df_artWrapper" aria-hidden="true" class="df_artWrapper df_artWrapper--<?php echo $quality ?>"></div>
        <div class="df_contentWrap"><h1><?php echo $heading[$quality][rand(0,2)]; ?></div>
        <div id="df_moteContainer" aria-hidden="true" class="df_moteContainer" data-stat="<?php echo $theAqi; ?>" data-quality="<?php echo $quality; ?>"></div>
        <div class="df_about">
            <button>What is this?</button>
            <div class="df_aboutInner">
                <div class="df_aboutInner__text">
                    <p><strong>This is the Dumpster Fire project.</strong> I created this to showcase the air quality in a more visual and (in many cases) gallows-humor fashion.</p>
                    <p>We've got a real problem with air quality Wildfires, pollution, and more make the air unacceptable for many folks.. And in some cases, downright dangerous for even healthy people.</p>
                    <p><a href="https://github.com/classicwfl/DumpsterFire" target="_blank">Grab the source code here</a>.</p>
                </div>
            </div>
        </div>
    </body>
</html>