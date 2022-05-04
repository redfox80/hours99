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
                            <input type="datetime-local" name="clock_in" id="clock_in" class="form-control">
                            <a href="#" class="clockInPreset" d-time="07:30">07:30</a>
{{--                            ---}}
{{--                            <a href="#" class="clockInPreset" d-time="09:00">09:00</a>--}}
                        </div>

                        <div class="form-group">
                            <label for="clock_out">Clock out time</label>
                            <br>
                            <input type="datetime-local" name="clock_out" id="clock_out" class="form-control">
                            <a href="#" class="clockOutPreset" d-time="15:30">15:30</a>
{{--                            ---}}
{{--                            <a href="#" class="clockOutPreset" d-time="18:00">18:00</a>--}}

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

@section('post-script')

    <script>
        let clockInElement = document.getElementById('clock_in');
        let clockOutElement = document.getElementById('clock_out');

        //ciea - Clock In Element Array
        let ciea = document.getElementsByClassName('clockInPreset');
        //coea - Clock Out Element Array
        let coea = document.getElementsByClassName('clockOutPreset');

        for (let e of ciea) {
            e.addEventListener('click', () => {
                let time = e.getAttribute('d-time');
                let today = new Date()
                let date = `${today.getFullYear()}-${((today.getMonth() + 1) < 10) ? '0'+(today.getMonth()+1):(today.getMonth()+1)}-${(today.getDate() +1) < 10 ? '0'+(today.getDate() + 1):(today.getDate()+1)}T${time}`;
                clockInElement.value = date;
            })
        }

        for (let e of coea) {
            e.addEventListener('click', () => {
                let time = e.getAttribute('d-time');
                let today = new Date()
                let date = `${today.getFullYear()}-${((today.getMonth() + 1) < 10) ? '0'+(today.getMonth()+1):(today.getMonth()+1)}-${(today.getDate() +1) < 10 ? '0'+(today.getDate() + 1):(today.getDate()+1)}T${time}`;
                clockOutElement.value = date;
            })
        }
    </script>

@endsection
