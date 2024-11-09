<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function post_comment()
    {
        $data = (object) $this->params;
        $event_id = $this->requiredParameter($data, 'event_id', "event_id is required");
        $text = $this->requiredParameter($data, 'text', "text is required");
        $user_id = $this->requiredParameter($data, 'user_id', "user_id should not be empty");

        $data = null;

        // add users data in users
        $data = array(
            "user_id" => $user_id,
            "event_id" => $event_id,
            "text" => $text
        );

        $add_comment_id = $this->db->insert('comments', $data);

        if (!$add_comment_id) {
            $ResponseData = array(
                "message" => $this->translate('REGISTRATION_FAILED'),
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }


        $ResponseData = array(
            "message" => $this->translate('Comment posted'),
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
            "add_comment_id" => $add_comment_id
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