<?php

/**
 * Simple encryption / decryption
 * class. 
 * @author etuchscherer
 */
class encryption {
    
    /**
     * Key used for (en|de)cryption
     * @var string
     */
    private $_key;
    
    /**
     * Magic constructor. 
     */
    public function __construct($key = null) {
        ;
    }
    
    /**
     * Returns an instance of encryption
     * @param string $key 
     * @return encryption
     */
    public static function getInstance($key = null) {
        return new static($key);
    }
    
    /**
     * Encrypts a string
     * @param string $string
     * @return string
     */
    public function encrypt($string) {
        $key = $this->_getKey();
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
    }
    
    /**
     * Decrypts a string
     * @param string $encrypted
     * @return string
     */
    public function decrypt($encrypted) {
        $key = $this->_getKey();
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    }
    
    /**
     * Sets a key used for (en|de)crypting.
     * @param string $key
     * @return encryption
     */
    public function setKey($key) {
        $this->_key = (string)$key;
        return $this;
    }
    
    /**
     * Gets thee key for (en|de)cryption 
     * @return string
     */
    private function _getKey() {
        return self::KEY;
    }
}