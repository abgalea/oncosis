<div class="form-group {{ ($errors->has($name)) ? 'has-error' : '' }}">
    {!! Form::label($name, $label, ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <div class="input-group date">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            {!! Form::text($name, $value, array_merge(['class' => 'form-control date-picker'], $attributes)) !!}
        </div>
        @if ($errors->has($name))
            @foreach($errors->get($name) as $message)
                <span class="help-block">{{ $message }}</span>
            @endforeach
        @endif
    </div>
</div>
