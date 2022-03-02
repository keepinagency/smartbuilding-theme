<?php 
/*** 
 *  Contáctonos, categoría de entradas    
 *  Categoría: ""   
 ***/  
?>
<div class="row p-0 m-0 my-3">
    <div class="titulo-producto col-12 text-uppercase d-flex align-items-center justify-content-center p-4">
        <p class="border-2 border-bottom border-success"><b class="titulo-negrita">Contác</b>tanos</p>
    </div>
    <div class="col-lg-6 col-12">
        <iframe class="col-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3333.633604320769!2d-70.71369228546772!3d-33.32839308080909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c755d1b047e7%3A0x1c6d417b7a147c12!2sEl%20Juncal%20901%2C%20Quilicura%2C%20Regi%C3%B3n%20Metropolitana%2C%20Chile!5e0!3m2!1ses-419!2sve!4v1645625104184!5m2!1ses-419!2sve" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>
    <div class="col-lg-6">
        <div class="titulo-producto col-12 text-uppercase d-flex align-items-center justify-content-center p-lg-4 d-block d-lg-none">
            <p class="border-2 border-bottom border-success"><b class="titulo-negrita">Formulario de cont</b>acto</p>
        </div>
        <form action="<?php echo get_template_directory_uri().'/temp_parts/contactanos.php'; ?>" method="post">
            <div class="row">
                <div class="form-group col-lg-12 p-2">
                    <label class="text-capitalize form-nom">nombre:</label>
                    <input type="text" class="form-control border-2" name="nombre" id="nombre" style="border-radius: 10px; border-color: #86AA35;" required>
                </div>
                <div class="form-group col-lg-12 p-2">
                    <label class="text-capitalize form-nom">correo:</label>
                    <input type="text" class="form-control border-2" name="correo" id="correo" style="border-radius: 10px; border-color: #86AA35;" required>
                </div>
                <div class="form-group col-lg-12 p-2">
                    <label class="text-capitalize form-nom">teléfono:</label>
                    <input type="text" class="form-control border-2" name="telefono" id="telefono" style="border-radius: 10px; border-color: #86AA35;" required>
                </div>
                <div class="form-group col-lg-12 p-2">
                    <label class="text-capitalize form-nom">mensaje:</label>
                    <textarea rows="5" cols="20" class="form-control border-2" name="mensaje" id="mensaje" style="border-radius: 10px; border-color: #86AA35;" required></textarea>
                </div>
                <div class="d-lg-flex justify-content-lg-end d-flex justify-content-end">
                    <button type="submit" class="btn w-25 btn-submit border-2" style="border-radius: 10px; border-color: #86AA35;" onclick="vacioFunc()">Enviar</button>
                </div>
            </div>      
        </form>
    </div>
</div>
<script>
  function vacioFunc() {
    var correo = document.getElementById("correo").value; 
    var nombre = document.getElementsByName("nombre")[0].value;
    var telefono = document.getElementsByName("telefono")[0].value;
    var mensaje = document.getElementsByName("mensaje")[0].value;
    
    if ( !(correo == "" || nombre == "" || telefono == "" || mensaje == "") ){
        alert("Correo enviado con exito, Gracias por contactarnos...");
    return true;
}
  }
</script>