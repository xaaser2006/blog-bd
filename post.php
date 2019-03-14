<?php

include_once('functions.php');

$id = $_GET['id'] ?? null;
$err404 = false;

if (!check_id($id)) {
    $err404 = true;
} else {
    $query = db_query("SELECT * FROM news WHERE id_news=:id", ['id' => $id]);
    $message = $query->fetch();

    if ($message === false) {
        $err404 = true;
    }
//    echo nl2br($message['content']);
}
?>


<?php if ($err404) { ?>
404
<?php } else { ?>
    <div>
<!--        <em>--><?//= $message['dt'] ?><!--</em>-->
<!--        <strong>--><?//= $message['title'] ?><!--</strong>-->
        <div><?php echo nl2br($message['content']); ?></div>
    </div>
<?php } ?>
<hr>
<a href="index.php">Назад</a>