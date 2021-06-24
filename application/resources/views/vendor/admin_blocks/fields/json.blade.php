@section('footer_js')
    <script src="{{ asset("vendor/admin_blocks/json.js") }}"></script>
@endsection
<div class="row json_config_row" data-public="{{ url("/") }}" style="display:none;">
    <div class="col-4">
        {{ trans("admin_blocks::main.json_config") }}
        <br>
        {{ trans("admin_blocks::main.example") }}
        <br>
        [
        {"field_name":"field","title":"поле1","type":"text"},
        {"field_name":"avatar","title":"аватар","type":"image"},
        {"field_name":"file","title":"Файл","type":"file"}

        ]
    </div>
    <div class="col-8">
     <textarea class="form-control json_field_config" name="config">{!! json_encode($config) !!}</textarea>
    </div>

</div>
<div class="row json_manage_view mb-3 mt-3" style="display:none">

        <div class="col-5">
            {{ trans("admin_blocks::main.view") }}
        </div>
        <div class="col-5">
            <input type="text" name="view" value="{{ $view }}"  class="form-control"/>
        </div>


</div>
<div class="row json_custom_fields" style="display:none;">
<div class="col-12">
    <h4>{{ trans("admin_blocks::main.filled_fields") }}:</h4>
</div>

</div>
