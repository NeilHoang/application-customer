@extends('layouts.app')

@section('content')
    <form action="{{route('cities.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit"><img src="https://img.icons8.com/nolan/64/000000/update-tag.png"></button>
        <a href="{{route('cities.index')}}"><img src="https://img.icons8.com/nolan/64/000000/circled-left-2.png"></a>
    </form>
@endsection

