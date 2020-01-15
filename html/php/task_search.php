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
    title           varchar(32)     タイトル
    detail          varchar(255)    詳細事項
    salary          int(9)          給料
    old_valuation   int(1)          老人側の評価
    young_valuation int(1)          孫側の評価
    success         int(1)          成功の是非
	-------------------------------------------------------
*/

if ($input =  urldecode(file_get_contents('php://input'))) //今回はJSONではなく、検索ワードがベタ打ちされる想定.

//[入力必須欄]の確認
if ($input==null) exit('タスクが未入力です');

try {
    foreach ($tasks as $value) {
        if('search='.$value['title']==$input) { //TITLE MATCH!
            exit(json_encode($value));
        }
    }
    exit('該当する掲示板が見つかりませんでした');

} catch (Exception $e) {
        echo "予期せぬエラーが発生しました";
}