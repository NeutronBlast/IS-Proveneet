// jshint esversion: 6
(function () {
    

const txUser = document.getElementById('user');
const txPass = document.getElementById('pass');
const logIn = document.getElementById('logBtn');

logIn.addEventListener('click', e => {
        //Get credentials 
        const email = txUser.value;
        const pass = txPass.value;
        const auth = firebase.auth();   
        //sign in 
        const promise = auth.signInWithEmailAndPassword(email,pass);
        promise.catch (e =>{console.log(e.message);alert(e.message);} );
}

);


}());