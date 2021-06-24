@extends('artadmin::auth_page')
@section('title', trans("admin_blocks::main.blocks"))
@section('content')
    <div class="main_content_iner">
        <h4>{{ trans("admin_blocks::main.blocks") }}</h4>
        <p><a href="{{ route('admin_blocks.blocks.add') }}" class="btn btn-success">{{ trans("admin_blocks::main.add") }}</a></p>


        <form action="" class="row">
        <div class="mb-3 col-3">
            <label for="exampleFormControlInput1" class="form-label">{{ trans("admin_blocks::main.type") }}</label>
            <select class="form-control" name="type">
                <option></option>
                @if(count($types))
                @foreach($types as $type)
                <option  @if(isset($get_vars['type']) and $get_vars['type']==$type) selected @endif  value="{{ $type }}">{{ $type }}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="mb-3 col-3">
            <label for="exampleFormControlInput2" class="form-label">{{ trans("admin_blocks::position.pos") }}</label>
            <select class="form-control" name="position">
                <option></option>
                @if(count($positions))
                    @foreach($positions as $position)
                        <option @if(isset($get_vars['position']) and $get_vars['position']==$position->id) selected @endif value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mb-3 col-3">
            <label for="exampleFormControlInput3" class="form-label">{{ trans("admin_blocks::main.status") }}</label>
            <select class="form-control" name="enable">
                <option></option>
                <option @if(isset($get_vars['enable']) and $get_vars['enable']==0) selected @endif  value="0">{{ trans("admin_blocks::main.status_disable") }}</option>
                <option  @if(isset($get_vars['enable']) and $get_vars['enable']==1) selected @endif  value="1">{{ trans("admin_blocks::main.status_enable") }}</option>

            </select>
        </div>
            <div class="mb-3 col-3">
                <label for="exampleFormControlInput4" class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-success mt-4">{{ trans("admin_blocks::main.find") }}</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                <td>{{ trans("admin_blocks::main.title_block") }}</td>
                <td>{{ trans("admin_blocks::main.type") }}</td>
                <td>{{ trans("admin_blocks::position.pos") }}</td>
                <td>{{ trans("admin_blocks::main.status") }}</td>
                <td>{{ trans("admin_blocks::main.edit") }}</td>
                <td>{{ trans("admin_blocks::main.delete") }}</td>
            </tr>
            </thead>
            <tbody>
            @if(count($rows)>0)
                @foreach($rows as $row)
                    <tr>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->type }}</td>
                        <td>{{ $row->position->name }}</td>
                        <td>
                            <a href="{{ route("admin_blocks.blocks.toogle",$row->id) }}">
                            @if($row->enable==1)
                                <i class="demo-icon icon-eye"></i>
                            @else
                                <i class="demo-icon icon-eye-off"></i>
                            @endif
                            </a>
                            </td>
                        <td><a href="{{ route("admin_blocks.blocks.edit",$row->id) }}">{{ trans("admin_blocks::main.edit") }}</a></td>
                        <td><a href="{{ route("admin_blocks.blocks.delete",$row->id) }}">{{ trans("admin_blocks::main.delete") }}</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection


