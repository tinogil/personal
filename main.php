<?php

//conectamos a la base de datos
$conex = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Comprueba que se conecta
if ($conex->connect_error)
{
    die("Connection failed: " . $conex->connect_error);
} 
$conex->set_charset(DB_CHARSET);
$cards= array();
//$std= new stdClass;   
$sql='SELECT * FROM news WHERE activa IS TRUE';
$result=$conex->query($sql);
echo '<main class="blue-grey lighten-4">
        <!-- Navegación lateral para el móvil o las pantallas pequeñas + click para ocultarla -->
        <!-- This is an anchor toggling the off-canvas -->
        <a href="#my-id" uk-toggle></a>


        <!-- Tarjeta del programa en emisión -->
        <div class="uk-card uk-card-default uk-grid-collapse   uk-child-width-1-2@m  uk-margin uk-margin-left uk-margin-right uk-card-hover" uk-grid>
            <div class="uk-card-media-left uk-cover-container ">
                <img src="https://media1.britannica.com/eb-media/00/7900-004-912AF742.jpg" alt="El mar en movimiento" uk-cover>
                <canvas width=225 height=183></canvas>
            </div>
            <div>
                <div class="uk-card-header">
                    <h1 class="uk-card-title">En Antena</h1>
                </div>
                <div class="uk-card-body">
                    <h4>Solo Jazz</h4>
                    <p class="uk-text-meta "><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                    <p>Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="uk-card-footer">
                    <a href="#" class="uk-button uk-button-outline-blue-grey">Read more</a><br>
                </div>
            </div>
        </div>';
        while($row=$result->fetch_assoc()){
            $std= new stdClass;
            $n=$row['card'];
            
             $std->titulo=$row['titulo'];
             $std->cuerpo=$row['cuerpo'];
            $std->imag=$row['imag'];
            
            $cards[$n]=$std;
           
        }


    echo '    <!--Empieza la segunda fila y las tarjetas de los programas a destacar-->
        <div class=" uk-child-width-expand@s uk-padding  blue-grey lighten-4" uk-grid>
            <div>
                <div class="uk-card uk-card-default uk-margin-small-right  uk-card-hover ">
                    <div class=" ">
                        <img class="" src="./images/'.$cards[1]->imag.
                        
                            '" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">'.$cards[1]->titulo.'</h3>
                        

                        <p>'.$cards[1]->cuerpo.'</p>


                    </div>
                    
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default  uk-margin-small-right uk-card-hover">
                    <div class=" ">
                        <img class="" src="./images/'.$cards[2]->imag.
                        
                            '" alt="">

                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">'.$cards[2]->titulo.'</h3>
                        <p>'.$cards[2]->cuerpo.'</p>

                    </div>
                   
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default  uk-card-hover ">
                    <div class="">
                        <img class="" src="./images/'.$cards[3]->imag.
                        
                            '" alt="">
                    </div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title">'.$cards[2]->titulo.'</h3>
                        <p>'.$cards[2]->cuerpo.'</p>
                    </div>
                    
                </div>';
         echo ' </div>
        </div>
    </main>';