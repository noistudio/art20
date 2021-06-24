@extends('artadmin::auth_page')
@section('title', trans("admin_blocks::position.positions"))
@section('content')
    <div class="main_content_iner">
        <h2>{{ trans("admin_blocks::position.positions") }}</h2>
        <p><a href="{{ route("admin_blocks.position.add") }}">{{ trans("admin_blocks::position.title_add") }}</a></p>
        <table class="table">
            <thead>
            <tr>
                <td>{{ trans("admin_blocks::position.pos") }}</td>
                <td>{{ trans("admin_blocks::position.delete") }}</td>
            </tr>
            </thead>
            <tbody>
            @if(count($rows)>0)
                @foreach($rows as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td><a href="{{ route("admin_blocks.position.delete",$row->id) }}">{{ trans("admin_blocks::position.delete") }}</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection


