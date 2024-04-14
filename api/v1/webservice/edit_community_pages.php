<!-- <?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function edit_community_pages()
    {
        $data = (object) $this->params;
        $id = $this->requiredParameter($data, 'id', "id is required");
        $country = $this->requiredParameter($data, 'country', "country is required");
        $cName = $this->requiredParameter($data, 'cName', "cName should not be empty");
        $cTag = $this->requiredParameter($data, 'cTag', "cTagshould not be empty");
        $cDesc = $this->requiredParameter($data, 'cDesc', "cDesc should not be empty");
        $cRules = $this->requiredParameter($data, 'cRules', "Community rules should not be empty");

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
            'country' => $country,
            "community_name" => $cName,
            "community_tag" => $cTag,
            "community_description" => $cDesc,
            'community_rules' => $cRules,
        );
        $this->db->where('id', $id);
        $edit_community_id = $this->db->update('community_pages', $data);

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