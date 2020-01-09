<?php
header("Access-Control-Allow-Origin: https://yuzuki-chi.github.io");

mb_language('japanese');
mb_internal_encoding('UTF-8');

//file input ------------------------------------
$filename = 'task.json';
$fp = fopen($filename, 'r+');
if ($fp) {
    $txt = fgets($fp);
    $tasks = json_decode($txt, true);
    fclose($fp);
}else if($_SERVER['REQUEST_METHOD']=='POST'){
    //$filenameが存在しない場合に、送信がされたとき.
}else{
    exit("エラー: データベース（笑）エラー");
}
//-------------------------------------------------

/*
    ユーザテーブル
	------------------------------------------------------
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

    依頼テーブル
	------------------------------------------------------
    フィールド名		型定義			説明
	------------------------------------------------------
	TABLE_ID		int(11)			テーブルID, primary key
	old_id          varchar(16)     依頼者のID
    young_id        varchar(16)     受託者のID
    place           varchar(255)    住所
    time            datetime        日時
    genre           varchar(32)     ジャンル
    detail          varchar(255)    詳細事項
    salary          int(9)          給料
    old_valuation   int(1)          老人側の評価
    young_valuation int(1)          孫側の評価
    success         int(1)          成功の是非
	-------------------------------------------------------
*/

if ($json = file_get_contents('php://input')) $data = json_decode($json, true);
//[入力必須欄]の確認
if ($data['old_id']==null) exit('依頼者のIDが指定されていません');
else if($data['young_id']==null) exit('受託者のIDが指定されていません');
else if($data['place']==null) exit('住所が指定されていません');
else if($data['time']==null) exit('日時が指定されていません');
else if($data['genre']==null) exit('ジャンルが指定されていません');
else if($data['detail']==null) exit('詳細事項が記入されていません');
else if($data['salary']==null) exit('給与が指定されていません');
// else if($data['old_valuation']==null) exit('');
// else if($data['young_valuation']==null) exit('');
// else if($data['success']==null) exit('');

try {
    $TABLE_ID = count($tasks) + 1;
    /*---「＊」---*/
    $tasks[] = [
        'TABLE_ID' => $TABLE_ID, // テーブルID
        'old_id' => $data['old_id'],
        'young_id' => $data['young_id'],
        'place' => $data['place'],
        'time' => $data['time'],
        'genre' => $data['genre'],
        'detail' => $data['detail'],
        'salary' => $data['salary'],
        'success' => '0' //0:未受託, 1:成功, 2:失敗
                ];
    $jsonstr = json_encode($accounts,  JSON_UNESCAPED_UNICODE);
    file_put_contents("task.json" , $jsonstr);
    
    echo "依頼を登録しました";
} catch (Exception $e) {
        echo "予期せぬエラーが発生しました";
}