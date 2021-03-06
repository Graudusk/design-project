<?php

namespace Anax\Content;

/**
 * A read content from filesystem.
 *
 */
class CFileContent
{
    use \Anax\TConfigure,
        \Anax\DI\TInjectionAware;



    /**
     * Base path to content.
     *
     */
    private $path;



    /**
     * Get file as content.
     *
     * @param string $file with content
     *
     * @return string as content of the file
     *
     * @throws Exception when file does not exist
     */
    public function get($file)
    {
        $basepath = $this->config['basepath'];
        $suffix = $this->config['suffix'];
        $target = "$basepath/$file{$suffix}";

        if (!is_readable($target)) {
            throw new \Exception(t("No such file content: @FILENAME", ["@FILENAME" => $target]));
        }

        $filter  = $this->config['textfilter'];
        $content = file_get_contents($target);
        $content = $this->di->textFilter->doFilter($content, $filter);

        return $content;
    }



    /**
     * Set base path where  to find content.
     *
     * @param string $path where content reside
     *
     * @return $this
     */
    public function setBasePath($path)
    {
        if (!is_dir($path)) {
            throw new \Exception(t("Base path for file content is not a directory"));
        }
        $this->path = rtrim($path, '/') . '/';

        return $this;
    }



    /**
     * Set standard suffix.
     *
     * @param string $suffix to use as standard suffix of filename
     *
     * @return $this
     */
    public function setSuffix($suffix)
    {
        $this->config['suffix'] = $suffix;

        return $this;
    }
}
