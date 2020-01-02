//OLD SUBMIT BUTTON
var old_create_subm = document.getElementById("old_create_subm");
old_create_subm.addEventListener("click", function(){
	// お名前
    let name = document.getElementById("name").value;
    //　年齢
    let age = document.getElementById("age").value;
    // 性別
    let flex = document.getElementById("flex").value;
    // 住所
    let address = document.getElementById("address").value;
	// メールアドレス
	// let fromAddress = document.getElementById("email").value;
	// 電話番号
	// let phone = document.getElementById("phone").value;
	// プロフィール（？）
	let message = document.getElementById("message").value;
	
	let str = {'name':name, 'age':age, 'flex':flex, 'address':address, 'message':message};
	let json = JSON.stringify(str);
	let req = new XMLHttpRequest();
	req.open('POST', 'https://citron-tree.jp/private/magotaku_tmp/old_create.php', true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send(json);
	req.onload=function(){
		alert(req.responseText);
	}
})
