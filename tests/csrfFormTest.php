<?php

use Carbon\Traits\ToStringFormat;
use PHPStan\Rules\Deprecations\TypeHintDeprecatedInClassMethodSignatureRule;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
//include "func/securityService.php";

class CsrfFormTest extends TestCase
{
    private $baseUrl; // URL dari aplikasi web Anda
    private $csrfToken; // Simpan token CSRF di sini

    protected function setUp(): void
    {
        // Atur URL dari aplikasi web Anda
        $this->baseUrl = 'http://localhost:8081/samplecode/parking-system/visa.php';

        // Dapatkan token CSRF dari aplikasi web Anda
        //$this->csrfToken = $this->getCsrfToken();
        $hash = new SecurityService\securityService();
        $this->csrfToken = $hash->getCSRFToken();
        
    }

    private function getCsrfToken()
    {
        // Lakukan permintaan GET untuk mendapatkan formulir dengan token CSRF
        $client = new Client();
        //$response = $client->get($this->baseUrl . '/csrf-form');
        $response = $client->get($this->baseUrl );
        // Parse halaman untuk mendapatkan token CSRF
        $body = (string)$response->getBody();
        //echo "RESPON = ". $response.ToStringFormat() ." , BODY = $body";
        preg_match('/<input type="hidden" name="token" value="<?php $_SESSION[token] ?>">"/', $body, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        }
        
        return null;
    }

    public function testCsrfProtection()
    {
        // Persiapkan data yang akan dikirim dengan formulir
        $formData = [
            'cardno' => '1223245',
            'edate' => '10/6/2023',
            'cvv' => '123',
            'token' => $this->csrfToken, // Nama parameter CSRF token
        ];
        
        // Kirim permintaan POST dengan token CSRF yang valid
        $response = $this->sendRequest('POST', '/protected-endpoint', $formData);
        //echo "Token=". $this->csrfToken;
        // Periksa apakah respons adalah yang diharapkan (tergantung pada skenario Anda)
        $respon = $response->getStatusCode();
       
        $this->assertEquals(200, $respon);
    }

    public function testCsrfProtectionWithInvalidToken()
    {
        // Persiapkan data yang akan dikirim dengan formulir
        $formData = [
            'param1' => 'value1',
            'param2' => 'value2',
            'csrf_token' => 'invalid_token', // Token CSRF tidak valid
        ];

        // Kirim permintaan POST dengan token CSRF tidak valid
        $response = $this->sendRequest('POST', '/protected-endpoint', $formData);

        // Periksa apakah respons adalah yang diharapkan (tergantung pada skenario Anda)
        $respon = $response->getStatusCode();
        echo $respon;
        $this->assertEquals(200, $respon);
    }

    private function sendRequest($method, $endpoint, $data)
    {
        // Kirim permintaan dengan metode dan data yang diberikan
        $client = new Client();
        
        return $client->request($method, $this->baseUrl . $endpoint, [
            'form_params' => $data
        ]);
    }


    //==================================
    public function testFormWithCSRFProtection() {
        // Inisialisasi klien Guzzle
        $client = new Client();

        // Ambil token CSRF dari server (Anda perlu mengatur endpoint untuk mendapatkan token CSRF)
        $response = $client->request('GET', $this->baseUrl);
        $body = $response->getBody();
        $csrfToken = $this->csrfToken;

        // Simulasikan pengajuan formulir dengan token CSRF
        $response = $client->request('POST', $this->baseUrl, [
            'form_params' => [
                'csrf_token' => $csrfToken,
                'data' => 'Test Data' // Ganti dengan nama field dan data sesuai formulir Anda
            ]
        ]);

        // Periksa status respons
        $statusCode = $response->getStatusCode();
        $this->assertEquals(200, $statusCode);
    }    

}

