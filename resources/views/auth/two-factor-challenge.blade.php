@extends('layouts.app')


@section('content')
    <div class="container">
        <h2>Enter your code here for two factor auth</h2>

        @if ($errors->any())
            <div>
                <div>Something went wrong!</div>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{url('/two-factor-challenge')}}">
            @csrf
            <div>
                <label for="code">Code</label>
                <input type="text" id="code" name="code">
            </div>

            <div>
                <button>Confirm</button>
            </div>
        </form>

        <form method="POST" action="{{url('/two-factor-challenge')}}">
            @csrf
            <div>
                <label for="recovery_code">Recovery Code</label>
                <input type="text" id="recovery_code" name="recovery_code">
            </div>

            <div>
                <button>Confirm</button>
            </div>
        </form>
    </div>
@endsection