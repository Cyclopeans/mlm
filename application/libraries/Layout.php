<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	// Class Variables
    private $obj;
    private $layout;

    public function __construct($layout = "layout_manager")
    {
        $this->obj =& get_instance();
        $this->layout =$layout;
    }

    /**
     * This function set the layout file name.
     * @param <string> $layout - Name of layout file
     * 							 File must be located in ./system/application/views/layout folder
     * Return : Null
     */
    function set_layout($layout = "layout_manager")
    {
		$this->layout = $layout;
    }

    /**
     * This function applys the layout on given template.
     * @param <string> $view   - Name of template
     * @param <array> $data   - Associative array of variables to be accessible in layout/template
     * @param <boolean> $return - flag to indicate if we need to just output the view or do we need
     * 							  to return it in the form of string as well
     * Return	: Null if $return is false
     *				: string if $return is true
     */
    function view($view, $data=null, $return=false)
    {
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);

        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
}
/* End of file Layout.php */
/* Location: ./system/libraries/Layout.php */