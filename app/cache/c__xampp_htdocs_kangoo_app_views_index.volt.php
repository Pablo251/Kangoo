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
  <?php echo $this->tag->javascriptInclude('js/jquery-2.1.4.min.js'); ?>
  <?php echo $this->tag->javascriptInclude('js/kangoocore.js'); ?>
  <?php echo $this->tag->javascriptInclude('js/boot.js'); ?>
</head>
<body>
  <?php echo $this->getContent(); ?>
  
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
  <!-- <?php echo $this->tag->javascriptInclude('js/boot.js'); ?> -->
  <?php echo $this->tag->javascriptInclude('js/materialize.min.js'); ?>
</body>
</html>
