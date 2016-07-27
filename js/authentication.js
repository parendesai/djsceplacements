function email_check (email) {
    var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    return email!=null && email!=undefined && email!="" && re.test(email);
}

function phone_check (phone) {
    return phone!=null && phone!=undefined && phone!="" && /^\+?[0-9]{10,12}$/.test(phone);
}

function name_check(name) {
	return name!=null && name!=undefined && name!="";
}

function percent_check(per) {
	return per!=null && per!=undefined && per!="" && parseFloat(per) >=0 && parseFloat(per) <= 100;
}

function point_check(per) {
	return per!=null && per!=undefined && per!="" && parseFloat(per) >=0 && parseFloat(per) <= 10;	
}