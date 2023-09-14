<!DOCTYPE html>
<html>

<head>
    <title>Consumir API REST</title>
    <!-- Agregar los enlaces a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Datos de Usuarios</h1>

        <!-- Formulario de filtro por ID -->
        <form id="filterForm">
            <div class="mb-3">
                <label for="filtroId" class="form-label">Filtrar por ID:</label>
                <input type="text" class="form-control" id="filtroId" name="filtroId">
            </div>
            <button type="button" class="btn btn-primary" onclick="aplicarFiltro()">Aplicar Filtro</button>
        </form>

        <!-- Tabla para mostrar los datos de los usuarios -->
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <!-- Los datos de los usuarios se cargarán aquí -->
            </tbody>
        </table>
    </div>

    <!-- Agregar los scripts de Bootstrap (jQuery y Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./js/user.js"></script>
</body>

</html>