<?php
header("Access-Control-Allow-Origin: https://yuzuki-chi.github.io");

mb_language('japanese');
mb_internal_encoding('UTF-8');

//file input ------------------------------------
$filename = 'young_accounts.json';
$fp = fopen($filename, 'r+');
if ($fp) {
    $txt = fgets($fp);
    $accounts = json_decode($txt, true);
    fclose($fp);
}else if($_SERVER['REQUEST_METHOD']=='POST'){
    //$filenameが存在しない場合に、送信がされたとき.
}else{
    exit("エラー: データベース（笑）エラー");
}
//-------------------------------------------------

/*

	フィールド名		型定義			説明
	------------------------------------------------------
	TABLE_ID		int(11)			テーブルID, primary key
	user_id			varchar(16)		ユーザID
	user_password	varchar(255)	ユーザパスワード
	user_email		varchar(255)	メールアドレス
	user_name		varchar(16)		ユーザ名
	user_age		int(4)			ユーザ年齢
	user_gender		varchar()		ユーザ性別
	address_country	varchar(255)	在住国
	address_state	varchar(255)	在住都道府県
	address_city	varchar(255)	以下住所
	user_postcode	varchar(7)		ユーザ郵便番号
	user_profile	varchar(255)	プロフィール
	-------------------------------------------------------

*/

if ($json = file_get_contents('php://input')) $data = json_decode($json, true);

    // [入力必須欄]の確認 ---
    if ($data['user_id']==null) exit('ユーザIDが未入力です');
    else if($data['user_password']==null) exit('パスワードが未入力です');
    //---------------------
    
    // ID&PASSWORDのマッチング
    foreach ($accounts as $value) {
        if($value['user_id']==$data['user_id']) { //ID MATCH!
            if($value['user_password']==$data['user_password']) { //PASSWORD MATCH!
                exit(json_encode($value));
            }
            exit('パスワードが誤っています');
        }
        exit('IDもしくはパスワードが誤っています');
    }
    //---------------------