<form id='formulario_microservicios' action="index.php" method="post" >
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Guardar</button>
</form>

<style>
    /* agregar estilos */
</style>

<script>
    // Aquí puedes agregar tu código JavaScript
    document.getElementById('formulario_microservicios').addEventListener('submit', function(e) {
        e.preventDefault();

        // Obtener los datos del formulario
        let nombre = document.getElementById('nombre').value;
        let email = document.getElementById('email').value;

        // Realizar la petición AJAX para guardar los datos en la base de datos
        let peticion = new XMLHttpRequest();
        peticion.open('POST', 'index.php?option=com_ajax&plugin=plugin_microservicios&format=json', true);
        peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        peticion.onload = function() {
            if (peticion.status === 200) {
                // Mostrar mensaje de éxito
                alert('Datos guardados correctamente');
            } else {
                // Mostrar mensaje de error
                alert('Error al guardar los datos');
            }
        };
        peticion.send('nombre=' + encodeURIComponent(nombre) + '&email=' + encodeURIComponent(email));
    });
</script>