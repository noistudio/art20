@extends('artadmin::auth_page')
@section('title', trans("artadmin::roles.edit").' '.$role->name)
@section('content')
    <div class="main_content_iner">
        <h4>{{ trans("artadmin::roles.edit") }}</h4>
        <form action="{{ route('artadmin.roles.update',$role->id) }}" method="POST">
            <table class="table" >
                <tr>
                    <td>{{ trans("artadmin::roles.name") }}</td>
                    <td>{{ $role->name }}</td>

                </tr>
                <tr>
                    <td>slug</td>
                    <td>{{ $role->slug }}</td>

                </tr>

                <tr>
                    <td>{{ trans("artadmin::roles.permissions") }}</td>
                    <td>
                        <select class="form-control" name="permissions[]" multiple>
                            @if($permissions)
                                @foreach($permissions as $permission)
                                    <option @if($permission->roles->contains($role)) selected @endif value="{{ $permission->id  }}">{{ $permission->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>{!! csrf_field() !!}</td>
                    <td><button type="submit" class="btn btn-danger">{{ trans("artadmin::roles.change") }} </button></td>
                </tr>
            </table>
        </form>



    </div>
@endsection
