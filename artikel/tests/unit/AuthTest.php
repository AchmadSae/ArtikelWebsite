<?php

namespace App\Controllers;


use CodeIgniter\Test\FeatureTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\ControllerTester;
use App\Models\UsersModel;
use CodeIgniter\Config\Factories;

class AuthTest extends FeatureTestCase
{
    use ControllerTester;

    protected $mockSession;
    protected $mockUsersModel;
    protected function setUp(): void
    {
        parent::setUp();

        // Ensure the base URL is set correctly in the test environment
        $_SERVER['HTTP_HOST'] = 'localhost:8080';
        $_SERVER['REQUEST_URI'] = '/loginUp';
    }
    public function testLoginValidationFails()
    {
          // Simulate a POST request to the /loginUp route with invalid data
          $result = $this->withHeaders([
            'Host' => 'localhost:8080'
        ])->post('/loginUp', [
            'username' => '', // Empty username should fail validation
            'password' => ''  // Empty password should fail validation
        ]);

        // Debugging output
        echo "Status Code: " . $result->response()->getStatusCode() . PHP_EOL;
        echo "Response Body: " . $result->response()->getBody() . PHP_EOL;

        // Ensure that the response status is 401 Unauthorized
        $this->assertEquals(401, $result->response()->getStatusCode());

        // Check for validation errors in the response body
        $this->assertStringContainsString('Username Or Password is Required', $result->response()->getBody());
    }

    public function testLoginWithInvalidCredentials()
    {
        $result = $this->withURI('http://localhost:8080/loginUp')
            ->withBody([
                'username' => 'wrongUsername', // Empty username should fail validation
                'password' => 'wrongPass'  // Empty password should fail validation
            ])
            ->controller(\App\Controllers\AuthController::class)
            ->execute('login');
        $this->assertTrue($result->see('Invalid login credentials', 'loginView'));
    }

    public function testValid()
    {
        // Mock a user with a hashed password
        $user = [
            'username' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => password_hash('validpassword', PASSWORD_DEFAULT)
        ];

        $this->mockUsersModel->method('getUser')
            ->willReturn($user);
        Factories::injectMock('models', 'UsersModel', $this->mockUsersModel);

        $result = $this->withRequest(
            $this->getRequestObject([
                'username' => 'testuser',
                'password' => 'validpassword'
            ])
        )->controller(\App\Controllers\Login::class)
            ->execute('login');

        $this->assertTrue($result->isRedirect());
        $this->assertEquals('/create_artikel', $result->getRedirectUrl());
    }
    private function getRequestObject(array $postData)
    {
        $request = service('request');
        $request->setMethod('post');
        $request->setGlobal('post', $postData);
        return $request;
    }
}