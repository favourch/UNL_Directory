<?php
class UNL_Officefinder_DepartmentList_AlphaListing_LoginRequired
{
    public $user;
    public $output;
    
    function __construct($options = array())
    {
        // Login is required to view this
        $this->user = UNL_Officefinder::getUser(true);

        // Build the alpha listing
        $this->output = new UNL_Officefinder_DepartmentList_AlphaListing($options);
    }
}