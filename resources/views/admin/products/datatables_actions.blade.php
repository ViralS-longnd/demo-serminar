{!! Form::open(['route' => ['admin.products.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.products.show', $id) }}"'>
        <i style="font-size: 18px; margin-right: 5px;" class="fa fa-info-circle" aria-hidden="true"></i>
    </a>
    <a href="{{ route('admin.products.edit', $id) }}">
     <i  style="font-size: 18px; margin-right: 5px;" class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </a>
    {!! Form::button('<i style="font-size: 18px" class="fa fa-times-circle" aria-hidden="true"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
