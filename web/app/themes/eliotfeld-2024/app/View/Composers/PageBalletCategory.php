<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageBalletCategory extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-ballet-category',
    ];

    public function ballets(){
        $category = get_field('category');
        $args = array(
            'post_type' => 'ballet',
	    	'posts_per_page' => -1,
            'orderby' =>  'name',
            'order' => 'ASC',
            'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $category,
                ),
            ),
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
