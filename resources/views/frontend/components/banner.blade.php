<!-- banner-area start -->

<div class="banner-area">
    <div class="container-fluid">
        @if($event1)
        <div class="row">
            <a href="{{ $event1->e_link }}"  alt="{{ $event1->e_name }}" class="{{  $event1->e_name  }}"><img src="{{ pare_url_file($event1->e_banner) }}" style="width: 1920px; height: 420px"/></a>
        </div>
        @endif
    </div>
</div>

<!-- banner-area end -->
