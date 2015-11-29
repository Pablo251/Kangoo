{{ content()}}
<section>
  <div class = 'container light-blue-text text-darken-1'>
    <h2>Login</h2>
    {{ form('class': 'form-search light-blue-text text-darken-1') }}</br>
    {{ form.label('username') }}</br>
    {{ form.render('username')}}</br>
    {{ form.messages('username')}}</br></br>
    {{ form.label('password')}}</br>
    {{ form.render('password')}}</br>
    {{ form.messages('password')}}</br></br>
    {{ form.render('remember') }}
    {{ form.label('remember') }}</br></br>
    {{ form.render('Continue')}}
    {{ link_to()}}
  </form>
</div>
</section>
<script type="text/javascript">
</script>
