<?php
      
        $uid = $_POST['uid'];
        $name = $_POST['name'];
    	$purchase = $_POST['purchase'];
		$quantity = $_POST['quantity'];
		$measure = $_POST['measure'];
		$price = $_POST['price'];
		$currency = $_POST['currency'];
		$family = $_POST['family'];
		$private = $_POST['private'];
        $table = "budget";
  
$conn = mysql_connect("68.178.140.151","hackagainstcrime","Nik@99111");

mysql_select_db('hackagainstcrime',$conn);

$sql = "INSERT INTO $table (id, uid, name, purchased_item, quantity, measure, price, currency, family, private) VALUES ('', '$uid', '$name', '$purchase' , '$quantity', '$measure', '$price', '$currency', '$family', '$private');";

$data=mysql_query($sql);

echo($data);

?>
