<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function signup()
    {
        $data = (object) $this->params;

        $first_name = $this->requiredParameter($data, 'first_name', "first_name  is required");
        $last_name = $this->requiredParameter($data, 'last_name', "last_name  is required");
        $email = $this->requiredParameter($data, 'mail', "mail should not be empty");
        $password = $this->requiredParameter($data, 'password', "password should not be empty");
        $profileImage = isset($_FILES['profileImage']) ? $_FILES['profileImage'] : null;

        $data = null;

        $get_email = $this->getEmail($email);
        if ($get_email) {
            $ResponseData = array(
                "message" => "This email is already register",
                "code" => FAILED,

            );
            $this->responseReturn($ResponseData);
        }
        // if (!$this->validatePassword($password)) {
        //     $ResponseData = array(
        //         "message" => "Password should not be less than 8 characters.",
        //         "code" => FAILED,
        //         "status" => $this->translate('STATUS_FAILD')
        //     );
        //     $this->responseReturn($ResponseData);
        // }

        $datetime = DATETIME;

        // $password = password_hash($password, PASSWORD_DEFAULT);
        $verification_code = $this->generateRandomString(20);
        $uploadDir = 'userImages/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory with full permissions
        }

        if ($profileImage) {
            $uploadFile = $uploadDir . basename($profileImage['name']);

            if (move_uploaded_file($profileImage['tmp_name'], $uploadFile)) {
                // Image uploaded successfully, save file name to database
                $imageFileName = basename($profileImage['name']);
            } else {
                $ResponseData = array(
                    "message" => "Failed to upload image",
                    "code" => FAILED,
                );
                $this->responseReturn($ResponseData);
            }
        }
        // add users data in users
        $data = array(
            "first_name" => $first_name,
            "last_name" => $last_name,
            "mail" => $email,
            'password' => $password,
            'profile_image' => $imageFileName ?? null,  // Add profile image file name to data array
            'created' => $datetime
        );


        $user_id = $this->db->insert('signup', $data);

        if (!$user_id) {
            $ResponseData = array(
                "message" => $this->translate('REGISTRATION_FAILED'),
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        // update users token
        $token_data = time() . "_" . $user_id . "-" . $email;
        $auth_token = $this->createToken($token_data);

        $this->db->where('id', $user_id);
        $this->db->update('signup', array('auth_token' => $auth_token));

        $ResponseData = array(
            "message" => $this->translate('REGISTRATION_SUCCESS'),
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
            "auth_token" => $auth_token,
        );
        $this->responseReturn($ResponseData);
    }

    function getEmail($email)
    {
        $this->db->where("mail", $email);
        $result = $this->db->getOne("signup", "id");
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }
    function createToken($data)
    {
        /* Create a part of token using secretKey */
        $tokenGeneric = ENCRYPTION_KEY . $_SERVER["SERVER_NAME"]; // It can be 'stronger' of course
        /* Encoding token */
        $token = hash('sha256', $tokenGeneric . $data);
        return $token;
    }

}
?>