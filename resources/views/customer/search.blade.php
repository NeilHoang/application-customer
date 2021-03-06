@extends('layouts.app')

@section('content')
    <form action="{{route('customer.search')}}" method="get">
        @csrf
        <td><input type="text" name="search"></td>
        <td><input type="submit" class="btn btn-primary" value="Search"></td>
        <br>
        <td><a href="{{route('customer.index')}}"><img src="https://img.icons8.com/nolan/64/000000/circled-left-2.png"></a>
        </td>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">Image</th>
            </tr>
            </thead>
            @foreach($dataSearch as $key => $customer)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->age}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>
                        @foreach($dataSearch as $city)
                            @if($city->id == $customer->city_id)
                                {{$city->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <img src="{{asset("/storage/$customer->image")}}" width="100px" height="100px">
                    </td>
                    <td>
                        <a href="{{route('customer.delete',$customer->id)}}"><img
                                src="https://img.icons8.com/nolan/30/000000/delete-sign.png"></a>
                    </td>
                    <td>
                        <a href="{{route('customer.edit',$customer->id)}}"><img
                                src="https://img.icons8.com/nolan/30/000000/edit.png"></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$dataSearch->links()}}
    </form>
@endsection
