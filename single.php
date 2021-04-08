<?php
if (!empty($_GET)) {
    $id = $_GET['id'];
    $vinyle = selectVinyleById($id);
} else {
    header("Location:index.php");
}
include('./inc/header.php');
?>

<?php
include('./inc/footer.php');
?>