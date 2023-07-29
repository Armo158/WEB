document.write('<script async src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>');

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
    new daum.Postcode({
        oncomplete: function(data) {
            var roadAddr = data.roadAddr;
            var extraRoadAddr = '';

            // 법정동명이 있을 경우 추가한다. (법정리는 제외)
            // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
            if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                extraRoadAddr += data.bname;
            }
            // 건물명이 있고, 공동주택일 경우 추가한다.
            if(data.buildingName !== '' && data.apartment === 'Y'){
                extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
            }
            // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
            if(extraRoadAddr !== ''){
                extraRoadAddr = ' (' + extraRoadAddr + ')';
            }

            document.getElementById("Roadaddr").value = roadAddr + extraRoadAddr;
            document.getElementById("Decide_Roadaddr").value = document.getElementById("Roadaddr").value
            document.getElementById("Roadaddr").disabled = true;
        }
    }).open();
    
}