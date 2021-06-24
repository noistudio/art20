@extends('artadmin::auth_page')
@section('title', trans("admin_blocks::position.title_add"))
@section('content')
    <div class="main_content_iner">
        <h4>{{ trans("admin_blocks::position.title_add") }}</h4>
        <form action="{{ route("admin_blocks.position.doadd") }}" method="POST">
            <table class="table">
                <tr>
                    <td>
                        {{ trans("admin_blocks::position.pos") }}(a-z)
                    </td>
                    <td><input type="text" pattern="[a-z_]{3,}" name="position" required></td>
                </tr>
                <tr>
                    <td>{{ csrf_field() }}</td>
                    <td><button type="submit" class="btn btn-danger">{{ trans("admin_blocks::position.title_add") }}</button></td>
                </tr>
            </table>
        </form>
    </div>
@endsection


