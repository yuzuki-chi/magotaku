<?php
header("Access-Control-Allow-Origin: https://yuzuki-chi.github.io");

mb_language('japanese');
mb_internal_encoding('UTF-8');
if ($json = file_get_contents('php://input')) $data = json_decode($json, true);

// 入力必須欄の確認 -----------------------------------------------
if ($data['fromAddress']==null) exit('メールアドレスが未入力です');
else if($data['name']==null) exit('お名前が未入力です');
else if($data['phone']==null) exit('電話番号が未入力です');
else if($data['message']==null) exit('問い合わせ内容が未入力です。');
$fromAddress = $data['fromAddress'];
$atAddress = "c011719086@edu.teu.ac.jp"; //宛先メールアドレス
$name = $data['name'];
$phone = $data['phone'];
$message = html_entity_decode($data['message']);
// --------------------------------------------------------------

$body = "お名前:".$name."<br/>".
        "電話番号:".$phone."<br/>".
        "メールアドレス:".$fromAddress."<br/>".
        "問い合わせ内容:".htmlspecialchars($message, ENT_QUOTES, "UTF-8");

try {
	$success = mb_send_mail($atAddress, "問い合わせ", $body, 'From: ' . $fromAddress);
	if($success){
        echo "送信しました";
	}
} catch (Exception $e) {
	echo "予期せぬエラーが発生しました";
}
