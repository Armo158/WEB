function modify(){
    location.href='write.php?bid='+ document.getElementById('bid').value;
}

function remove(){
    location.href='remove.php?bid=' + document.getElementById('bid').value;
}