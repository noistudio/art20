<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Artisan;

class Languages
{

    function form(){
        $languages=config('laravellocalization.supportedLocales');


        $data=array();
        $data['languages']=$languages;
        return view("admin.languages.form",$data);
    }

    function save(){
        $languages=request()->post('languages');
        $languages_result=array();
        if(isset($languages) and is_array($languages) and count($languages)){
            foreach($languages as $lang){

                if(isset($lang['key']) and isset($lang['name']) and isset($lang['script']) and isset($lang['native'])){
                    $languages_result[$lang['key']]=array('name'=>$lang['name'],'script'=>$lang['script'],'native'=>$lang['native']);
                }
            }
        }

        $this->saveArrayToConfig(array('supportedLocales'=>$languages_result));

        return back();
    }
    private function saveArrayToConfig($array){
        $filename="laravellocalization";
        config([$filename => $array]);

        $text = '<?php return ' . var_export($array, true) . ';';


        file_put_contents(config_path($filename.'.php'), $text);
        sleep(1);

        Artisan::call("config:clear");

        sleep(2);
        return true;
    }

}
