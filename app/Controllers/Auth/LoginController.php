<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;

class LoginController extends BaseController
{
    use ResponseTrait;

    public function login()
    {
        $userModel = new UserModel();

        $no_tpa = $this->request->getPost('no_tpa');
        $password = (string) $this->request->getPost('password');

        $user = $userModel->where('no_tpa', $no_tpa)->first();

        // Combine user existence and password check to prevent user enumeration attacks
        // and ensure script execution stops on failure.
        if ($user === null || !password_verify($password, $user->password)) {
            return $this->failUnauthorized('Invalid TPA number or password.');
        }

        // Use getenv() for consistency with CodeIgniter's .env handling
        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + (60 * 60); // 1 hour expiration

        $payload = [
            'iss' => base_url(), // Issuer of the JWT (e.g., your base URL)
            'aud' => base_url(), // Audience of the JWT
            'sub' => 'User Login', // Subject of the JWT
            'iat' => $iat, // Issued At timestamp
            'exp' => $exp,
        ];

        $token = JWT::encode($payload, $key, 'HS256');

        return $this->respond([
            'message' => 'success',
            'token' => $token,
            'user' => [
                'id' => $user['id'],
                'no_tpa' => $user['no_tpa'],
            ]
        ], 200);
    }

    public function logout()
    {

    }
}
