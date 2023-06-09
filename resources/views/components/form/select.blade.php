<div class="form-group {{ ($errors->has($name)) ? 'has-error' : '' }}">
    {!! Form::label($name, $label, ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select($name, $values, $value, array_merge(['class' => 'form-control'], $attributes)) !!}
        @if ($errors->has($name))
            @foreach($errors->get($name) as $message)
                <span class="help-block">{{ $message }}</span>
            @endforeach
        @endif
    </div>
</div>
