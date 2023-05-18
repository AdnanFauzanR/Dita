<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <form method="GET" action="{{ route('logout') }}">

                        <button type="submit" class="btn btn-danger">{{ __('Logout') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
