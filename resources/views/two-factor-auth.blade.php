@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Two Factor Auth</h2>

        @if ($errors->any())
            <div>
                <div>Something went wrong!</div>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status') == 'two-factor-authentication-enabled')
            <div class="mb-4 font-medium text-sm text-green-600">
                Two factor authentication has been enabled.
            </div>
        @endif

        @if (session('status') == 'two-factor-authentication-disabled')
            <div class="mb-4 font-medium text-sm text-green-600">
                Two factor authentication has been disabled.
            </div>
        @endif

        @if(auth()->user()->two_factor_secret)
            <div>
                {!! auth()->user()->twoFactorQrCodeSvg() !!}
            </div>

            <div>
                {{--{!! (array) auth()->user()->recoveryCodes() !!}--}}
                @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes), true) as $code)
                    <div>{{ $code }}</div>
                @endforeach
            </div>

            <div>
                <form action="/user/two-factor-recovery-codes" method="POST">
                    @csrf
                    <div>
                        <button>Regenerate Codes</button>
                    </div>
                </form>
            </div>

        @endif


        @if(! auth()->user()->two_factor_secret)
            <form action="/user/two-factor-authentication" method="POST">
                @csrf
                <div>
                    <button>Enable</button>
                </div>
            </form>
        @else
            <form action="/user/two-factor-authentication" method="POST">
                @csrf
                @method('delete')
                <div>
                    <button>Disable</button>
                </div>
            </form>
        @endif
    </div>


@endsection