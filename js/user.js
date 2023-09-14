 // Arreglo para almacenar todos los usuarios
 var usuarios = [];

 // Función para cargar y mostrar los datos de todos los usuarios
 function cargarUsuarios() {
     // URL del endpoint para obtener todos los usuarios
     var url = "http://localhost/API_REST_PHP_MYSQL/controller/controladorUsuario.php?opcion=getAll";
     
     // Realizar la solicitud GET usando Fetch API
     fetch(url)
         .then(response => response.json())
         .then(data => {
             // Almacenar los datos en el arreglo de usuarios
             usuarios = data;

             // Llamar a la función para aplicar el filtro
             aplicarFiltro();
         })
         .catch(error => {
             console.error("Error al obtener los datos de los usuarios:", error);
         });
 }

 // Función para aplicar el filtro por ID
 function aplicarFiltro() {
     // Obtener el valor del campo de filtro por ID
     var filtroId = document.getElementById("filtroId").value;

     // Obtener la referencia a la tabla en el DOM
     var userTableBody = document.getElementById("userTableBody");

     // Limpiar cualquier contenido previo en la tabla
     userTableBody.innerHTML = "";

     if (filtroId.trim() === "") {
         // Si el campo de filtro está vacío, mostrar todos los usuarios
         usuarios.forEach(usuario => {
             var row = userTableBody.insertRow();
             row.innerHTML = `
                 <td>${usuario.id}</td>
                 <td>${usuario.nombre}</td>
                 <td>${usuario.edad}</td>
                 <td>${usuario.estado}</td>
             `;
         });
     } else {
         // Si se ingresó un ID en el filtro, consumir el endpoint correspondiente
         var url = `http://localhost/API_REST_PHP_MYSQL/controller/controladorUsuario.php?opcion=getUser&id=${filtroId}`;
         
         // Realizar la solicitud GET usando Fetch API
         fetch(url)
             .then(response => response.json())
             .then(data => {
                 // Mostrar el usuario filtrado en la tabla
                 var row = userTableBody.insertRow();
                 row.innerHTML = `
                     <td>${data[0].id}</td>
                     <td>${data[0].nombre}</td>
                     <td>${data[0].edad}</td>
                     <td>${data[0].estado}</td>
                 `;
             })
             .catch(error => {
                 console.error("Error al obtener el usuario filtrado:", error);
             });
     }
 }

 // Llamar a la función para cargar usuarios al iniciar el documento
 window.onload = cargarUsuarios;