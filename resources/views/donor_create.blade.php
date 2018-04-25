@extends('layouts.app')

@section('content')

    <h1 class="text-center">Be a Donor ! Be a cool person ! </h1>


    <div class="col-lg-8 center-block">
        <form action="/donor/create/" method="post" enctype="multipart/form-data">
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


            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <textarea name="mobile" id="" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="donor_image">Select an image </label>
                <input type="file" name="donor_image" id="donor_image">
            </div>

            <button type="submit" class="btn btn-primary">publish</button>


        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    </div>


@endsection