var nameError = document.getElementById('name-error');
var emailError = document.getElementById('email-error');
var phoneError = document.getElementById('phone-error');
var eventError = document.getElementById('event-error');
var submitError = document.getElementById('submit-error');


function validateName(){
    var name = document.getElementById('contact-name').value;

    if(name.length == 0){
        nameError.innerHTML = 'Name is required'; 
        return false;  
    }

    if(!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)){
        nameError.innerHTML = 'Write full name';
        return false;
    }
    nameError.innerHTML = 'valid';
    return true;
}

function validatePhone(){
    var phone = document.getElementById('contact-phone').value;

    if(phone.length == 0){
        phoneError.innerHTML = 'Phone no is required';
        return false;
    }
    
    if(phone.length !== 10){
        phoneError.innerHTML = 'Phone no should be 10 digits';
        return false;
    }
    if(!phone.match(/^[0-9]{10}$/)){
        phoneError.innerHTML = 'Only digits please.';
        return false;
    }
    if(!phone.match(/^\98[0-9]{8}$/)){
        phoneError.innerHTML = 'Phone number must start with 98';
        return false;
    }
    phoneError.innerHTML = 'valid'
    return true;
}
function validateEmail(){
    var email = document.getElementById('contact-email').value;

    if(email.length == 0){
        emailError.innerHTML = 'Email is required';
        return false;
    }

    if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        emailError.innerHTML = 'Email Invalid';
        return false;
    }

    emailError.innerHTML = 'valid';
    return true;
}

function validateEvent(){
    var event = document.getElementById('event-error');
    event.value="";
    var eve=document.getElementById("contact-event");
    for(var i=0; i<eve.options.length;i++){
        if(eve.options[i].selected == true)
        {
            event.value +=eve.options[i].value + " ";
            document.getElementById("event-error").innerHTML=event.value;
        }
    }

    if(document.getElementById("event-error").value == "")
    {
        document.getElementById("event-error").innerHTML="Please select atleast one list item";
        return false;
    }

    eventError.innerHTML = 'valid';
    return true;
}



function validateForm(){
    if(!validateName() || !validatePhone() || !validateEmail() || !validateEvent()){
        submitError.style.display = 'block';
        submitError.innerHTML = 'Please fix error to submit';
        setTimeout(function(){submitError.stylr.display = 'none;'},3000);
        return false; 
    }
}
