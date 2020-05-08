document.getElementById("rogin_form").style.visibility = "hidden";

var subm = document.getElementById("form_subm");
subm.addEventListener("click", function(){
	// GitHub Pagesでのモックアップのため、動的ファイルへの対応を打ち切りました.
	/*
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
	*/
	alert("問い合わせ内容を送信しました。");
})

function rogin_nav() {
	const p1 = document.getElementById("rogin_form");
	p1.style.display = "block";
}

// cursor change --
制作に余裕ができた時の遊び心
$cursor = 'url(https://yuzuki-chi.github.io/magotaku/html/img/cursor.gif), auto';
var $element = document.getElementById( "cursor" );
$element.style.cursor = $cursor;
var $cursor = $element.style.cursor;
// -----------------
