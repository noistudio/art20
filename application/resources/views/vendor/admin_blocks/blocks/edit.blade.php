@extends('artadmin::auth_page')
@section('title', trans("admin_blocks::main.edit_block"))
@section('content')
    <div class="main_content_iner">
        <h4>{{ trans("admin_blocks::main.edit_block") }}</h4>
        <form action="{{ route("admin_blocks.blocks.doedit",$block->id) }}" method="POST" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td>
                        {{ trans("admin_blocks::position.pos") }}
                    </td>
                    <td><select class="form-control" name="position_id" required >
                            @if(count($positions))
                                @foreach($positions as $position)
                                    <option @if($block->position_id==$position->id) selected @endif value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            @endif
                        </select></td>
                </tr>
                <tr>
                    <td>{{ trans("admin_blocks::main.type") }}</td>
                    <td>
                        {{ $block->type }}
                    </td>
                </tr>
                <tr>
                    <td>{{ trans("admin_blocks::main.load_block") }}</td>
                    <td>@<b>load_block({{$block->id}})</b></td>
                </tr>
                <tr>
                    <td>{{ trans("admin_blocks::main.load_block_by_pos") }}</td>
                    <td>@<b>load_position("{{$block->position->name}}")</b></td>
                </tr>
                <tr>
                    <td>{{ trans("admin_blocks::main.enabled") }}</td>
                    <td><input type="checkbox" @if($block->enable==1) checked @endif   name="enable" class="form-check-input" value="1"  ></td>
                </tr>
                <tr>
                    <td>{{ trans("admin_blocks::main.title_block") }}</td>
                    <td><input type="text" name="title" class="form-control" required value="{{ $block->title }}"   ></td>
                </tr>
                <tr>
                    <td>{{ trans("admin_blocks::main.content") }}</td>
                    <td>
                        {!! \AdminBlocks\Repository\FieldsRepository::getValue($block->type,$block->data) !!}
                    </td>
                </tr>

                <tr>
                    <td>{{ csrf_field() }}</td>
                    <td><button type="submit" class="btn btn-danger">{{ trans("admin_blocks::main.doedit") }}</button></td>
                </tr>
            </table>
        </form>
    </div>
@endsection


