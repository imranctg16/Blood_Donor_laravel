@extends('layouts.app')

@section('content')
    <h1>Result: </h1>

    <h1 class="bg-info text-center">Total {{count($result)}} result found ! </h1>
    @foreach($result as $value)
        <div class="col-lg-8 center-block">

        <h2>Name: {{$value->user->name}}  </h2>

        <h2>Mobile Number: {{$value->mobile}}  </h2>
        <h2>Place: {{$value->district->name}}  </h2>
        <div class="img-responsive">
            <img  height="100px" src="/images/{{$value->user->name}}/{{$value->picture}}" alt="Donor Image">
        </div>

        </div>
        <hr>
    @endforeach



@endsection