@extends('layouts.master')

@section('content')

	<div class="row mt-sm-0 mt-md-5">

		<div class="col-xl-2 col-md-6 col-md-4">
			<div class="card border-left-primary shadow h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="mr-2">
							<div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
								Total hours
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalHours }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-2 col-md-6 col-md-4">
			<div class="card border-left-primary shadow h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="mr-2">
							<div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
								Hours this month
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalHoursMonth }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-2 col-md-6 col-md-4">
			<div class="card border-left-primary shadow h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="mr-2">
							<div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
								Hours this week
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalHoursWeek }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-xl-2 col-md-6 mt-3">

			<div class="card {{ (Session::get('clockStatus')) ? 'border-success':'border-danger' }}">
				<div class="card-body h4">
					<span class="font-weight-bold">Currently:</span>
					{{ Session::get('clockStatus') ? 'Checked in':'Checked out' }}
				</div>
			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-xl-2 col-md-6 mt-3">
            @if(!Session::get('clockStatus'))
			<a href="{{ url('/clock/in') }}" class="btn btn-lg btn-success font-weight-bold">
				<i class="fas fa-sign-in-alt" aria-hidden="true"></i>
				Clock in
			</a>
            @else
			<a href="{{ url('/clock/out') }}" class="btn btn-lg btn-danger font-weight-bold">
				<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
				Clock out
			</a>
            @endif

		</div>
	</div>

	<div class="row">

		<div class="col-12 mt-3">

			<a href="{{route('addHour')}}" class="btn btn-primary font-weight-bold">
				<i class="fas fa-plus" aria-hidden="true"></i>
				Add hours
			</a>
		</div>
	</div>
@endsection
