<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>石田スタッフィング</title>
</head>
<body>
    スタッフ追加<br/>
    <br/>
    <form method="post"action="staff_add_check.php">
    スタッフ名を入力してください。</br>
    <input type="text"name="name"styel="width:200px"><br/>
    パスワードを入力してください。<br/>
    <input type="password"name="pass2"styel="width:100px"><br/>
    パスワードをもう一度入力してください。<br/>
    <input type="password"name="pass2"styel="width100px"></bar>
    <br/>
    <input type="button"onclick="history.back()"value="戻る">
    <input type="submit"value="OK">
    </form>


</body>
</html>

<?php

$time = date('w/m/d H:i:s');

$file = fopen('data/data.txt,''a');

fwrite($file, $time . "\n");

fclose($file);


$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass2=$_POST['pass2'];

$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
$staff_pass2=htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

if($staff_name=='')
{
	print 'スタッフ名が入力されていません。<br />';
}
else
{
	print 'スタッフ名：';
	print $staff_name;
	print '<br />';
}

if($staff_pass=='')
{
	print 'パスワードが入力されていません。<br />';
}

if($staff_pass!=$staff_pass2)
{
	print 'パスワードが一致しません。<br />';
}

if($staff_name=='' || $staff_pass=='' || $staff_pass!=$staff_pass2)
{
	print '<form>';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '</form>';
}
else
{
	$staff_pass=md5($staff_pass);
	print '<form method="post" action="staff_add_done.php">';
	print '<input type="hidden" name="name" value="'.$staff_name.'">';
	print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
	print '<br />';
	print '<input type="button" onclick="history.back()" value="戻る">';
	print '<input type="submit" value="OK">';
	print '</form>';


try
{

$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];

$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO mst_staff (name,password) VALUES (?,?)';
$stmt=$dbh->prepare($sql);
$data[]=$staff_name;
$data[]=$staff_pass;
$stmt->execute($data);

$dbh=null;

print $staff_name;
print 'さんを追加しました。<br />';

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="staff_list.php"> 戻る</a>
</body>
</html>