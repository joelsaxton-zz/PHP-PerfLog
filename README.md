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



(The MIT License)

Copyright (c) 2010 LearnBoost <dev@learnboost.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the 'Software'), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
