<!-- <?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function delete_community_page()
    {
        $data = (object) $this->params;
        $id = $this->requiredParameter($data, 'id', "id is required");

        $this->db->where('id', $id);
        $delete_commmunity_page_id = $this->db->delete('community_pages');

        if (!$delete_commmunity_page_id) {
            $ResponseData = array(
                "message" => $this->translate('REGISTRATION_FAILED'),
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        $ResponseData = array(
            "message" => $this->translate('deleted successfully'),
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