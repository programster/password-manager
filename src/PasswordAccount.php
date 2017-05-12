<?php

/*
 * Data structure for holding the password account details. This can be serailzed into a json format
 * using the jsonSerialize function.
 */

class PasswordAccount
{
    private $m_password;
    private $m_username;
    private $m_accountName;
    private $m_modificationTime;
    private $m_recordKey; // initialization vector for the encryption.
    private $m_key; // the user's passphrase/password to encrypt/decrypt everything
    
    
    /**
     * Creates the password account object.
     * 
     * @param string $name      - the searchable name of the account
     * @param string $username  - the username assosciated with the account, e.g. sdpagent@gmail.com
     * @param string $password  - the password for the account
     * @param bool   $encrypted - flag for indicating if the password provided is encrypted or not.
     * 
     * @return void
    */
    function __construct(string $key, string $name, string $username, string $encryptedPassword, string $recordKey, int $modificationTime, bool $encrypted=true)
    {        
        $this->m_accountName      = $name;
        $this->m_username         = $username;
        $this->m_modificationTime = $modificationTime;
        $this->m_recordKey        = $recordKey;
        $this->m_key              = $key;
        
        if ($encrypted)
        {
            
            $this->m_password = HelperLib::decrypt($encryptedPassword, $key, $recordKey);
        }
        else
        {
            $this->m_password = $encryptedPassword;
        }
    }
    
    
    /**
     * Updates this account with the new details. If any of the details are blank/empty then they
     * are not changed.
     * 
     * @param string $name - the searchable name for this account
     * @param string $username - the username of the account.
     * @param string $password - the new password to set for the account.
     * 
     * @return 
     */
    public function updateDetails($name, $username, $password)
    {
        $edited = false;
        
        if (!empty($name))
        {
            $this->m_accountName = $name;
            $edited = true;
        }
        
        if (!empty($username))
        {
            $this->m_username = $username;
            $edited = true;
        }
        
        if (!empty($password))
        {
            $this->m_password = $password;
            $edited = true;
        }
        
        if ($edited)
        {
            $this->m_modificationTime = time();
        }
    }
    
    
    /**
     * Convert this object into a form for JSON.
     * @param void
     * @return array $result - json serializable array representing this object.
    */
    public function jsonSerialize()
    {
        $encryptedPassword = HelperLib::encrypt($this->m_password, $this->m_key, $this->m_recordKey);
        
        $result = array(
            'name'              => $this->m_accountName,
            'username'          => $this->m_username,
            'password'          => $encryptedPassword,
            'record_key'        => $this->m_recordKey,
            'modification_time' => $this->m_modificationTime
        );
        
        return $result;
    }
    
    
    # Accessor functions
    public function getPassword()         { return $this->m_password;    }
    public function getName()             { return $this->m_accountName; }
    public function getUsername()         { return $this->m_username;    }
    public function getModificationTime() { return $this->m_modificationTime; }
}