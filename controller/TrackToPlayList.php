<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PlayList\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../dao/PlayListStore.php');

/**
 * Description of TrackToPlayList
 *
 * @author lionel
 */
class TrackToPlayList extends Controller{
    //put your code here
    public function run() {
        
        $playlist_id = filter_input(INPUT_POST, 'playlist_id', FILTER_VALIDATE_INT);
        $track_id = filter_input(INPUT_POST, 'track_id', FILTER_VALIDATE_INT);
        
        
        if ($playlist_id && $track_id){
            
            $ok = \PlayList\Dao\PlayListStore::addTrack($playlist_id, $track_id);
            if ($ok){
                http_response_code(201);
            }else{
                http_response_code(500);
            }
            
         
        }else{
            
            http_response_code(400);
        }
        
        
    }

}
