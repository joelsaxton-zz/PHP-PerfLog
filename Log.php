<?php
/**
 * Logging class
 */
require_once('Timer.php');

class Log {
    public static function write($message, $logFile=LOG_FILE)
    {
        // write to the file
        if (!file_exists($logFile)) {
            //Initialize fields for new log csv file
            $fp = fopen($logFile, 'w');
        } else {
            $fp = fopen($logFile, 'a');
            }
        $output = array(date("Y-m-d G:i:s T"), $message);
        fputcsv($fp, $output);
        fclose($fp);        
    }

    public static function startProcess($processName)
    {
        Timer::start($processName);
        $message = "Started $processName";
        self::write($message);
    }

    public static function stopProcess($processName) 
    {
        Timer::stop($processName);
        $message = "Completed $processName. Duration: " . Timer::getLastTime($processName) . " seconds";
        self::write($message);
    }
    
    public static function checkIntegrity()
    {
        return Timer::checkIntegrity();
    }
    
    public static function getResult($label, $metric='total')
    {
        self::write("The $metric time for $label was " . Timer::get($label, $metric));
    }
    
    public static function getAllResults($label)
    {
        $all = ['max', 'min', 'total', 'average',];
        self::write("There were " . Timer::get($label, 'runs') . " total runs for $label" );
        foreach($all as $metric){
        self::write("The $metric time for $label was " . Timer::get($label, $metric) . " seconds");
        }
    }

}