<?php

class HelperLib
{
    /**
     * Encrypts the provided plaintext password with the provided key.
     * @param string $plaintText - the text to encrypt.
     * @param string $key - the encryption key to encrypt the text with.
     * @return string $encryptedText - the encrypted plain text.
     */
    public static function encrypt(string $plainText, string $key, string $iv) : string
    {
        return base64_encode(openssl_encrypt($plainText, 'AES-256-CBC', $key, 0, base64_decode($iv)));
    }


    /**
     * Decrypt the encrypted text with the provided key.
     * @param string $encryptedText - the text to decrypt
     * @param string $key - the key to decrypt the encrypted text with
     * @return $plainText - the result of decrypting the encryted text with the specified key.
     */
    public static function decrypt(string $encryptedText, string $key, string $iv) : string
    {
        return openssl_decrypt(
            base64_decode($encryptedText), 
            'AES-256-CBC', 
            $key, 
            0, 
            base64_decode($iv)
        );
    }
}
    