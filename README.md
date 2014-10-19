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



Copyright (C) 2014  Joel Saxton

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
