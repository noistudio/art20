@extends('artadmin::auth_page')
@section('title', trans("artadmin::admins.edit_title"))
@section('content')
    <div class="main_content_iner">
        <h2>{{ trans("artadmin::admins.edit_title") }}</h2>
        <form action="{{ route('artadmin.admins.doedit',$user->id) }}" method="POST">
            <table class="table" >
                <tr>
                    <td>{{ trans("artadmin::admins.name") }}</td>
                    <td><input type="text" class="form-control" name="name" value="{{$user->name}}"  required></td>

                </tr>
                <tr>
                    <td>{{ trans("artadmin::admins.email") }}</td>
                    <td><input type="email" readonly class="form-control" value="{{$user->email}}" name="email" ></td>
                </tr>
                <tr>
                    <td>{{ trans("artadmin::login.password") }}</td>
                    <td><input type="password" class="form-control" name="password"  ></td>

                </tr>
                <tr>
                    <td>{{ trans("artadmin::admins.roles") }}</td>
                    <td>
                        <select class="form-control" name="roles[]" multiple>
                            @if($roles)
                                @foreach($roles as $role)
                                    <option @if($user->hasRole($role->slug)) selected @endif value="{{ $role->id  }}">{{ $role->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>{{ trans("artadmin::admins.permission") }}</td>
                    <td>
                        <select class="form-control" name="permissions[]" multiple>
                            @if($permissions)
                                @foreach($permissions as $permission)
                                    <option @if($user->hasPermission($permission->slug)) selected @endif value="{{ $permission->id  }}">{{ $permission->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>{!! csrf_field() !!}</td>
                    <td><button type="submit" class="btn btn-success">{{ trans("artadmin::admins.edit_title") }}</button></td>
                </tr>
            </table>
        </form>


    </div>
@endsection
