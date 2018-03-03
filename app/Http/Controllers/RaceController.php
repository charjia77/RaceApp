<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaceController extends Controller
{
    //
    public function index()
    {
        /**
         * Show 5 most recent races
         */

        // Assume we can get races data from API server, probably by tools like curl, and use some codes like below
        // $param['userid'] = $userid;  
        // $curl = Common::curl('/races', $param, 0);	// I perfer do json_decode() inside curl()

        // Assume we get all races data from API serve and save it in $races_json_str, and it has next 5 races 
        // which are sorted by 'close_time' and indexed from 0 to 4
        // Because I think API server has already done close time sorting since it needs to find 5 most recent races.
        $races_json_str = '{"0": {"close_time": "2018-03-06 12:00:00", "meeting_type": "Harness", "meeting": "Doomben", "id": 1000001, "race_name":"Doomben 1000"}, "1": {"close_time": "2018-03-06 12:15:00", "meeting_type": "Greyhound", "meeting": "Ascot", "id": 1000002, "race_name":"Ascot Cup"}, "2": {"close_time": "2018-03-06 12:30:00", "meeting_type": "Thoroughbred", "meeting": "Doomben", "id": 1000003, "race_name":"Doomben Cup"}, "3": {"close_time": "2018-03-06 12:45:00", "meeting_type": "Harness", "meeting": "Eagle Farm", "id": 1000004, "race_name":"Queensland Oaks"}, "4": {"close_time": "2018-03-06 13:00:00", "meeting_type": "Greyhound", "meeting": "Ascot", "id": 1000005, "race_name":"Queensland Derby"}}';       

        $races = json_decode($races_json_str, true);

        // change closing time to test counting down and disappearing from race list
        date_default_timezone_set("Australia/Brisbane");
        $races[0]['close_time'] = date("Y-m-d H:i:s", strtotime("+1 minutes"));
        $races[1]['close_time'] = date("Y-m-d H:i:s", strtotime("+3 minutes"));
        $races[2]['close_time'] = date("Y-m-d H:i:s", strtotime("+30 minutes"));
        $races[3]['close_time'] = date("Y-m-d H:i:s", strtotime("+3 hours"));
        $races[4]['close_time'] = date("Y-m-d H:i:s", strtotime("+2 days"));

        //return response()->json(['ServerNo' => 200, 'data' => $races]);
        return view('races', ['races' => $races]);
    }

    public function raceDetails($race_id)
    {
        /**
         * Show race details by race_id
         */

        // Assume we can get race detail data from API server, probably by tools like curl, and use some codes like below
        // $param['userid'] = $userid;  
        // $curl = Common::curl('/race/race_id', $param, 0);	// I perfer do json_decode() inside curl()
        
        // function emulate the race details data from API server
        function race_details($id){

            // all race details in $all_races and be indexed by race_id, 
            // competitor's index in array represents his/her position in each race
            $all_races = array(
                1000001 => array(
                    'competitors' => array('John', 'Mike', 'Cloud', 'Jason', 'Max'),
                ),
                1000002 => array(
                    'competitors' => array('Ganix', 'Alex', 'Jack', 'Carrick', 'Keith', 'Abel'),
                ),
                1000003 => array(
                    'competitors' => array('Michael', 'Steven', 'Charles', 'Franklin', 'Patrick'),
                ),
                1000004 => array(
                    'competitors' => array('Patt', 'Bob', 'Sam', 'Thomas', 'Hayden', ),
                ),
                1000005 => array(
                    'competitors' => array('Ken', 'Ryu', 'Guile', 'Nash', 'Bison', 'Zangief', 'Balrog', 'Sagat'),
                ),
            );

            shuffle($all_races[$id]['competitors']);   // random the position for each competitor 
            return json_encode($all_races[$id]); 
        }

        // Assume we get all races data from API serve and save it in $race_details_json_str
        $race_details_json_str = race_details($race_id);

        $race_details = json_decode($race_details_json_str, true);

        //return response()->json(['ServerNo' => 200, 'data' => $race_details]);
        return view('raceDetails', ['race_details' => $race_details]);
    }
}
