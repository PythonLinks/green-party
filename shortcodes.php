<?php
    //Create the shortcodes. 

    function gpt_get_candidate_title(){
        return get_option('green_party_candidate_title');
    }
    
    function gpt_get_candidate_location(){
        return get_option('green_party_candidate_location');
    }
    
    function gpt_get_candidate_ballotStatus(){
        return get_option('green_party_candidate_ballotStatus');
    }
    
    function gpt_get_candidate_onBallot(){
        return get_option('green_party_candidate_onBallot');
    }
    
    function gpt_get_candidate_endorsed(){
        return get_option('green_party_candidate_endorsed');
    }
    
    function gpt_get_candidate_result(){
        return get_option('green_party_candidate_result');
    }
    
    function gpt_get_organization_type(){
         return get_option('organization_organizatin_type');
     }
    
    function gpt_get_eventsPageURL(){
        return get_option('organization_eventsPageURL');
    }
    
    function gpt_get_discord_volunteer_channel_URL(){
       return get_option('organization_discord_volunteer_channel_URL');
   }
   
    function gpt_get_donationsPageURL(){
        return get_option('donationsPageURL');
    }
    
    function gpt_get_register_to_vote_URL(){
        return get_option('organization_register_to_vote_URL');
    }
    
    function gpt_get_video(){
        return get_option('organization_video');
    }

function gptAddAllShortCodes(){
    add_shortcode ('video', 'gpt_get_video');
    add_shortcode('candidate_title', 'gpt_get_candidate_title');
    add_shortcode('candidate_location', 'gpt_get_candidate_location');
    add_shortcode('candidate_ballotStatus', 'gpt_get_candidate_ballotStatus');
    add_shortcode('candidate_onBallot', 'gpt_get_candidate_onBallot');
    add_shortcode('candidate_endorsed', 'gpt_get_candidate_endorsed');
    add_shortcode('candidate_result', 'gpt_get_candidate_result');
    add_shortcode('organization_type','gpt_get_organization_type');
    add_shortcode('eventsPageURL', 'gpt_get_eventsPageURL');
    add_shortcode ('discord_volunteer_channel_URL',
                         'gpt_get_discord_volunteer_channel_URL');
    add_shortcode ('donationsPageURL','gpt_get_donationsPageURL');
    add_shortcode('register_to_vote_URL','gpt_get_register_to_vote_URL');
}
//gptAddAllShortCodes();
add_action('switch_theme', 'gptAddAllShortCodes');

?>