/**
* Dash execute JavaScript primary functions for the dashboard view.
* Manage actions like fill a table with a new stack with mails through Ajax Post
*/
$(document).ready(function(){
  /*Init*/
  KANGOO.initDash('sent');
  /*Click event for sent mails button*/
  $("#exsent").click(function() {
    console.log("Sent Init pressed");
    KANGOO.initDash('sent');
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
  /*----------------------------------------------------------------------edge*/
});
