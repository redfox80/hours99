@if(Session::has('toasts'))
    <div class="position-fixed w-100 h-auto mt-3">

        @foreach(Session::get('toasts') as $toast)
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="@if(isset($toast['nohide'])){{ $toast['nohide'] ? "false":"true" }}@else{{"true"}}" data-delay="{{"2000"}}@endif">
                <div class="toast-header text-white @if(isset($toast['color'])){{'bg-' . $toast['color']}}@else{{'bg-primary'}}@endif">
                    <strong class="mr-auto">{{ $toast['title'] }}</strong>
                    <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ $toast['body'] }}
                </div>
            </div>
        @endforeach
    </div>
@endif
