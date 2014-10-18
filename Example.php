<?php

define('LOG_FILE', 'log.csv'); // specify the location of your log file
define('PRECISION', 4); // Number of decimal places

// Include Log class
require_once('Log.php');



// Get stats for a function or sequence of code by wrapping it as follows
Log::startProcess('functionTwo');
functionTwo();
Log::stopProcess('functionTwo');


function functionOne()
{
    echo "starting function one\n";
    $time = mt_rand(0,2);
    sleep($time);
    echo "ending function one\n";
}

function functionTwo()
{
    $loops = 5;
    echo "starting function two\n";
    for ($x = 0; $x < $loops ; $x++){
        Log::startProcess('functionOne');
        functionOne();
        Log::stopProcess('functionOne');
    }
    echo "ending function two\n";
}


// To see all results for both functions:
Log::getAllResults('functionOne');
Log::getAllResults('functionTwo');

// To make sure all timers stopped properly
Log::checkIntegrity();

?>
