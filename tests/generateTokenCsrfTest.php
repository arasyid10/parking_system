<?php
// Assume your CSRF logic is implemented in a class called CsrfProtection
session_start();
include "func/securityService.php";
class GenerateTokenCsrfTest extends \PHPUnit\Framework\TestCase {
    public function testGenxssafe(): void
    {
        $xsafe = new SecurityService\securityService();
        $str=$xsafe->xssafe('784954yter8wuydfjkfbjkfd37t5iuejhgjsdf');
        $this->assertNotNull( $str);
    }
    public function testgetCurrentRequestUrl(): void
    {
        $xsafe = new SecurityService\securityService();
        $this->assertNotEmpty( $xsafe->getCurrentRequestUrl());
    }
    public function testValidate(): void
    {
        $xsafe = new SecurityService\securityService();
        $this->assertFalse( $xsafe->validate());
        //$this->assertFalse($xsafe->isValidRequest());
        //$this->assertFalse($xsafe->validateRequest());
    }
    public function testIsValidRequest(): void
    {
        $xsafe = new SecurityService\securityService();
        $this->assertFalse($xsafe->isValidRequest());
    }
    public function testValidateRequest(): void
    {
        $xsafe = new SecurityService\securityService();
        $this->assertFalse($xsafe->validateRequest());
    }
    //======PENGUJIAN FUNGSI PEMBANGKITAN TOKEN CSRF=======
//F1 TC1 Menguji token apakah berhasil dibangkitkan
    public function testCsrfTokenGeneration() {
        $csrfProtection = new SecurityService\securityService();
        $token = $csrfProtection->getCSRFToken();

        // Check if token is generated and same between expected and actual
        $this->assertSame($_COOKIE["PHPSESSID"],$token);
    }
    //F1 TC2 menguji token apakah sama ketika 2 kali submit
    public function testCsrfDoubleSubmitTokenGeneration() {
        $csrfProtection = new SecurityService\securityService();
        
        for( $i = 0; $i < 2; $i++ ) {
        $token[$i] = $csrfProtection->getCSRFToken();
        }
        // Check if token have same token when double generate
        $this->assertEquals($token[0],$token[1]);
    }
    //menguji validasi token
    public function testCsrfTokenValidation() {
        $csrfProtection = new SecurityService\securityService();
        $token = $csrfProtection->getCSRFToken();

        // Simulate a form submission with the generated token
        $_POST['csrf_token'] = $token;
        
        // Validate the token
        $isValid = $csrfProtection->validateCSRFToken($_POST['csrf_token']);

        // Check if token is validated successfully
        $this->assertTrue($isValid);
    }

    //menguji token tidak valid
    public function testCsrfTokenValidationFailure() {
        $csrfProtection = new SecurityService\securityService();
        $token = $csrfProtection->getCSRFToken();
        // Simulate a form submission with a different token
        $_POST['csrf_token'] = 'TOKEN_TIDAK_VALID';
        // Validate the token
        $isValid = $csrfProtection->validateCSRFToken($_POST['csrf_token']);
        // Check if token validation fails
        $this->assertFalse($isValid);
    }
    //menguji token 1000 kali
    public function testCsrf1000TokenValidationFailure() {
        $csrfProtection = new SecurityService\securityService();
        $token = $csrfProtection->getCSRFToken();
        for($i = 0; $i < 1000; $i++ ) {
            $token_[$i] = $csrfProtection->getCSRFToken();
        }
        // Check if token validation fails
        $this->assertContains($token,$token_);
    }
 //======PENGUJIAN GENERATE HIDDEN INPUT=======
 public function testHiddenValue() {
    $csrfProtection = new SecurityService\securityService();
    $token = $csrfProtection->getCSRFToken();
    $pattern = $csrfProtection->insertHiddenToken();
    $str = '<input type="hidden" name="eg-csrf-token-label" value='. $token .'>';
    $this->assertMatchesRegularExpression($pattern, $str);
}

}
