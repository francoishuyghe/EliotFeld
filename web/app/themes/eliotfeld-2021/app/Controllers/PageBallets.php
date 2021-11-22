<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class PageBallets extends Controller
{
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
}
