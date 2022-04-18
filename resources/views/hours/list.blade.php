@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <p>
                        <a class="btn btn-primary" href="{{ route('addHour') }}"><i aria-hidden="true" class="fas fa-plus"></i> Add hours</a>
                    </p>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Hours</th>
                            <th>Clock in</th>
                            <th>Clock out</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($hours as $hour)
                            <tr>
                                <td>{{$hour->id}}</td>
                                <td><a href="{{ route('editHour', $hour->id) }}" class="btn btn-outline-primary">Edit</a></td>
                                <td>{{$hour->hourCount}}</td>
                                <td>{{\Carbon\Carbon::parse($hour->clock_in)->format('d-M-y H:i')}}</td>
                                @if($hour->clock_out != null)
                                    <td>{{\Carbon\Carbon::parse($hour->clock_out)->format('d-M-y H:i')}}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
