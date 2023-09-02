<?php
require_once('class/Partial.php');

if (!isset($_GET['idUser']) || $_GET['idUser'] == null) {
    header('location:index.php');
    exit;
} 

$id = $_GET['idUser'];

require_once('class/Crud.php');
$crud = new Crud;

$selectId = $crud->selectId('user', $id);

extract($selectId);



?>
<?php
echo Partial::head();
?>

<body class="align">
    <h1>Welcome <?= $username; ?></h1>
    <a href="project-create.php?idUser=<?= $id; ?>">Create a project</a>
</body>

</html>