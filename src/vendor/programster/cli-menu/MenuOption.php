<?php

namespace Programster\CliMenu;



class MenuOption
{
    private $m_name;
    private $m_callback;
    
    public function __construct($name, $callback) 
    {
        if (!is_callable($callback))
        {
            throw new Exception('Menu callback must be a callback. Duh!');
        }
        
        $this->m_name = $name;
        $this->m_callback = $callback;
    }
    
    
    /**
     * Asks the user to select an option, finds out what they selected and runs that option.
     */
    public function run()
    {
        $result = call_user_func($this->m_callback);
        return $result;
    }
    
    
    public function getName() { return $this->m_name; }
}

