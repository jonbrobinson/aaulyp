<div class="{{ $divClass }}">
    <div class="team-member media">
        <img src="{{ !empty($position->img->headshot) ? $position->img->headshot : asset('assets/img/aaulyp/logos/UL-logosolo-red_120x120.png') }}" class="media-object img-circle pull-left" alt="{{ $position->title }}" />
        <div class="media-body">
            <h3 class="media-heading team-name">{{ !empty($position->first_name) && !empty($position->last_name) ? $position->first_name ." ". $position->last_name : "Update Name" }} <a href="#" data-toggle="modal" data-target="#modal-form-{{ $position->meta->index }}"><i class="fa  fa-2x fa-pencil-square"></i></a></h3>
            <strong>{{ $position->title }} <a href="#" data-toggle="modal" data-target="#modal-form-{{ $position->meta->index }}"><i class="fa  fa-2x fa-pencil-square"></i></a></strong>
            <hr class="pull-left">
            <div class="clearfix"></div>
            <p>{{ !empty($position->about) ? $position->about : "Update About Section"  }} <a href="#" data-toggle="modal" data-target="#modal-form-{{ $position->meta->index }}"><i class="fa  fa-2x fa-pencil-square"></i></a></p>
            <p>{{ !empty($position->description) ? $position->description : "Update Description Section"  }} <a href="#" data-toggle="modal" data-target="#modal-form-{{ $position->meta->index }}"><i class="fa  fa-2x fa-pencil-square"></i></a></p>
            <ul class="list-inline social-icon">
                @foreach($position->social as $channel => $link)
                    <li><a href="{{ $link }}"><i class="fa fa-2x fa-{{ strtolower($channel) }}"></i></a> <span><a href="#" data-toggle="modal" data-target="#modal-form-{{ $position->meta->index }}"><i class="fa  fa-2x fa-pencil-square"></i></a></span></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>