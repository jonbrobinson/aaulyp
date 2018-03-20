@extends('layouts.master')

@section('content')
        <!-- WRAPPER -->
<div class="wrapper">
    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title pull-left">Our Team</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/board') }}">Team</a></li>
                <li class="active">Our Team</li>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">

            @include('partials.officers_import', ["officers" => $officers])

            <h2 class="section-heading">COMMITTEE CHAIRS</h2>
            <!-- TEAM -->
            <section class="team">
                <div class="section-content">
                    @foreach(array_chunk($chairs, 3) as $groupedChairs)
                    <div class="row">
                        @foreach($groupedChairs as $index => $chair)
                        <div class="col-md-4">
                            <div class="team-member media">
                                <img src="{{ !empty($chair->img->headshot) ? $chair->img->headshot : asset('assets/img/aaulyp/logos/UL-logosolo-red_120x120.png') }}" class="media-object img-circle pull-left" alt="{{ $chair->title }}" />
                                <div class="media-body">
                                    <h3 class="media-heading team-name">{{ !empty($chair->first_name) && !empty($chair->last_name) ? $chair->first_name ." ". $chair->last_name : "Update Name" }} <i class="fa fa-pencil-square" data-toggle="modal" data-target="#modal-index-name-{{ $chair->meta->index }}"></i></h3>
                                    <strong>{{ $chair->title }} <i class="fa fa-2x fa-pencil-square" data-toggle="modal" data-target="#modal-index-title-{{ $chair->meta->index }}"></i></strong>
                                    <hr class="pull-left">
                                    <div class="clearfix"></div>
                                    <p>{{ !empty($chair->about) ? $chair->about : "Update About Section"  }} <i class="fa fa-2x fa-pencil-square" data-toggle="modal" data-target="#modal-index-about-{{ $chair->meta->index }}"></i></p>
                                    <ul class="list-inline social-icon">
                                        @foreach($chair->social as $channel => $link)
                                            {{--@if(!empty($link))--}}
                                                <li><a href="{{ $link }}"><i class="fa fa-2x fa-{{ strtolower($channel) }}"></i></a><i class="fa  fa-2x fa-pencil-square" data-toggle="modal" data-target="#modal-index-social-{{ $chair->meta->index }}"></i></li>
                                            {{--@endif--}}
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    <!-- END PAGE CONTENT -->

    @foreach($chairs as $chair)
    <!-- Modal -->
    <div class="modal fade" id="modal-index-about-{{ $chair->meta->index }}" tabindex="-1" role="dialog" aria-labelledby="modal-index-about-{{ $chair->meta->index }}Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-index-about-{{ $chair->meta->index }}Label">Update About Section</h4>
                </div>
                <div class="modal-body">
                    {{ !empty($chair->about) ? $chair->about : "Update About Section"  }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-index-social-{{ $chair->meta->index }}" tabindex="-1" role="dialog" aria-labelledby="modal-index-about-{{ $chair->meta->index }}Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-index-about-{{ $chair->meta->index }}Label">Update Social Media</h4>
                </div>
                <div class="modal-body">
                    @foreach($chair->social as $channel => $link)
                    {{--@if(!empty($link))--}}
                    <li><a href="{{ $link }}"><i class="fa fa-3x fa-{{ strtolower($channel) }}"></i> </a><i class="fa fa-pencil-square" data-toggle="modal" data-target="#modal-index-social-{{ $chair->meta->index }}"></i></li>
                    {{--@endif--}}
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-index-name-{{ $chair->meta->index }}" tabindex="-1" role="dialog" aria-labelledby="modal-index-about-{{ $chair->meta->index }}Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-index-about-{{ $chair->meta->index }}Label">Update Name</h4>
                </div>
                <div class="modal-body">
                    {{ !empty($chair->first_name) && !empty($chair->last_name) ? $chair->first_name." ".$chair->last_name : "Update About Section"  }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-index-title-{{ $chair->meta->index }}" tabindex="-1" role="dialog" aria-labelledby="modal-index-title-{{ $chair->meta->index }}Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-index-title-{{ $chair->meta->index }}Label">Update Title</h4>
                </div>
                <div class="modal-body">
                    <p>{{ !empty($chair->about) ? $chair->about : "Update Position Title"  }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @include('partials.footer')
</div>
<!-- END WRAPPER -->
@stop