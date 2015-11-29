
/**
* Boostrap JavaScript file.
* This allow execution
*/
$(document).ready(function() {
  //Set Dafault Settings
  KANGOO.defaultApp();

  //Get a stored local User
  var localUser = KANGOO.loadLogUser();

  //** TRY: Ver si estaba agarrando el json correctamente
  console.log(localUser[0].username);

  //Exution of an AJAX POST
  $.ajax({
    data:  {"username" : localUser[0].username,"token" : localUser[0].token},
    url:   '/kangoo/index/logPost',
    type:  'post',
    beforeSend: function () {
      console.log("Process Post");
    },
    success:  function (response) {
      var objPost = "";
      //**
      console.log(response);
      try {
        objPost = jQuery.parseJSON(response);
        //**
        console.log(objPost);
        if (objPost.res == "successful") {
          location.reload();
        }
      } catch (e) {
        alert("Woops! Kangoos have some problems here... (: Calm, tray to close your session and/or loging again :)");
        console.log(e);
      }
    }
  });

  //----------------------------------------------------------------------------
});
