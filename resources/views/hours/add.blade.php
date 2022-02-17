@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-3">

            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{Request::url()}}">
                        @csrf

                        <div class="form-group">
                            <label for="clock_in">Clock in time</label>
                            <br>
                            <input type="datetime-local" name="clock_in" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="clock_out">Clock out time</label>
                            <br>
                            <input type="datetime-local" name="clock_out" class="form-control">
                        </div>

                        <div class="d-flex">
                            <div class="flex-grow-1 mr-2">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-plus" aria-hidden="true"></i>
                                    Add
                                </button>
                            </div>

                            <div class="flex-grow-1">
                                <button type="submit" name="anotherone" value="true" class="btn btn-primary btn-block">
                                    <i class="fas fa-plus" aria-hidden="true"></i>
                                    Add another
                                </button>
                            </div>
                        </div>

                        @if(Session::has('Entry updated'))
                            <p>Updated</p>
                        @endif

                        @error('*')
                        Oh no
                        @enderror
                    </form>

                </div>
            </div>


        </div>
    </div>
@endsection
