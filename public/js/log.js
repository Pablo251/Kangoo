var KANGOO = KANGOO || {
	rememberMe: function(){
		//if (localStorage["kangoo"]==undefined)
		localStorage.setItem("kangoo","");		
		this.userArray.push("{username: "+$("#username").val()+", password: "+$("#password").val()+"}");
		localStorage.userStorage = JSON.stringify(this.userArray);
	},
};