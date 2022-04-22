@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form method="get" action="{{Request::url()}}">

                        <div class="d-flex align-items-center">

                            <div class="form-group" style="max-width: 170px;">
                                <label for="from_date">From</label>
                                <input type="date" class="form-control @error('from_date') is-invalid @enderror" id="from_date" name="from_date" @if(isset($oldFromDate)) value="{{ $oldFromDate }}" @endif />
                            </div>
                            @error('from_date')
                            <span class="pl-2 pt-3 text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="d-flex align-items-center">

                            <div class="form-group" style="max-width: 170px;">
                                <label for="to_date">To</label>
                                <input type="date" class="form-control @error('to_date') is-invalid @enderror" id="to_date" name="to_date" @if(isset($oldToDate)) value="{{ $oldToDate }}" @endif />
                            </div>

                            @error('to_date')
                            <span class="pl-2 pt-3 text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(isset($hours))
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
