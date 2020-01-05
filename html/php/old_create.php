<?php
header("Access-Control-Allow-Origin: https://yuzuki-chi.github.io");

mb_language('japanese');
mb_internal_encoding('UTF-8');

//file input ------------------------------------
$filename = 'old_accounts.json';
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
    //[入力必須欄]の確認
    if ($data['user_id']==null) exit('ユーザIDが未入力です');
    // else if($data['age']==null) exit('年齢が未入力です');
    // else if($data['flex']==null) exit('性別が未入力です');
    // else if($data['address']==null) exit('住所が未入力です');
    // else if($data['message']==null) exit('プロフィールが未入力です');
    
    // else if($data['user_id']==null) exit('ユーザIDが未入力です');
    else if($data['user_password']==null) exit('パスワードが未入力です');
    else if($data['user_email']==null) exit('メールアドレスが未入力です');
    else if($data['user_name']==null) exit('ユーザ名が未入力です');
    else if($data['user_age']==null) exit('年齢が未入力です');
    else if($data['user_gender']==null) exit('性別が未選択です');
    else if($data['address_country']==null) exit('住所が不適切です');
    else if($data['address_state']==null) exit('住所が不適切です');
    else if($data['address_city']==null) exit('住所が不適切です');
    else if($data['user_postcode']==null) exit('郵便番号が未入力です');
    else if($data['user_profile']==null) exit('プロフィールが未入力です');
    /*---「＊」---*/
    
    
    try {
        $TABLE_ID = count($accounts) + 1;
        /*---「＊」---*/
        $accounts[] = ['TABLE_ID'=>$TABLE_ID, // テーブルID
                        'user_id'=>$data['user_id'], // ユーザID
                        'user_password'=>$data['user_password'], // パスワード
                        'user_email'=>$data['user_email'], // メールアドレス
                        'user_name'=>$data['user_name'], // ユーザ名
                        'user_age'=>$data['user_age'], // 年齢
                        'user_gender'=>$data['user_gender'], // 性別
                        'address_country'=>$data['address_country'], // 在住国
                        'address_state'=>$data['address_state'], // 都道府県
                        'address_city'=>$data['address_city'], // 住所以下
                        'user_postcode'=>$data['user_postcode'], // 郵便番号
                        'user_profile'=>$data['user_profile'] // プロフィール
                    ];
        $jsonstr = json_encode($accounts,  JSON_UNESCAPED_UNICODE);
        file_put_contents("old_accounts.json" , $jsonstr);
        
        echo "アカウントの追加を行いました。";
    } catch (Exception $e) {
        echo "予期せぬエラーが発生しました";
    }