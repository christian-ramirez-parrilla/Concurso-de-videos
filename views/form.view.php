<div class="insertar">
    <i id="cerrar" class="insertar__cerrar fas fa-times"></i>
    <div class="insertar__center">
    <div class="insertar__seccion insertar__form">
        <h2>¡Envía tu vídeo y participa! 😊</h2>
        <form class="insertar__formulario" action="controlers/insertar.controler.php" method="post">
        <input name="src" type="text" placeholder="https://www.youtube.com/watch?v=cLnkQAeMbIM" />
        <input name="nombre" type="text" placeholder="Nombre de usuario" />
        <input name="email" type="email" placeholder="Email" />
        <input type="submit" value="Enviar mi vídeo" />
        </form>
    </div>
        <div class="insertar__seccion insertar__correcto">
            <h2>¡Felicidades! Ya pueden votar por tu video 🎉</h2>
        </div>
        <div class="insertar__seccion insertar__error">
            <h2>¡Error! Algún dato se  ha introducido mal al subir el vídeo 😭</h2>
        </div>
        <div class="insertar__seccion insertar__existe">
            <h2>¡Error! Alguien Ya ha subido el vídeo 😭</h2>
        </div>
        <div class="insertar__seccion insertar__buscar">
            <h2>todavía no tenemos ese video ¡SUBELO RAPIDO! 😭</h2>
        </div>
    </div>
</div>