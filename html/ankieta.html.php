<?php
$title = "Ankieta dla uczniów";
include $_SERVER['DOCUMENT_ROOT'] . '/html/inc/header.html.inc.php';
?>
<div class="container content">

    <form name="loginform" id="login" action="" method="post">
        <?php foreach ($questions as $question): ?>
            <div class="question"><p>
                    <label for="<?php htmlout($question['id']); ?>"><h4><strong><?php htmlout($question['id']); ?>. <?php htmlout($question['value']); ?></strong></h4></label>
                    <br />
                    <?php
                    
                    
                    
                    if ($question['id'] == 6) {
                        ?>

                        <textarea name="a<?php htmlout($question['id']); ?>" id="<?php htmlout($question['id'] . '-' . $answer['id']); ?>" disabled="disabled"></textarea>


                        <?php
                    } else {
                        if ($question['id'] == 7 || $question['id'] == 8 || $question['id'] == 11 || $question['id'] == 12) {

                            foreach ($answers[$question['id'] - 1] as $answer):
                                ?>
                                <?php if ($answer['id'] == 38) {
                                    ?>
                                    <input type="checkbox" name="a<?php htmlout($question['id']); ?>[]" id="<?php htmlout($question['id'] . '-' . $answer['id']); ?>" value="<?php htmlout($answer['id']); ?>" />
                                    <label for="<?php htmlout($question['id'] . '-' . $answer['id']); ?>"><?php htmlout($answer['value']); ?></label><br />
                                    <textarea name="a<?php htmlout($question['id']); ?>t" id="<?php htmlout($question['id'] . '-' . $answer['id']); ?>-t" disabled="disabled"></textarea>



                                    <?php } else {
                                    ?>
                                    <input type="checkbox" name="a<?php htmlout($question['id']); ?>[]" id="<?php htmlout($question['id'] . '-' . $answer['id']); ?>" value="<?php htmlout($answer['id']); ?>" />
                                    <label for="<?php htmlout($question['id'] . '-' . $answer['id']); ?>"><?php htmlout($answer['value']); ?></label><br />
                                <?php
                                }
                            endforeach;
                        } else {
                            foreach ($answers[$question['id'] - 1] as $answer):
                                ?>
                                <input type="radio" required name="a<?php htmlout($question['id']); ?>" id="<?php htmlout($question['id'] . '-' . $answer['id']); ?>" value="<?php htmlout($answer['id']); ?>" />
                                <label for="<?php htmlout($question['id'] . '-' . $answer['id']); ?>"><?php htmlout($answer['value']); ?></label><br />
                                <?php
                            endforeach;
                        }
                    }
                    ?>
                </p>
                <br />
            </div>
<?php endforeach; ?>
        <input type="hidden" name="action" value="sent" />
        <input type="hidden" name="startdate" value="<?php htmlout($startdate); ?>" />
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Zakończ ankietę" disabled="disabled" onclick="this.disabled=true,this.form.submit();" />
    </form>
    <br />

</div>
<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/html/inc/footer.html.inc.php';
?>



