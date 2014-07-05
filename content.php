<?php
$id=isset($_GET['id'])?$_GET['id']:0;

require 'db.php';

$query=mysql_query("SELECT * FROM $table WHERE id='$id' LIMIT 0,1");
while ($rs=mysql_fetch_array($query)) {
	$title=$rs['title'];
	$content=$rs['content'];
	$posttime=date('Y-m-d H:i:s',$rs['posttime']);
	$keywords=explode(',',$rs['keyword']);
	$keyword='';
	foreach ($keywords as $key => $value) {
		$keyword.='<a href="index.php?tag='.urlencode($value).'">'.$value.'</a>';
	}
}
mysql_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$title?></title>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1 class="page-header"><?=$title?></h1>
<p><?=$keyword?></p>
<p><?=$posttime?></p>
<div class="article">
<?=$content?>
</div>
</div>
<script src="dist/js/jquery-1.11.1.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>