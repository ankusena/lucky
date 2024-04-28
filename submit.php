<?php
define ('url',"*6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w*");

$name = $_GET['name'];

$message = $_GET['message'];

$phone = $_GET['phone'];

$chat_id = '{1272046774}';

$message = urlencode("Name:".$name."\nPhone: ".$phone."\nMessage: ".$message);

file_get_contents(url."sendmessage?text=".$message."&chat_id=".$chat_id."&parse_mode=HTML");

?>
