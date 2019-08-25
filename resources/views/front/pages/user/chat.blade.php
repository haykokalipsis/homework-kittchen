@extends('front.layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Chat</div>

                    <div class="card-body" id="myApp">
{{--                        <chat-app :user="{{ auth()->user() }}"></chat-app>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
	<script src="{{ mix('/js/app.js') }}"></script>
@endpush