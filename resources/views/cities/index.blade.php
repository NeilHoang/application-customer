@extends('layouts.app')

@section('content')
    <a href="{{route('customer.index')}}"><img src="https://img.icons8.com/cotton/64/000000/gender-neutral-user--v1.png"></a>
    <a href="{{route('cities.create')}}"><img src="https://img.icons8.com/dusk/64/000000/create-new.png"></a>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        @foreach($cities as $key => $city)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$city->name}}</td>
                <td>
                    <a href="{{route('cities.delete',$city->id)}}"><img
                            src="https://img.icons8.com/nolan/30/000000/delete-sign.png"></a>
                </td>
                <td>
                    <a href="{{route('cities.edit',$city->id)}}"><img
                            src="https://img.icons8.com/nolan/30/000000/edit.png"></a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
