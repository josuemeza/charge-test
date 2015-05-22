<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Empleados</title>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.js'); ?>"></script>
    <script type="text/javascript">
        var page = <?= $page; ?>;
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
        <?php if($page > 1) { ?>
        <a href="<?= $view . '/' . ($page-1); ?>">Atrás</a>
        <?php } ?>
        <span><?= (($page-1) * $limit) + 1; ?> a <?= $page * $limit; ?></span>
        <a href="<?= $view . '/' . ($page+1); ?>">Siguiente</a>
    </div>
    <div id="table-container">Cargando contenido...</div>
</body>
</html>