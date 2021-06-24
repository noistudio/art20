
$(document).ready(function(){
    $('.tiny').trumbowyg({semantic: false});

    $(".files_lms_add").on("click",function(){
        var field=$(this).data("field");
        var new_html='<input type="hidden" name="'+field+'[]" value=""   class="form-control"  ><a href="#" class="btn btn-success lfm_load_file_js">Файл не выбран</a><a href="#" class="btn lfm_file_delete" >Удалить</a>'

        $(".files_list_"+field).append("<li>"+new_html+"</li>");

        return false;
    });
    $("body").on("click",".lfm_file_delete",function(){

        $(this).closest("li").detach();
        return false;
    });

    $("body").on("click",".lfm_load_file_js",function(){


        var new_input_id="lfm_load_file"+Math.random().toString(36).substring(7);
        var lfm_prefix=$(".route_lfm").data("prefix");

        var input=$(this).closest("li").children("input");

        var button=$(this);



        lfm(new_input_id,'lfm', 'image', {prefix: lfm_prefix},function(file){

            //  window.opener.document.getElementById("pass_data_from_child").setAttribute("data-file",file_path);
            //   window.opener.document.getElementById("pass_data_from_child").dispatchEvent(new Event('change'));

        });


        const hidden_element = document.querySelector('#'+new_input_id);

        hidden_element.addEventListener('change', (event) => {
            console.log('event');
            console.log(event);
            var file=hidden_element.getAttribute("value");
            if(file!=undefined) {

                input.val(file);
                button.attr("href",file);
                button.attr("target","_blank");
                button.html(file);

                hidden_element.removeAttribute("value");
                hidden_element.remove();
            }

        });
        return false;

    });

    $(".lfm_file_clear").on("click",function(){
        var field=$(this).data("field");
        $(".lfm_file_"+field).html("Файл не выбран");
        $(".crud_field_"+field).removeAttr("value");
        $(".lfm_file_"+field).attr("href","#");
        $(".lfm_file_"+field).removeAttr("target");

        return false;

    })
    $(".lfm_load_file").on("click",function(){
        var new_input_id="lfm_load_file"+Math.random().toString(36).substring(7);
        var lfm_prefix=$(".route_lfm").data("prefix");
        var field=$(this).data("field");
        var button=$(this);



        lfm(new_input_id,'lfm', 'image', {prefix: lfm_prefix},function(file){

            //  window.opener.document.getElementById("pass_data_from_child").setAttribute("data-file",file_path);
            //   window.opener.document.getElementById("pass_data_from_child").dispatchEvent(new Event('change'));

        });


        const hidden_element = document.querySelector('#'+new_input_id);

        hidden_element.addEventListener('change', (event) => {
            console.log('event');
            console.log(event);
            var file=hidden_element.getAttribute("value");
            if(file!=undefined) {
                $(".crud_field_"+field).val(file);
                button.attr("href",file);
                button.attr("target","_blank");
                button.html(file);

                hidden_element.removeAttribute("value");
                hidden_element.remove();
            }

        });
        return false;

    });
})
