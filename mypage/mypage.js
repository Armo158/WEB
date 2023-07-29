function check(){
    passwd = document.getElementById('passwd').value;
    checkpasswd = document.getElementById('check_passwd').value;
    if(passwd != checkpasswd){
        alert('비밀번호가 다릅니다!');
        return false;
    }
    return true;
}