<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_community_pages()
    {
        $data = (object) $this->params;
        $user_id = $this->requiredParameter($data, 'user_id', "user_id should not be empty");
        $data = null;
        // Fetch all rental home data
        $this->db->where('user_id', $user_id);
        $community_pages = $this->db->get("community_pages");

        // Check if any rental homes were found
        if (!$community_pages) {
            $ResponseData = array(
                "message" => "No pages found",
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        // Rental homes found, prepare response
        $ResponseData = array(
            "message" => "Community pages found",
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
            "community_pages" => $community_pages
        );
        $this->responseReturn($ResponseData);
    }
}

?>