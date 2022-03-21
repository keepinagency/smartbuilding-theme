<?php 
/*** 
 *  Contáctonos, categoría de entradas    
 *  Categoría: ""   
 ***/  
$uno = get_option('parrafo1', '');
$dos = get_option('parrafo2', '');
?>
<div class="row p-0 m-0 my-3 justify-content-center">
    <div class="titulo-producto col-12 text-uppercase d-flex align-items-center justify-content-center p-4">
        <p class="border-2 border-bottom border-success" id="form-contacto"><b class="titulo-negrita">Contáctanos</b></p>
    </div>
    <div class="contact col-lg-6 col-12 p-3 m-0">
        <p class="text-center titulo-contact">
            <b>Información de Contacto</b>
        </p>
        <p class="texto-contacto px-lg-5 py-lg-3 p-1"> 
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
        </p>
        
    </div>
    <div class="contact col-lg-6 col-12 p-0 m-0">
        <script type="text/javascript" src="https://clientify.net/web-marketing/webforms/script/72456.js"></script>
    </div>
</div>