<?php
require '../db.php';

$id       = isset($_POST['id'])      ? intval($_POST['id'])          :0;
$title    = isset($_POST['title'])   ? addslashes($_POST['title'])  :'';
$keyword  = isset($_POST['keyword']) ? addslashes($_POST['keyword']):'';
$content  = isset($_POST['content']) ? addslashes($_POST['content']):'';
$posttime = time();#addcslashes();addslashes();

if($id){
    mysql_query("UPDATE $table SET title='$title', keyword='$keyword', content='$content', posttime='$posttime' WHERE id='$id'");
}else{
	mysql_query("INSERT INTO $table (title, keyword, content, posttime) 
VALUES ('$title', '$keyword', '$content', '$posttime')");
	$id=mysql_insert_id();
}

echo $site.'content.php?id='.$id;
?>