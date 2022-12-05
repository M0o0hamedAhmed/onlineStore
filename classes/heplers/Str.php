<?php
    
namespace helpers ;
    class str {

     
        public static function limit($str)
        {   
            $charsNember = 90 ;
            if(strlen($str) > $charsNember){
                $str = substr($str,0,$charsNember ).'...' ;
            }
            return $str ;
        }
    }
?>