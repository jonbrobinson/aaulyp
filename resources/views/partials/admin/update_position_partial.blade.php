<div class="{{ $divClass }}">
    <div class="team-member media">
        @if($position->meta->type == "officer")
            <img src="{{ !empty($position->img->profile) ? $position->img->profile . "/-/preview/240x240/" : "https://ucarecdn.com/f1360972-9860-4a0c-8dd2-b2958e55ad75/-/preview/240x240/" }}" class="media-object img-circle pull-left" alt="{{ $position->title }}" />
        @else
            <img src="{{ !empty($position->img->profile) ? $position->img->profile . "/-/preview/120x120/" : "https://ucarecdn.com/f1360972-9860-4a0c-8dd2-b2958e55ad75/-/preview/120x120/" }}" class="media-object img-circle pull-left" alt="{{ $position->title }}" />
        @endif

        <form id="img_admin-{{ $position->meta->index }}" method="post">
            <input type="hidden"  role="uploadcare-uploader" data-crop="1:1" data-images-only/>
            <input type="hidden" name="position-index" value="{{ $position->meta->index }}">
            <input type="hidden" name="token-hidden" value="{{ !empty(request()->get('token')) ? request()->get('token') : "" }}">
        </form>
        <form method="post" action="/admin/img/reset/{{ $position->meta->index }}">
            {{ csrf_field() }}
            <input type="hidden" name="token-hidden" value="{{ !empty(request()->get('token')) ? request()->get('token') : "" }}">
            <button type="submit" class="btn btn-danger btn-sm">Reset Profile Image<i class="fa fa-close"></i></button>
        </form>
        <div class="media-body">
            <h3 class="media-heading team-name">{{ !empty($position->first_name) && !empty($position->last_name) ? $position->first_name ." ". $position->last_name : "Update Name" }} </h3>
            <a href="#" data-toggle="modal" data-target="#modal-form-{{ $position->meta->index }}"><i class="fa  fa-2x fa-pencil-square"></i></a>
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