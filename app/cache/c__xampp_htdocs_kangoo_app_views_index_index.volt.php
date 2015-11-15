<?php echo $this->getContent(); ?>
<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      <h1 class="header center teal-text text-lighten-2">Kangoo WebMail Manager</h1>
      <div class="row center">
        <h5 class="header col s12 light">Send mails and manage them with Kangoo... Lets Jump!</h5>
      </div>
      <div class="row center">
        <?php echo $this->tag->linkTo(array('session/signup', 'Sign up', 'class' => 'btn-large waves-effect waves-light teal lighten-1')); ?>
        
      </div>
      <br><br>
    </div>
  </div>
</div>
