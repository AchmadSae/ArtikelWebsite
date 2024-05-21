<?php

namespace App\Controllers;


use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\UsersModel;
use CodeIgniter\Config\Factories;

class AuthTest extends CIUnitTestCase
{

    use ControllerTestTrait;
    use DatabaseTestTrait;

    protected $mockSession;
    protected $mockUsersModel;

    public function setUp(): void
    {
        parent::setUp();

        // Mock the session
        $this->mockSession = $this->createMock(\CodeIgniter\Session\Session::class);
        $this->mockSession->method('start')->willReturn(true);
        $this->mockSession->method('get')->willReturn([]);
        $this->mockSession->method('set')->willReturn(null);
        \Config\Services::injectMock('session', $this->mockSession);

        // Mock the UsersModel
        $this->mockUsersModel = $this->createMock(UsersModel::class);
        \Config\Services::injectMock('models', 'UsersModel', $this->mockUsersModel);

        // Load the form helper
        helper('form');
    }

    public function testLoginValidationFails()
    {
        $this->mockUsersModel->method(('getUser'))
            ->willReturn(null);
        Factories::injectMock('models', 'UsersModel', $this->mockUsersModel);

        $result = $this->withRequest(
            $this->getRequestObject([
                'username' => 'nonExistUser',
                'password' => 'wrong'
            ])
        )->controller(\App\Controllers\AuthController::class)
            ->execute('login');
        $this->assertTrue($result->see('Username field is required.', 'validation'));
    }

    public function testLoginWithInvalidCredentials()
    {
        $this->mockUsersModel->method(('getUser'))
            ->willReturn(null);
        Factories::injectMock('models', 'UsersModel', $this->mockUsersModel);

        $result = $this->withRequest(
            $this->getRequestObject([
                'username' => 'nonExistUser',
                'password' => 'wrong'
            ])
        )->controller(\App\Controllers\AuthController::class)
            ->execute('login');
        $this->assertTrue($result->see('Invalid login credentials', 'validation'));

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