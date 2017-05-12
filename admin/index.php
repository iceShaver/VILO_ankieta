<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.inc.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/access.inc.php';


if (!userIsLoggedIn()) {
    include $_SERVER['DOCUMENT_ROOT'] . '/html/login.html.php';
    exit();
}


if (!userIsAdmin()) {
    echo "Nie masz uprawnień do przeglądania tej strony";
    exit();
}

if (isset($_GET['view_records'])) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconnect.inc.php';

    try {
        $sql = "SELECT * FROM scores";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd podczas odczytywania rekordów z bazy danych' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }
    $records = $result->fetchAll();
    try {
        $sql = "SELECT * FROM answers";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd podczas odczytywania rekordów z bazy danych' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }
    $answers = $result->fetchAll();





    $title = "Wszystkie rekordy";
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/html/records.html.php';
    exit();
}





if (isset($_GET['table'])) {
    $title = "Tabela wyników";
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/html/table.html.php';
    exit();
}

if (isset($_GET['stats'])) {
    $title = "Statystyki";
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
    try {
        $sql = "SELECT COUNT(*) FROM scores";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd podczas pobierania pytań: ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }
    $s = $result->fetch();
    $numberOfRecords = $s[0];






    try {
        $sql = "SELECT * FROM scores";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd podczas odczytywania rekordów z bazy danych' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }



//A1


    $a[1][1] = 0;
    $a[1][2] = 0;
    $a[2][1] = 0;
    $a[2][2] = 0;
    $a[2][3] = 0;
    $a[3][4] = 0;
    $a[3][5] = 0;
    $a[3][6] = 0;
    $a[3][7] = 0;
    $a[3][8] = 0;
    $a[3][9] = 0;
    $a[4][1] = 0;
    $a[4][2] = 0;
    $a[4][3] = 0;
    $a[5][1] = 0;
    $a[5][2] = 0;
    $a[7][10] = 0;
    $a[7][11] = 0;
    $a[7][12] = 0;
    $a[7][13] = 0;
    $a[7][14] = 0;
    $a[7][15] = 0;
    $a[8][16] = 0;
    $a[8][17] = 0;
    $a[8][18] = 0;
    $a[8][19] = 0;
    $a[8][20] = 0;
    $a[8][21] = 0;
    $a[9][1] = 0;
    $a[9][2] = 0;
    $a[9][3] = 0;
    $a[10][1] = 0;
    $a[10][2] = 0;
    $a[11][22] = 0;
    $a[11][23] = 0;
    $a[11][24] = 0;
    $a[11][25] = 0;
    $a[11][26] = 0;
    $a[11][27] = 0;
    $a[11][28] = 0;
    $a[12][29] = 0;
    $a[12][30] = 0;
    $a[12][31] = 0;
    $a[12][32] = 0;
    $a[12][33] = 0;
    $a[12][34] = 0;
    $a[12][35] = 0;
    $a[12][36] = 0;
    $a[12][37] = 0;
    $a[12][38] = 0;
    foreach ($result as $row) {
        if ($row['a1'] == 1) {
            $a[1][1] ++;
        } else {
            $a[1][2] ++;
        }
        if ($row['a2'] == 1) {
            $a[2][1] ++;
        } else if ($row['a2'] == 2) {

            $a[2][2] ++;
        } else {
            $a[2][3] ++;
        }
        if ($row['a3'] == 4) {
            $a[3][4] ++;
        } else if ($row['a3'] == 5) {
            $a[3][5] ++;
        } else if ($row['a3'] == 6) {
            $a[3][6] ++;
        } else if ($row['a3'] == 7) {
            $a[3][7] ++;
        } else if ($row['a3'] == 8) {
            $a[3][8] ++;
        } else {
            $a[3][9] ++;
        }
        if ($row['a4'] == 1) {
            $a[4][1] ++;
        } else if ($row['a4'] == 2) {
            $a[4][2] ++;
        } else {
            $a[4][3] ++;
        }
        if ($row['a5'] == 1) {
            $a[5][1] ++;
        } else {
            $a[5][2] ++;
        }
        if ($row['a7_1'] == 10 || $row['a7_2'] == 10 || $row['a7_3'] == 10) {
            $a[7][10] ++;
        }if ($row['a7_1'] == 11 || $row['a7_2'] == 11 || $row['a7_3'] == 11) {
            $a[7][11] ++;
        } if ($row['a7_1'] == 12 || $row['a7_2'] == 12 || $row['a7_3'] == 12) {
            $a[7][12] ++;
        } if ($row['a7_1'] == 13 || $row['a7_2'] == 13 || $row['a7_3'] == 13) {
            $a[7][13] ++;
        } if ($row['a7_1'] == 14 || $row['a7_2'] == 14 || $row['a7_3'] == 14) {
            $a[7][14] ++;
        } if ($row['a7_1'] == 15 || $row['a7_2'] == 15 || $row['a7_3'] == 15) {
            $a[7][15] ++;
        }
        if ($row['a8_1'] == 16 || $row['a8_2'] == 16 || $row['a8_3'] == 16) {
            $a[8][16] ++;
        }if ($row['a8_1'] == 17 || $row['a8_2'] == 17 || $row['a8_3'] == 17) {
            $a[8][17] ++;
        } if ($row['a8_1'] == 18 || $row['a8_2'] == 18 || $row['a8_3'] == 18) {
            $a[8][18] ++;
        } if ($row['a8_1'] == 19 || $row['a8_2'] == 19 || $row['a8_3'] == 19) {
            $a[8][19] ++;
        } if ($row['a8_1'] == 20 || $row['a8_2'] == 20 || $row['a8_3'] == 20) {
            $a[8][20] ++;
        } if ($row['a8_1'] == 21 || $row['a8_2'] == 21 || $row['a8_3'] == 21) {
            $a[8][21] ++;
        }
        if ($row['a9'] == 1) {
            $a[9][1] ++;
        } else if ($row['a9'] == 2) {
            $a[9][2] ++;
        } else {
            $a[9][3] ++;
        }
        if ($row['a10'] == 1) {
            $a[10][1] ++;
        } else {
            $a[10][2] ++;
        }
        if ($row['a11_1'] == 22 || $row['a11_2'] == 22 || $row['a11_3'] == 22) {
            $a[11][22] ++;
        }if ($row['a11_1'] == 23 || $row['a11_2'] == 23 || $row['a11_3'] == 23) {
            $a[11][23] ++;
        } if ($row['a11_1'] == 24 || $row['a11_2'] == 24 || $row['a11_3'] == 24) {
            $a[11][24] ++;
        } if ($row['a11_1'] == 25 || $row['a11_2'] == 25 || $row['a11_3'] == 25) {
            $a[11][25] ++;
        } if ($row['a11_1'] == 26 || $row['a11_2'] == 26 || $row['a11_3'] == 26) {
            $a[11][26] ++;
        } if ($row['a11_1'] == 27 || $row['a11_2'] == 27 || $row['a11_3'] == 27) {
            $a[11][27] ++;
        } if ($row['a11_1'] == 28 || $row['a11_2'] == 28 || $row['a11_3'] == 28) {
            $a[11][28] ++;
        }
        if ($row['a12_1'] == 29 || $row['a12_2'] == 29 || $row['a12_3'] == 29) {
            $a[12][29] ++;
        }if ($row['a12_1'] == 30 || $row['a12_2'] == 30 || $row['a12_3'] == 30) {
            $a[12][30] ++;
        } if ($row['a12_1'] == 31 || $row['a12_2'] == 31 || $row['a12_3'] == 31) {
            $a[12][31] ++;
        } if ($row['a12_1'] == 32 || $row['a12_2'] == 32 || $row['a12_3'] == 32) {
            $a[12][32] ++;
        } if ($row['a12_1'] == 33 || $row['a12_2'] == 33 || $row['a12_3'] == 33) {
            $a[12][33] ++;
        } if ($row['a12_1'] == 34 || $row['a12_2'] == 34 || $row['a12_3'] == 34) {
            $a[12][34] ++;
        } if ($row['a12_1'] == 35 || $row['a12_2'] == 35 || $row['a12_3'] == 35) {
            $a[12][35] ++;
        }if ($row['a12_1'] == 36 || $row['a12_2'] == 36 || $row['a12_3'] == 36) {
            $a[12][36] ++;
        }if ($row['a12_1'] == 37 || $row['a12_2'] == 37 || $row['a12_3'] == 37) {
            $a[12][37] ++;
        }if ($row['a12_1'] == 38 || $row['a12_2'] == 38 || $row['a12_3'] == 38) {
            $a[12][38] ++;
        }
    }

    include $_SERVER['DOCUMENT_ROOT'] . '/admin/html/stats.html.php';
    exit();
}

if (isset($_GET['question6'])) {
    $title = "Odpowiedzi otwarte na pytanie 6";
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconnect.inc.php';

    try {
        $sql = "SELECT a6 FROM scores WHERE a6 != ''";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd podczas pobierania pytań: ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }
    
    foreach ($result as $row) {
        $answers[] = $row['a6'];
    }
        include $_SERVER['DOCUMENT_ROOT'] . '/admin/html/openquestions.html.php';
        exit();
}

if (isset($_GET['question12'])) {
    $title = "Odpowiedzi otwarte na pytanie 12";
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/dbconnect.inc.php';

    try {
        $sql = "SELECT a12_4 FROM scores WHERE a12_4 != ''";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $error = 'Wystąpił błąd podczas pobierania pytań: ' . $e->getMessage();
        include $_SERVER['DOCUMENT_ROOT'] . '/html/error.html.php';
        exit();
    }
    
    foreach ($result as $row) {
        $answers[] = $row['a12_4'];
    }
        include $_SERVER['DOCUMENT_ROOT'] . '/admin/html/openquestions.html.php';
        exit();
}
include $_SERVER['DOCUMENT_ROOT'] . '/admin/html/blank.html.php';



