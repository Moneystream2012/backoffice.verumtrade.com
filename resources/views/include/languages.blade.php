{{--  <div class="lang">
    <img src="{{asset('img/flags/'.Lang::getLocale().'.png')}}" alt="Language" class="lang__flag-pic">
    <select  class="lang__select form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        @foreach(trans('app.languages') as $lang => $title )
            <option {{$lang == Lang::getLocale() ? 'selected' : ''}} value="{{ route(\Request::route()->getName(), ['lang' => $lang]) }}">{{$title}}</option>
        @endforeach
    </select>
</div>  --}}

<div class="dropdown choose_lang">
    <a href="#" id="userLanguages" class="user-balances" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        @foreach(trans('app.languages') as $lang => $title)
            @if($lang == Lang::getLocale())
            <i class="text-secondary"></i>
                <img src="{{asset('img/flags/'.$lang.'.png')}}" alt="Language" class="lang__flag-pic" style="height: 20px;">
                <small class="text-muted desc">{{$title}} </small>
            <i class="icon-chevron-small-down"></i>
            @endif
        @endforeach
    </a>

    <div class="dropdown-menu dropdown-menu-right lg" aria-labelledby="userLanguages" x-placement="bottom-end" style="position: absolute; transform: translate3d(-143px, 66px, 0px); top: 0px; left: 0px; will-change: transform;">
        <ul class="stats-widget languages">
            @foreach(trans('app.languages') as $lang => $title)
                <li class="{{$lang == Lang::getLocale() ? 'active ' : ''}}my-1">
                    {{--  <a href="{{lang_toggle_href($lang)}}">{{$title}}</a>  --}}
                    <a href="{{ route(\Request::route()->getName(), ['lang' => $lang]) }}">
                        <p class="text-muted desc">
                            <img src="{{asset('img/flags/'.$lang.'.png')}}" alt="Language" class="lang__flag-pic" style="height: 20px;">
                            {{$title}}
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>