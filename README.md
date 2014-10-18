PHP-PerfLog
===========

Simple performance logger for PHP

Please see Example.php for how to use it.

Simply wrap a function or sequence of code in the following way to test your performance. PHP Performance Logger
can track total times for functions which run repeatedly, average times, maximum times, and minimum times. 
This information is then written to a .csv file which you can specify.

Log::startProcess('functionOne');
functionOne();
Log::stopProcess('functionOne');

To see all total, max, min, and average times you can use this function:
Log::getAllResults('functionOne');

To be sure all timers stopped before the script terminates, use this function:
Log::checkIntegrity();

Refer to Example.php for more details.
