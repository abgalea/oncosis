@if (isset($item))
<!-- Model Form -->
{!! Form::model($item, ['method' => 'PATCH', 'route' => [$action_route, $item->id], 'class' => 'form-horizontal'] ) !!}
	{!! Form::hidden('id', null ) !!}
@else
<!-- Single Form -->
{!! Form::open(['route' => $action_route, 'class' => 'form-horizontal']) !!}
@endif
