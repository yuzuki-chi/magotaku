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
var searchTask = document.getElementById("search_task");
searchTask.addEventListener("click", function(){
    let text = document.getElementById("search").value;
	let str = {
		'search_task':text, 
	};
	let json = JSON.stringify(str);
	let req = new XMLHttpRequest();
	req.open('POST', 'https://citron-tree.jp/private/magotaku_tmp/task_search.php', true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send(json);
	req.onload=function(){
		var arg = req.responseText;
		try {
			var returnText = JSON.parse(arg);
			var locationURL = "../search/searchResults.html?";
			locationURL = locationURL + "old_id=" + returnText['old_id'] + "&";
			locationURL = locationURL + "young_id=" + returnText['young_id'] + "&";
			locationURL = locationURL + "place=" + returnText['place'] + "&";
			locationURL = locationURL + "time=" + returnText['time'] + "&";
			locationURL = locationURL + "genre=" + returnText['genre'] + "&";
			locationURL = locationURL + "title=" + returnText['title'] + "&";
			locationURL = locationURL + "detail=" + returnText['detail'] + "&";
			locationURL = locationURL + "salary=" + returnText['salary'] + "&";
			locationURL = locationURL + "old_valuation=" + returnText['old_valuation'] + "&";
			locationURL = locationURL + "young_valuation=" + returnText['young_valuation'] + "&";
			locationURL = locationURL + "success=" + returnText['success'];
			location.href = locationURL;
		} catch (e) {
			alert(arg);
		}
	}
})