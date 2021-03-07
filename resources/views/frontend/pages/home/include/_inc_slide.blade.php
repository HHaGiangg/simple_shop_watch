<!-- start home slider -->

<div class="slider-area an-1 hm-1">
    <div class="bend niceties preview-2">
        @foreach($Slides as $item)
        <div id="ensign-nivoslider" class="slides" >
            <a href="{{ $item->sd_link}}" title="{{$item->sd_title}}" >
                    <img src="{{ pare_url_file($item->sd_image) }}">
            </a>
            @endforeach
        </div>

    </div>
</div>

