<!-- insert.php 插入留言 -->
<?php
    header('Content-Type:text/html; charset=utf-8');
    require ('./connect.php');
    $msg_username = $_POST['msg_username'];
    $msg_content = $_POST['msg_content'];

    if ( strlen($msg_username) > 30 || strlen($msg_username) < 4 )
    {
        echo '请输入4-30个字符之间的用户名！';
        exit;
    }
    if ( strlen($msg_content) < 1 )
    {
        echo '留言内容不能为空！';
        exit;
    }
    $sql = "INSERT INTO msgtable (msg_username, msg_content, msg_time) VALUES ('$msg_username', '$msg_content', now())";
    $result = mysqli_query($link, $sql);
    if ( $result )
    {
        echo '<script>alert("恭喜你留言成功！");location.href="./index.php";</script>';
    }
    else
    {
        echo "留言失败！<br>";
        echo mysqli_error($link);
        echo '<a href="./index.php">回到首页！</a>';
    }
?>