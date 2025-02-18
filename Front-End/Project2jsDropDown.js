let formatID = /^\d{4}$/;
let passwordFormat = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*\d).{5,}$/;
let phoneNumberFormat = /^\d{3}-\d{3}-\d{4}$/;
let emailFormat = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9]+\.[a-zA-Z]{2,4}$/;

let listPlumberAccounts = [
    {firstName: "Kevin", lastName: "Vojtek", password: "Absf1%", id: "2435", phoneNumber: "943-231-2984", email: "Kevin@gmail.com"},
    {firstName: "John", lastName: "Smith", password: "Ava!s834", id: "3344", phoneNumber: "943-222-2913", email: "John@gmail.com"},
    {firstName: "Logan", lastName: "Weaver", password: "SDjfs!f3", id: "6784", phoneNumber: "917-564-2561", email: "Logan@plumber.com"},
    {firstName: "James", lastName: "Patrick", password: "Rsdgdf1!", id: "9806", phoneNumber: "129-532-3251", email: "James@plumber.com"},
    {firstName: "Dave", lastName: "Graves", password: "SDjfsf2!", id: "7312", phoneNumber: "972-643-2679", email: "Dave@plumber.com"},
    {firstName: "Alex", lastName: "Knight", password: "SDhkjg^^f231", id: "7642", phoneNumber: "943-167-6323", email: "Alex@gmail.com"},
    {firstName: "Mark", lastName: "Kerr", password: "Sasdf412@@", id: "3543", phoneNumber: "467-177-2346", email: "Mark@gmail.com"},
    {firstName: "Sarah", lastName: "Patton", password: "12Sxcv#bsf", id: "2344", phoneNumber: "574-169-7342", email: "Sarah_Patton@gmail.com"},
    {firstName: "Sylvia", lastName: "Lyons", password: "34SD&jfsf4", id: "8844", phoneNumber: "723-874-1257", email: "Sylvia.Lyons@gmail.com"},
    {firstName: "Jack", lastName: "Adams", password: "*SDgklfsf1234", id: "4563", phoneNumber: "642-236-0921", email: "Jack+Adams@gmail.com"}
];

function validate() 
{
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let passwordValue = document.getElementById("password").value;
    let valueID = document.getElementById("Identification").value;
    let phoneNumber = document.getElementById("phone").value;
    let emailValue = document.getElementById("email").value;
    let checkbox = document.getElementById("requestBox").checked;

    if (!firstName || !lastName) 
    {
        alert("Please enter the plumber's first and last name.");
        document.getElementById("firstName").focus();
        return false;
    }

    if (!passwordFormat.test(passwordValue)) 
    {
        alert("Password must be at least 5 characters, include at least one uppercase letter, one number, and one special character.");
        document.getElementById("password").focus();
        return false;
    }

    if (!formatID.test(valueID)) 
    {
        alert("Plumber's ID must be a 4-digit number.");
        document.getElementById("Identification").focus();
        return false;
    }

    if (!phoneNumberFormat.test(phoneNumber)) 
    {
        alert("Phone number must be 10 digits and can include dashes.");
        document.getElementById("phone").focus();
        return false;
    }

    if (checkbox && !emailValue) 
    {
        alert("Please enter an email address as confirmation is requested.");
        document.getElementById("email").focus();
        return false;
    }

    if (checkbox && !emailFormat.test(emailValue)) 
    {
        alert("Please enter a valid email address.");
        document.getElementById("email").focus();
        return false;
    }

    verify(firstName, lastName, passwordValue, valueID, phoneNumber, emailValue);
    return false;
}

function verify(firstName, lastName, passwordValue, id, phone, email) 
{
    for (let plumber of listPlumberAccounts) 
        {
        if (plumber.firstName == firstName &&
            plumber.lastName == lastName &&
            plumber.password == passwordValue &&
            plumber.id == id &&
            plumber.phoneNumber == phone &&
            (!document.getElementById("requestBox").checked || plumber.email == email)) 
            {
                alert("Welcome you have entered the system for the transaction");
                return true;
            }
    }
    alert("No matching plumber account was found")
    return false;
}

function toggleHideShowPassword() 
{
    const passwordField = document.getElementById("password");
    const toggleIcon = document.getElementById("togglePassword");
    
    if (passwordField.type === "password") 
        {
        passwordField.type = "text";
        toggleIcon.innerHTML = "🔒"; 
    } else 
    {
        passwordField.type = "password";
        toggleIcon.innerHTML = "🔓";
    }
}



