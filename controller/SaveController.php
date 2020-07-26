<?php
    session_start();
	include('../model/Classes/ConnectDb.php');
    include('../model/Classes/MoveHistory.php');

    $move_history = new MoveHistory();
    
    // Returns an array containing all the entries from array1 that are not present in any of the other arrays.
    // empty — Determine whether a variable is empty
    function in_array_all($needles, $haystack) {
        return empty(array_diff($needles, $haystack));
     }
 
    // result, flag_win
    $response = [];

    $box_number = $_POST['box_number'];
    $player_id = $_POST['player_id'];

    // Save box number to moves_History
    $move_history->savePlayerMove($player_id, $box_number);

    // return a mark switched player turn
    if($move_history->switchPlayer() == 1) {
        $response['player_id'] = 2;
        $response['mark'] = 'X';
    } else {
        $response['player_id'] = 1;
        $response['mark'] = 'O';
    }


    // Count box selected
    $response['num_box'] = $move_history->countBox();


    // check if player win
    $currentplayer_boxes = $move_history->currentSelectedBox($player_id);

    $current_boxes_array = [];

    foreach ($currentplayer_boxes as $key => $mh_player) {
        array_push($current_boxes_array, $mh_player['box_number']);
    }

    // check horizonal 
    $response['flag_win'] = in_array_all([1,2,3],$current_boxes_array) ? true : in_array_all([4,5,6],$current_boxes_array) ? true : in_array_all([7,8,9],$current_boxes_array) ? true : false;
    if ($response['flag_win']) {
        echo json_encode($response);
        return;
    }

    # end horizontal

    // check vertical
    $response['flag_win'] = in_array_all([1,4,7],$current_boxes_array) ? true :  $response['flag_win'] = in_array_all([2,5,8],$current_boxes_array) ? true : in_array_all([3,6,9],$current_boxes_array) ? true : false;
    if ($response['flag_win']) {
        echo json_encode($response);
        return;
    }

    # end vertical

    // check diagonal
    $response['flag_win'] = in_array_all([1,5,9],$current_boxes_array) ? true : in_array_all([3,5,7],$current_boxes_array) ? true : false;
    if ($response['flag_win']) {
        echo json_encode($response);
        return;
    }

    # end diagonal 

    // otherwise return false
    echo json_encode($response);
    return;

?>

