//ログインメニューの表示
document.getElementById("rogin_form").style.visibility = "hidden";
document.getElementById("rogin_nav").onclick = function () {
    document.getElementById("rogin_form").style.visibility = "visible";
}
// ログインメニューを閉じる
document.getElementById("close_item").onclick = function () {
    document.getElementById("rogin_form").style.visibility = "hidden";
}

// SEARCH TASK
var search_task = document.getElementById("search_task");
search_task.addEventListener("click", function(){
    let search_task = document.getElementById("search_task").value;
	let str = {
		'search_task':search_task, 
	};
	let json = JSON.stringify(str);
	let req = new XMLHttpRequest();
	req.open('POST', 'https://citron-tree.jp/private/magotaku_tmp/task_search.php', true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	// TODO
	// たまに403エラーが発生する。たぶん入力内容に記号とかが入るとダメなのかも
	// -> HTMLを平文に変換してからJSONに変えて送信する	
	req.send(json);
	req.onload=function(){
		alert(req.responseText);
	}
})