<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function edit_home_api()
    {
        $data = (object) $this->params;
        $id = $this->requiredParameter($data, 'id', "id is required");
        $country = $this->requiredParameter($data, 'country', "country is required");
        $state = $this->requiredParameter($data, 'state', "state is required");
        $city = $this->requiredParameter($data, 'city', "city should not be empty");
        $bhk = $this->requiredParameter($data, 'bhk', "bhk should not be empty");
        $duration = $this->requiredParameter($data, 'duration', "duration should not be empty");
        $address = $this->requiredParameter($data, 'address', "address is required");
        $telephone = $this->requiredParameter($data, 'telephone', "telephone is required");
        $email = $this->requiredParameter($data, 'email', "email should not be empty");
        $details = $this->requiredParameter($data, 'details', "details should not be empty");
        $rent = $this->requiredParameter($data, 'rent', "rent should not be empty");

        // Handle file uploads
        // $photo_urls = [];
        // if (!empty($_FILES['photos']['name'])) {
        //     $targetDir = "uploads/";
        //     if (!is_dir($targetDir)) {
        //         mkdir($targetDir, 0777, true);
        //     }
        //     foreach ($_FILES['photos']['name'] as $key => $value) {
        //         $fileName = basename($_FILES['photos']['name'][$key]);
        //         $targetFilePath = $targetDir . $fileName;
        //         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        //         $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        //         if (in_array($fileType, $allowTypes)) {
        //             if (move_uploaded_file($_FILES['photos']['tmp_name'][$key], $targetFilePath)) {
        //                 $photo_urls[] = $targetFilePath;
        //             }
        //         }
        //     }
        // }


        // Add other form data
        $data = array(
            "country" => $country,
            "state" => $state,
            'city' => $city,
            "bhk" => $bhk,
            "duration" => $duration,
            "address" => $address,
            'telephone' => $telephone,
            'email' => $email,
            'details' => $details,
            'rent' => $rent,
        );
        $this->db->where('id', $id);
        $edit_home_id = $this->db->update('rent_home', $data);

        if (!$edit_home_id) {
            $ResponseData = array(
                "message" => $this->translate('REGISTRATION_FAILED'),
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        $ResponseData = array(
            "message" => $this->translate('edited successfully'),
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
        );
        $this->responseReturn($ResponseData);
    }


    function getEmail($email)
    {
        $this->db->where("email", $email);
        $result = $this->db->getOne("users", "id");
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }


}
?>