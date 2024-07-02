<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use App\Controllers\AuthController;
use CodeIgniter\Test\ControllerTestTrait;
use Config\Services;
use Test\Unit\uri;

class AuthTest extends CIUnitTestCase
{
    use ControllerTestTrait;
    public function setUp(): void
    {
    }

    public function testPage()
    {
        // Simulate a call to the 'index' method
        $result = $this->withURI('http://localhost:8080/login')
            ->controller(AuthController::class)
            ->execute('login');

        $this->assertTrue($result->isOK());
        $this->assertStringContainsString('<title> Login </title>', $result->getBody());
    }
    public function testValidationFails()
    {// Simulate a POST request to /auth/login with invalid data
        $result = $this->withRequest('post', '/auth/login', [
            'username' => '',
            'password' => ''
        ]);

        // Check for validation errors
        $result->assertR
        $result->assertSessionHas('validation');
    }

    public function testLoginSuccess()
    {
        $controller = new AuthController();

        // Simulate a request with valid credentials
        $_POST['username'] = 'valid_username';
        $_POST['password'] = 'valid_password';

        // Call the method directly
        $result = $controller->login();

        // Assert the redirect response
        $this->assertEquals('http://localhost:8080/RequestArtikelView', $result->getRedirectUrl());
    }

    public function testLogout()
    {
        $controller = new AuthController();

        // Call the logout method directly
        $result = $controller->logout();

        // Assert the redirect response
        $this->assertEquals('http://localhost:8080/ArtikelView', $result->getRedirectUrl());
    }
}
