<?php

namespace Programster\CliMenu;

/* 
 * An action menu is a CLI menu whereby each option has an action that is treggered when the user
 * chooses it, rather than returning a value.
 */

class ValueMenu extends MenuAbstract
{    
    /**
     * Add an option to the menu which will return the specified value when chosen.
     * @param string $name - the display name of the option that will be shown to the user
     * @param mixed $value - the value that will be returned if the option is chosen. 
     */
    public function addOption($name, $value)
    {
        $callback = function() use ($value)
        { 
            return $value;
        };
        
        $menuOption = new MenuOption($name, $callback);
        $this->m_options[] = $menuOption;
    }
    
    
    /**
     * Adds an option to the menu which will return a value equivalent to the options position
     * in the menu. (e.g. the number the user had to input in order to choose the option)
     * @param string $name - the display name of the option that will be shown to the user
     * @return void
     */
    public function addIndexOption($name)
    {
        $value = count($this->m_options);
        $callback = function() use ($value) { return $value; };
        $menuOption = new MenuOption($name, $callback);
        $this->m_options[] = $menuOption;
    }
}

