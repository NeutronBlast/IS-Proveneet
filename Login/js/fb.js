// jshint esversion: 8
(function () {
var firebaseConfig = {
apiKey: "AIzaSyBWVRTc7stMysJVw4rjvzzn5-FnvMAE8_8",
authDomain: "proveneet.firebaseapp.com",
databaseURL: "https://proveneet.firebaseio.com",
projectId: "proveneet",
storageBucket: "proveneet.appspot.com",
messagingSenderId: "37090380224",
appId: "1:37090380224:web:a9e4c49d1e4b80bf"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
//firebase.auth().setPersistence(firebase.auth.Auth.Persistence.LOCAL);
const txUser = document.getElementById('user');
const txPass = document.getElementById('pass');
const logIn = document.getElementById('logBtn');
const salir = document.getElementById('salir');


logIn.addEventListener('click', e => {
        //Get credentials 
        const email = txUser.value;
        const pass = txPass.value;
        const auth = firebase.auth();   
        //sign in 
        const promise = auth.signInWithEmailAndPassword(email,pass);
        
        promise
                .then(user => {window.location.href="../Main/index.html";console.log('null');})
                .catch (e =>{console.log(e.message);alert(e.message);} );        
});



salir.addEventListener('click', e=> {firebase.auth().signOut();});

firebase.auth().onAuthStateChanged(firebaseUser => {
        if (firebaseUser) {
                console.log (firebaseUser);
        }else {
                console.log("not logged");
        }

});





}());