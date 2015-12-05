/**
* Dash execute JavaScript primary functions for the dashboard view.
* Manage actions like fill a table with a new stack with mails through Ajax Post
*/
$(document).ready(function() {
  $("#exsent").click(function() {
    KANGOO.outputAjaxPOST(2, 6);
  });
});
