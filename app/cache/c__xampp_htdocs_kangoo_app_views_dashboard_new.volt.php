<div>
<ul id="dropdown1" class="dropdown-content"><a href="http://localhost:81/kangoo/index/enviados" style="float:left;"></a>
</ul>
<nav>
<div class="nav-wrapper blue lighten-1">
<ul class="left hide-on-down-and-down"  style="float:right; width:9%; height:90%;">
<li><a href="http://localhost:81/kangoo/dashboard">DASHBOARD</a></li>
</ul>
</div>
</nav>
<div class="row">
<?php echo $this->tag->form(array('class' => 'form-search')); ?></br>
<div class="col s12 col m4">
<p>ADRESS</p>
<div class= "card-panel  blue lighten-4" style="width:2%  height:90%">
<!--Adress-->
<?php echo $form->render('adress'); ?></br>
<?php echo $form->messages('adress'); ?></br>
<!--<textarea style="margin: 0px; height: 40%;">-->
<!--</textarea>-->
</div>
<p>SUBJET</p>
<div class= "card-panel  blue lighten-4" style="width:100%  height:90%">
<!--Subject-->
<?php echo $form->render('subject'); ?></br>
<?php echo $form->messages('subject'); ?></br>
<!--<textarea style="margin: 0px; height:  344px;">-->
<!--</textarea>-->
</div>
</div>
<div class="row">
<div class="col s8 col m8">
<p>CONTENT</p>
<div class= "card-panel  blue lighten-4" style="width:100%  height:90%">
<!--Content-->
<?php echo $form->render('content'); ?></br>
<?php echo $form->messages('content'); ?></br>
<!--<textarea style="margin: 0px; height: 492px;">-->
<!--</textarea>-->
</div>
</div>
<div class= "style="width:100%  height:90%">
<?php echo $form->render('Send'); ?>
<a class="waves-effect blue lighten-3 btn" href="/kangoo/dashboard">Cancel</a>
</div>
</form>
</div>
</div>
