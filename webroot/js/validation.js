$( "#regform" ).validate({
  rules: {
    Name: {
      required: true,
      minlength: 2,
      maxlength: 64
    },
    Surname: {
      required: true,
      minlength: 2,
      maxlength: 64
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
      maxlength: 8

    }

  }
});
