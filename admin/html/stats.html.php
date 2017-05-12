<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/inc/header.html.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/admin/html/inc/menu.html.php';
?>
<div class="container content">
    <h1>Wyniki ankiety</h1>
    <div class="position">
        <h4>
        Wszystkich głosów: <?php htmlout($numberOfRecords); ?>
        </h4>
    </div>
    <br />

    <?php foreach ($questions as $question): ?>
        <div class="stat-question"><p>
            <div class="stat-question-value"><h4><?php htmlout($question['id']); ?>. <?php htmlout($question['value']); ?></h4></div>
            <br />
            <?php
            if ($question['id'] == 6) {
                ?>
                <div class="stat-answer"><a class="btn btn-default"  onclick="window.open('?question6', 'Odpowiedzi otwarte na pytanie 6', 'menubar=no,toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,fullscreen=no,channelmode=no,width=1280,height=1000')">Pokaż odpowiedzi</a></div>
                <?php
            } else {
                echo "<ul>";
                foreach ($answers[$question['id'] - 1] as $answer):
                    ?>
                <li>
                    <div class="stat-answer"><?php htmlout($answer['value'] . ": " . $a[$question['id']][$answer['id']]); ?><span class="procent"> / <?php htmlout(round(($a[$question['id']][$answer['id']]/$numberOfRecords)*100)); ?>%</span></div></li>
                    <div class="progress">
                        <div class="progress-bar progress-bar-info" style="width: <?php htmlout(round(($a[$question['id']][$answer['id']]/$numberOfRecords)*100)); ?>%"><?php htmlout(round(($a[$question['id']][$answer['id']]/$numberOfRecords)*100)); ?>%</div>
                    </div>
                    
                    <?php
                endforeach;
                echo "</ul>";
            }
            ?>

            <br />
        </div>
        <?php endforeach; ?>
    <div class="stat-answer"><a class="btn btn-default"  onclick="window.open('?question12', 'Odpowiedzi otwarte na pytanie 12', 'menubar=no,toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,fullscreen=no,channelmode=no,width=1280,height=1000')">Pokaż odpowiedzi</a></div>
    <br />

</div>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/html/inc/footer.html.inc.php';
?>



