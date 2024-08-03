<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class SingleBallet extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-ballet',
    ];

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

    public function with()
    {
        return [
            'data' => $this->data(),
        ];
    }
}
