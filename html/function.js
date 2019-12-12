function sendMail(argument) {
	var subm = document.getElementById("submit");
	subm.addEventListener("click", function(){
		let fromAddress = document.getElementById("fromAddress").value;
		let atAddress = document.getElementById("atAddress").value;
		let subject = document.getElementById("subject").value;
		let message = document.getElementById("message").value;
		let str = {'fromAddress':fromAddress, 'atAddress':atAddress, 'subject':subject, 'message':message};
		let json = JSON.stringify(str);
		let req = new XMLHttpRequest();
		req.open('POST', './sendMail.php', true);
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.send(json);
		req.onload=function(){
			alert(req.responseText);
		}
	})
}