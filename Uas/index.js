const button = document.querySelectorAll('#button');

    for(let i = 0; i < button.length; i++){
        button[i].onclick = function(){
            document.location.href = 'login.php';
        }
    }

   