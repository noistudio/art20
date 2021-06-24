@extends('artadmin::auth_page')
@section('title', trans("artadmin::admins.list"))
@section('content')
    <div class="main_content_iner">
        <h2>{{ trans("artadmin::admins.add") }}</h2>
        <form action="{{ route('artadmin.admins.add') }}" method="POST">
            <table class="table" >
                <tr>
                    <td>{{ trans("artadmin::admins.name") }}</td>
                    <td><input type="text" class="form-control" name="name" required></td>

                </tr>
                <tr>
                    <td>{{ trans("artadmin::admins.email") }}</td>
                    <td><input type="email" class="form-control" name="email" required ></td>
                </tr>
                <tr>
                    <td>{{ trans("artadmin::login.password") }}</td>
                    <td><input type="password" class="form-control" name="password" required ></td>

                </tr>
                <tr>
                    <td>{{ trans("artadmin::admins.roles") }}</td>
                    <td>
    <select class="form-control" name="roles[]" multiple>
    @if($roles)
        @foreach($roles as $role)
           <option value="{{ $role->id  }}">{{ $role->name }}</option>
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
                                    <option value="{{ $permission->id  }}">{{ $permission->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>{!! csrf_field() !!}</td>
                    <td><button type="submit" class="btn btn-danger">{{ trans("artadmin::admins.add") }}</button></td>
                </tr>
            </table>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>{{ trans("artadmin::admins.name") }}</th>
                <th>{{ trans("artadmin::admins.email") }}</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($rows))
            @foreach($rows as $admin)
            <tr>
                <td>
                    {{$admin->name}}
                </td>
                <td>{{$admin->email}}</td>
                <td><a href="{{ route("artadmin.admins.edit",$admin->id) }}">{{ trans("artadmin::admins.edit") }}</a></td>
                <td><a href="{{ route("artadmin.admins.delete",$admin->id) }}">{{ trans("artadmin::admins.delete") }}</a></td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
