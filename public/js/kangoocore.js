/**
* @developer Jose Pablo Arce
* @developer Susana Corrales
*
* Application NameSpace
*/
var KANGOO = KANGOO || {
  /**
  * This create dependencies for the applicaiton. [localStorage],[Cookies],[@Overides]
  * calls : boot.js -- 'Allways in each loaded view', this.KANGOO.rememberMe
  */
  defaultApp: function(){
    if (localStorage["kangoo"]==undefined) {
      localStorage.setItem("kangoo", "[{\"username\": \"null\",\"token\":\"false\"}]");
    }
  },

  /**
  * Return a localStorage.kangoo
  * return : JSON
  * calls  : boot.js -- 'Allways in each loaded view'
  */
  loadLogUser: function () {
    return jQuery.parseJSON(localStorage.kangoo);
  },

  /**
  * Manage and Save an user information into the localStorage
  * calls : log.js
  */
  rememberMe: function(pUsername, pToken){
    //Prevent an eventual failure with the undefined key into the localStorage
    KANGOO.defaultApp();

    //Save the user
    localStorage.setItem("kangoo","[{\"username\":\""+pUsername+"\",\"token\":\""+
      pToken+"\"}]");
  },

  /**
  * Create a token;
  * return : String random
  * calls  : log.js
  */
  getToken: function() {
    return rand() + rand();
  },

  /**
  * Generate a multi-keys
  * return : String Math function
  * calls  : this.KANGOO.getToken
  */
  rand: function() {
    return Math.random().toString(36).substr(2); // remove `0.`
  },

  /**
  * Execute an Ajax Post to set the output mail
  *
  * calls : Not Yet
  */
  outputGate: function(){

  },
  /**
  * ExecutE an Ajax Post to get the next 10 mails in the output gate...
  */
  outputAjaxPOST: function(start, end){
    $.ajax({
      data:  {"start" : start ,"end" : end},
      url:   '/kangoo/dashboard/outputCharger',
      type:  'post',
      beforeSend: function () {
        console.log("Processing new stack of mails...");
      },
      success:  function (response) {
        var objPost = "";
      //**
      console.log(response);
      // try {
      //   objPost = jQuery.parseJSON(response);
      //   //**
      //   console.log(objPost);
      //   if (objPost.res == "successful") {
      //     location.reload();
      //   }
      // } catch (e) {
      //   alert("Woops! Kangoos have some problems here... (: Calm, tray to close your session and/or loging again :)");
      //   console.log(e);
      // }
    }
  });
  },

  /**
  * Draw a new sent rows...
  * @param POST responce
  */
  appendSentRows: function(post, herFlag, backFlag){
    var objPost = jQuery.parseJSON(post);
    $("#tableBody tr").remove();
    //Validate the 5 records to return back
    if (objPost.mails.length==5 || herFlag==false) {

    for (var i = 0; i < objPost.mails.length; i++) {
      if (localStorage.gate == "sent") {
        $('#tableBody').append( '<tr value="objPost.mails[i].id_mail"">'+
      '<td><input onclick="KANGOO.showMailInfo(this.value);"name="viewbutton" value="'+objPost.mails[i].id_mail+
      '" type="image" src="/kangoo/public/img/mail.png" alt="button"></td>'+
      '<td>' + objPost.mails[i].subject + '</td>'+
      '<td>' + objPost.mails[i].date+'<td><input onclick="KANGOO.deleteMail(this.value);"name="deletebutton" value="'+objPost.mails[i].id_mail+
      '" type="image" src="/kangoo/public/img/delete.png" alt="button"></td></tr>');
      }else{
      $('#tableBody').append( '<tr value="objPost.mails[i].id_mail"">'+
      '<td><input onclick="KANGOO.showMailInfo(this.value);"name="viewbutton" value="'+objPost.mails[i].id_mail+
      '" type="image" src="/kangoo/public/img/mail.png" alt="button"></td>'+
      '<td>' + objPost.mails[i].subject + '</td>'+
      '<td>' + objPost.mails[i].date+'<td><input onclick="KANGOO.deleteMail(this.value);"name="deletebutton" value="'+objPost.mails[i].id_mail+
      '" type="image" src="/kangoo/public/img/delete.png" alt="button"><input onclick="KANGOO.editMailInfo(this.value);"name="editbutton" value="'+objPost.mails[i].id_mail+
      '" type="image" src="/kangoo/public/img/edit.png" alt="button"></td></tr>');
      }
    }
    }
    localStorage.setItem("finalLoop", objPost.finalLoop);
    localStorage.setItem("initialLoop", objPost.initialLoop);
    localStorage.setItem("diference", objPost.diference);
    if (objPost.mails.length!=5 && backFlag==true) {
    var sum = parseInt(localStorage.initialLoop)+parseInt(localStorage.diference);
    console.log(sum);
    if (sum>parseInt(localStorage.localStack)) {
      return;
    }
    console.log(parseInt(localStorage.initialLoop)+parseInt(localStorage.diference));
    KANGOO.callStackBack(sum);
    }
  },
  /**
  * Call the next 10 mail next
  */
  callStack: function(indexTo){
    $.ajax({
    data:  {"sentstack" : indexTo, "findby": localStorage.gate  },
    url:   '/kangoo/dashboard/outputCharger',
    type:  'post',
    beforeSend: function () {
      console.log("Processing post mails count and get new stack");
    },
    success:  function (response) {
      KANGOO.appendSentRows(response, false, false);
    }
  });
  },
    /**
  * Call the next 10 mail back
  */
  callStackBack: function(indexTo){
    $.ajax({
    data:  {"sentstack" : indexTo, "findby": localStorage.gate  },
    url:   '/kangoo/dashboard/outputCharger',
    type:  'post',
    beforeSend: function () {
      console.log("Processing post mails count and get new stack");
    },
    success:  function (response) {
      KANGOO.appendSentRows(response, true, true);
    }
  });
  },

  /*InitDash load...*/
  initDash: function(target){
  /*Ajax GET: count of the mails in the stack*/
  console.log("Is");
  $.ajax({
    url: "/kangoo/dashboard/getMailStack"
  }).done(function(data)
  {
    console.log(data+" cantidaad");
    /*Set the data into the localStorage*/
    localStorage.setItem("localStack",data);
  });
  /*Ajax post: Sent the mailStack number and response with new mails stack*/
    $.ajax({
    data:  {"sentstack" : localStorage.localStack, "findby": target},
    url:   '/kangoo/dashboard/outputCharger',
    type:  'post',
    beforeSend: function () {
      console.log("Processing post mails count and get new stack");
    },
    success:  function (response) {
      console.log(response);
      KANGOO.appendSentRows(response, false, false);
    }
  });
  },

  /**
  * Delete an especific mail
  */
  deleteMail: function(pressed) {
    console.log(pressed);
    $.ajax({
    data:  {"id_mail" : parseInt(pressed)},
    url:   '/kangoo/dashboard/deleteMail',
    type:  'post',
    beforeSend: function () {
      console.log("Deleting mail...");
    },
    success:  function (response) {
      console.log(response);
      location.reload();
      // if (response=="\"success\"") {
      //  KANGOO.callStack(localStorage.initialLoop);
      // }else{
      //   alert("Upps! That mail can not deleted... :( ");
      // }
    }
  });
  },

  /**
  * Show a mail content
  */
  showMailInfo: function(idMail){
console.log("Se levantó el view");
   $('#modal1').openModal();
    //Dedelete the current tags
    $("#modelCard h4").remove();
    $("#modelCard p").remove();
    $("#modelCard label").remove();
    $.ajax({
    data:  {"id_mail" : parseInt(idMail)},
    url:   '/kangoo/dashboard/getEmail',
    type:  'post',
    beforeSend: function () {
      console.log("Show mail...");
    },
    success:  function (response) {
      var mymailjson = jQuery.parseJSON(response);
      $('#modelCard').append("<h4>"+mymailjson.subject+"</h4><label>Date and hour: "+
      mymailjson.date+"</label>");
      $('#modelCard').append("<p>"+mymailjson.content+"</p>");
      console.log(mymailjson.state);
    }
  });
  },
  /**
  *
  */
  /**
  * Show a selected mail content to edit
  */
  editMailInfo: function(idMail){
    console.log("Se levantó el edit");
     $('#modal2').openModal({
      complete: function(){ console.log("Cierre!");}
    });

    $("#modelCardEdit input").remove();
    $("#modelCardEdit textarea").remove();
    $("#modelCardEdit label").remove();
    $.ajax({
    data:  {"id_mail" : parseInt(idMail)},
    url:   '/kangoo/dashboard/getEmail',
    type:  'post',
    beforeSend: function () {
      console.log("Show mail...");
    },
    success:  function (response) {
      var mymailjson = jQuery.parseJSON(response);
      $('#modelCardEdit').append("<label>Subject: </label><input type='text' id='mailSubject' value='"+mymailjson.subject+"'>"+
        "<label>"+mymailjson.date+"</label>");
      $('#modelCardEdit').append("<textarea>"+mymailjson.content+"</textarea>");
      console.log(mymailjson.state);
    }
  });
    //Dedelete the current tags

  },

  /**
  *
  */

  /**
  *
  */
  sayHello: function (){
    alert("Hello");
  },
};
