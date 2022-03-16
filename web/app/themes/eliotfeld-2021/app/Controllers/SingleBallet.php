<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleBallet extends Controller
{
    public function data() {
        $data = [];

        $data['general_info'] = get_field('general_info');
        $data['lighting_designer'] = get_field('lighting_designer');
        $data['costume_designer'] = get_field('costume_designer');
        $data['set_designer'] = get_field('set_designer');
        $data['premiere'] = get_field('premiere');
        $data['notes'] = get_field('notes');
        $data['music'] = get_field('music');
        $data['media'] = get_field('media');

        return $data;
    }
}
