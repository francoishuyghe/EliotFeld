<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class SinglePeople extends Controller
{
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

            $data['general_info'] = get_field('general_info', $ballet);
            $data['lighting_designer'] = get_field('lighting_designer', $ballet);
            $data['costume_designer'] = get_field('costume_designer', $ballet);
            $data['set_designer'] = get_field('set_designer', $ballet);
            $data['premiere'] = get_field('premiere', $ballet);
            $data['composer'] = $music ? $music['composer'] : '';

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
}
