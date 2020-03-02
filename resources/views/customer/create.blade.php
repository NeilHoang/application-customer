@extends('layouts.app')

@section('content')
    <body>
    <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
            @if($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label>Age</label>
            <input type="text" class="form-control" name="age">
            @if($errors->has('age'))
                <p class="text-danger">{{$errors->first('age')}}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone">
            @if($errors->has('phone'))
                <p class="text-danger">{{$errors->first('phone')}}
                </p>
            @endif
        </div>
                <div>
                    <lable>City</lable>
                    <select name="city">
                        @foreach($cities as $city)
                            <option value="{{$city['id']}}">{{$city['name']}}</option>
                        @endforeach
                    </select>
                </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit"><img src="https://img.icons8.com/nolan/64/000000/update-tag.png"></button>
        <a href="{{route('customer.index')}}"><img src="https://img.icons8.com/nolan/64/000000/circled-left-2.png"></a>
    </form>
    </body>
@endsection
