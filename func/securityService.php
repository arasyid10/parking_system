<?php
namespace SecurityService;

class securityService
{
    private $formTokenLabel = 'eg-csrf-token-label';
    private $sessionTokenLabel = 'EG_CSRF_TOKEN_SESS_IDX';
    
    private $tokenLen = 200;
    private $post = [];
    private $session = [];
    private $server = [];
    private $excludeUrl = [];
    private $hashAlgo = 'sha256';
    private $hmac_ip = true;

    private $hmacData = 'ABCeNBHVe3kmAqvU2s7yyuJSF2gpxKLC&*#@!$~%';
    
    public function __construct($excludeUrl = null, &$post = null, &$session = null, &$server = null)
    {
        
        if (! \is_null($excludeUrl)) {
            $this->excludeUrl = $excludeUrl;
        }
        if (! \is_null($post)) {
            $this->post = & $post;
        } else {
            $this->post = & $_POST;
        }

        if (! \is_null($server)) {
            $this->server = & $server;
        } else {
            $this->server = & $_SERVER;
        }

        if (! \is_null($session)) {
            $this->session = & $session;
        } elseif (! \is_null($_SESSION) && isset($_SESSION)) {
            $this->session = & $_SESSION;
        } else {
            throw new \Error('No session available for persistence');
        }
    }
    //F3
    public function insertHiddenToken()
    {
        $csrfToken = $this->getCSRFToken();
        $hidden = "<!--\n--><input type=\"hidden\"" . " name=\"" . 
        $this->xssafe($this->formTokenLabel) . "\"" . " value=\"" . 
        $this->xssafe($csrfToken) . "\"" . " />";
        return $hidden;
    }

    public function xssafe($data, $encoding = 'UTF-8')
    {
        return htmlspecialchars($data, ENT_QUOTES | ENT_HTML401, $encoding);
    }

    //F1
    public function getCSRFToken()
    {   $this->unsetToken();
        if (empty($this->session[$this->sessionTokenLabel])) {
            $this->session[$this->sessionTokenLabel] = bin2hex(random_bytes($this->tokenLen));
        }
        if ($this->hmac_ip !== false) {
            $token = $this->hMacWithIp($this->session[$this->sessionTokenLabel]);
        } else {
            $token = $this->session[$this->sessionTokenLabel];
        }
        return $token;
    }

    //F2
    private function hMacWithIp($token)//hash_message_authentication_code
    {//based on
        $message = $_COOKIE["PHPSESSID"]. "!" .$token;
        $hashHmac = \hash_hmac($this->hashAlgo, $message , $this->hmacData);
        return $hashHmac;
    }
    public function getCurrentRequestUrl()
    {
        $protocol = "http";
        if (isset($this->server['HTTPS'])) {
            $protocol = "https";
        }
        $currentUrl = $protocol . "://" . $this->server['HTTP_HOST'] . $this->server['REQUEST_URI'];
        //echo $currentUrl;
        return $currentUrl;
    }

    public function validateCSRFToken($submittedToken) {
        if (!isset($this->session[$this->sessionTokenLabel])) {
            // CSRF Token not found
            return false;
        }
        if ($this->hmac_ip !== false) {
            $expected = $this->hMacWithIp($this->session[$this->sessionTokenLabel]);
        } else {
            $expected = $this->session[$this->sessionTokenLabel];
        }
       
        return hash_equals($expected, $submittedToken);
    }
    public function validate()
    {
        $currentUrl = $this->getCurrentRequestUrl();
        if (! in_array($currentUrl, $this->excludeUrl)) {
            if (! empty($this->post)) {
                $isAntiCSRF = $this->validateRequest();
                if (! $isAntiCSRF) {
                    return false;
                }
                return true;
            }
        }
    }
    public function isValidRequest()
    {
        $isValid = false;
        $currentUrl = $this->getCurrentRequestUrl();
        if (! in_array($currentUrl, $this->excludeUrl)) {
            if (! empty($this->post)) {
                $isValid = $this->validateRequest();
            }
        }
        return $isValid;
    }
    public function validateRequest()
    {
        if (!isset($this->session[$this->sessionTokenLabel])) {
            // CSRF Token not found
            return false;
        }

        if (!empty($this->post[$this->formTokenLabel])) {
            // Let's pull the POST data
            $token = $this->post[$this->formTokenLabel];
        } else {
            return false;
        }

        if (is_string($token)) {
            return false;
        }

        // Grab the stored token
        if ($this->hmac_ip !== false) {
            $expected = $this->hMacWithIp($this->session[$this->sessionTokenLabel]);
        } else {
            $expected = $this->session[$this->sessionTokenLabel];
        }
        
        return \hash_equals($token, $expected);
    }

    /**
     * removes the token from the session
     */
    public function unsetToken()
    {
        if (! empty($this->session[$this->sessionTokenLabel])) {
            unset($this->session[$this->sessionTokenLabel]);
        }
    }
    
    public function checkOriginRefHeader()
    {
        // Allow requests from a specific origin (replace 'https://example.com' with your allowed origin)
        $allowedOrigin = 'https://example.com';

        // Get the Origin header
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

        // Check if the origin is allowed
        if ($origin === $allowedOrigin || $referer === $allowedOrigin) {
            header('Access-Control-Allow-Origin: ' . $allowedOrigin);
        }

    }
}
?>