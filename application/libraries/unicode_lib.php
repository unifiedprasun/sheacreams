<?php
class Unicode_Lib{
    private static $current_lang;
    private static $text_list = array();
    private static $module_loaded = array();
    private static $available_languages = array(
        array('name'=>'English','code'=>'en-uk','flag_image'=>'us.png'),
        array('name'=>'Chinese','code'=>'zh-sg','flag_image'=>'cn.png')
    );

    public static function set_current_lang($lang_code){
        self::$current_lang = $lang_code;
    }

    public static function get_current_lang(){
        $ci = get_instance();
        $ci->load->helper('cookie');

        self::$current_lang = $ci->input->cookie("USER_LANG");
        if(self::$current_lang==''){
            self::$current_lang="en-uk";

        }
        return self::$current_lang;
    }

    public static function load_lang_mod($module,$reciept_lang=0){
        if(in_array($module, self::$module_loaded)){
            return;
        }
        $ci = get_instance();
        $ci->load->helper('cookie');

        if($reciept_lang == 1)
            self::$current_lang = "en-uk";
        else
            self::$current_lang = $ci->input->cookie("USER_LANG");
        if(self::$current_lang==''){
            self::$current_lang="en-uk";

        }


        self::$module_loaded[] = $module;


        //$root_path = str_replace(DIRECTORY_SEPARATOR . "system" . DIRECTORY_SEPARATOR, "", BASEPATH);
        //echo '<br>';
        //$file_path = implode(DIRECTORY_SEPARATOR, array(FCPATH, "application", "language", self::$current_lang, $module.".ini"));
        $file_path =  FCPATH . "application" . DIRECTORY_SEPARATOR . "language" . DIRECTORY_SEPARATOR . self::$current_lang . DIRECTORY_SEPARATOR . $module.".ini";
        //die;
        $content = file_get_contents($file_path);
        $lines = explode(PHP_EOL, $content);
        foreach($lines as $line){
            if(preg_match("/^([0-9A-Z_-]+)[=]{1}[\"]{1}(.*)[\"]{1}/", $line, $matches)){
                self::$text_list[$matches[1]] = $matches[2];
            }
        }
    }

    public static function get_all_text(){
        return self::$text_list;
    }

    public static function get_text($key, $args){
        $text = $key;
        if(isset(self::$text_list[$key])){
            if(count($args)>0)
                $text = vsprintf(self::$text_list[$key], $args);
            else
                $text = self::$text_list[$key];
        }
        if(ENVIRONMENT == "testing")
            return "[".self::$current_lang. "]".$text;
        else
            return $text;
    }

    public static function get_language_menu_html()
    {
        $dropdown_html = array();
        $selected_html = '';
        foreach(self::$available_languages as $lang){

            if($lang["code"] == self::get_current_lang()){
                $selected_html =
                    '<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" src="' . base_url() . '/assets/img/flags/' . $lang["flag_image"] .'">
					<span class="langname">'.$lang["name"].'</span><i class="icon-angle-down"></i></a>';
            }else{
                $dropdown_html[] =
                    '<li>
								<a href="javascript:void(0)" onClick="selectlanguage(\''.$lang["code"].'\')">
								<img alt="" src="' . base_url() . '/assets/img/flags/' . $lang["flag_image"] .'">
								<span class="username">'.$lang["name"].'</span></a>
							</li>';
            }

        }

        return $selected_html."<ul  class=\"dropdown-menu dropdown-menu-default\">" . implode("", $dropdown_html) . "</ul>";
    }

}