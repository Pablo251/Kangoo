{{ content()}}
<section>
  <div class = 'container light-blue-text text-darken-1'>
    <h2>Login</h2>
    {{ form('class': 'form-search light-blue-text text-darken-1') }}</br>
    {{ form.label('username') }}</br>
    {{ form.render('username')}}</br>
    {{ form.messages('username')}}</br></br>
    {{ form.label('password')}}</br>
    {{ form.render('password')}}</br>
    {{ form.messages('password')}}</br></br>
    {{ form.render('remember') }}
    {{ form.label('remember') }}</br></br>
    {{ form.render('Continue')}}
    {{ link_to()}}
  </form>
</div>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    //localStorage.setItem("kangoo","{username: "+$("#username").val()+", password: "+$("#password").val()+"}");
    // var userObj = {username: "pUserName", password: "pPass"};
    // var userArray = jQuery.parseJSON(localStorage.kangoo);
    //userArray.push("{username: "+$("#username").val()+", password: "+$("#password").val()+"}");
    //localStorage.kangoo = JSON.stringify(userArray);
    //var kol = jQuery.parseJSON(userArray);
    //console.log(userArray[0]["password"]);
$("#remember").click(function() {
  if (document.getElementById("remember").checked) {
    myToken = getToken();
    $("#remember").val(myToken);
  }else {
    myToken = false;
    $("#remember").val("false");
  }
});
var myToken = false;
function getToken() {
  return rand() + rand();
}
function rand() {
    return Math.random().toString(36).substr(2); // remove `0.`
};
$("#submitbtn").click(function() {
  localStorage.setItem("kangoo","[{\"username\":\""+$("#username").val()+
  "\",\"token\":\""+myToken+"\"}]");
  alert(jQuery.parseJSON(localStorage.kangoo));
});
  });
</script>
