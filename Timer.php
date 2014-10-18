<?php
    class Timer {

        private static $PRECISION;
        private static $results = array();

        public static function start($label) 
        {
            self::$PRECISION = defined('PRECISION') ? PRECISION : 4;
            if (array_key_exists($label, self::$results)) {
                self::$results[$label]['runs']++;
                self::$results[$label]['start'] = microtime(true);
            } else {
                self::$results[$label] = array('runs' => 1, 'start' => microtime(true), 'max' => 0, 'min' => 0, 'total' => 0, 'average' => 0, 'results' => array());
            }
        }

        public static function stop($label) 
        {
            if (!array_key_exists($label, self::$results)) return false;

            $elapsed = microtime(true) - self::$results[$label]['start'];
            self::$results[$label]['results'][] = $elapsed;
            self::$results[$label]['total'] += $elapsed;
            self::$results[$label]['average'] = self::$results[$label]['total'] / self::$results[$label]['runs'];
            if (self::$results[$label]['max'] < $elapsed) {
                self::$results[$label]['max'] = $elapsed;
            }

            if (self::$results[$label]['min'] > $elapsed || self::$results[$label]['min'] == 0) {
                self::$results[$label]['min'] = $elapsed;
            }
        }

        public static function get($label, $metric='total')
        {
            if (array_key_exists($label, self::$results)) {
                $all = [
                    'runs'   => self::$results[$label]['runs'],
                    'max'     => round(self::$results[$label]['max'], self::$PRECISION),
                    'min'     => round(self::$results[$label]['min'], self::$PRECISION),
                    'total'   => round(self::$results[$label]['total'], self::$PRECISION),
                    'average' => round(self::$results[$label]['average'], self::$PRECISION),
                    'results' => self::$results[$label]['results']
                ];
                
                return $all[$metric];
            }
            return false;
        }

        public static function getLastTime($label)
        {
            $temp = self::get($label, 'results');

            if(!empty($temp)) {
                $value = round($temp[count($temp)-1], self::$PRECISION);
                return $value < .0001 ? .0001 : $value;
            }

            return false;
        }

        
        public static function checkIntegrity() 
        {
            $counter = 0;
            foreach(self::$results as $label=>$val) {
                if($val['total'] === 0) {
                    $counter++;
                    Log::write("$label was not stopped");
                }
            }
            if($counter === 0) {
                Log::write("All Timer labels were stopped :-)");
                return TRUE;
            }
            return FALSE;
        }
        
    }
