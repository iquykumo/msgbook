<!-- connect.php 连接数据库 -->
<?php
    header('Content-Type:text/html;charset=utf-8');
    $servername = 'localhost';
    $username = 'root';
    $password = 'root';
    $sql_name = 'msgbook';

    $link = @mysqli_connect( $servername, $username, $password, $sql_name) or die('connect error!');
?>

<!-- 建立数据表语句 -->
<!-- create databases msgbook; -->
<!-- use msgbook; -->
<!-- create table msgtable (
    msg_id INT auto_increment primary key,
    msg_username VARCHAR(30) not null,
    msg_content TEXT(300) not null,
    msg_time TIMESTAMP not null default CURRENT_TIMESTAMP,
    msg_top TINYINT not null default 0,
    msg_praise TINYINT not null default 0,
    msg_report TINYINT not null default 0,
    msg_oppose TINYINT not null default 0
); -->