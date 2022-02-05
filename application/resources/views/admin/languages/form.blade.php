@extends('artadmin::auth_page')
@section('title', 'Управление языками')

@section('content')
    <div class="main_content_iner">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active" aria-current="page">Управление языками</li>
            </ol>
        </nav>



        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="dzenkit-basic-card dzenkit-fulltable-maxwid-lg">
            <div class="dzenkit-table-header hdr-box d-flex align-items-center justify-content-between">
                <div class="hdr">Языки</div>
            </div>
            <div class="dzenkit-selections-setting" style="display: block;">
                <div class="dzenkit-basic-card-body">
                    <form action="{{ route('admin.languages.save') }}"   method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row">



                            <div class="row col-xs-12 col-sm-12 col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>key</th>
                                        <th>Название языка на Английском</th>
                                        <th>script</th>
                                        <th>Название языка на оригинале</th>
                                        <th></th>
                                    </tr>

                                    </thead>
                                    <thead class="langs_list">
                                       @if(count($languages))
                                           @foreach($languages as $key=>$lang)
                                               <tr  >
                                                   <td><input type="text" required  name="languages[{{$key}}][key]" value="<?php echo $key; ?>" class="key_field form-control"></td>
                                                   <td><input type="text" required  name="languages[{{$key}}][name]" value="<?php echo $lang['name']; ?>" class="name_field form-control"></td>
                                                   <td><select class="form-control script_field" required  name="languages[{{$key}}][script]">
                                                       <option @if($lang['script']=="Latn") selected @endif value="Latn">Latn</option>
                                                       <option @if($lang['script']=="Runr") selected @endif value="Runr">Runr</option>
                                                       <option @if($lang['script']=="Grek") selected @endif value="Grek">Grek</option>
                                                       <option @if($lang['script']=="Cyrl") selected @endif value="Cyrl">Cyrl</option>
                                                       <option @if($lang['script']=="Armn") selected @endif value="Armn">Armn</option>
                                                       <option @if($lang['script']=="Hebr") selected @endif value="Hebr">Hebr</option>
                                                       <option @if($lang['script']=="Arab") selected @endif value="Arab">Arab</option>
                                                       </select></td>
                                                   <td><input type="text" required  name="languages[{{$key}}][native]" value="<?php echo $lang['native']; ?>" class="native_field form-control"</td>
                                                    <td><a href="#" class="delete_row_lang">Удалить</a></td>
                                               </tr>

                                           @endforeach
                                       @endif
                                    </thead>
                                </table>
                            </div>




                            <div class="crud_notify alert alert-danger" style="display:none">


                            </div>
                            <div class="row col-xs-12 col-sm-12 col-md-12 text-center">

                                <div class="col-5">
                                    <button type="button"   class="add_lang_row btn btn-info">Добавить язык</button>
                                </div>
                                <div class="col-5">
                                    <button type="submit" name="redirect" value="edit" class="btn_create_edit btn btn-primary">Сохранить изменения</button>

                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_js')
    <script src="{{ asset("vendor/artcrud/crud.js") }}"></script>
@endsection
