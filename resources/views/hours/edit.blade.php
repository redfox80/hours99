@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-3">

            <p>
            Entry id {{$hour->id}}
            </p>

            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{Request::url()}}">
                        @csrf

                        <div class="form-group">
                            <label for="clock_in">Clock in time</label>
                            <br>
                            <input type="datetime-local" name="clock_in" class="form-control" value="{{\Carbon\Carbon::parse($hour->clock_in)->format('Y-m-d\TH:i')}}">
                        </div>

                        <div class="form-group">
                            <label for="clock_out">Clock out time</label>
                            <br>
                            <input type="datetime-local" name="clock_out" class="form-control" value="{{\Carbon\Carbon::parse($hour->clock_out)->format('Y-m-d\TH:i')}}">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-danger" onclick="document.querySelector('#deleteHourForm').submit();">Delete</button>

                        @if(Session::has('Entry updated'))
                            <p>Updated</p>
                        @endif

                        @error('*')
                        Oh no
                        @enderror
                    </form>

                    <form action="{{ route('deleteHour') }}" method="post" class="hidden" id="deleteHourForm">
                        @csrf
                        <input type="hidden" name="hid" value="{{$hour->id}}">
                    </form>

                </div>
            </div>


        </div>
    </div>
@endsection
