<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class SingleBallet extends Controller
{
    public function data() {
        $data = [];

        $data['general_info'] = get_field('general_info');

        return $data;
    }
}
