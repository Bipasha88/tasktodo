@extends('layouts.app')

@section('title', "All Tasks")
@section('content')
    <div id="app">
        <sort-component :api-data="{{$api_data}}"></sort-component>
    </div>
@endsection
