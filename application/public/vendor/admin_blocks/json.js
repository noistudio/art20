function json_get_config(){
    var json=$(".json_field_config").val();
    var object=JSON.parse(json);
    return object;

}
function render_json_input(){
    var object=json_get_config();
    var html="";
    var public_path=$(".json_config_row").data("public");
    object.forEach((element) => {
        if(element.type==undefined){
            element.type="text";
        }
        if(element.type=="image"){
            var element_val="";
            if(element.value && element.value.length>0){
                element_val="<p><img src='"+public_path+"/"+element.value+"' class='img img-thumbnail'></p>";
            }
            var html_element='<div class="row mt-2 "><div class="col-4">'+element.title+'<br>имя:'+element.field_name+'<br>'+element_val+'</div><div class="col-8"><input class="form-control" name="'+element.field_name+'" type="file"></div></div>';

        }
        if(element.type=="file"){
            var element_val="";
            if(element.value && element.value.length>0){
                element_val="<p><a href='"+public_path+"/"+element.value+"' target='_blank'>Скачать файл</a></p>";
            }
            var html_element='<div class="row mt-2 "><div class="col-4">'+element.title+'<br>имя:'+element.field_name+'<br>'+element_val+'</div><div class="col-8"><input class="form-control" name="'+element.field_name+'" type="file"></div></div>';
        }
        if(element.type=="text"){
            var html_element='<div class="row mt-2 "><div class="col-4">'+element.title+'<br>имя:'+element.field_name+'</div><div class="col-8"><textarea class="form-control" name="'+element.field_name+'">'+element.value+'</textarea></div></div>';

        }
        html=html+html_element;
    })
    $(".json_custom_fields").append(html);
    $(".json_custom_fields").show();
    $(".json_manage_view").show();
}

$(document).ready(function(){
    if($(".json_field_config").length>0){
        var object=json_get_config();
        if(object.length==0){
            $(".json_config_row").show();
        }else {
            render_json_input();
        }

    }
})
