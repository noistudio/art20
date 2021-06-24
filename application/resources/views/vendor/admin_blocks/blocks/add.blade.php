@extends('artadmin::auth_page')
@section('title', trans("admin_blocks::main.add"))
@section('content')
    <div class="main_content_iner">
        <h4>{{ trans("admin_blocks::main.add") }}</h4>
        <form action="{{ route("admin_blocks.blocks.doadd") }}" method="POST">
            <div class="row mt-3">
                <div class="col-4">
                    {{ trans("admin_blocks::position.pos") }}
                </div>
                <div class="col-8">
                    <select class="form-control" name="position_id" required >
                        @if(count($positions))
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                   {{ trans("admin_blocks::main.enabled") }}
                </div>
                <div class="col-8">
                    <input type="checkbox" name="enable" class="form-check-input" value="1" checked >
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    {{ trans("admin_blocks::main.type") }}
                </div>
                <div class="col-8">
                    <select onchange="this.options[this.selectedIndex].value && (window.location = '{{ route("admin_blocks.blocks.add") }}?type='+this.options[this.selectedIndex].value);" class="form-control" name="type" required >
                        @if(count($types))
                            @foreach($types as $type)
                                <option @if($current_type==$type) selected  @endif value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    {{ trans("admin_blocks::main.title_block") }}
                </div>
                <div class="col-8">
                    <input type="text" name="title" class="form-control" required   >
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    {{ trans("admin_blocks::main.content") }}
                </div>
                <div class="col-8">
                    {!! \AdminBlocks\Repository\FieldsRepository::getValue($current_type) !!}
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">{{ csrf_field() }}</div>
                <div class="col-8"><button type="submit" class="btn btn-danger">{{ trans("admin_blocks::main.add") }}</button></div>
            </div>

        </form>
    </div>
@endsection


