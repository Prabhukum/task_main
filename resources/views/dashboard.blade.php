@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                   <!-- Full screen modal -->
                        <div class="row justify-content-center" >
                            {{-- <img src="{{asset('image/ffff.png')}}" style="background:fit;" alt="image is not found"> --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
