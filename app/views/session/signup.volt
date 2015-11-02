{{ content()}}
<section>
  <!--This contains a signup form-->
  <div>
    <h2>Sign Up</h2>
    <!--br help to view more order-->
    {{ form('class': 'form-search') }}</br>
    <!--Name-->
    {{ form.label('name')}}</br>
    {{ form.render('name') }}</br>
    {{ form.messages('name') }}</br>
    <!--email-->
    {{ form.label('email')}}</br>
    {{ form.render('email') }}</br>
    {{ form.messages('email') }}</br>
    <!--password-->
    {{ form.label('password')}}</br>
    {{ form.render('password') }}</br>
    {{ form.messages('password') }}</br>
    <!--password again-->
    {{ form.label('confirmPassword')}}</br>
    {{ form.render('confirmPassword') }}</br>
    {{ form.messages('confirmPassword') }}</br>
    <!--password again-->
	   {{ form.render('terms') }} {{ form.label('terms') }}<br>
    {{ form.messages('terms') }}</br>
    {{ form.render('Sign Up') }}
  </form>
</div>
</section>
