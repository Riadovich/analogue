<?php
namespace System\Module\Template;

class View
{

    public $theme;


    public function __construct()
    {
        $this->theme = new Theme();
    }

    public function render($templete, $vars = [], $return = false)
    {
        $templetePath = $this->getTemplatePath($templete, ENV);

        if(!file_exists($templetePath))
        {

            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $templete, $templetePath)
            );
        }

        $this->theme->setData($vars);
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try
        {
            require $templetePath;
        }
        catch(\Exception $e)
        {
            ob_end_clean();
            throw $e;
        }

        if($return) return ob_get_clean();
        else echo ob_get_clean();
    }

    /**
     *
     * В дальнеешем подвергнится рефакторингу
     *
     * @param $template
     * @param null $env
     * @return string
     */
    private function getTemplatePath($template, $env = null)
    {
        if($env == 'Cms')
        {
            return ROOT_DIR.'/content/themes/default/'.$template.'.php';
        }
        return ROOT_DIR."/View/".$template.".php";
    }

}