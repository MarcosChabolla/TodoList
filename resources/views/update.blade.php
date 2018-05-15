@extends('layout')

@section('content')


    <div class="row">
        <div class ="col-lg-6 col-lg-offset-3">    
            <form action="{{ route('todo.save', ['id' => $todo->id]) }}" method="post">
                {{ csrf_field() }}

            <input class="form-control input-lg" type = "text" name="todo" value ="{{  $todo->todo }}"  placeholder="Create a New Todo"></input>

            </form>
        </div>
    </div>

@stop