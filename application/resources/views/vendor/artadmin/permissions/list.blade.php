@extends('artadmin::auth_page')
@section('title', trans("artadmin::permission.title"))
@section('content')
    <div class="main_content_iner">
        <h4>{{ trans("artadmin::permission.add") }}</h4>
        <form action="{{ route('artadmin.permissions.add') }}" method="POST">
            <table class="table" >
                <tr>
                    <td>{{ trans("artadmin::roles.name") }}</td>
                    <td><input type="text" class="form-control" name="name" required></td>

                </tr>
                <tr>
                    <td>slug(a-z)</td>
                    <td><input type="text" class="form-control" name="slug" required ></td>
                </tr>


                <tr>
                    <td>{!! csrf_field() !!}</td>
                    <td><button type="submit" class="btn btn-danger">{{ trans("artadmin::permission.add") }} </button></td>
                </tr>
            </table>
        </form>

        <h4>{{ trans("artadmin::permission.title") }}</h4>
        <table class="table">
            <thead>
            <tr>
                <th>{{ trans("artadmin::roles.name") }}</th>
                <th>slug</th>

                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($rows))
                @foreach($rows as $permission)
                    <tr>
                        <td>
                            {{$permission->name}}
                        </td>
                        <td>{{$permission->slug}}</td>
                         <td><a href="{{ route("artadmin.permissions.delete",$permission->id) }}">{{ trans("artadmin::admins.delete") }}</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
