@section('footer_js')
    <script src="{{ asset("vendor/admin_blocks/menu.js") }}"></script>
 @endsection
<input type="hidden" class="json_links" name="links" value='{!! json_encode($links) !!}'>
<div class="row">
    <div class="col-12">
        <div class="col-5">
            {{ trans("admin_blocks::main.view") }}
        </div>
        <div class="col-5">
            <input type="text" name="view" value="{{ $view }}"  class="form-control"/>
        </div>

    </div>
    <p>{{ trans("admin_blocks::main.manage_links") }}:</p>
   <div class="col-12">
       <div class="col-5">
           {{ trans("admin_blocks::main.link") }}
       </div>
       <div class="col-5">
           <textarea  class="link_href form-control"></textarea>
       </div>

   </div>
    <div class="col-12">
        <div class="col-5">
            {{ trans("admin_blocks::main.title_link") }}
        </div>
        <div class="col-5">
            <textarea   class="link_title form-control"></textarea>
        </div>

    </div>
    <div class="col-12">
        <div class="col-5">
            _target
        </div>
        <div class="col-5">
            <select class="form-control link_target">
                <option></option>
                <option value="_self">{{ trans("admin_blocks::main.target_self") }}</option>
                <option value="_blank">{{ trans("admin_blocks::main.target_blank") }}</option>
            </select>

        </div>

    </div>
    <div class="col-12 row_add_btn">
        <div class="col-12">
            <a href="#" class="btn btn-danger menu-add-link">{{ trans("admin_blocks::main.addlink") }}</a>
        </div>
    </div>
    <div class="col-12 row_edit_btn" style="display:none;">
        <div class="col-12">
            <a href="#" class="btn btn-danger menu-editbtn-link">{{ trans("admin_blocks::main.editlink") }}</a>
        </div>
    </div>
    <div class="result_menu" data-links="{{ trans("admin_blocks::main.links") }}" data-delete="{{ trans("admin_blocks::main.delete") }}" data-add="{{ trans("admin_blocks::main.addlink") }}" data-edit="{{ trans("admin_blocks::main.edit") }}">

    </div>
</div>
