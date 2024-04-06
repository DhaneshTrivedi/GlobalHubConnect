<?php

class WebService extends GeneralClass
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all_recruit()
    {
        $data = (object) $this->params;
        $data = null;
        // Fetch all rental home data
        $jobs = $this->db->get("recruite", null, array("jobTitle", "salary", "location", "qualification"));

        // Check if any rental homes were found
        if (!$jobs) {
            $ResponseData = array(
                "message" => "No rental homes found",
                "code" => FAILED,
                "status" => $this->translate('STATUS_FAILD')
            );
            $this->responseReturn($ResponseData);
        }

        // Rental homes found, prepare response
        $ResponseData = array(
            "message" => "Jobs found",
            'status' => $this->translate('STATUS_SUCCESS'),
            "code" => SUCCESS,
            "rental_homes" => $jobs
        );
        $this->responseReturn($ResponseData);
    }
}

?>
