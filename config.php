<?php

$db = mysql_connect("localhost", "torpedo02_round", "52fe049a") or die ("No connect to database-home");
mysql_select_db("torpedo02_round") or die("Could not select database");
$query='SET NAMES utf8';
$res = mysql_query($query);

#require_once('funtions.php');
#print "good connection";

function downcounter($date){
        $check_time = strtotime($date) - time();
        /*
        if($check_time <= 0){
            return false;
        }
        */
        $days = floor($check_time/86400);
        $hours = floor(($check_time%86400)/3600);
        $minutes = floor(($check_time%3600)/60);
        $seconds = $check_time%60; 

        $str = '';
        $str .= $days .' днів / ';
        $str .= ($days * 24) + $hours .' годин ';
     
        return $str;
    }
    
?>