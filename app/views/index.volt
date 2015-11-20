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
</head>
<body>
  {{ content() }}
  <footer class="page-footer blue accent-5">
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
        <a class="grey-text text-lighten-4 right" href="https://www.facebook.com/josepablo.arcecascante">More Links</a>
      </div>
    </div>
  </footer>
</body>
{{ javascript_include('js/jquery-2.1.4.min.js')}}
{{ javascript_include('js/materialize.min.js') }}
<!-- Dropdown Structure -->
</html>
