<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('authenticate')) {

    function authenticate() {
        $object = & get_instance();
        if (!isset($object->session->userdata['admin_logged_in'])) {
            redirect('admin/login', 'refresh');
        }
    }

}

if (!function_exists('generate_random_string')) {

    function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
if (!function_exists('geneate_pagination')) {

    function geneate_pagination($data = array()) {
//pagination settings
        $config['base_url'] = $data['base_url'];
        $config['total_rows'] = $data['total_rows'];
        $config['per_page'] = $data['per_page'];
        $config["uri_segment"] = $data['uri_segment'];
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        if (!isset($data['location'])) { // location key is not present in array
//config for bootstrap pagination class integration
            /* This Application Must Be Used With BootStrap 3 *  */
            $config['full_tag_open'] = '<div><ul class="pagination pagination-small pagination-centered">';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tag_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tag_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tag_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
        } else if (isset($data['location']) && ($data['location'] == 'question_tab')) { // tutor profile question tab
            $config['full_tag_open'] = '<div class="pages"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li class="page question_tab_pagination">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page question_tab_pagination active" style="width:18px;padding:0px;" href="#">';
            $config['cur_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page question_tab_pagination">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page question_tab_pagination">';
            $config['last_tagl_close'] = '</li>';
            $config['first_link'] = '';
            $config['last_link'] = '';
            $config['prev_link'] = '<< Previous';
            $config['next_link'] = 'Next >>';
        } else if (isset($data['location']) && ($data['location'] == 'find_tutor_page' )) { // tutor profile question tab
            $config['full_tag_open'] = '<div class="pagination"><div class="row"><div class="col-md-12"><div class="pages pull-right">';
            $config['full_tag_close'] = '</div></div></div></div>';
            $config['num_tag_open'] = '<a class="page">';
            $config['num_tag_close'] = '</a>';
            $config['cur_tag_open'] = '<a href="#" class="page active">';
            $config['cur_tag_close'] = '</a>';
//                $config['first_tag_open'] = '<a class="page">';
//                $config['first_tag_close'] = '</a>';
            $config['last_tag_open'] = '<a class="page question_tab_pagination">';
            $config['last_tagl_close'] = '</a>';
            $config['first_link'] = '';
            $config['last_link'] = '';
            $config['prev_link'] = '<< Previous';
            $config['next_link'] = 'Next >>';
        }

        $config['num_links'] = 2;
        return $config;
    }

}

// to upload the profile image on second step
if (!function_exists('upload_image')) {

    function upload_image($filename = '', $path = '', $location = '', $user_id = '') {
        $error['error'] = '';
        $config['upload_path'] = $path;
        $config['allowed_types'] = ALLOWED_IMAGE_TYPE;
        $config['max_size'] = MAX_UPLOAD_FILE_SIZE;
        $config['overwrite'] = TRUE;
//        $config['max_width'] = TUTOR_PROFILE_PICTURE_WIDTH;
//        $config['max_height'] = TUTOR_PROFILE_PICTURE_HEIGHT;
        if ($location == 'tutor_profile') {
            $extention = explode(".", $filename);
            $new_profile_picture_name = $user_id . "." . $extention[1];
            $input_element_name = 'profile_picture';
            $config['file_name'] = $new_profile_picture_name;
        }
        $that = &get_instance();
        $that->load->library('upload', $config);

        if (!$that->upload->do_upload($input_element_name)) {
            $error = array('error' => $that->upload->display_errors());
            return $error;
        } else {
            $data = array('upload_data' => $that->upload->data());
            return $error;
        }
    }

}
// Function to get the client IP address
if (!function_exists('get_client_ip')) {

    function get_client_ip() {
        $ipaddress = '';
        if (ENVIRONMENT == 'development') {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            if ($_SERVER['HTTP_CLIENT_IP'])
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if ($_SERVER['HTTP_X_FORWARDED'])
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if ($_SERVER['HTTP_FORWARDED_FOR'])
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if ($_SERVER['HTTP_FORWARDED'])
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if ($_SERVER['REMOTE_ADDR'])
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
        }
        return $ipaddress;
    }

}
if (!function_exists('get_formated_date')) {

    function get_formated_date($date) {
        return date('M j, Y', strtotime($date)) . ' at ' . date('g:i A, T', strtotime($date));
    }

}

// this function is used to format file size in KB,MB,GB
if (!function_exists('formatSizeUnits')) {

    function formatSizeUnits($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = round(($bytes / 1073741824), 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = round(($bytes / 1048576), 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = round(($bytes / 1024), 2);
            $bytes = number_format($bytes, 2);
            $bytes = $bytes . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = number_format($bytes, 2);
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

}
if (!function_exists('time_elapsed_string')) {

    function time_elapsed_string($datetime, $full = false) {
        $today = time();
        $createdday = strtotime($datetime);
        $datediff = abs($today - $createdday);
        $difftext = "";
        $years = floor($datediff / (365 * 60 * 60 * 24));
        $months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours = floor($datediff / 3600);
        $minutes = floor($datediff / 60);
        $seconds = floor($datediff);
        //year checker  
        if ($difftext == "") {
            if ($years > 1)
                $difftext = $years . " years ago";
            elseif ($years == 1)
                $difftext = $years . " year ago";
        }
        //month checker  
        if ($difftext == "") {
            if ($months > 1)
                $difftext = $months . " months ago";
            elseif ($months == 1)
                $difftext = $months . " month ago";
        }
        //month checker  
        if ($difftext == "") {
            if ($days > 1)
                $difftext = $days . " days ago";
            elseif ($days == 1)
                $difftext = $days . " day ago";
        }
        //hour checker  
        if ($difftext == "") {
            if ($hours > 1)
                $difftext = $hours . " hours ago";
            elseif ($hours == 1)
                $difftext = $hours . " hour ago";
        }
        //minutes checker  
        if ($difftext == "") {
            if ($minutes > 1)
                $difftext = $minutes . " minutes ago";
            elseif ($minutes == 1)
                $difftext = $minutes . " minute ago";
        }
        //seconds checker  
        if ($difftext == "") {
            if ($seconds > 1)
                $difftext = $seconds . " seconds ago";
            elseif ($seconds == 1)
                $difftext = $seconds . " second ago";
        }
        return $difftext;
    }

}
if (!function_exists('calculate_hours_between_dates')) {

    function calculate_hours_between_dates($passed_date) {
        $day1 = date('Y-m-d h:i:s');
        $day1 = strtotime($day1);
        $day2 = $passed_date;
        $day2 = strtotime($day2);

        $diffHours = round(($day2 - $day1) / 3600);

        return $diffHours;
    }

    if (!function_exists('generate_ajax_pagination')) {

        // this function is used to generate pagination using ajax library
        function generate_ajax_pagination($data = array()) {

            $this->load->library('pagination');
            $this->load->library('ajax_pagination');
            //pagination configuration
            $config['div'] = 'display_order'; //parent div tag id
            $config['base_url'] = $data['base_url'];
            $config['total_rows'] = $data['total_records'];
            $config['per_page'] = $data['per_page'];

            $config['full_tag_open'] = '<div class="pages"><ul>';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li class="page question_tab_pagination">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="page question_tab_pagination active" style="width:18px;" href="#">';
            $config['cur_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page question_tab_pagination">';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page question_tab_pagination">';
            $config['last_tagl_close'] = '</li>';
            $config['first_link'] = '';
            $config['last_link'] = '';
            $config['prev_link'] = '<< Previous';
            $config['next_link'] = 'Next >>';

            $this->ajax_pagination->initialize($config);
            return $this->ajax_pagination->create_links();
        }

    }
}

// this function is used to get country code based on country name.
if (!function_exists('get_country_code')) {

    function get_country_code($country_name) {

        $country_list = array("af" => "Afghanistan", "ax" => "Aland Islands", "al" => "Albania",
            "dz" => "Algeria", "as" => "American Samoa", "ad" => "Andorra", "ao" => "Angola",
            "ai" => "Anguilla", "aq" => "Antarctica", "ag" => "Antigua And Barbuda",
            "ar" => "Argentina", "am" => "Armenia", "aw" => "Aruba", "au" => "Australia",
            "at" => "Austria", "az" => "Azerbaijan", "bs" => "Bahamas", "bh" => "Bahrain", "bd" => "Bangladesh",
            "bb" => "Barbados", "by" => "Belarus", "be" => "Belgium", "bz" => "Belize", "bj" => "Benin",
            "bm" => "Bermuda", "bt" => "Bhutan", "bo" => "Bolivia", "ba" => "Bosnia And Herzegovina", "bw" => "Botswana",
            "bv" => "Bouvet Island", "br" => "Brazil", "io" => "British Indian Ocean Territory", "bn" => "Brunei Darussalam",
            "bg" => "Bulgaria", "bf" => "Burkina Faso", "bi" => "Burundi", "kh" => "Cambodia", "cm" => "Cameroon", "ca" => "Canada",
            "cv" => "Cape Verde", "ky" => "Cayman Islands", "cf" => "Central African Republic", "td" => "Chad", "cl" => "Chile",
            "cn" => "China", "cx" => "Christmas Island", "cc" => "Cocos (Keeling) Islands", "co" => "Colombia",
            "km" => "Comoros", "cg" => "Congo", "cd" => "Congo Democratic Republic", "ck" => "Cook Islands", "cr" => "Costa Rica",
            "ci" => "Cote D\"Ivoire", "hr" => "Croatia", "cu" => "Cuba", "cy" => "Cyprus", "cz" => "Czech Republic", "dk" => "Denmark",
            "dj" => "Djibouti", "dm" => "Dominica", "do" => "Dominican Republic", "ec" => "Ecuador", "eg" => "Egypt", "sv" => "El Salvador",
            "gq" => "Equatorial Guinea", "er" => "Eritrea", "ee" => "Estonia", "et" => "Ethiopia", "fk" => "Falkland Islands (Malvinas)",
            "fo" => "Faroe Islands", "fj" => "Fiji", "fi" => "Finland", "fr" => "France", "gf" => "French Guiana", "pf" => "French Polynesia",
            "tf" => "French Southern Territories", "ga" => "Gabon", "gm" => "Gambia", "ge" => "Georgia", "de" => "Germany", "gh" => "Ghana",
            "gi" => "Gibraltar", "gr" => "Greece", "gl" => "Greenland", "gd" => "Grenada", "gp" => "Guadeloupe", "gu" => "Guam", "gt" => "Guatemala",
            "gg" => "Guernsey", "gn" => "Guinea", "gw" => "Guinea-Bissau", "gy" => "Guyana", "ht" => "Haiti", "hm" => "Heard Island & Mcdonald Islands",
            "va" => "Holy See (Vatican City State)", "hn" => "Honduras", "hk" => "Hong Kong", "hu" => "Hungary", "is" => "Iceland",
            "in" => "India", "id" => "Indonesia", "ir" => "Iran Islamic Republic Of", "iq" => "Iraq", "ie" => "Ireland", "im" => "Isle Of Man",
            "il" => "Israel", "it" => "Italy", "jm" => "Jamaica", "jp" => "Japan", "je" => "Jersey", "jo" => "Jordan", "kz" => "Kazakhstan",
            "ke" => "Kenya", "ki" => "Kiribati", "kr" => "Korea", "kw" => "Kuwait", "kg" => "Kyrgyzstan", "la" => "Lao People\"s Democratic Republic",
            "lv" => "Latvia", "lb" => "Lebanon", "ls" => "Lesotho", "lr" => "Liberia",
            "ly" => "Libyan Arab Jamahiriya", "li" => "Liechtenstein", "lt" => "Lithuania", "lu" => "Luxembourg", "mo" => "Macao",
            "mk" => "Macedonia", "mg" => "Madagascar", "mw" => "Malawi", "my" => "Malaysia", "mv" => "Maldives",
            "ml" => "Mali", "mt" => "Malta", "mh" => "Marshall Islands", "mq" => "Martinique", "mr" => "Mauritania",
            "mu" => "Mauritius", "yt" => "Mayotte", "mx" => "Mexico", "fm" => "Micronesia Federated States Of", "md" => "Moldova",
            "mc" => "Monaco", "mn" => "Mongolia", "me" => "Montenegro", "ms" => "Montserrat", "ma" => "Morocco",
            "mz" => "Mozambique", "mm" => "Myanmar", "na" => "Namibia", "nr" => "Nauru", "np" => "Nepal", "nl" => "Netherlands",
            "an" => "Netherlands Antilles", "nc" => "New Caledonia", "nz" => "New Zealand", "ni" => "Nicaragua", "ne" => "Niger",
            "ng" => "Nigeria", "nu" => "Niue", "nf" => "Norfolk Island", "mp" => "Northern Mariana Islands", "no" => "Norway",
            "om" => "Oman", "pk" => "Pakistan", "pw" => "Palau", "ps" => "Palestinian Territory}, Occupied",
            "pa" => "Panama", "pg" => "Papua New Guinea", "py" => "Paraguay", "pe" => "Peru", "ph" => "Philippines",
            "pn" => "Pitcairn", "pl" => "Poland", "pt" => "Portugal", "pr" => "Puerto Rico", "qa" => "Qatar",
            "re" => "Reunion", "ro" => "Romania", "ru" => "Russian Federation", "rw" => "Rwanda", "bl" => "Saint Barthelemy",
            "sh" => "Saint Helena", "kn" => "Saint Kitts And Nevis", "lc" => "Saint Lucia", "mf" => "Saint Martin",
            "pm" => "Saint Pierre And Miquelon", "vc" => "Saint Vincent And Grenadines", "ws" => "Samoa", "sm" => "San Marino",
            "st" => "Sao Tome And Principe", "sa" => "Saudi Arabia", "sn" => "Senegal", "rs" => "Serbia", "sc" => "Seychelles",
            "sl" => "Sierra Leone", "sg" => "Singapore", "sk" => "Slovakia", "si" => "Slovenia", "sb" => "Solomon Islands",
            "so" => "Somalia", "za" => "South Africa", "gs" => "South Georgia And Sandwich Isl.",
            "es" => "Spain", "lk" => "Sri Lanka", "sd" => "Sudan", "sr" => "Suriname", "sj" => "Svalbard And Jan Mayen",
            "sz" => "Swaziland", "se" => "Sweden", "ch" => "Switzerland", "sy" => "Syrian Arab Republic", "tw" => "Taiwan",
            "tj" => "Tajikistan", "tz" => "Tanzania", "th" => "Thailand", "tl" => "Timor-Leste", "tg" => "Togo", "tk" => "Tokelau",
            "to" => "Tonga", "tt" => "Trinidad And Tobago", "tn" => "Tunisia", "tr" => "Turkey", "tm" => "Turkmenistan",
            "tc" => "Turks And Caicos Islands", "tv" => "Tuvalu", "ug" => "Uganda", "ua" => "Ukraine", "ae" => "United Arab Emirates",
            "gb" => "United Kingdom", "us" => "United States", "um" => "United States Outlying Islands", "uy" => "Uruguay",
            "uz" => "Uzbekistan", "vu" => "Vanuatu", "ve" => "Venezuela", "vn" => "Viet Nam", "vg" => "Virgin Islands - British",
            "vi" => "Virgin Islands - U.S.", "wf" => "Wallis And Futuna", "eh" => "Western Sahara", "ye" => "Yemen", "zm" => "Zambia", "zw" => "Zimbabwe"
        );

        $country_code = array_search($country_name, $country_list);
        return $country_code;
    }

}