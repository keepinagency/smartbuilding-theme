<?php 
/*** 
 *  Contáctonos, categoría de entradas    
 *  Categoría: ""   
 ***/  

$uno = get_option('parrafo1', '');
$dos = get_option('parrafo2', '');

$dir = get_option( 'direccion', 'Andes 3723, Quinta Normal' );
$tel = get_option( 'telefono', '+ 56 22 938 0016' );
$correo = get_option( 'correo', 'contacto@smartbuilding.cl' );
$web = get_option( 'web', 'https://www.smartbuilding.cl' );

$url_1 = get_option( 'urlred1', '' );
$logored1 = get_option( 'logored1', '' );

$url_2 = get_option( 'urlred2', '' );
$logored2 = get_option( 'logored2', '' );	

$url_3 = get_option( 'urlred3', '' );
$logored3 = get_option( 'logored3', '' );
?>
<div class="row p-0 m-0 mx-3 mb-3">
    <div class="titulo-producto col-12 text-uppercase d-flex align-items-center justify-content-center p-4 ">
        <p class="border-2 border-bottom border-success" id="form-contacto"><b class="titulo-negrita">Contáctanos</b></p>
    </div>
    <div class="col-12 col-lg-6 p-0 m-0 border ">
        <!--p class="text-center titulo-contact">
            <b>Información de Contacto</b>
        </p-->
        <div class="row col-12 m-0 p-0 p-3 p-lg-4"> 
            <div class="texto-contacto pb-4">
                <?php if (empty($uno)) {
                    echo "Smartbuilding es una empresa creada con el objetivo de ofrecer la mejor tecnología del mundo en Eficiencia Energética y Construcción Sustentable. 
                    Nuestra experiencia nacional e internacional y respaldo técnico, nos permite ofrecer soluciones de vanguardia y con la mejor relación calidad - precio.</br></br>";
                }else{
                    echo $uno . "</br>" . "</br>";
                } ?>
                <?php if (empty($dos)) {
                    echo "Queremos ser referentes en la industria de la Construcción Sustentable y la eficiencia energética, con aplicaciones residenciales y Comerciales. 
                    Líderes en ofrecer tecnologías y soluciones para las personas que buscan no sólo ahorros en sus consumos energéticos sino que también su impacto en el entorno y el planeta.";
                }else{
                    echo $dos;
                } ?>
            </div>
            <div class="col-12 col-lg-6 text-sm-center">
                <span class="text-secondary">
                    <i class="fa-solid fa-house pt-4 pe-2"></i> Dirección:
                </span>
                <p><?php if (empty($dir)) {
                    echo "Andes 3723, Quinta Normal";
                }else {
                    echo $dir;
                    }?>
                </p>
                <span class="text-secondary">
                    <i class="fa-solid fa-square-phone pt-4 pe-2"></i> Teléfono:
                </span>
                <p><?php if (empty($tel)) {
                    echo "+ 56 22 938 0016";
                }else {
                    ?>
                    <a href="tel:<?= $tel; ?>"><?=$tel?></a>
                    <?php
                    }?></p>
                <span class="text-secondary">
                    <i class="fa-solid fa-envelope pt-4 pe-2"></i> Correo:
                </span>
                <p class="p-0 m-0"><?php if (empty($correo)) {
                    echo "<a href:'mailto:contacto@smartbuilding.cl'>contacto@smartbuilding.cl<a>";
                }else {
                    ?>
                    <a href="mailto:<?= $correo; ?>"><?=$correo?></a>
                    <?php
                }
                ?></p>
                <div class="pt-4 pe-2 m-0 text-secondary">
                    <span class="">Nuestras Redes:</span>
                </div>
                <div class="col-12 p-0 m-0 pt-1" >
                    <!-- Red social - 1 -->
                    <a href="<?=$url_1?>" target="_blank" class="text-decoration-none me-2">
                        <img src="<?= $logored1;?>"/>
                    </a>
                    <!-- Red Social - 2 -->
                    <a href="<?=$url_2?>" target="_blank" class="text-decoration-none me-2">
                        <img src="<?= $logored2;?>"/>
                    </a>
                    <!-- Red Social - 3 -->
                    <a href="<?=$url_3?>" target="_blank" class="text-decoration-none me-2">
                        <img src="<?= $logored3;?>"/>
                    </a>
                </div>
                
            </div>
            <div class="col-12 col-lg-6 p-0 m-0">
                <div class="pt-4 pe-2 text-secondary text-end">
                    
                </div>
                    
            </div>
        </div>
        
    </div>
    <div class="contact col-12 col-lg-6 p-0 m-0">
        <script type="text/javascript" src="https://clientify.net/web-marketing/webforms/script/72456.js"></script>
    </div>
</div>