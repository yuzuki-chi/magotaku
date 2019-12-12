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