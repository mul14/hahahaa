
{{ Form::model('User', array('route' => 'auth')) }}


<div class="control-group">
    {{ Form::label('email') }}
    {{ Form::text('email', '', array('class' => 'form-control')) }}
</div>


<div class="control-group">
    {{ Form::label('password') }}
    {{ Form::password('password', array('class' => 'form-control')) }}
</div>


{{ Form::submit('Login') }}

{{ Form::close() }}
