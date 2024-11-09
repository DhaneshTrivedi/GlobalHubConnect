<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all_community_pages()
    {
        $data = (object) $this->params;
        $data = null;
        // Fetch all rental home data
        $rentalHomes = $this->db->get("community_pages", null, array("id","user_id","community_name", "state","country", "community_description"));

        // Check if any rental homes were found
        if (!$rentalHomes) {
            $ResponseData = array(
                "message" => "No pages found",
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        // Rental homes found, prepare response
        $ResponseData = array(
            "message" => "Pages found",
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
            "rental_homes" => $rentalHomes
        );
        $this->responseReturn($ResponseData);
    }
}

?>
