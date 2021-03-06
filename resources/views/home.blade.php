@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header m-auto"> <h2><strong>Two factor authentication</strong> </h2> </div>

                <div class="card-body m-auto">
                    @if (session('status')== "two-factor-authentication-disabled")
                        <div class="alert alert-success" role="alert">
                            two Factor Authentication has been disabled.
                        </div>
                    @endif
                    @if (session('status')== "two-factor-authentication-enabled")
                        <div class="alert alert-success" role="alert">
                            two Factor Authentication has been enabled.
                        </div>
                    @endif

                    <form method="POST" action="/user/two-factor-authentication ">
                        @csrf

                        @if (auth()->user()->two_factor_secret)
                            @method('DELETE')

                            <div class="pb-5">{!!auth()->user()->twoFactorQrCodeSvg()!!}</div>

                            <button class="btn btn-danger">Disable</button>
                        @else
                            <button class="btn btn-primary">Enable</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
