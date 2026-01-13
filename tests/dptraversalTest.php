<?php

use Carbon\Traits\ToStringFormat;
use PHPStan\Rules\Deprecations\TypeHintDeprecatedInClassMethodSignatureRule;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

use function PHPUnit\Framework\assertTrue;

include "func/imageRetrieval.php";
class dpTraversalTest extends TestCase
{
     public function testdisplayImage()
   {    $path = "..\..\PortSwigger.txt";
        $response = displayImage($path);
        $this->assertTrue($response);
   }
   public function testdisplayImageFalse()
   {    $path = "..\..\..\PortSwigger.txt";
        $response = displayImage($path);
        $this->assertFalse($response);
   }
     public function testabsPathWeak()
     {
          $path = "func\cobaClient.txt";
          $response = absPath($path);
          $this->assertNotEmpty($response);
     }
     public function testabsPath()
     {
          $path = "func\cobaClient.txt";
          $expected='C:\xampp\htdocs\samplecode\parking-system\func\cobaClient.txt'; 
          $response = absPath($path);
          $this->assertSame($expected,$response);
     }
     public function testfindPathWeak()
     {
          $path = 'C:\xampp\htdocs\samplecode\parking-system\func\cobaClient.txt'; 
          $refPath = $path;
          $response = findPath($path);
          if($path==$refPath){
          $this->assertEquals(0,$response);}else{$this->assertEquals(0,1);}
     }
     public function testfindPath()
     {
          $path = 'func\cobaClient.txt'; 
          $response = findPath($path);
          $this->assertEquals(0,$response);
     }
     public function testpathPermission()
     {
          $path = 'C:\xampp\htdocs\samplecode\parking-system\func\cobaClient.txt'; 
          $response = userHasPermission(1,$path);
          $this->assertTrue($response);
     }
     public function testpathInvalidPermission()
   {
     $path = 'C:\xampp\htdocs\samplecode\parking-system\func\cobaClient.txt'; 
     $response = userHasPermission(2,$path);
     $this->assertFalse($response);
   }
     public function testpathExist()
     {
          $path = 'func\cobaClient.txt'; 
          $newPath = pathExist(absPath($path));
          if(findPath($newPath)==0)
          {
               $response = pathExist(absPath($path));
          }else{$response=false;}
          
          $this->assertTrue($response);
     }
     public function testpathExistFalse()
     {
          $path = '..\..\..\PortSwigger.txt';
          $newPath = pathExist(absPath($path));
          if(findPath($newPath)==0)
          {
               $response = pathExist(absPath($path));
          }else{$response=true;}
          $this->assertFalse($response);
     }
     public function testpathExistRobust()
     {
          $path = 'func\cobaClient.txt'; 
          //jalankan fungsi pengecekan path mutlak
          $newPath = pathExist(absPath($path));
          if(findPath($newPath)==0)//jalankan fungi pengecekan skup path
          {
               $response = pathExist(absPath($path));
          }else{$response=false;}
          
          try{
               $this->assertFileExists($newPath);
               $this->assertFileIsReadable($newPath);
               $responseExpected=true;
          }catch (PHPUnit\Framework\AssertionFailedError $e) {
               $responseExpected=true;
           }
          $this->assertEquals($responseExpected,$response);
     }

     public function testsecureFilePath()//TC12/22
   {    //$path = "..\..\PortSwigger.txt";
        $path = "func\cobaClient.txt";  
        //$path = "index.php";  
        $response = secureFilePath(1,$path);
        $this->assertTrue($response);
   }
   public function testSecureFilePathInvalidString()
   {
       $filePath = 12345; // Not a string
       $userid = 1;
       $this->assertFalse(secureFilePath($userid, $filePath));
   }

   public function testSecureFilePathInvalidNormalizedPath()
   {
       $filePath = '/invalid/path/to/file.txt';
       $userid = 1;
       // Mock absPath to return false
       $this->assertFalse(secureFilePath($userid, $filePath));
   }
   public function testSecureFilePathFindPathFailure()
   {
       $filePath = '/path/to/file/that/fails.txt';
       $userid = 1;
       // Mock findPath to return non-zero value
       $this->assertFalse(secureFilePath($userid, $filePath));
   }
   public function testSecureFilePathUserPermission()
   {
       $filePath = '/path/to/file/that/fails.txt';
       $userid = 2;
       // Mock user permission to return no permission
       $this->assertFalse(secureFilePath($userid, $filePath));
   }
   public function testSecureFilePathPathExist()
   {
       $filePath = '/path/to/file/that/fails.txt';
       $userid = 2;
       // Mock path exist to return false value
       $this->assertFalse(secureFilePath($userid, $filePath));
   }
   
}