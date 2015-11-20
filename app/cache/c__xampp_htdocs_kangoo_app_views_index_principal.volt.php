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
  <ul id="dropdown1" class="dropdown-content">
    <li ><a href="http://localhost:81/kangoo/index/enviados">Enviados</a></li>
    <li><a href="http://localhost:81/kangoo/index/principal">Salida</a></li>
  </ul>
  <nav>
    <div class="nav-wrapper blue lighten-1">
      <ul class="right hide-on-down-and-down">
        <!-- Dropdown Trigger -->
        <li><a class="dropdown-button waves-effect" data-belowOrigin= "true" href="#!" data-activates="dropdown1"><i class="mdi-navigation-menu"></i></a></li>
      </ul>
    </div>
  </nav>
  <?php echo $this->getContent(); ?>
  <div class="fixed-action-btn horizontal" style="bottom: 30%; RIGHT: 50px;">
    <a class="btn-floating btn-large blue lighten-3">OPTIONS</a>
    </a>
    <ul>
      <li><a class="btn-floating blue lighten-1"><i class="material-icons">SEND</i></a></li>
      <li><a class="btn-floating blue lighten-2"><i class="material-icons">OUTPUT</i></a></li>
      <li><a class="btn-floating blue lighten-3"><i class="material-icons">CREATE</i></a></li>
    </ul>
  </div>
  <div class="container">
    <table  class="highlight centered striped responsive-table">
      <thead>
        <tr>
          <th data-field="id">Destinatarios</th>
          <th data-field="Subjet">Subjet</th>
          <th data-field="Date">Date and Time</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</div>
<div>     
  <ul class="pagination center" >
    <li class="waves-effect"><a href="#!"><i class="material-icons"></i></a></li>
    <li class="waves-effect"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons"></i></a></li>
  </ul>
</div>
</body>
<?php echo $this->tag->javascriptInclude('js/jquery-2.1.4.min.js'); ?>
<?php echo $this->tag->javascriptInclude('js/materialize.min.js'); ?>
<!-- Dropdown Structure -->
</html>
