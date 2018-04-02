<div class="{{ $divClass }}">
    <div class="team-member media">
        @if($position->meta->type == "officer")
            <img src="{{ !empty($position->img->profile) ? $position->img->profile . "/-/preview/240x240/" : "https://ucarecdn.com/f1360972-9860-4a0c-8dd2-b2958e55ad75/-/preview/240x240/" }}" class="media-object img-circle pull-left" alt="{{ $position->title }}" />
        @else
            <img src="{{ !empty($position->img->profile) ? $position->img->profile . "/-/preview/120x120/" : "https://ucarecdn.com/f1360972-9860-4a0c-8dd2-b2958e55ad75/-/preview/120x120/" }}"class="media-object img-circle pull-left" alt="{{ $position->title }}" />
        @endif
        <div class="media-body">
            <h3 class="media-heading team-name">{{ !empty($position->first_name) && !empty($position->last_name) ? $position->first_name ." ". $position->last_name : "" }}</h3>
            <strong>{{ $position->title }}</strong>
            <hr class="pull-left">
            <div class="clearfix"></div>
            <p>{{ !empty($position->about) ? $position->about : ""  }}</p>
            <p><a href="mailto:{{ $position->email }}">{{ $position->email }}</a></p>
            <ul class="list-inline social-icon">
                @foreach($position->social as $channel => $link)
                    @if(!empty($link))
                    <li><a href="{{ $link }}"><i class="fa fa-{{ strtolower($channel) }}"></i></a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>