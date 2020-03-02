@extends('layouts.app')

@section('content')
    <form action="{{route('cities.update',$cities->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$cities->name}}">
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
