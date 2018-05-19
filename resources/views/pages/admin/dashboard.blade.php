@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">DASHBOARD</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin?token=' . request()->get('token')) }}">Team</a></li>
                <li class="active"><a href="{{ url('/admin?token=' . request()->get('token')) }}">Admin Dashboard</a></li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <section class="team">
                @if (isset($successMessage))
                    <div class="alert alert-success">
                        {{ $successMessage }}
                    </div>
                @endif
                <div>
                    <a href="{{ url('/admin/edit?token='.request()->get('token')) }}"><button class="btn btn-primary">Edit Officers</button></a>
                </div>
            </section>
            <h2 class="section-heading">EVENTS</h2>
            @if(isset($events) && count($events) > 0)
                <table >

                    <tr>
                        <th>Date</th>
                        <th>Event</th>
                        <th>Tickets</th>
                        <th>Count</th>
                        <th>Total Sold</th>
                        <th>Total Revenue</th>
                    </tr>
                    @foreach($events as $index => $event)
                        <tr>
                            <td rowspan="{{ count($event->tickets->ticket_types) }}"> {{ date("D M j, Y", $event->time_start) }} &nbsp; &nbsp;</td>
                            <td rowspan="{{ count($event->tickets->ticket_types) }}">{{ $event->title->text }} &nbsp; &nbsp;</td>
                        @foreach($event->tickets->ticket_types as $ticket)
                            <td>{{ $ticket->name }} &nbsp;</td>
                            <td>{{ $ticket->quantity_sold }} &nbsp;</td>
                        </tr>
                        <tr>
                        @endforeach
                            <td rowspan="{{ count($event->tickets->ticket_types) }}">{{ $ticket->tickets->total_sold }}</td>
                            <td rowspan="{{ count($event->tickets->ticket_types) }}">{{ $ticket->tickets->total_revenue }}</td>
                        </tr>

                    @endforeach
                </table>
            @endif
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop