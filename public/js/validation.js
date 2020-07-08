document.addEventListener("DOMContentLoaded", function(){
    console.log("DOM loaded");
    var invalid = function(e){
        if(e.target.validity.typeMismatch){
            e.target.setCustomValidity('Unesite validan email');
            return;
          }
      if(e.target.validity.badInput){
        e.target.setCustomValidity('Unesite korisničko ime gosta');
        return;
      }
      if(e.target.validity.toLoong){
        e.target.setCustomValidity('Maksimalan broj karakter je 50');
        return;
      }
      if(e.target.validity.tooShort){
        e.target.setCustomValidity('Minimalan broj karaktera je 3');
        return;
      }
      if(e.target.validity.valueMissing){
        e.target.setCustomValidity('Ovo polje je obavezno');
        return;
      } 
    };
  
    var age_element = document.getElementsByName("username");
    age_element[0].oninvalid = invalid;
    age_element[0].oninput = function(e) {
      e.target.setCustomValidity("");
    };

    var age_element = document.getElementsByName("firstname");
    age_element[0].oninvalid = invalid;
    age_element[0].oninput = function(e) {
      e.target.setCustomValidity("");
    };

    var age_element = document.getElementsByName("lastname");
    age_element[0].oninvalid = invalid;
    age_element[0].oninput = function(e) {
      e.target.setCustomValidity("");
    };

    var age_element = document.getElementsByName("email");
    age_element[0].oninvalid = invalid;
    age_element[0].oninput = function(e) {
      e.target.setCustomValidity("");
    };

    var age_element = document.getElementsByName("password");
    age_element[0].oninvalid = invalid;
    age_element[0].oninput = function(e) {
      e.target.setCustomValidity("");
    };

    var age_element = document.getElementsByName("password_confirmation");
    age_element[0].oninvalid = invalid;
    age_element[0].oninput = function(e) {
      e.target.setCustomValidity("");
    };

    var age_element = document.getElementsByName("date_of_birth");
    age_element[0].oninvalid = invalid;
    age_element[0].oninput = function(e) {
      e.target.setCustomValidity("");
    };

  });