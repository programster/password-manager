<?php

namespace Programster\CliMenu;

/* 
 * The base of a menus functionality that all menus should share. E.g.
 * the core properties of a menu (title, options)
 * The ability to choose an option and activate it.
 */

class MenuAbstract
{
    protected $m_name;
    protected $m_options;
    
    public function __construct($name)
    {
        $this->m_name = $name;
    }
    
    
    /**
     * Print the title of the menu in a pretty way to the terminal.
     */
    protected function printMenuTitle()
    {
        $length = strlen($this->m_name);
        
        $header = str_repeat("-", $length);
        $corner = '*';
        $side = '|';
        
        $menuString = 
            $corner . $header . $corner . PHP_EOL .
            $side . $this->m_name . $side . PHP_EOL .
            $corner . $header . $corner . PHP_EOL;
        
        print $menuString;
    }
    
    
    /**
     * Activate the menu, triggering a printout of the menu, fetchin of choice from the user, and
     * subsequent action to take place on the menu option (fetching a value or running a method).
     * @param void
     * @return mixed - null if the menu option does nothing
     */
    public function run()
    {
        $result = null;
        
        $this->printMenuTitle();
        
        foreach ($this->m_options as $index => $option)
        {
            /* @var $option MenuOption */
            print '[' . $index . '] ' . $option->getName() . PHP_EOL;
        }
        
        $rawInput = readline();
        $chosenOption = intval($rawInput);
        
        if 
        (
            $rawInput === "" || 
            ($chosenOption == 0 && $rawInput !== "0") ||
            $chosenOption < 0 || 
            $chosenOption >= count($this->m_options)
        )
        {
            print "Invalid choice. Please try again." . PHP_EOL;
            $this->run();
        }
        else
        {
            $menuOption = $this->m_options[$chosenOption];
            
            /* @var $menuOption $menuOptionAbstract */
            $result = $menuOption->run();
        }
        
        return $result;
    }
}

