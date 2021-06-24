@if(count($blocks))
    @foreach($blocks as $block)
    {!!  $block->content !!}
    @endforeach
@endif
