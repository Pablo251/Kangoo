<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->tag->stylesheetLink('css/materialize.min.css'); ?>
        <!-- <link href="http://materializecss.com/templates/parallax-template/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="Kangoo as a WebMail manager">
        <meta name="author" content="Susana Corrales & Pablo Arce Cascante">
        <?php echo $this->tag->getTitle(); ?>
    </head>
    <body>
        <?php echo $this->getContent(); ?>
        <?php echo $this->tag->javascriptInclude('js/jquery-2.1.4.min.js'); ?>
        <?php echo $this->tag->javascriptInclude('js/materialize.min.js'); ?>
        <!-- Dropdown Structure -->
    </body>
  <ul id="dropdown1" class="dropdown-content">
  <li ><a href="#!">Enviados</a></li>
  <li><a href="#!">Salida</a></li>
</ul>
<nav>
  <div class="nav-wrapper blue darken-3">
    <ul class="left hide-on-down-and-down">
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button waves-effect" data-belowOrigin= "true" href="#!" data-activates="dropdown1"><i class="mdi-navigation-menu"></i></a></li>
    </ul>
  </div>
</nav>
 
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
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
                  
</html>
