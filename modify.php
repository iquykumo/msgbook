<!-- modify.php 修改页面 -->
<?php
    header('Content-Type:text; charset=utf-8');
    require ('./connect.php');
    $msg_id = $_GET['msg_id'];
    $sql = "SELECT * FROM msgtable WHERE msg_id=$msg_id";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>修改留言</title>
</head>
<body>
    <form action="function.php?msg_act=modify&msg_id='<?php echo $row['msg_id'] ?>'" method="post" >
        
        <!-- <input name="msg_id" value="<?php echo $row['msg_id']?>" > -->
        <p>用户名：<input type="text" name="msg_username" value="<?php echo $row['msg_username'] ?>"/></p>
        <p>留言：<textarea name="msg_content" cols="60" rows="10"><?php echo $row['msg_content'] ?></textarea></p>
        <p><input type="submit" value="修改留言"/></p>
    </form>
</body>
</html>

