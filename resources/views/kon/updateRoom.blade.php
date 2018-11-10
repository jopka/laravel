{!! Form::open(['url' => route('rooms.update',['id'=> $id]),
 'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

{!! Form::text('name'); !!}
{!! Form::text('roomName'); !!}
{!! Form::radio('manager', true); !!}
{!! Form::radio('manager', false); !!}
{!! Form::radio('user', true); !!}
{!! Form::radio('user', false); !!}


    <input type="hidden" name="_method" value="PUT">

{!! Form::submit('Click Me!'); !!}
{!! Form::close() !!}
{!! Form::open(['url' => route('rooms.destroy',['id'=> $id]),'method'=>'POST']) !!}
{{ method_field('DELETE') }}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}