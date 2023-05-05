
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('microservicios-form');
    
    form.addEventListener('submit', (e) => {
    e.preventDefault();
    let select = document.getElementById('microservicios-select').value;
    let checkboxes = Array.from(document.querySelectorAll('input[name="microservicios_checkboxes[]"]:checked')).map((c) => {
         return c.value;
    });
    let input = document.getElementById('microservicios_input').value;

    let data = {
         select,
         checkboxes,
         input
    };

    console.log(data)

    fetch('index.php?option=com_ajax&plugin=pluginMicroservicios&format=json', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.status === 200) {
            return response.json();
        } else {
            throw new Error('Error al guardar los datos');
        }
    })
    .then(data => {
        if(data.success){
            alert('Datos guardados correctamente');
        } else {
            alert('Error al guardar los datos');
        }
    })
    .catch(err => {
        alert(err.message);
        
    })
});
});
