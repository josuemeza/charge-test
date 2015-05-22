<!DOCTYPE html>
<html>
<head>
	<title>Empleados</title>
</head>
<body>
    <div>
        <a href="<?= site_url('welcome/employees'); ?>">Empleados</a>
        <a href="<?= site_url('welcome/productionEmployees'); ?>">Empleados ingenieros de producción</a>
        <a href="<?= site_url('welcome/fullEmployees'); ?>">Empleados con salario, título y departamento</a>
    </div>
    <div>
        <?php if($index>1) { ?>
        <a href="<?= site_url(array($method, $index-1)); ?>">Atras</a>
        <?php } ?>
        <span><?= (($index-1) * $limit) + 1; ?> a <?= $index * $limit; ?></span>
        <a href="<?= site_url(array($method, $index+1)); ?>">Siguiente</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Salario</th>
                <th>Titulo</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($employees as $employee) { ?>
            <tr>
                <td><?= $employee->emp_no; ?></td>
                <td><?= $employee->first_name; ?></td>
                <td><?= $employee->last_name; ?></td>
                <td><?= $employee->salary; ?></td>
                <td><?= $employee->title; ?></td>
                <td><?= $employee->dept_name; ?></td>
            </tr>
        <?php } ?>
        </tbody>
</body>
</html>