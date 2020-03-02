@extends('layouts.app')

@section('content')
    <form action="{{route('customer.update',$customers->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$customers->name}}">
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control" name="age" value="{{$customers->age}}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$customers->phone}}">
        </div>
        <div>
            <lable>City</lable>
            <br>
            <select name="city">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div><br>
        <label>Image</label>
        <img src="{{asset("/storage/".$customers->image)}}"
               width="100px" height="100px"><br><br>
        <input type="file"  id="image" name="image">
        <button type="submit"><img src="https://img.icons8.com/flat_round/64/000000/available-updates--v2.png"></button>
    </form>
@endsection


