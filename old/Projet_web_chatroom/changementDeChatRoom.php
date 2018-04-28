<?php
session_start();
$_SESSION['ChatRoom'] = $_GET['chatActuel'];  
echo '_get = ' . $_GET['chatActuel'];
echo ' _session = '.$_SESSION['ChatRoom'];
header('Location: messageChatRoom.php');
echo "<ul><li><a href='messageChatRoom.php' > changelent de room</a></li></ul>"
?>
