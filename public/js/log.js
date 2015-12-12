$(document).ready(function() {
  //Variable to set a temporal token
  var myToken = false;

  //Asign a click event to be executed
  $("#remember").click(function() {
    if (document.getElementById("remember").checked) {
      myToken = KANGOO.getToken();
      $("#remember").val(myToken);
    }else {
      myToken = false;
      $("#remember").val("false");
    }
  });

  //Click exection and then save the user information
  $("#submitbtn").click(function() {
    if (document.getElementById("remember").checked) {
      KANGOO.rememberMe($("#username").val(), myToken);
    }else{
      KANGOO.rememberMe("null", false);
    }
  });

  //----------------------------------------------------------------------------
});
