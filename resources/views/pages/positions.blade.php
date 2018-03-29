@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Our Team</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url("/board") }}">Team</a></li>
                <li class="active">Our Team</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">

            <h2 class="section-heading">AAULYP OFFICERS</h2>
            <!-- BOARD -->
            <section class="team">
                <div class="section-content">
                    @foreach(array_chunk($officers, 2) as $groupedOfficers)
                        <div class="row">
                            @foreach($groupedOfficers as $index => $position)
                                @if($index % 2 == 0)
                                    @include("partials.admin.position_partial", ['position' => $position, 'divClass' => "col-md-5 col-md-offset-1"])
                                @else
                                    @include("partials.admin.position_partial", ['position' => $position, 'divClass' => "col-md-5"])
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </section>
            <!-- END TEAM -->

            <h2 class="section-heading">COMMITTEE CHAIRS</h2>
            <!-- CHAIRS -->
            <section class="team">
                <div class="section-content">
                    @foreach(array_chunk($chairs, 3) as $groupedPositions)
                    <div class="row">
                        @foreach($groupedPositions as $index => $position)
                            @include("partials.admin.position_partial", ['position' => $position, 'divClass' => "col-md-4"])
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
    <!-- END PAGE CONTENT -->
@endsection