<?php

$uid_1 = $_POST['uid_1'];

$uid_2 = $_POST['uid_2'];


$conn = mysql_connect("68.178.140.151","hackagainstcrime","Nik@99111");

mysql_select_db('hackagainstcrime',$conn);

$sql_1 = "select name from budget where uid = '$uid_1' ;";

$sql_2 = "select name from budget where uid = '$uid_2' ;";

$data_1=mysql_query($sql_1);

$data_2=mysql_query($sql_2);


$result_1 = mysql_fetch_row($data_1);

$result_2 = mysql_fetch_row($data_2);

$name_1 = $result_1[0];
$name_2 = $result_2[0];

$uid = $name_1."_".$uid_1;

  
       $content = file_get_contents("myJson.json");
        
        $uid_1_pos = strpos($content, $uid);
        $pos = intval($uid_1_pos);
        
		$part_first = substr($content, $pos);
        
        $temp = strpos($part_first, "friends");
        $temp_pos = intval($temp) + 12;
        $final_pos = $pos + $temp_pos;
        
        $part_first = substr($content, 0, $final_pos);
        $part_insert = ' "'.$uid_2.'", ' ;
		$part_rest = substr($content, $final_pos+1);
		
        $final_part =  $part_first.$part_insert.$part_rest;
      
/// Seconf Part starts here..... name_2_uid_2....      
      
       $uid = $name_2."_".$uid_2;
        
        $uid_1_pos = strpos($final_part, $uid);
        
        $pos = intval($uid_1_pos);
        
    	$part_first = substr($final_part, $pos);
        
        
        $temp = strpos($part_first, "friends");
        $temp_pos = intval($temp) + 12;
        $final_pos = $pos + $temp_pos;
        
        $part_first = substr($final_part, 0, $final_pos);
        $part_insert = ' "'.$uid_1.'", ' ;
		$part_rest = substr($final_part, $final_pos+1);
		
        $final_part =  $part_first.$part_insert.$part_rest;
        
		$fp = fopen("myJson.json", "w+");
		
		fwrite($fp, $final_part);
		
		fclose($fp);


?>
