<?php echo $this->getContent(); ?>
<<<<<<< HEAD
<div class="slider" style="width: 100%; height: 100%;">
<ul class="slides" style="height: 760px; padding:0%;">
=======
<div class="slider" style="width: 100%; height: 90%;">
<ul class="slides" style="height: 760px;  padding:0%;">
>>>>>>> refs/remotes/origin/master
<li class="active" style="opacity: 1; transform: translateX(0px) translateY(0px);">
<img style="background-image: url(http://www.imageneswiki.com/Uploads/imageneswiki.com/ImagenesGrandes/canguro-playa.jpg); "> <!-- random image -->
<div class="caption center-align" style="opacity: 1; transform: translateY(0px) translateX(0px);">
<h1 class="header center blue-text text-darken-9">Kangoo WebMail Manager</h1>
<div class="row center">
<h5 class="header col s12 light">Send mails and manage them with Kangoo... Lets Jump!</h5>
</div>
<div class="row center">
<?php echo $this->tag->linkTo(array('session/signup', 'Sign up', 'class' => 'btn-large waves-effect waves-light teal lighten-1')); ?>

<?php echo $this->tag->linkTo(array('session/login', 'LOGIN', 'class' => 'btn-large waves-effect waves-light teal lighten-1')); ?>

</div>
</div>
</li>
</ul>
</div>