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
  outputAjaxPOST : function(){

  },
  sayHello: function (){
    alert("Hello");
  },
};
