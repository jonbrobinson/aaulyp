@extends('layouts.master')

@section('content')
    <div class="wrapper">

        <!-- BREADCRUMBS -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title pull-left">Photos</h1>
                <ol class="breadcrumb">
                    <li><a href="#">News</a></li>
                    <li class="active"><a href="{{ url('/news/events') }}">Photos</a></li>
                </ol>
            </div>
        </div>
        <!-- END BREADCRUMBS -->
        <!-- PAGE CONTENT -->
        <div class="page-content">
            <div class="container">
                <div class="row">
                    @foreach( $albums as $album)
                    <div class="col-md-12">
                        <h2 class="section-heading pull-left"><a href="{{ url('/album/'.$album->id) }}">{{ $album->name }}</a></h2>
                    </div>

                    <div class="row">
                        @foreach($album->photos as $photo)
                        <div class="col-xs-4 col-md-2">
                            <img src="{{ $photo->picture }}" alt="" class="img-responsive">
                        </div>
                        @endforeach
                    </div>
                    <br><br>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT -->

        @include('partials.footer')
    </div>
@stop