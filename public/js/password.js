function myFunction(){
    var x = document.getElementById('typePhone');
    if(x.type === "password") {
        x.type = "text";
        document.getElementById('hide').style.display= "inline-block";
        document.getElementById('hide').style.display= "none";
    }
    else{
        x.type= "password";
        document.getElementById('hide').style.display= "none";
        document.getElementById('show').style.display= "inline-block";
    }

}

document.querySelector('.show').addEventListener('click', function(event) {
    event.currentTarget.classList.toggle('bi-eye');
    event.currentTarget.classList.toggle('bi-eye-slash');
    document.querySelector('#password').type = document.querySelector('#password').type == 'password' ? 'test' : 'password';
})
