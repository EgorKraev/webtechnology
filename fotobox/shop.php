<?php
	include("include/connect.php");
    $i =$_POST["name_buyer"];
    $j =$_POST["adress_buyer"];
    $m =$_POST["phone_buyer"];
    $id = $_GET["id"];
    if(isset($_POST["finish"]))
    {
    $result = mysql_query("SELECT * FROM table_product WHERE id_product = '$id'",$link);
    if(mysql_num_rows($result)>0)
    {
        $row = mysql_fetch_array($result);
        $n = $row["id_product"];
        if($row["num"]!=0)
        {
            $total = ($row["num"])-1;
            mysql_query("INSERT INTO `shop` (`id`,`product`, `name_buyer`, `adress`, `phone`) VALUES (NULL,'$n' ,'$i', '$j', '$m');",$link);
            mysql_query("UPDATE `table_product` SET `num` = '$total' WHERE `table_product`.`id_product` = $id",$link);
            header("Location: http://localhost/fotobox/finish.php?id=$n"); 
        }
    }
        
    }
?> 
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
	<title>FotoBox</title>
</head>

<body>

<div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-right">
<?php
	include("include/block-cat.php");
?>
</div>
<div id="block-content">
<form method="POST">
<p id="pp"> Order information</p>
<ul id="form_del">
<li>
<label>Name</label>
<input type="text" name="name_buyer" id="name_buyer" />
</li>
<li>
<label>Devilery adress</label>
<input type="text" name="adress_buyer" id="adress_buyer" />
</li> 
<li>
<label>Phone number</label>
<input type="text" name="phone_buyer" id="phone_buyer" />
</li>
</ul>
<p align="right"><input type="submit" name="finish" id="finish_button" value="Buy" /></a></p>
</form>
</div>
</div>
</body>
</html>