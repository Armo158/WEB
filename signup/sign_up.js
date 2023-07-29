function checkid(){
    var userid = document.getElementById("id").value;
    if(userid){
        url = "check_id.php?userid="+userid;
        window.open(url, "chkid", "width=400, height=200");
    }
    else{
        alert('Input your ID!');
    }
}
function decide(){
    //document.getElementById("decide").innerHTML = "ID 중복 여부를 확인해주세요.";
	document.getElementById("decide_id").value = document.getElementById("id").value;
	document.getElementById("id").disabled = true;
	document.getElementById("register_button").disabled = false;
	document.getElementById("checkID").value = "다른 ID로 변경";
	document.getElementById("checkID").setAttribute("onclick", "change()");
}
function change(){
    //document.getElementById("decide").innerHTML = "ID 중복 여부를 확인해주세요.";
	document.getElementById("id").disabled = false;
	document.getElementById("id").value = "";
	document.getElementById("register_button").disabled = true;
	document.getElementById("checkID").value = "ID 중복 검사";
	document.getElementById("checkID").setAttribute("onclick", "checkid()");
}
function Input_Address(){
    var addwin = window.open("check_address.php", "ckaddr", "width = 400, height = 200");
}