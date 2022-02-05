@extends('artadmin::auth_page')
@section('title', 'Настройки сайта')

@section('content')
    <div class="main_content_iner">
        <h4>Настройка {{ $conf['description'] }}</h4>
        <form action="{{route("admin.setting.doupdate",$prefix)}}" method="POST" enctype="multipart/form-data">
        <table class="table">
        @foreach($conf['fields'] as $name=>$field_conf)
            <tr>
                <td>{{ $field_conf['title'] }}</td>
                <td>
                    @if($field_conf['type']=="text")
                     <input type="text" class="form-control" @if(isset($setting[$name]) and is_string($setting[$name])) value="{{ $setting[$name] }}" @endif name="{{$name}}">
                    @elseif($field_conf['type']=="integer")
                        <input type="number" class="form-control" @if(isset($setting[$name]) and is_numeric($setting[$name])) value="{{ $setting[$name] }}" @endif name="{{$name}}">

                    @elseif($field_conf['type']=="textarea")
                        <textarea class="form-control" name="{{$name}}">@if(isset($setting[$name]) and is_string($setting[$name])){{$setting[$name]}}@endif</textarea>
                    @elseif($field_conf['type']=='select')
                        <select class="form-control" name="{{$name}}">
                            <option></option>
                            @foreach($field_conf['options'] as $option)
                                <option @if(isset($setting[$name]) and $setting[$name]==$option) selected @endif  value="{{$option}}">{{$option}}</option>
                            @endforeach
                        </select>
                    @elseif($field_conf['type']=="boolean")
                        <select class="form-control" name="{{$name}}">
                            <option></option>
                            <option @if(isset($setting[$name]) and $setting[$name]==true) selected @endif value="1">Да</option>
                            <option @if(isset($setting[$name]) and $setting[$name]==false) selected @endif value="2">Нет</option>
                        </select>

                    @elseif($field_conf['type']=="image")
                        @if(isset($setting[$name]))
                            <p><img src="{{ asset($setting[$name])}}" style="max-width:150px;" class="img img-thumbnail"></p>
                        @endif
                        <input type="file" class="form-control" name="{{$name}}">

                    @elseif($field_conf['type']=="file")
                        @if(isset($setting[$name]))
                            <p><a href="{{ asset($setting[$name])}}">Посмотреть файл</a></p>
                        @endif
                        <input type="file" class="form-control" name="{{$name}}">
                    @endif
                </td>
            </tr>
        @endforeach
            <tr>
                <td>{!!  csrf_field() !!}</td>
                <td><button type="submit" class="btn btn-success">Сохранить изменения</button></td>
            </tr>
        </table>
        </form>
    </div>
@endsection
