<?php
class RSA {
    private $publicKey;
    private $privateKey;

    // Constructor now takes RSA keys instead of AES key and IV
    public function __construct($publicKey, $privateKey) {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    // RSA encryption method
    public function encrypt($data) {
        openssl_public_encrypt($data, $encryptedData, $this->publicKey);
        return base64_encode($encryptedData);
    }

    // RSA decryption method
    public function decrypt($encryptedData) {
        openssl_private_decrypt(base64_decode($encryptedData), $decryptedData, $this->privateKey);
        return $decryptedData;
    }
}

// Example usage
$privateKey = "-----BEGIN PUBLIC KEY-----\n MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDi8574kFX/OBQs
9SZyy25pzI0vsjELetQhk5gPuekCYqDDAGvKZT2HukcQNT+ChYSMtp7JBofSNtE6
NOgjZPG++Io2ChCIKFHOIS7JcxcesCI6b50savlKarnE1yscsBOrLzClz286Wzm8
g4hjQqKTmf26/F/NRcjcwOLKv2ANmpJS87Uc38PsIG0Qh1+HbzOdHqQXsWaiUrCk
qc5uVU5FiphifUuqS7+phr4cmKFkq1ZDKfzzYn0DGaKq4VduFJCVg2tS5NzoX5co
W1laj+A/m3Vsohzu9PtaYaOwD311YLf4t4/I086JemfvF8z1jiMvb9gZreUvLdEN
TJJgKlRTAgMBAAECggEALhFTqJLr0eWZOtL8XfrrS7CIzDC4geMJ4lLqX+7V3HUW
ut6AAtJwHffy6thULvNZR5LeQmH/+ezEpbMNl/mqlKAwte1vE6RTjqrvq1agT8ti
90emuNhyB+gIE2u1xZn8NBhdIJstscPIwXpVmghxpdJxTZ5i9/D9Z8oDfzI/liLz
OJwiTs2yNGm8VgSu+PXB1VE+l7gfhJB9sI0LeZ9gxm8LYEctiXlQHtZNAuPSHQ54
4GcxX3FbSmvdWu9DWKZhFnoBVK8g/SGMjXbpu62nqbqboPC96wkNZIZN66xes++W
hjasKMMQeBNuyw/4wnHY1SzlDHeeAvZW3+bFPUCocQKBgQD6oWvWxpAIG5TVIwR1
VySazpNK+NzAImtWxrkw1kElygafzWYYB/sntNyi0HYozcKr9OrDwhVoeCTuwJ8o
IcNAp3SD6CaQl7uvapbwCiIwJzsoOfBrXQf2Qdz9bEsg8/6sei32XBSasD7YDd9Y
GSSPXIsHpvo0UxjqklT3cdB/mwKBgQDn0FVMJLNvfeAKPZWZxpcsAETNWoLXLFPr
aCdiBY825lJsBQVisRjQTHJNdlbpCINKUfDAaAkdyLm0pnNnqjGuNT06OpsWmcGa
vyTRpH9AOUcfsfcgvuFA87rZwvGOyJRR7iq4Zh9qv5Uk86kc7ZrMNShk4zoKrbKH
fQh6soE1qQKBgQCQua3f9AEv7V1gRjxI1e1ZR3hejp5KhJWfIlnGDbLI84Qnux/9
OH6bSyEtE1tn7IlBasg2Clj6XoZVJ/2/2t848nmhweijDjte7BoEupVLYRwT+oEO
PkZeuWG3JVWszbh+OH9aB4oOWT+w2zHhWYN3FWVjIdTRajq1GZLe4GYZiQKBgQCg
jfO2BClfTBBzJ0pJMnmbmSgODuVWQLZy8jVst6sEfCuT8zpSq5QjGP+F1TPGvQWp
4OzdZnEB9vdgPnTp1MAKB4e7n8GwupeUJVVL+iHEiqdPNYSTYoFC6kx87H8/xH6t
7EYcZ2bVGZIkALsddRfk3eB3V8XohXuESb4otR+22QKBgQDFYsZSa295dT7njj+B
SQw9Vc9DoqxZspf0FpmD0KI1+pvT1LV58svTOH0D6biR0RCeCPyroKGwzysPU80R
VBPH2HMBljuWd3gklyKl3ibfAgB9kSLaQ0q4EK/ZG4IZ5tuefZwaHI1sDSDsdnFr
n3Yxycz05wQF3e5NBu41xYLfTg== \n-----END PUBLIC KEY-----";
$publicKey = "-----BEGIN PUBLIC KEY-----\n MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA4vOe+JBV/zgULPUmcstu
acyNL7IxC3rUIZOYD7npAmKgwwBrymU9h7pHEDU/goWEjLaeyQaH0jbROjToI2Tx
vviKNgoQiChRziEuyXMXHrAiOm+dLGr5Smq5xNcrHLATqy8wpc9vOls5vIOIY0Ki
k5n9uvxfzUXI3MDiyr9gDZqSUvO1HN/D7CBtEIdfh28znR6kF7FmolKwpKnOblVO
RYqYYn1Lqku/qYa+HJihZKtWQyn882J9AxmiquFXbhSQlYNrUuTc6F+XKFtZWo/g
P5t1bKIc7vT7WmGjsA99dWC3+LePyNPOiXpn7xfM9Y4jL2/YGa3lLy3RDUySYCpU
UwIDAQAB\n-----END PUBLIC KEY-----";

$rsa = new RSA($publicKey, $privateKey);

$encrypted = $rsa->encrypt("Hello, world!");
echo "Encrypted: $encrypted\n";

$decrypted = $rsa->decrypt($encrypted);
echo "Decrypted: $decrypted\n";
?>