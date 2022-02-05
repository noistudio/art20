<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class Setting extends Controller
{

    public function index(){
        $data=array();
        $data['setting']=config("setting_conf");

        return view("admin.setting.index",$data);
    }

    public function edit($prefix){

        $conf=config("setting_conf.".$prefix);
        $setting=config("setting.".$prefix);
        $data=array();
        $data['conf']=$conf;
        $data['prefix']=$prefix;
        $data['setting']=$setting;

        return view("admin.setting.edit",$data);
    }

    public function doUpdate($prefix){
        $conf=config('setting_conf');
        $setting=config('setting');
        $request=request();
        if(!(isset($conf[$prefix]) and is_array($conf[$prefix]))){
            return back()->with("error", "Конфигурация не найдена!");
        }
        if(!(isset($setting['prefix']) and is_array($conf[$prefix]))){
            $setting[$prefix]=array();
        }
        $post=request()->post();
        foreach($conf[$prefix]['fields'] as $name=>$field_conf){
            if($field_conf['type']=="text" or $field_conf['type']=="integer" or  $field_conf['type']=="textarea" or $field_conf['type']=="select"){
                if(isset($post[$name]) and is_string($post[$name])){
                 $setting[$prefix][$name]=$post[$name];
                }
            }else if($field_conf['type']=="boolean"){
                if(isset($post[$name]) and ($post[$name]=="1" or $post[$name]=="2")){
                    if($post[$name]=="1"){
                        $setting[$prefix][$name]=true;
                    }
                    if($post[$name]=="2"){
                        $setting[$prefix][$name]=false;
                    }
                }
            }else if($field_conf['type']=="image"){
                try{
                $request->validate([
                    $name=> 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                             $img_name_img = $name;
                             $imageName_img = time() . '.' .rand(0,99999).".". $request->$img_name_img->extension();
                             $request->$img_name_img->move(public_path(config("artcrud.public_path_for_files")), $imageName_img);
                             $value_img_img = config("artcrud.public_path_for_files") . "/" . $imageName_img;
                             $setting[$prefix][$name]=$value_img_img;
                }catch(\Exception $e){
                  //  return back()->with("error", "Вы не загрузили  ".$field_conf['title']);
                }
            }else if($field_conf['type']=="file"){
                try{
                    $request->validate([
                        $name=> 'required|file',
                    ]);
                    $img_name_img = $name;
                    $imageName_img = time() . '.' .rand(0,99999).".". $request->$img_name_img->extension();
                    $request->$img_name_img->move(public_path(config("artcrud.public_path_for_files")), $imageName_img);
                    $value_img_img = config("artcrud.public_path_for_files") . "/" . $imageName_img;
                    $setting[$prefix][$name]=$value_img_img;
                }catch(\Exception $e){
                 //   return back()->with("error", "Вы не загрузили  ".$field_conf['title']);
                }
            }

        }

        $this->saveArrayToConfig("setting",$setting);
     if($prefix=="main"){
//         if(isset($setting['main']['site_disable']) and $setting['main']['site_disable']==true){
//             Artisan::call('down',['--allow'=>\request()->ip()]);
//         }
//         if(isset($setting['main']['site_disable']) and $setting['main']['site_disable']==false){
//             Artisan::call('up');
//         }

     }
        return back()->with("success","Данные успешно обновлены!");

    }

    private function saveArrayToConfig($filename,$array){
        config([$filename => $array]);

        $text = '<?php return ' . var_export($array, true) . ';';


        file_put_contents(config_path($filename.'.php'), $text);
        sleep(1);

        Artisan::call("config:clear");

        sleep(2);
        return true;
    }

}
