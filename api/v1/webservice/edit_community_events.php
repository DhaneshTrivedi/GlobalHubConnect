<!-- <?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function edit_community_events()
    {
        $data = (object) $this->params;
        $id = $this->requiredParameter($data, 'id', "id is required");
        $event_title = $this->requiredParameter($data, 'eTitle', "event_title should not be empty");
        $event_description = $this->requiredParameter($data, 'eDesc', "event_description should not be empty");
        $country = $this->requiredParameter($data, 'country', "country is required");
        $state = $this->requiredParameter($data, 'state', "state is required");
        $city = $this->requiredParameter($data, 'city', "city should not be empty");
        $location = $this->requiredParameter($data, 'Address', "location is required");
        $date = $this->requiredParameter($data, 'eDate', "eDate should not be empty");
        $time = $this->requiredParameter($data, 'eTime', "eTime should not be empty");
        $duration = $this->requiredParameter($data, 'eDuration', "eDuration should not be empty");
        $event_organizer = $this->requiredParameter($data, 'eOrganizer', "eOrganizer should not be empty");
        $event_guest = $this->requiredParameter($data, 'eGuest', "eGuest should not be empty");
        $event_fee = $this->requiredParameter($data, 'eFee', "eFee should not be empty");
        $event_host = $this->requiredParameter($data, 'eHost', "eHost should not be empty");
        $event_promotion = $this->requiredParameter($data, 'ePromotion', "ePromotion should not be empty");
        $telephone = $this->requiredParameter($data, 'telephone', "telephone is required");
        $email = $this->requiredParameter($data, 'email', "email should not be empty");
        $additional_information = $this->requiredParameter($data, 'more', "more should not be empty");
        

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

        $converted_time = date('H:i:s', strtotime($time));
        // Add other form data
        $data = array(
            "event_title" => $event_title,
            "event_description" => $event_description,
            "country" => $country,
            "state" => $state,
            'city' => $city,
            'location' => $location,
            'date' => $date,
            'time' => $converted_time,
            'duration' => $duration,
            'event_organizer' => $event_organizer,
            'event_guest' => $event_guest,
            'event_fee' => $event_fee,
            'event_host' => $event_host,
            'event_promotion' => $event_promotion,
            'email' => $email,
            'telephone' => $telephone,
            'additional_information' => $additional_information
        );
        $this->db->where('id', $id);
        $edit_community_id = $this->db->update('community_events', $data);

        if (!$edit_community_id) {
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
?> -->