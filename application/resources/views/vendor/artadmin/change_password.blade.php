@extends('artadmin::auth_page')
@section('title', trans("artadmin::change.title"))
@section('content')
<div class="main_content_iner">
    <h2>{{ trans("artadmin::change.title") }}</h2>
    <form action="{{ route('artadmin.change_password') }}" method="POST">
    <table class="table" >
        <tr>
            <td>{{ trans("artadmin::change.old") }}</td>
            <td><input type="password" class="form-control" name="old_password"></td>

        </tr>
        <tr>
            <td>{{ trans("artadmin::change.new") }}</td>
            <td><input type="password" class="form-control" name="new_password"></td>

        </tr>
        <tr>
            <td>{!! csrf_field() !!}</td>
            <td><button type="submit" class="btn btn-danger">{{ trans("artadmin::change.change_pass") }}</button></td>
        </tr>
    </table>
    </form>
</div>
@endsection
