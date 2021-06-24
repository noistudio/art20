function render_menu(){
    var json_links=menu_get_json();
    var html="";

    var ul_elements=menu_render_ul(json_links,undefined);

    var links_title=$(".result_menu").data("links");
    html=links_title+" <ul>"+ul_elements+"</ul>";

    $(".result_menu").html(html);

}

function menu_remove_link(json,index_array,need_key){
    var result=json;
    index_array.forEach((element,key) => {
        if(need_key==key){
            var next_key=need_key+1;
            if(!index_array[next_key]){
                json.splice(element, 1);
                result=json;
                return true;
            }
            if(!json[element].sublinks){
                json[element].sublinks=[];
            }


            result[element].sublinks=menu_remove_link(json[element].sublinks,index_array,next_key);
            return true;
        }
    })
    return result;
}


function menu_get_link(json,index_array,need_key){
    var current=undefined;
    index_array.forEach((element,key) => {
        if(need_key==key){
            var next_key=need_key+1;
            if(!index_array[next_key]){
                current=json[element];
                return true;
            }
            if(!json[element].sublinks){
                json[element].sublinks=[];
            }

            current=menu_get_link(json[element].sublinks,index_array,next_key);
            return true;
        }
    })
    return current;
}

function menu_replace_to_last(json,index_array,new_item,need_key){


    index_array.forEach((element,key) => {
        if(need_key==key){
            var next_key=need_key+1;
            if(!index_array[next_key]){
                json[element].title=new_item.title;
                json[element].href=new_item.href;
                json[element].target=new_item.target;

                return true;
            }
            if(!json[element].sublinks){
                json[element].sublinks=[];
            }
            console.log('elements');
            console.log(json[element].sublinks);
            json[element].sublinks=menu_replace_to_last(json[element].sublinks,index_array,new_item,next_key);
            return true;
        }
    })
    return json;
}
function menu_append_to_last(json,index_array,new_item,need_key){

    if(need_key==undefined){
        json.push(new_item);
        return json;


    }
    index_array.forEach((element,key) => {
        if(need_key==undefined){
            json.push(new_item);
            return true;


        }else  if(need_key==key){
            var next_key=need_key+1;
            if(!index_array[next_key]){
                next_key=undefined;
            }
            if(!json[element].sublinks){
                json[element].sublinks=[];
            }
            console.log('elements');
            console.log(json[element].sublinks);
            json[element].sublinks=menu_append_to_last(json[element].sublinks,index_array,new_item,next_key);
            return true;
        }
    })
    return json;
}
function menu_render_ul(json,subindex=undefined){
    var title_add=$(".result_menu").data("add");
    var title_edit=$(".result_menu").data("edit");
    var title_delete=$(".result_menu").data("delete");

    var ul_elements="";
    if(json instanceof Array && json.length>0) {
        json.forEach((element, index) => {
            var final_index = "";
            if (subindex == undefined) {
                final_index = index;
            } else {
                final_index = subindex + "." + index;
            }
            var sub_ul = "";

            if (!element.sublinks) {
                element.sublinks=[];
            }
            sub_ul = menu_render_ul(element.sublinks, final_index);

            ul_elements = ul_elements + "<li>" + element.title + "<a  data-index='" + final_index + "' class='menu_edit_item' href='#'>"+title_edit+"</a> <a data-index='" + final_index + "' class='menu_delete_item' href='#'>"+title_delete+"</a> " + sub_ul + "</li>";
        })
    }
    var new_add_index="";
    if(subindex!=undefined){
        new_add_index=subindex;
    }
    ul_elements= ul_elements + "<li><a  data-index='" + new_add_index + "' class='menu_add_new_link_from_ul' href='#'>"+title_add+"</a></li>"
    ul_elements="<ul>"+ul_elements+"</ul>";
    return ul_elements;
}
function menu_save_json(json){
    $(".json_links").val(JSON.stringify(json));
}
function menu_get_json(){
    var json_links=JSON.parse($(".json_links").val());
    return json_links;
}
function menu_clear_input(){
    $(".link_href").val('');
    $(".link_title").val('');
    $(".link_target").val('');
}
$("body").on("click",".menu_add_new_link_from_ul",function(){
    var index=$(this).data("index");
    $(".row_add_btn").show();
    $(".row_edit_btn").hide();
    $(".menu-add-link").data("index",index);

    return false;
});
$("body").on("click",".menu_edit_item",function(){
    var json_links=menu_get_json();
    var index=$(this).data("index");
    $(".row_add_btn").hide();
    $(".row_edit_btn").show();
    $(".menu-editbtn-link").data("index",index);
    if(Number.isInteger(index)){


        $(".link_href").val(json_links[index].href);
        $(".link_title").val(json_links[index].title);
        $(".link_target").val(json_links[index].target);
    }else {
        var index_array=index.split(".");
        var current_link=menu_get_link(json_links,index_array,0);
        $(".link_href").val(current_link.href);
        $(".link_title").val(current_link.title);
        $(".link_target").val(current_link.target);


    }

    return false;


})
$("body").on("click",".menu_delete_item",function(){
    var json_links=menu_get_json();
    var index=$(this).data("index");
    if(Number.isInteger(index)){
        json_links.splice(index, 1);
    }else {
        var index_array=index.split(".");
        json_links=menu_remove_link(json_links,index_array,0);



    }


    $(".json_links").val(JSON.stringify(json_links));
    render_menu();

});
$("body").on("click",".menu-editbtn-link",function(){
    var index=$(this).data("index");
    var link_href=$(".link_href").val();
    var link_title=$(".link_title").val();
    var link_target=$(".link_target").val();
    if(link_href.length>0 && link_title.length>0 && (link_target=="_target" || link_target=="_self")){
        var json_links=menu_get_json();

        var edited_link={};
        edited_link.href=link_href;
        edited_link.title=link_title;
        edited_link.target=link_target;
        if(Number.isInteger(index)){


            json_links[index].href=edited_link.href;
            json_links[index].title=edited_link.title;
            json_links[index].target=edited_link.target;
        }else {
            var index_array=index.split(".");
            json_links=menu_replace_to_last(json_links,index_array,edited_link,0);



        }

        menu_save_json(json_links);
        menu_clear_input();
        $(".row_edit_btn").hide();
        $(".row_add_btn").show();
        $(this).removeAttr("data-index");
        render_menu();
        return false;
    }

});
$("body").on("click",".menu-add-link",function(){
    var index=$(this).data("index");

    var link_href=$(".link_href").val();
    var link_title=$(".link_title").val();
    var link_target=$(".link_target").val();

    if(link_href.length>0 && link_title.length>0 && (link_target=="_target" || link_target=="_self")){

        var new_link={};
        new_link.href=link_href;
        new_link.title=link_title;
        new_link.target=link_target;
        var json_links=menu_get_json();
        if(index!=undefined){
            if(Number.isInteger(index)){
                if(!json_links[index].sublinks){
                    json_links[index].sublinks=[];
                }
                json_links[index].sublinks.push(new_link);
            }else {
                var index_array=index.split(".");
                json_links=menu_append_to_last(json_links,index_array,new_link,0);
                console.log("test json");
                console.log(json_links);


            }
        }else {
            json_links.push(new_link);
        }
        console.log(json_links);

        $(this).removeAttr("data-index");
        menu_clear_input()
        menu_save_json(json_links);
        render_menu();

    }
    return false;
})
$(document).ready(function(){
    render_menu();
});


