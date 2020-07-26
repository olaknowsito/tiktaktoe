$(".box").click(function(){

    outer_this = this;
    playerid_active = document.querySelector('#player_turn').innerHTML;
    player_name_active = document.querySelector('#player_name_turn').innerHTML;
    // if it has innerhtml exit and return alert
    if( outer_this.innerHTML == 'O' || outer_this.innerHTML == 'X' ) {
      alert('can not pick that is already being picked by another player') 
      return;
    }
    console.log( playerid_active);
    // return a mark switched player turn
    if(playerid_active == 1) {

      document.querySelector('#player_1').classList.remove("btn-primary");
      document.querySelector('#player_1').classList.add("btn-secondary");
      document.querySelector('#two').classList.remove("btn-secondary");
      document.querySelector('#two').classList.add("btn-primary");
     
      outer_this.innerHTML = 'X';

    } 

    if(playerid_active == 2) {
      document.querySelector('#player_1').classList.remove("btn-secondary");
      document.querySelector('#player_1').classList.add("btn-primary");
      document.querySelector('#two').classList.remove("btn-primary");
      document.querySelector('#two').classList.add("btn-secondary");

      outer_this.innerHTML = 'O';
    }
    
    $("#player_1").removeClass("btn-primary" );
    $("#player_2").addClass("btn-secondary");
    // ajax save to database and switched to another player 
    // check if winner if yes throw alert and reload the page
    // if not continue play
    $.ajax({
      url: "../controller/SaveController.php",
      type: "POST",
      data: {
        "box_number": this.dataset.id,
        "player_id": playerid_active
      },  
      success: function (response) {
        let parsedResponse = JSON.parse(response);

        outer_this.innerHTML = parsedResponse.mark;

        document.querySelector('#player_turn').innerHTML = parsedResponse.player_id;

         // check if winner if yes throw alert and reload the page
        if(parsedResponse.flag_win) {
          message = `Player ${parsedResponse.player_id} is the winner`;
          alert(message);
          location.reload();  
        }

        if(parsedResponse.num_box == 9 && !parsedResponse.flag_win) {
          message = `Sorry out of move! Lets play it again`;
          alert(message);
          location.reload();  
        }
      }

     
    });

    
   
});

  