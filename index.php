<?php
$tag=isset($_GET['tag'])?$_GET['tag']:'';

require 'db.php';

$sql=$tag?"keyword like '%$tag%'":"1";
$query=mysql_query("SELECT * FROM $table WHERE $sql ORDER BY posttime DESC LIMIT 0,10");
while ($rs=mysql_fetch_array($query)) {
	$keywords=explode(',',$rs['keyword']);
	$keyword='';
	foreach ($keywords as $key => $value) {
		$keyword.='<a href="index.php?tag='.urlencode($value).'">'.$value.'</a>';
	}
	$rs['keyword']=$keyword;
	$list[]=$rs;
}
mysql_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>simple blog</title>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<ul class="list-group">
<?php
foreach ($list as $key => $value) {
?>
<li class="list-group-item"><a href="content.php?id=<?=$value['id']?>"><?=$value['title']?></a></li>
<?php } ?>
</ul>
</div>
<script src="dist/js/jquery-1.11.1.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>