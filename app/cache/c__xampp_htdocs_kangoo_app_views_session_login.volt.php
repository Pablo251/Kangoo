<?php echo $this->getContent(); ?>
<section>
  <div class = 'container light-blue-text text-darken-1'>
    <h2>Login</h2>
    <?php echo $this->tag->form(array('class' => 'form-search light-blue-text text-darken-1')); ?></br>
    <?php echo $form->label('username'); ?></br>
    <?php echo $form->render('username'); ?></br>
    <?php echo $form->messages('username'); ?></br></br>
    <?php echo $form->label('password'); ?></br>
    <?php echo $form->render('password'); ?></br>
    <?php echo $form->messages('password'); ?></br></br>
    <?php echo $form->render('remember'); ?>
    <?php echo $form->label('remember'); ?></br></br>
    <?php echo $form->render('Continue'); ?>
    <?php echo $this->tag->linkTo(array()); ?>
  </form>
</div>
</section>
<?php echo $this->tag->javascriptInclude('js/log.js'); ?>
