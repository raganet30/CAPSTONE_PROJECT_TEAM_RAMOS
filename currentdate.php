<?php 
        date_default_timezone_set('Asia/Manila');
        $logdate = date('m/d/Y h:i:s ', time());
        $logdate2=date("Y-m-d h:i:s ",strtotime($logdate));

 

$f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
 ?>