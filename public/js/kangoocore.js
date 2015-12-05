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
  sayHello: function (){
    alert("Hello");
  },
};
