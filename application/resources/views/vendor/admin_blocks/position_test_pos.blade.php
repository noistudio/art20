<p>BEM BEM BEM</p>
@if(count($blocks))
    @foreach($blocks as $block)
        {!!  $block->content !!}
    @endforeach
@endif
