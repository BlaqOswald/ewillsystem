document.addEventListener("DOMContentLoaded", function(event) {
    let result = document.querySelector('#result');
    
    let clear = document.querySelector('#clear');
    let equalTo = document.querySelector('#equalTo');

    let Normal_btn = document.querySelectorAll('#Normal_btn');    
    let initial_value = "";
    Normal_btn.forEach((Normal_btn, index)=>{
    Normal_btn.addEventListener('click', function(){
    let text = this.innerHTML;
    initial_value += text;
    result.innerHTML = initial_value;
    });
    });
    
    /*equal to button action*/
    equalTo.addEventListener('click', function(){
    if (result.innerHTML != "") {
    alert(result.innerHTML);

    result.innerHTML = eval(result.innerHTML);
    initial_value = eval(result.innerHTML);
    }else{
    alert('please enter any Number');
    }
    });
            
    /*clear all number*/
    clear.addEventListener('click', function(){
    result.innerHTML = "";
    initial_value = "";
    });
    
    });