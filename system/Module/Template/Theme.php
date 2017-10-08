<?php

namespace System\Module\Template;


class Theme
{
    //правила для имени файлов
    const RULES_NAME_FILE = [
        'header' => 'header-%s',
        'footer' => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    /**
     * url текущей темы (ссылка текущей темы)
     * @var string
     */
    public $url = '';


    /**
     * @var array
     */
    protected $data = [];

    /**
     * тут будет подключаться header
     * @param string $name
     */
    public function header($name = '')
    {

        if($name !== '')
        {
            $name = sprintf(self::RULES_NAME_FILE['header'], $name);
        }
        else
        {
            $name = 'header';
        }
        $this->loadTemplateFile($name);
    }


    /**
     * тут будет подключаться footer
     * @param string $name
     */
    public function footer($name = '')
    {
        if($name !== '')
        {
            $name = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
        else
        {
            $name = 'footer';
        }
        $this->loadTemplateFile($name);
    }


    /**
     * тут будет подклються sidebar
     * @param string $name\
     */
    public function sidebar($name = '')
    {
        if($name !== '')
        {
            $name = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
        else
        {
            $name = 'sidebar';
        }
        $this->loadTemplateFile($name);
    }

    /**
     *
     * Мы можем к какой-то теме подключать неограниченное колличесвто блоков
     * @param $name
     * @param array $data
     */
    public function block($name, $data = [])
    {
        if($name !== '')
        {
            $this->loadTemplateFile($name, $data);
        }
    }


    /**
     * @param $nameFile
     * @param array $data
     * @throws \Exception
     */
    private function loadTemplateFile($nameFile, $data = [])
    {
        $file = ROOT_DIR.'/content/themes/default/'.$nameFile.'.php';

        //если мы зашли через admin/ то берём файлы из admin/view
        if(ENV == "Admin"){
            $file = ROOT_DIR.'/View/'.$nameFile.'.php';
        }

        if(is_file($file))
        {
            extract($data);
            require_once $file;
        }
        else
        {
            throw new \Exception(
                sprintf('View file %s does not exist!', $file)
            );
        }
    }


    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }
}