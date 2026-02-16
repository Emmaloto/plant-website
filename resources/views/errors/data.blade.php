@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4>Error</h4>
                </div>
                <div class="card-body">
                    <p class="lead">{{ $message ?? 'An unexpected error occurred.' }}</p>
                    <a href="/" class="btn btn-primary mb-3">Return to Home</a>
                    @if(isset($trace))
                        <button class="btn btn-link p-0" onclick="document.getElementById('stack-trace').classList.toggle('d-none')">Show/Hide Details</button>
                        <pre id="stack-trace" class="bg-light border rounded p-2 mt-2 d-none" style="white-space: pre-wrap; word-break: break-all;">{{ $trace }}</pre>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
