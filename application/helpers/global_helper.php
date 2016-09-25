<?php

defined('BASEPATH') OR exit('No direct script access allowed');


function get_children_status($children_status)
{
	switch ($children_status) {
		case CHILDREN_NOT_APPLICAPLE:
			return "Not Applicable";
			break;
		case CHILDREN_YES:
			return "Yes";
			break;
		case CHILDREN_NO:
			return "No";
			break;
		default:
			return "";
			break;
	}
}
?>