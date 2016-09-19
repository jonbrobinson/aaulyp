@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <div class="page-content">
            <div>
                <div id="server-response"></div>
                <h1>SECOND PAGE</h1>

                @if(isset($team))
                    @foreach($team as $member)
                        <div class="row">
                            <img src={{ $member->profile_pic }} alt="">
                        </div>
                        <div class="row">
                            <p>Name: {{ $member->first_name }}  {{ $member->last_name }}</p>
                            <p>Title: {{ $member->position }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <br><br><br><br><br><br><br>
    </div>

    @include('partials.footer')
@endsection

@section('javascript')
    <script src="{{ asset('assets/js/plugins/google-map/google-map.js') }}"></script>
    <script src="{{ asset('assets/js/aaulyp.js') }}"></script>
@endsection