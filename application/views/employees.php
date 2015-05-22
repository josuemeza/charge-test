<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Empleados</title>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.js'); ?>"></script>
    <script type="text/javascript">
        var limit = <?= $limit; ?>;
        var method = "<?= $method; ?>";
        var type = "<?= $type; ?>";
    </script>
    <script type="text/javascript" src="<?= base_url('assets/js/functions.js'); ?>"></script>
</head>
<body>
	<div>
		<a href="<?= site_url('welcome/employees'); ?>">Empleados</a>
		<a href="<?= site_url('welcome/productionEmployees'); ?>">Empleados ingenieros de producción</a>
		<a href="<?= site_url('welcome/fullEmployees'); ?>">Empleados con salario, título y departamento</a>
	</div>
    <div>
        <button id="back-button" class="button" type="button" disabled>Atrás</button>
        <span class="page-range"> 1 - 100 </span>
        <button id="next-button" class="button" type="button">Siguiente</button>
    </div>
    <div id="table-container">Cargando contenido...</div>
</body>
</html>