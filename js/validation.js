
$(document).ready(e=>{

    $('#studentForm').submit(function(e) {
        console.log('Form Submitted');

        let name = $('#name').val(),
            surname = $('#surname').val(),
            address = $('#address').val(),
            phoneNumber = $('#phoneNumber').val(),
            dob = $('#dob').val();


        $('#nameError').text('');
        $('#surnameError').text('');
        $('#addressError').text('');
        $('#phoneNumerError').text('');
        $('#publishedError').text('');

        let valid = true;

        if(name === '' || name==='undefined'){

            valid = false;
            $('#nameError').text("Name is invalid");

        }
        if(surname === '' || surname==='undefined'){
            valid = false;
            $('#surnameError').text("surname is invalid");
        }
        if(address === '' || address==='undefined'){
            valid = false;
            $('#addressError').text("address is invalid");;
        }
        if(phoneNumber === '' || phoneNumber==='undefined'){
            valid = false;
            $('#phoneNumberError').text("phoneNumber is invalid");;
        }
        if(dob === '' || dob==='undefined'){
            var regex = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

            if(!regex.test(dob)){
                valid = false;  
                console.log('Regex is false');        
                $('#publishedError').text("Published date is invalid");
            }
        }

        if(!valid){
            e.preventDefault();
        }
     });
    
});