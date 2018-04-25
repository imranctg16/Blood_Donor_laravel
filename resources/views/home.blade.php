@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{--{!! Form::open(['url' => '','action' => 'DonorController@index']) !!}--}}
                        {{--{!! Form::select('name', $districts, null, ['id' =>'name'],['class' => 'form-control']) !!}--}}
                        {{--{!! Form::select('name', $blood_group, null, ['id' =>'name'],['class' => 'form-control']) !!}--}}
                        {{--{!! Form::close() !!}--}}

                        <form action="/donor/" method="post">
                            {{csrf_field()}}

                            <div class="form-group">


                                <label for="district_select">Select a District </label>
                                <select name="district_select" class="form-control">
                                    @foreach ($districts as $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="blood_select">Select a Blood group </label>
                                <select name="blood_select" class="form-control">
                                    @foreach ($blood_group as  $value)
                                        <option value="{{ $value->id  }}">
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary  ">Search</button>
                        </form>

                        <div class="card">

                            <a class="btn btn-link btn-primary" href="/donor/create">Join as a Donor </a>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
