//YOUNG SUBMIT BUTTON
var young_create_subm = document.getElementById("young_create_subm");
young_create_subm.addEventListener("click", function(){
    let user_id = document.getElementById("user_id").value;
    let user_password = document.getElementById("user_password").value;
    let user_email = document.getElementById("user_email").value;
    let user_name = document.getElementById("user_name").value;
    let user_age = document.getElementById("user_age").value;
    let user_gender = document.getElementById("user_gender").value;
    let address_country = document.getElementById("address_country").value;
    let address_state = document.getElementById("address_state").value;
    let address_city = document.getElementById("address_city").value;
    let user_postcode = document.getElementById("user_postcode").value;
    let user_profile = document.getElementById("user_profile").value;
	
	let str = {
		'user_id':user_id, 
		'user_password':user_password, 
		'user_email':user_email, 
		'user_name':user_name, 
		'user_age':user_age, 
		'user_gender':user_gender, 
		'address_country':address_country, 
		'address_state':address_state, 
		'address_city':address_city, 
		'user_postcode':user_postcode, 
		'user_profile':user_profile
	};
	let json = JSON.stringify(str);
	let req = new XMLHttpRequest();
	req.open('POST', 'https://citron-tree.jp/private/magotaku_tmp/young_create.php', true);
	req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	req.send(json);
	req.onload=function(){
		alert(req.responseText);
	}
})
