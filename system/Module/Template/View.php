<?php
/**
 * Created by PhpStorm.
 * User: makhmudov
 * Date: 07.10.2017
 * Time: 17:45
 */

namespace System\Module\Template;

class View
{

    public function render($file, $vars = [], $return = false)
    {
        $file = ROOT_DIR."/".mb_strtolower(ENV)."/View/".$file.".php";

        ob_start();
        extract($vars);

        try {
            require $file;
        }
        catch (\Exception $ex){
            ob_end_clean();
            throw $ex;
        }

        if($return) return ob_get_clean();
        else echo ob_get_clean();
    }

}