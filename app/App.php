<?php

namespace Epiphp;

class App
{
    protected $path;
    protected $root;
    protected $links = '';
    protected $ignore = ['BaseFunctionInterface.php'];

    public function __construct($path, $root)
    {
        $this->path  = trim($path,'/');
        $this->root  = $root;

        $this->buildLinks();
    }

    protected function buildLinks()
    {
        $objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->root.'/src/'), \RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            if (false !== strpos($object->getFileName(), '.php') && !in_array($object->getFileName(), $this->ignore)) {
                $class = str_replace($this->root.'/src/', '', $name);
                $class = str_replace('.php', '', $class);
                $link = $class;
                $class = str_replace('/', '\\', $class);

                $class = "Epiphp\\$class";

                $object = new $class();

                $this->links .= '<a href="Epiphp/'.$link.'">'.$object->title().'</a><br>';
            }
        }
    }

    public function run()
    {
        if ($this->path === '') {
            echo "$this->links";
            return;
        }

        $class = str_replace('/', '\\', $this->path);

        $object = new $class();

        echo '<a href="/">back</a><br><br>';
        echo '<pre>Title: '.$object->title().'</pre>';
        echo '<pre>Description: '.$object->description().'</pre>';


        var_dump($object->execute());
        
        return $this;
    }
}