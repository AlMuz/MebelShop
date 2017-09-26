$.validator.addMethod( "phoneLV", function( value, element ) {
	return this.optional( element ) || /^([2]{1})([0-9]{7})*$/.test( value );
}, "Please specify a valid phone number. Example: 21234567" );


$( "#regform" ).validate({
  rules: {
    Name: {
      required: true,
      minlength: 2,
      maxlength: 64,
      lettersonly: true
    },
    Surname: {
      required: true,
      minlength: 2,
      maxlength: 64,
      lettersonly: true
    },
    Login:{
      required: true,
      minlength: 6,
      maxlength: 64
    },
    Email:{
      required: true,
      email: true
    },
    Password:{
      required: true,
      minlength: 6,
      maxlength: 64
    },
    Password_confirmation:{
      required: true,
      minlength: 6,
      maxlength: 64,
      equalTo: "#Password"
    },
    Phonenumber:{
      required: true,
      digits: true,
      minlength: 8,
      // maxlength: 8,
      phoneLV: true
    },
    City:{
      required: true,
      minlength: 3,
      lettersonly: true
    },
    Adress:{
      required: true,
      minlength: 5
    }
  }
});

$( "#profile" ).validate({
  rules: {
    Name: {
      required: true,
      minlength: 2,
      maxlength: 64,
      lettersonly: true
    },
    Surname: {
      required: true,
      minlength: 2,
      maxlength: 64,
      lettersonly: true
    },
    Email:{
      required: true,
      email: true
    },
    Phonenumber:{
      required: true,
      digits: true,
      phoneLV: true,
      // minlength: 8
      // maxlength: 8,

    },
    City:{
      required: true,
      minlength: 3,
      lettersonly: true
    },
    Adress:{
      required: true,
      minlength: 5
    }
  }
});
