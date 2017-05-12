<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/inc/header.html.inc.php';
?>
<div class="container content">
    <h2><?php htmlout($title); ?></h2>
    <br />

    <?php $i=0; foreach ($answers as $answer): ?>

    <div class="answer">
        <?php            htmlout($answer); ?>
    </div>
    <hr />

    <?php $i++; endforeach;
 if ($i==0) {
     echo "<br />Brak odpowiedzi<br />";
 }?>
    <button class="print" onclick="window.print()">Wydrukuj stronę</button>
    
</div>

<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/html/inc/footer.html.inc.php';
?>



