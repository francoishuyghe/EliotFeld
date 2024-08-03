<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class SinglePeople extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-people',
    ];

    public function ballets() {
        $ballets = [];
        
        $args = array(
            'post_type' => 'ballet',
	    	'posts_per_page' => -1,
            'orderby' =>  'name',
            'order' => 'ASC'
	    );
	    $the_query = new WP_Query( $args );
        foreach($the_query->posts as $ballet){
            $data = [];
            $post = get_post();

            $music = get_field('music', $ballet);

            //$data['general_info'] = get_field('general_info', $ballet);
            if(get_field('lighting_designer', $ballet)) $data = array_merge($data, get_field('lighting_designer', $ballet));
            if(get_field('costume_designer', $ballet)) $data = array_merge($data, get_field('costume_designer', $ballet));
            if(get_field('set_designer', $ballet)) $data = array_merge($data, get_field('set_designer', $ballet));

            if($music['composer']){
                $data = array_merge($data, $music['composer']);
            }

            $data['premiere'] = get_field('premiere', $ballet);

            if(in_array($post, $data)){
                $ballets[] = $ballet;
            }

            if($data['premiere']){
                if($data['premiere']['cast']){
                    if(in_array($post, $data['premiere']['cast'])){
                        $ballets[] = $ballet;
                    }
                }
            }
        }


	    return $ballets;
    }

    public function with()
    {
        return [
            'ballets' => $this->ballets(),
        ];
    }
}
