<?php

namespace App\Controllers\Auth;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Shield\Auth;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Entities\User;

class AuthController extends ResourceController
{
    public function register()
    {
        $rules = [
            'no_pendaftaran' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {

            $response = [
                "status" => false,
                "message" => $this->validator->getErrors(),
                "data" => []
            ];
        } else {

            // User Model
            $userModel = new UserModel();

            // User Entity
            $user = new User([
                'no_pendaftaran' => $this->request->getPost('no_pendaftaran'),
                'password' => $this->request->getPost('password'),
            ]);

            $userModel->save($user);

            $response = [
                "status" => true,
                "message" => "User saved successfully",
                "data" => []
            ];
        }

        return $this->respondCreated($response);
    }

    public function login()
    {

        if (auth()->loggedIn()) {
            auth()->logout();
        }

        $rules = [
            'no_pendaftaran' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {

            $response = [
                "status" => false,
                "message" => $this->validator->getErrors(),
                "data" => []
            ];
        } else {

            // success
            $credentials = [
                'no_pendaftaran' => $this->request->getPost('no_pendaftaran'),
                'password' => $this->request->getPost('password'),
            ];

            $loginAttempt = auth()->attempt($credentials);

            if (!$loginAttempt->isOK()) {

                $response = [
                    "status" => false,
                    "message" => "Invalid login details",
                    "data" => []
                ];
            } else {

                // We have a valid data set
                $userObject = new UserModel();

                $userData = $userObject->findById(auth()->id());

                $token = $userData->generateAccessToken("thisismysecretkey");

                $auth_token = $token->raw_token;

                $response = [
                    "status" => true,
                    "message" => "User logged in successfully",
                    "data" => [
                        "token" => $auth_token
                    ]
                ];
            }
        }

        return $this->respondCreated($response);
    }


}
