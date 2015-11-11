{{ content()}}
<section>
  <div>
    <h2>Login</h2>
    {{ form('class': 'form-search') }}</br>
    {{ form.label('username') }}</br>
    {{ form.render('username')}}</br>
    {{ form.messages('username')}}</br></br>
    {{ form.label('password')}}</br>
    {{ form.render('password')}}</br>
    {{ form.messages('password')}}</br></br>
    {{ form.render('Continue') }}
  </form>
</div>
</section>
