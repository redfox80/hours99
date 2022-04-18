@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{Request::url()}}">
                        @csrf

                        <div class="form-group" style="max-width: 170px;">
                            <label for="start_date">From</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"/>
                        </div>

                        <div class="form-group" style="max-width: 170px;">
                            <label for="end_date">To</label>
                            <input type="date" class="form-control" id="end_date" name="end_date"/>
                        </div>

                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    @if(isset($hours))
                    <p>
                        Total hours in period: <b>{{ $totalHours }}</b>
                    </p>

                    <table class="table table-striped" style="width: auto;">
                        <thead class="bg-primary text-white text-center">
                            <th>Date</th>
                            <th>Hours</th>
                        </thead>
                        @foreach($hours as $hour)
                        <tr>
                            <td style="padding: 12px 24px;">{{ \Carbon\Carbon::parse($hour->clock_in)->format('d.m.Y') }}</td>
                            <td style="padding: 12px 24px;">{{ $hour->hourCount }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
