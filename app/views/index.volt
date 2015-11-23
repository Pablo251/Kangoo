<!DOCTYPE html>
<html>
<head>
  {{ stylesheet_link('css/materialize.min.css') }}
  <!-- <link href="http://materializecss.com/templates/parallax-template/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="Kangoo as a WebMail manager">
  <meta name="author" content="Susana Corrales & Pablo Arce Cascante">
  {{ get_title()}}
  {{ javascript_include('js/jquery-2.1.4.min.js')}}
  <script type="text/javascript">
  $(document).ready(function() {
    //Try Ajax post
    if (localStorage["kangoo"]==undefined) {
      alert("Create kangoo");
      localStorage.setItem("kangoo", "[{\"username\":\"null\",\"token\":\"false\"}]");
    }
    var localUser = jQuery.parseJSON(localStorage.kangoo);
    console.log(localUser[0].username);
    $.ajax({
      data:  {"username" : localUser[0].username,"token" : localUser[0].token},
      url:   '/kangoo/index/logPost',
      type:  'post',
      beforeSend: function () {
        console.log("Processando");
      },
      success:  function (response) {
        //actions after post
        var objPost = "";
        console.log(response);
        try {
          objPost = jQuery.parseJSON(response);
          console.log(objPost);
          if (objPost.res == "successful") {
            location.reload();
          }
        } catch (e) {
//          console.log(response+" Fail");

          var pickingJSON = response.lastIndexOf("resJSONkangoo");;
          console.log(pickingJSON);
        }
      }
    });
  });
  </script>
</head>
<body>
  <ul id="dropdown1" class="dropdown-content">
    <li ><a href="session/signup">Enviados</a></li>
    <li><a href="index/principal">Salida</a></li>
  </ul>
  <nav>
    <div class="nav-wrapper blue lighten-1">
      <ul class="left hide-on-down-and-down">
        <!-- Dropdown Trigger -->
        <li><a class="dropdown-button waves-effect" data-belowOrigin= "true" href="#!" data-activates="dropdown1"><i class="mdi-navigation-menu"></i></a></li>
      </ul>
    </div>
  </nav>
  {{ content() }}
  <div class="fixed-action-btn horizontal" style="bottom: 94%; right: 22px;">
    <a class="btn-floating btn-large blue lighten-3">+</a>
  </div>
  <footer class="page-footer blue accent-5" style="display: flex; min-height: 20vh; flex-direction: column;">
    <div class="container">
      <div class="row">
        <div class="col l9 s15">
          <h5 class="white-text">Kangoo WebMail Manager</h5>
          <p class="grey-text text-lighten-4">Send mails and manage them with Kangoo... Lets Jump!</p>
        </div>
        <div class="col l7 offset-l7 s14">
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2015 kangoo.dev
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>
  <!-- {{ javascript_include('js/boot.js')}} -->
  {{ javascript_include('js/materialize.min.js') }}
</body>
</html>
