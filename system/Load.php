<?php
/**
 * Независимый класс
 */

namespace System;


class Load
{
    const MASK_MODEL_ENTITY     = '\%s\Model\%s\%s';
    const MASK_MODEL_REPOSITORY = '\%s\Model\%s\%sRepository';
    const FILE_MASK_LANGUAGE    = 'Language/%s/%s.ini';


    public $di;

    /**
     * Load constructor.
     * @param DI $di
     */
    public function __construct($di)
    {
        $this->di = $di;

        return $this;
    }

    //зугружает модель
    /*
     * зугружает модель(репозиторий в di->container["model"])
     *
     */

    public function model($modelName, $modelDir = false, $env = false)
    {
        $modelName  = ucfirst($modelName);
        $modelDir   = $modelDir ? $modelDir : $modelName;
        $env        = $env ? $env : ENV;

        //получаем namespace модели
        $namespaceEntity = sprintf(
            self::MASK_MODEL_REPOSITORY,
            $env, $modelDir, $modelName
        );

        $namespaceRepository = sprintf(
            self::MASK_MODEL_REPOSITORY,
            $env, $modelDir, $modelName
        );

        $model = new \stdClass();
        $model->entity     = $namespaceEntity;
        $model->repository = new $namespaceRepository($this->di);
        return $model;
    }

    /**
     * @param string $path Format: [a-z0-9/_]
     * @return array
     */
    public function language($path)
    {
        $languageCurrent = \Setting::get('language');
        $file = sprintf(
            self::FILE_MASK_LANGUAGE,
            $languageCurrent, $path
        );

        $content = parse_ini_file($file, true);

        // Set to DI
        $languageName = $this->toCamelCase($path);

        $language = $this->di->get('language') ?: new \stdClass();
        $language->{$languageName} = $content;

        $this->di->set('language', $language);

        return $content;
    }

    /**
     * @param string $str
     * @return string
     */
    private function toCamelCase($str)
    {
        $replace = preg_replace('/[^a-zA-Z0-9]/', ' ', $str);
        $convert = mb_convert_case($replace, MB_CASE_TITLE);
        $result  = lcfirst(str_replace(' ', '', $convert));

        return $result;
    }
}