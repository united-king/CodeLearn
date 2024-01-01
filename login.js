const firebaseConfig = {
    apiKey: "AIzaSyCS-VWoUSbRKdxJTnzQFr2PD6a5yR5vHN0",
    authDomain: "coding-77211.firebaseapp.com",
	projectId: "coding-77211",
	storageBucket: "coding-77211.appspot.com",
	messagingSenderId: "570878328027",
	appId: "1:570878328027:web:3164cd9cd9bc7bb1c9e0fe",
	measurementId: "G-W5H3CJ5PJZ"

    auth.createUserWithEmailAndPassword(email, password)
    .then(function(){
        var user = auth.currentUser
        var database_ref = database.ref()
        var user_data = {
            email:email
            full_name:full_name
        }
        database_ref.child('users/' + user.uid).set(user_data)
        alert('User Created!!')
    })
    .catch(function(error)
    var error_code = error.code
    var error_message = error.message


    alert(error_message)
    )
};

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = firebase.auth()
const database = firebase.database()

function register()
{
    email = document.getElementById('email').value
    password = document.getElementById('password').value
}

function validate_email(email)
{
    expression = /^[^@]+@\w+(\.\w+)+\w$/.test(str);  
    if(expression.test(email) == true)
    {
        true
    }
    else
    {
        return false
    }
}
function validate_password(password)
{
    if(password < 6)
    {
        return false
    }else {
        return true
    }
}

