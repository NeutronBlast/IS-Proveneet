// jshint esversion: 6
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
  
    const user =  localStorage.getItem('credentials');
    console.log(user);
  

  
  firebase.auth().onAuthStateChanged(firebaseUser => {
          if (firebaseUser) {
                  console.log (firebaseUser);
          }else {
                  console.log("not logged");
          }  
  });
  
  
  
  
  
  }());