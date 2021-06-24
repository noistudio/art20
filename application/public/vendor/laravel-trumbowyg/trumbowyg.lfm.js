var lfm_window=null;
var lfm = function(input_id,id, type, options,success) {

    var addList = document.getElementById('fields_for_file');
    var input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute("id",input_id);



    addList.appendChild(input);
    //  var button=$(".pass_data_from_child")[0];
    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
//    var target_input = document.getElementById(button.getAttribute('data-input'));
    //   var target_preview = document.getElementById(button.getAttribute('data-preview'));
    var input_hidden=document.getElementById(input_id);

    window.open(route_prefix + '?type=' + type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = function (items) {

        console.log('items');
        console.log(items);
        var file_path = items.map(function (item) {

            var new_url=new URL(item.url);
            var path=new_url.pathname;
            input_hidden.setAttribute("data-file",path);
            input_hidden.setAttribute("value",path);
            console.log(input_hidden);
            input_hidden.dispatchEvent(new Event('change'));
            input_hidden.removeAttribute("data-file");
            return path;
        }).join(',');

        //  console.log('new mega file');
        console.log(file_path);
        // set the value of the desired input to image url
        //  target_input.value = file_path;
        // target_input.dispatchEvent(new Event('change'));

        // clear previous preview
        //  target_preview.innerHtml = '';
        // var result=editor.execCmd('insertImage', file_path,undefined, true);
        //  console.log(window.opener);

        // alert(window.opener);
        // success(file_path);

        self.close();
        // window.close();




        // set or change the preview image src
        // items.forEach(function (item) {
        //     let img = document.createElement('img')
        //     img.setAttribute('style', 'height: 5rem')
        //     img.setAttribute('src', item.thumb_url)
        //     target_preview.appendChild(img);
        // });
        //
        // // trigger change event
        // target_preview.dispatchEvent(new Event('change'));
    };
};
