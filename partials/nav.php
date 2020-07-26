
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-center nav_css">
        <div class="container text-center">
            <a class="navbar-brand text-center" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto mx-auto">
                    <li class="nav-item active">
                        <button type="button" id="player_1" class="btn <?php echo ($player_set['player_id']) == 1 ? 'btn-primary' : 'btn-secondary'  ?>">Player 1</button>
                    </li>

                    <li class="nav-item active li_title">
                        <a class="nav-link hover_a_nav" ><strong>Touch move Touch Down</strong></a>
                    </li>

                    <li class="nav-item active">
                        <button type="button" id="two" class="btn <?php echo ($player_set['player_id']) == 2 ? 'btn-primary' : 'btn-secondary'  ?>">Player 2</button>

                    </li>


                </ul>
            </div>
        </div>
    </nav>

    