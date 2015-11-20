<?php echo $this->getContent(); ?>
<section>
  <!--This contains a signup form-->
  <div>
    <h2>Sign Up</h2>
    <!--br help to view more order-->
    <?php echo $this->tag->form(array('class' => 'form-search')); ?></br>
    <!--Name-->
    <?php echo $form->label('name'); ?></br>
    <?php echo $form->render('name'); ?></br>
    <?php echo $form->messages('name'); ?></br>
    <!--email-->
    <?php echo $form->label('email'); ?></br>
    <?php echo $form->render('email'); ?></br>
    <?php echo $form->messages('email'); ?></br>
    <!--password-->
    <?php echo $form->label('password'); ?></br>
    <?php echo $form->render('password'); ?></br>
    <?php echo $form->messages('password'); ?></br>
    <!--password again-->
    <?php echo $form->label('confirmPassword'); ?></br>
    <?php echo $form->render('confirmPassword'); ?></br>
    <?php echo $form->messages('confirmPassword'); ?></br>
    <!--password again-->
	   <?php echo $form->render('terms'); ?> <?php echo $form->label('terms'); ?><br>
    <?php echo $form->messages('terms'); ?></br>
    <?php echo $form->render('Sign Up'); ?>
    
  </form>
</div>
</section>
