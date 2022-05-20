<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>石田スタッフィング</title>
</head>

<body>
    スタッフ追加<br />
    <br />
    <form method="post" action="staff_add_check.php">
        スタッフ名を入力してください。</br>
        <input type="text" name="name" styel="width:200px"><br />
        パスワードを入力してください。<br />
        <input type="password" name="pass2" styel="width:100px"><br />
        パスワードをもう一度入力してください。<br />
        <input type="password" name="pass2_confirm" styel="width100px"></bar>
        <br />
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>

    <?php

    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass2 = $_POST['pass2'];

    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
    $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

    if ($staff_name == '') {
        print 'スタッフ名が入力されていません。<br />';
    } else {
        print 'スタッフ名：';
        print $staff_name;
        print '<br />';
    }

    if ($staff_pass == '') {
        print 'パスワードが入力されていません。<br />';
    }