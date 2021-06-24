@if(count($links))
    <ul>
    @foreach($links as $link)
    <li>
        <a href="{{ $link['href'] }}" target="{{ $link['target'] }}">{!! $link['title'] !!}</a>
        @if(isset($link['sublinks']) and is_array($link['sublinks']) and count($link['sublinks']))
            {!! view($view_name,array('links'=>$link['sublinks'],'view_name'=>$view_name))->render() !!}
         @endif
    </li>
    @endforeach
    </ul>
@endif
