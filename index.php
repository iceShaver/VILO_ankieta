<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';


if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/html/login.html.php';
    exit();
}


if (userIsAdmin()) {
    header('Location: ./admin');
    exit();
}
if (isset($_GET['submit'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/html/submit.html.php';
    exit();
    
}
if (isset($_POST['action']) && $_POST['action'] == 'sent') {
    $placeholders[':startdate'] = $_POST['startdate'];
    $placeholders[':a1'] = $_POST['a1'];
    $placeholders[':a2'] = $_POST['a2'];
    $placeholders[':a3'] = $_POST['a3'];
    $placeholders[':a4'] = $_POST['a4'];
    $placeholders[':a5'] = $_POST['a5'];
    $placeholders[':a6'] = $_POST['a6'];
    $placeholders[':a7_1'] = $_POST['a7'][0];
    $placeholders[':a7_2'] = $_POST['a7'][1];
    $placeholders[':a7_3'] = $_POST['a7'][2];
    $placeholders[':a8_1'] = $_POST['a8'][0];
    $placeholders[':a8_2'] = $_POST['a8'][1];
    $placeholders[':a8_3'] = $_POST['a8'][2];
    $placeholders[':a9'] = $_POST['a9'];
    $placeholders[':a10'] = $_POST['a10'];
    $placeholders[':a11_1'] = $_POST['a11'][0];
    $placeholders[':a11_2'] = $_POST['a11'][1];
    $placeholders[':a11_3'] = $_POST['a11'][2];
    $placeholders[':a12_1'] = $_POST['a12'][0];
    $placeholders[':a12_2'] = $_POST['a12'][1];
    $placeholders[':a12_3'] = $_POST['a12'][2];
    $placeholders[':a12_4'] = $_POST['a12t'];
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconnect.inc.php';
    
    try {
        $pdo->exec("SET time_zone = '+1:00'");
        $sql = "INSERT INTO scores (startdate, enddate, a1, a2, a3, a4, a5, a6, a7_1, a7_2, a7_3, a8_1, a8_2, a8_3, a9, a10, a11_1, a11_2, a11_3, a12_1, a12_2, a12_3, a12_4) VALUES "
                . "(:startdate, LOCALTIMESTAMP(), :a1, :a2, :a3, :a4, :a5, :a6, :a7_1, :a7_2, :a7_3, :a8_1, :a8_2, :a8_3, :a9, :a10, :a11_1, :a11_2, :a11_3, :a12_1, :a12_2, :a12_3, :a12_4)";
        $s = $pdo->prepare($sql);
        $s->execute($placeholders);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd zapisywania ankiety do bazy danych: ' . $e;
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }
    header('Location: .?submit');
     
    exit();
}

if (isset($_REQUEST['start'])) {

    include $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconnect.inc.php';

    try {
        $sql = "SELECT id, value FROM questions";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd podczas pobierania pytań: ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }
    foreach ($result as $row) {
        $questions[] = array('id' => $row['id'], 'value' => $row['value']);
    }
    for ($i = 1; $i <= 12; $i++) {
        try {
            $sql = "SELECT answers.id, answers.value FROM questions INNER JOIN setsofanswers ON questions.id = setsofanswers.questionid INNER JOIN answers ON setsofanswers.answerid = answers.id WHERE questions.id = $i";
            $result = $pdo->query($sql);
        } catch (PDOException $e) {
            $error = 'Wystąpił błąd podczas pobierania pytań: ' . $e->getMessage();
            include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
            exit();
        }

        foreach ($result as $row) {
//                echo $i . " . " . $row['id'] . " . " . $row['value'] . "<BR>";
            $answers[$i - 1][] = array('id' => $row['id'], 'value' => $row['value']);
        }
    }
    //   echo $answers[2][2]['value'];
    $startdate = date( 'Y-m-d H:i:s');
    include $_SERVER['DOCUMENT_ROOT'] . '/html/ankieta.html.php';


    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . '/html/default.html.php';
//TODO:
//-max 3 checks
//-saving data to db
//-last checbox textarea activation
//-summary and printing scores
