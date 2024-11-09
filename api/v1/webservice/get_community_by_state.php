<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_community_by_state()
    {
        $data = (object) $this->params;
        $state = $this->requiredParameter($data, 'state', "state  is required");
        $user_id = $this->requiredParameter($data, 'user_id', "user_id  is required");

        $data = null;
        // Fetch all rental home data
        $this->db->where("user_id",$user_id);
        $this->db->where("state", $state);
        $events_info = $this->db->get("community_events");

        // Check if any rental homes were found
        if (!$events_info) {
            $ResponseData = array(
                "message" => "No events found",
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        // Rental homes found, prepare response
        $ResponseData = array(
            "message" => "Events found",
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
            "events_info" => $events_info
        );
        $this->responseReturn($ResponseData);
    }
}

?>