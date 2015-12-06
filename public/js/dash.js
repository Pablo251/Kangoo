/**
* Dash execute JavaScript primary functions for the dashboard view.
* Manage actions like fill a table with a new stack with mails through Ajax Post
*/
$(document).ready(function(){
  /*Ajax GET: count of the mails in the stack*/
  $.ajax({
    url: "/kangoo/dashboard/getMailStack"
  }).done(function(data)
  {
    /*Set the data into the localStorage*/
    localStorage.setItem("localStack",data);
  });
  /*Ajax post: Sent the mailStack number and response with new mails stack*/
    $.ajax({
    data:  {"sentstack" : localStorage.localStack},
    url:   '/kangoo/dashboard/outputCharger',
    type:  'post',
    beforeSend: function () {
      console.log("Processing post mails count and get new stack");
    },
    success:  function (response) {
      KANGOO.appendSentRows(response);
    }
  });
  /*Click event for sent mails button*/
  $("#exsent").click(function() {
    KANGOO.outputAjaxPOST(2, 6);
  });
  /*Click event for next button*/
  $("#next").click(function() {
    KANGOO.callStack(localStorage.finalLoop);
  });
  /*Click event for the back button*/
  $("#back").click(function() {parseInt(localStorage.initialLoop)
    var sum = parseInt(localStorage.initialLoop)+parseInt(localStorage.diference);
    console.log(sum);
    if (sum>parseInt(localStorage.localStack)) {
      return;
    }
    console.log(parseInt(localStorage.initialLoop)+parseInt(localStorage.diference));
    KANGOO.callStack(sum);
  });
  /*----------------------------------------------------------------------edge*/
});
