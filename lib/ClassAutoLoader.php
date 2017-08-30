<?php
class ClassAutoLoader {
        public function __construct() 
		{
            spl_autoload_register(array($this, 'loader'));
        }
        private function loader($className) 
		{
          include realpath(dirname(__FILE__)).'/'.$className . '.inc'; 
        } 
}
  $autoloader = new ClassAutoLoader();
