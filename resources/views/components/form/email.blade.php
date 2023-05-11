<div class="form-group form-group-default {{ (isset($attributes['required'])) ? 'required' : '' }} {{ ($errors->has($name)) ? 'has-error' : '' }}">
    {!! Form::label($name, $label) !!}
    {!! Form::email($name, $value, $attributes) !!}
    @if ($errors->has($name))
        @foreach($errors->get($name) as $message)
            <span class="help-block">{{ $message }}</span>
        @endforeach
    @endif
</div>
