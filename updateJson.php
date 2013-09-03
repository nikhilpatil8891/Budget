    <?php 
        
        $name = $_POST['name'];
        $code = $_POST['uid'];
        
    	$uid = $name."_".$code;
        
        $content = file_get_contents("myJson.json");
    	
		$part_first = substr($content, 0, 12);
		
		$part_insert = ' "'.$uid.'" : { "name" : "'.$name.'", "friends" : [ ] }, ';
		
		$part_rest = substr($content, 13);
		
		$fp = fopen("myJson.json", "w+");
		
		fwrite($fp, $part_first.$part_insert.$part_rest);
		
		fclose($fp);
        
        ?>
