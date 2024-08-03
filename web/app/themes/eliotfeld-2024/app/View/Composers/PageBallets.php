<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageBallets extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-page-ballets',
    ];

    public function ballets(){
        $args = array(
            'post_type' => 'ballet',
	    	'posts_per_page' => -1,
            'orderby' =>  'name',
            'order' => 'ASC'
	    );

	    $the_query = new WP_Query( $args );
	    return $the_query->posts;
    }

    public function with()
    {
        return [
            'ballets' => $this->ballets(),
        ];
    }
}
