<?php
	include("include/connect.php");
    $id = $_GET["id"];
    $id = strip_tags($id);
    $id = mysql_real_escape_string($id);
    $id = trim($id);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
<?php
	$resultl = mysql_query("SELECT * FROM table_product WHERE id_product = '$id'",$link);
    if(mysql_num_rows($resultl)>0)
    {
        $rowl = mysql_fetch_array($resultl);
        do
    {
        if($rowl["img"] != "" && file_exists("./imges/".$rowl["img"]))
        {
            $img_path = './imges/'.$rowl["img"];
            $max_width = 330;
            $max_height = 330;
            list($width,$height) = getimagesize($img_path);
            $ratioh = $max_height/$height;
            $ratiow = $max_width/$width; 
            $ratio = min($ratioh,$ratiow);
            $width = intval($ratio*$width);
            $height = intval($ratio*$height);
        }
        echo'
        <div id="name"> 
        <p align = "center"><h2>'.$rowl["name"].'</h2></p> </div>
        <div id="drow-vie-w">
        <img src = "'.$img_path.'" width = "'.$width.'" height = "'.$height.'"/>
        </div> 
        <div id="price">
        <p>    Price - <strong> '.$rowl["price"].' </strong>Rub. <a href="shop.php?id='.$id.'" class="button">   Buy</a></p>
        </div>
        <div id ="drow-view-view"> '.$rowl["view"].'</div>
        ';
    }
    while($rowl = mysql_fetch_array($resultl));

    }
  ?>  
    
	
</div>
</div>
</body>
</html>