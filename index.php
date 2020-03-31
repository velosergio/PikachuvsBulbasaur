<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Versus Pokemon Page!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    //Areglo de
    $pokemon1 = [
        'nombre'    =>  'Pikachu',
        'vida'      =>  rand(0, 100),
        'ataque'    =>  rand(0, 10),
        'img'       =>  'https://www.stickpng.com/assets/images/580b57fcd9996e24bc43c325.png',
        'agilidad'  =>  rand(0, 10)
    ];

    $pokemon2 = [
        'nombre'    =>  'Bulbasaur',
        'vida'      =>  rand(40, 80),
        'ataque'    =>  rand(3, 7),
        'img'       =>  'https://www.stickpng.com/assets/images/580b57fcd9996e24bc43c31a.png',
        'agilidad'  =>  rand(0, 10)
    ];
    ?>

    <div id="price">
        <!--price tab-->
        <div class="plan pikachu">
            <div class="plan-inner">
                <div class='entry-title'>
                    <h3><?php echo $pokemon1['nombre']; ?></h3>
                </div>
                <div class="entry-content">
                    <ul>
                        <li><strong>Vida</strong> <?php echo $pokemon1['vida']; ?></li>
                        <li><strong>Ataque</strong> <?php echo $pokemon1['ataque']; ?> </li>
                        <li><strong>Agilidad</strong> <?php echo $pokemon1['agilidad']; ?> </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of price tab-->
        <!--price tab-->
        <div class="plan">
            <img src="https://cdn141.picsart.com/272465983022211.png?type=webp&to=min&r=640" alt="vs" style="width: 200px">
        </div>
        <!-- end of price tab-->
        <!--price tab-->
        <div class="plan bulbasaur">
            <div class="plan-inner">
                <div class="entry-title">
                    <h3><?php echo $pokemon2['nombre']; ?></h3>
                </div>
                <div class="entry-content">
                    <ul>
                        <li><strong>Vida</strong> <?php echo $pokemon2['vida']; ?></li>
                        <li><strong>Ataque</strong> <?php echo $pokemon2['ataque']; ?> </li>
                        <li><strong>Agilidad</strong> <?php echo $pokemon2['agilidad']; ?> </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end of price tab-->
    </div>
    <?php
    function combate($pokemon1, $pokemon2)
    {
        echo '<div style="text-align: center;
        @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
        font-family: "Lato", Arial, sans-serif; ">';
        //Comparación de agilidad
        if ($pokemon1['agilidad'] > $pokemon2['agilidad']) {
            $turno = 0;
            echo $pokemon1['nombre'] . ' es mas agil, asi que atacara primero!';
        }
        if ($pokemon1['agilidad'] < $pokemon2['agilidad']) {
            $turno = 1;
            echo $pokemon2['nombre'] . ' es mas agil, asi que atacara primero!';
        }
        if ($pokemon1['agilidad'] == $pokemon2['agilidad']) {
            $turno = 0;
            echo 'Es un empate en agilidad! inicia ' . $pokemon1['nombre'];
        }
        echo '<h3>Inicio del combate!</h3>';

        //Comprobamos que esten vivos los pokemon
        while ($pokemon1['vida'] > 0 && $pokemon2['vida'] > 0) {
            //Comprobamos el turno
            if ($turno == 0) {
                //Fase de Ataque
                $pokemon2['vida'] = $pokemon2['vida'] - $pokemon1['ataque'];
                //Comprobacion
                if ($pokemon2['vida'] <= 0) {
                    echo 'Es incrible! <strong>' . $pokemon1['nombre'] . ' es el ganador!<strong> <br/>';
                    echo '<img src="' . $pokemon1['img'] . '" style="width: 200px">';
                    break;
                }
                //Narrador
                echo $pokemon1['nombre'] . ' hace ' . $pokemon1['ataque'] . ' de daño, ahora '
                    . $pokemon2['nombre'] . ' tiene ' . $pokemon2['vida'] . ' de vida! <br/>';
                $turno = 1;
            } elseif ($turno == 1) {
                //Fase de ataque
                $pokemon1['vida'] = $pokemon1['vida'] - $pokemon2['ataque'];
                //Comprobacion
                if ($pokemon1['vida'] <= 0) {
                    echo 'Es incrible! <strong>' . $pokemon2['nombre'] . ' es el ganador!<strong> <br/>';
                    echo '<img src="' . $pokemon2['img'] . '" style="width: 200px">';
                    break;
                }
                //Narrador
                echo $pokemon2['nombre'] . ' hace ' . $pokemon2['ataque'] . ' de daño, ahora '
                    . $pokemon1['nombre'] . ' tiene ' . $pokemon1['vida'] . ' de vida! <br/>';
                $turno = 0;
            }
        }
        echo '</div>';
    }
    ?>

    <div class="div">
        <?php
        //Llamar la funcion
        combate($pokemon1, $pokemon2);
        ?>
    </div>

</body>

</html>