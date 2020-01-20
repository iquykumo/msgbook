<!-- function.php 基本功能实现 -->
<?php
    header('Content-Type:text; charset=utf-8');
    require ('./connect.php');
    $msg_act = $_GET['msg_act'];

    if ( $msg_act == 'settop' )
    {
        $msg_id = $_GET['msg_id'];
        $sql = "UPDATE msgtable SET msg_top=1 WHERE msg_id=$msg_id";
        $result = mysqli_query($link, $sql);
        if ( $result )
        {
            header('Location: index.php');
        }
        else
        {
            echo '置顶失败！<br>';
            echo mysqli_error($link).'<br>';
            echo '<a href="./index.php">回到首页！</a>';
        }
    }

    if ( $msg_act == 'canceltop' )
    {
        $msg_id = $_GET['msg_id'];
        $sql = "UPDATE msgtable SET msg_top=0 WHERE msg_id=$msg_id";
        $result = mysqli_query($link, $sql);
        if ( $result )
        {
            header('Location: index.php');
        }
        else
        {
            echo '取消置顶失败！<br>';
            echo mysqli_error($link).'<br>';
            echo '<a href="./index.php">回到首页！</a>';
        }
    }

    if ( $msg_act == 'report' )
    {
        $msg_id = $_GET['msg_id'];
        $sql = "UPDATE msgtable SET msg_report=1 WHERE msg_id=$msg_id";
        $result = mysqli_query($link, $sql);
        if ( $result )
        {
            echo '<script>alert("举报已提交给管理员，此条消息将被隐藏！");location.href="./index.php";</script>';
        }
        else
        {
            echo '举报失败！<br>';
            echo mysqli_error($link).'<br>';
            echo '<a href="./index.php">回到首页！</a>';
        }
    }
    
    if ( $msg_act == 'praise' )
    {
        $msg_id = $_GET['msg_id'];
        $sql = "UPDATE msgtable SET msg_praise=msg_praise+1 WHERE msg_id=$msg_id";
        $result = mysqli_query($link, $sql);
        if($result){
            header('Location: index.php');
        } else {
            echo '点赞失败！<br>';
            echo mysqli_error($link).'<br>';
            echo '<a href="./index.php">回到首页！</a>';
        }
    }

    if ( $msg_act == 'oppose' )
    {
        $msg_id = $_GET['msg_id'];
        $sql = "UPDATE msgtable SET msg_oppose=msg_oppose+1 WHERE msg_id=$msg_id";
        $result = mysqli_query($link, $sql);
        if($result){
            header('Location: index.php');
        } else {
            echo '反对失败！<br>';
            echo mysqli_error($link).'<br>';
            echo '<a href="./index.php">回到首页！</a>';
        }
    }

    if ( $msg_act == 'modify' )
    {
        $msg_username = $_POST['msg_username'];
        $msg_content = $_POST['msg_content'];
        $msg_id = $_GET['msg_id'];
        $sql = "UPDATE msgtable SET msg_username='$msg_username',msg_content='$msg_content' WHERE msg_id=$msg_id";
        $result = mysqli_query($link, $sql);
        if ( $result )
        {
            echo '<script>alert("恭喜你修改成功！");location.href="./index.php";</script>';
        }
        else
        {
            echo '修改失败！<br>';
            echo mysqli_error($link);
            echo '<a href="./index.php">回到首页！</a>';
        }
    }

    if ( $msg_act == 'delete' )
    {
        $msg_id = $_GET['msg_id'];
        if ( !is_numeric($msg_id) )
        {
            echo "id不是数字！";
            exit;
        }
        $sql = "DELETE FROM msgtable WHERE msg_id={$msg_id}";
        $result = mysqli_query($link,$sql);
        if ( $result )
        {
            echo '<script>alert("恭喜你删除成功！");location.href="./index.php";</script>';
        }
        else
        {
            echo '删除失败！<br>';
            echo mysqli_error($link);
            echo '<a href="./index.php">回到首页！</a>';
        }
    }

?>