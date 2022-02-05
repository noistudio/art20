@extends('artadmin::auth_page')
@section('title', 'Настройки сайта')

@section('content')
    <div class="main_content_iner">
        <h4>Настройки</h4>
        @foreach($setting as $key_index=>$value)
        <p><a href="{{ route('admin.setting.edit',$key_index) }}" class="btn btn-danger">{{ $value['description'] }}</a></p>
        @endforeach
        <p><a href="{{ route('admin.languages.form') }}" class="btn btn-warning">Настройка языков</a></p>
        <p><a href="{{ route('admin.trans.index') }}" class="btn btn-success">Управление языками</a></p>
    </div>
@endsection
