let urls = JSON.parse(document.querySelector('#obj-urls').innerHTML);

var provider = new firebase.auth.GoogleAuthProvider();

function popupGoogleSignIn(){
    console.log('popup');
    firebase.auth().signInWithPopup(provider).then(async function(result) {
        // This gives you a Google Access Token. You can use it to access the Google API.
        var token = result.credential.accessToken;
        // The signed-in user info.
        var user = result.user;

        await firebase.auth().signOut();
        
        await post(urls.routeLogin + "?m=google", user, 'post');

      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // ...
        let result = {
            success: false,
            response: null,
            err: {
                code: errorCode,
                msg: errorMessage
            }
        };

        window.location.href = urls.pageError + "?result=" + JSON.stringify(result);
      });
}

function post(path, params, method='post') {
    console.log('post');
    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    const form = document.createElement('form');
    form.method = method;
    form.action = path;
  
    for (const key in params) {
      if (params.hasOwnProperty(key)) {
        const hiddenField = document.createElement('input');
        hiddenField.type = 'hidden';
        hiddenField.name = key;
        hiddenField.value = params[key];
  
        form.appendChild(hiddenField);
      }
    }
  
    document.body.appendChild(form);
    form.submit();
  }

