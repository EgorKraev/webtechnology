<?php
	include("include/connect.php");
    $cat = $_GET["cat"];
    $cat = strip_tags($cat);
    $cat = mysql_real_escape_string($cat);
    $cat = trim($cat);
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
<ul id="block-prod">
<?php
	$result = mysql_query("SELECT * FROM table_product WHERE cat = '$cat'",$link);
    if(mysql_num_rows($result)>0)
    {
        $row = mysql_fetch_array($result);
    }
    do
    {
        if($row["img"] != "" && file_exists("./imges/".$row["img"]))
        {
            $img_path = './imges/'.$row["img"];
            $max_width = 210;
             $max_height = 210;
            list($width,$height) = getimagesize($img_path);
            $ratioh = $max_height/$height;
            $ratiow = $max_width/$width; 
            $ratio = min($ratioh,$ratiow);
            $width = intval($ratio*$width);
            $height = intval($ratio*$height);
        }
        echo'
        <li>
        <div class="dro-w">
        <img src = "'.$img_path.'" width = "'.$width.'" height = "'.$height.'"/>
        </div>  
        <p class = "drow-name"><a href = "view_con.php?id='.$row["id_product"].'">'.$row["name"].'</a></p> 
        <p class = "drow-price"><strong>'.$row["price"].'</strong> Rub. </p>
        <div class ="drow-view">'.$row["sview"].'</div>
        </li>';
    }
    while($row = mysql_fetch_array($result));
?>
</ul>
</div>
</div>
</body>
</html>