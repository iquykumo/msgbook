<!-- index.php 主页面 -->

<?php
    require ('./connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>留言板</title>
</head>
<body>
    <form action="insert.php" method="post">
        <p>用户名：<input type="text" name="msg_username"/></p>
        <p>留言：<textarea name="msg_content" cols="60" rows="10"></textarea></p>
        <p><input type="submit" value="马上留言" /></p>
    </form>
    <hr/>

<?php
    
    $pagesize = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1 ;
    $sql = "SELECT * FROM msgtable WHERE msg_report=0 ORDER BY msg_top DESC,msg_id DESC";
    $result = mysqli_query($link, $sql );
    $rows_count = mysqli_num_rows($result);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }

    $page_count = ceil($rows_count / $pagesize);

    $start = ($page-1) * $pagesize;
    $sql .= " LIMIT $start,$pagesize";
    $result = mysqli_query($link, $sql);

    while($row=mysqli_fetch_assoc($result)){
        echo "<p>{$row['msg_id']}# {$row['msg_username']} 于 {$row['msg_time']}说：<br> {$row['msg_content']}<br>";
        echo '<a href="function.php?msg_act=delete&msg_id=' . $row['msg_id'] . '">删除 |</a>';
        echo '<a href="modify.php?msg_id=' . $row['msg_id'] . '"> 修改 |</a>';
        if($row['msg_top']){
            echo '<a href="function.php?msg_act=canceltop&msg_id=' . $row['msg_id'] . '"> 取消置顶 |</a>';
        } else {
            echo '<a onclick="myFunctionTop()" href="function.php?msg_act=settop&msg_id=' . $row['msg_id'] . '"> 置顶 |</a>';
        }
        echo '<a href="function.php?msg_act=report&msg_id=' . $row['msg_id'] . '"> 举报 |</a>';
        echo '<a href="function.php?msg_act=praise&msg_id=' . $row['msg_id'] . '"> 点赞(' . $row['msg_praise'] . ') </a>';
        echo '<a href="function.php?msg_act=oppose&msg_id=' . $row['msg_id'] . '"> 反对(' . $row['msg_oppose'] . ') </a>';
        echo '</p>';
    }
    for($i=1; $i<=$page_count; $i++) {
        echo '<a href="index.php?page='.$i.'">';
        echo ' ' .$i. ' ';
        echo '</a>'; 
    }
?>

</body>
</html>