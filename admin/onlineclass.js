function finishtest(ele,id){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4 && xhr.status==200){
            ele.classList.remove("btn-info");
            ele.classList.add("btn-danger");
            
            ele.innerHTML='Delete <i class="fa-solid fa-trash"></i>';
            ele.parentElement.parentElement.childNodes[2].innerHTML="Inactive"
        }
    }
    xhr.open("POST","finishclass.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send("id="+id);
}
function deleteclass(ele,id){
    console.log("del");
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4 && xhr.status==200){
            ele.parentElement.parentElement.remove();
        }
    }
    xhr.open("POST","delclass.php",true);
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr.send("id="+id);
}
