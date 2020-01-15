var subm = document.getElementById("form_subm");
subm.addEventListener("click", function(){
	// お名前
	let name = document.getElementById("name").value;
	// メールアドレス
	let fromAddress = document.getElementById("email").value;
	// 電話番号
	let phone = document.getElementById("phone").value;
	// 問い合わせ内容
	let message = document.getElementById("message").value;
	
	let str = {'name':name, 'fromAddress':fromAddress, 'phone':phone, 'message':message};
	let json = JSON.stringify(str);
	let req = new XMLHttpRequest();
	req.open('POST', 'https://citron-tree.jp/private/magotaku_tmp/sendMail.php', true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send(json);
	req.onload=function(){
		alert(req.responseText);
	}
})
//ログインメニューの表示
document.getElementById("rogin_form").style.visibility = "hidden";
document.getElementById("rogin_nav").onclick = function () {
	document.getElementById("rogin_form").style.visibility = "visible";
}
// ログインメニューを閉じる
document.getElementById("close_item").onclick = function(){
	document.getElementById("rogin_form").style.visibility = "hidden";
}
// 矢印のアニメーション
document.getElementById("rogin_link1").onmouseover = function (){
	document.getElementById("rogin_item_bar1").style.transform = "translateX(12px)";
}
document.getElementById("rogin_link1").onmouseout = function (){
	document.getElementById("rogin_item_bar1").style.transform = "translateX(0px)";
}
document.getElementById("rogin_link2").onmouseover = function () {
	document.getElementById("rogin_item_bar2").style.transform = "translateX(12px)";
}
document.getElementById("rogin_link2").onmouseout = function () {
	document.getElementById("rogin_item_bar2").style.transform = "translateX(0px)";
}
