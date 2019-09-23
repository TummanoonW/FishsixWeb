<?php
    //date_default_timezone_set(App::$TIMEZONE);

    class CustomDate{

        private static function getFormat(){
            return 'Y-m-d H:i:s';
        }

        private static function getFormatISO8601(){
            return 'Y-m-d\TH:i:s.u';
        }

        public static function getDateNow(){
            return new DateTime();
        }

        public static function getDate($datestr){
            return new DateTime($datestr);
        }

        public static function timeStamp(){
            $dateTime = self::getDateNow();
            return $dateTime->format('Y_m_d_H_i_s');
        }

        public static function parseDateNow(){
            $dateTime = self::getDateNow();
            return $dateTime->format(self::getFormat());
        }

        public static function parseDate($dateTime){
            return $dateTime->format(self::getFormat());
        }

        public static function parseDateNowISO(){
            $dateTime = self::getDateNow();
            return $dateTime->format(self::getFormatISO8601());
        }

        public static function parseDateISO($dateTime){
            return $dateTime->format(self::getFormatISO8601());
        }

    }