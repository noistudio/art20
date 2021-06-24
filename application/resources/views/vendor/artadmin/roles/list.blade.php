@extends('artadmin::auth_page')
@section('title', trans("artadmin::roles.title"))
@section('content')
    <div class="main_content_iner">
        <h4>{{ trans("artadmin::roles.add") }}</h4>
        <form action="{{ route('artadmin.roles.add') }}" method="POST">
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
                    <td><button type="submit" class="btn btn-danger">{{ trans("artadmin::roles.add") }} </button></td>
                </tr>
            </table>
        </form>

        <h4>{{ trans("artadmin::roles.title") }}</h4>
        <table class="table">
            <thead>
            <tr>
                <th>{{ trans("artadmin::roles.name") }}</th>
                <th>slug</th>
                <th>{{ trans("artadmin::roles.permissions") }}</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($rows))
                @foreach($rows as $role)
                    <tr>
                        <td>
                            {{$role->name}}
                        </td>
                        <td>{{$role->slug}}</td>
                        <td>

                            <a href="{{ route("artadmin.roles.show",$role->id) }}">{{ trans("artadmin::roles.manage") }}</a>
                        </td>

                         <td><a href="{{ route("artadmin.roles.delete",$role->id) }}">{{ trans("artadmin::admins.delete") }}</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
