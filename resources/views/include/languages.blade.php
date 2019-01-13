{{--  <div class="lang">
    <img src="{{asset('img/flags/'.Lang::getLocale().'.png')}}" alt="Language" class="lang__flag-pic">
    <select  class="lang__select form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
        @foreach(trans('app.languages') as $lang => $title )
            <option {{$lang == Lang::getLocale() ? 'selected' : ''}} value="{{ route(\Request::route()->getName(), ['lang' => $lang]) }}">{{$title}}</option>
        @endforeach
    </select>
</div>  --}}

<a href="#" id="userLanguages" class="user-balances" data-toggle="dropdown" aria-haspopup="true">
    @foreach(trans('app.languages') as $lang => $title)
        @if($lang == Lang::getLocale())
        <i class="text-secondary"></i>
            <small class="text-muted desc">{{$title}} </small>
            <img src="{{asset('img/flags/'.$lang.'.png')}}" alt="Language" class="lang__flag-pic" style="height: 20px;">
        <i class="icon-chevron-small-down"></i>
        @endif
    @endforeach
</a>

<div class="dropdown-menu dropdown-menu-right lg" aria-labelledby="userLanguages">
    <ul class="stats-widget {{-- languages--}}">
        @foreach(trans('app.languages') as $lang => $title)
            <li class="{{$lang == Lang::getLocale() ? 'active ' : ''}}my-1">
                {{--  <a href="{{lang_toggle_href($lang)}}">{{$title}}</a>  --}}
                <p><a href="{{ route(\Request::route()->getName(), ['lang' => $lang]) }}">
                    <span class="text-muted">{{$title}} </span>
                    <img src="{{asset('img/flags/'.$lang.'.png')}}" alt="Language" class="lang__flag-pic" style="height: 20px;">
                </a></p>
            </li>
        @endforeach
    </ul>
</div>