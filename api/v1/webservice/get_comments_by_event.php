<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_comments_by_event()
    {
        $data = (object) $this->params;
        $event_id = $this->requiredParameter($data, 'event_id', "event_id  is required");

        $data = null;
       
        $this->db->where("event_id", $event_id);
        $comments = $this->db->get("comments");

        // Check if any rental homes were found
        if (!$comments) {
            $ResponseData = array(
                "message" => "No comments found",
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        // Rental homes found, prepare response
        $ResponseData = array(
            "message" => "Comments found",
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
            "comments" => $comments
        );
        $this->responseReturn($ResponseData);
    }
}

?>