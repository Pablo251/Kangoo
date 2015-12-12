/**
* Dash execute JavaScript primary functions for the dashboard view.
* Manage actions like fill a table with a new stack with mails through Ajax Post
*/
$(document).ready(function(){
  /*Init*/
  localStorage.gate = "sent";
  KANGOO.initDash('sent');
  /*Click event for sent mails button*/
  $("#exsent").click(function() {
    localStorage.gate = "sent";
    console.log("Sent Init pressed");
    KANGOO.initDash('sent');
  });
  //Click event for exout
  $("#exoutput").click(function() {
    localStorage.gate = "output";
    console.log("Output Init pressed");
    KANGOO.initDash('output');
  });
  /*Click event for next button*/
  $("#next").click(function() {
    if (parseInt(localStorage.finalLoop)>0) {
      KANGOO.callStack(localStorage.finalLoop);
    }
  });
  /*Click event for the back button*/
  $("#back").click(function() {
    var sum = parseInt(localStorage.initialLoop)+parseInt(localStorage.diference);
    console.log(sum);
    if (sum>parseInt(localStorage.localStack)) {
      return;
    }
    console.log(parseInt(localStorage.initialLoop)+parseInt(localStorage.diference));
    KANGOO.callStackBack(sum);
  });
  /*Click event for the modal..*/
  $("#pressModal2").click(function(){
    KANGOO.saveChanges();
  });
  /*Click event for the logout*/
  $("#closeSession").click(function(){
    KANGOO.logout();
    alert("So long! :)");
  });
  /*----------------------------------------------------------------------edge*/
});
