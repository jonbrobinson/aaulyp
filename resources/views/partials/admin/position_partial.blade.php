<div class="{{ $divClass }}">
    <div class="team-member media">
        <img src="{{ !empty($position->img->headshot) ? $position->img->headshot : asset('assets/img/aaulyp/logos/UL-logosolo-red_120x120.png') }}" class="media-object img-circle pull-left" alt="{{ $position->title }}" />
        <div class="media-body">
            <h3 class="media-heading team-name">{{ !empty($position->first_name) && !empty($position->last_name) ? $position->first_name ." ". $position->last_name : "" }}</h3>
            <strong>{{ $position->title }}</strong>
            <hr class="pull-left">
            <div class="clearfix"></div>
            <p>{{ !empty($position->about) ? $position->about : ""  }}</p>
            <p><a href="mailto:{{ $position->email }}">{{ $position->email }}</a></p>
            <ul class="list-inline social-icon">
                @foreach($position->social as $channel => $link)
                    <li><a href="{{ $link }}"><i class="fa fa-2x fa-{{ strtolower($channel) }}"></i></a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>