<h2 class="section-heading">AAULYP OFFICERS</h2>
<!-- BOARD -->
<section class="team">
    <div class="section-content">
        @foreach(array_chunk($officers, 2) as $groupedOfficers)
        <div class="row">
            @foreach($groupedOfficers as $index => $officer)
            @if($index % 2 == 0)
            <div class="col-md-5">
            @else
            <div class="col-md-5 col-md-offset-2">
            @endif
                <div class="team-member media">
                    <img src="{{ asset('assets/img/aaulyp/team/president120x120.jpg') }}" class="media-object img-circle pull-left" alt="YP President" />
                    <div class="media-body">
                        <h3 class="media-heading team-name">{{ $officer->first_name ." ". $officer->last_name }}</h3>
                        <strong>{{ $officer->title }}</strong>
                        <p><a href="mailto:{{ $officer->email }}">{{ $officer->email }}</a></p>
                        <hr class="pull-left">
                        <div class="clearfix"></div>
                        <p>{{ $officer->about }}</p>
                        <ul class="list-inline social-icon">
                        @foreach($officer->social as $channel => $link)
                            @if(!empty($link))
                            <li><a href="{{ $link }}"><i class="fa fa-{{ strtolower($channel) }}"></i></a></li>
                            @endif
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
<!-- END TEAM -->