<?php
include $_SERVER['DOCUMENT_ROOT'] . '/html/inc/header.html.inc.php';
?>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Czas rozpoczęcia</th>
                <th>Czas zakończenia</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <td><?php htmlout($record['id']); ?></td>
                    <td><?php htmlout($record['startdate']); ?></td>
                    <td><?php htmlout($record['enddate']); ?></td>
                    <td><?php htmlout($answers[$record['a1'] - 1]['value']); ?></td>
                    <td><?php htmlout($answers[$record['a2'] - 1]['value']); ?></td>
                    <td><?php htmlout($answers[$record['a3'] - 1]['value']); ?></td>
                    <td><?php htmlout($answers[$record['a4'] - 1]['value']); ?></td>
                    <td><?php htmlout($answers[$record['a5'] - 1]['value']); ?></td>
                    <td><?php
                        if ($record['a6'] != NULL) {
                            htmlout($record['a6']);
                        }
                        ?></td>
                    <td><?php
                        htmlout($answers[$record['a7_1'] - 1]['value']);
                        if ($record['a7_2'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a7_2'] - 1]['value']);
                        }
                        if ($record['a7_3'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a7_3'] - 1]['value']);
                        }
                        ?></td>
                    <td><?php
                        htmlout($answers[$record['a8_1'] - 1]['value']);
                        if ($record['a8_2'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a8_2'] - 1]['value']);
                        }
                        if ($record['a8_3'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a8_3'] - 1]['value']);
                        }
                        ?></td>
                    <td><?php htmlout($answers[$record['a9'] - 1]['value']); ?></td>
                    <td><?php htmlout($answers[$record['a10'] - 1]['value']); ?></td>
                    <td><?php
                        htmlout($answers[$record['a11_1'] - 1]['value']);
                        if ($record['a11_2'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a11_2'] - 1]['value']);
                        }
                        if ($record['a11_3'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a11_3'] - 1]['value']);
                        }
                        ?></td>
                    <td><?php
                        htmlout($answers[$record['a12_1'] - 1]['value']);
                        if ($record['a12_2'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a12_2'] - 1]['value']);
                        }
                        if ($record['a12_3'] != NULL) {
                            echo "<br />";
                            htmlout($answers[$record['a12_3'] - 1]['value']);
                        }
                        if ($record['a12_4'] != NULL) {
                            echo "<br />Inne:<br />";
                        htmlout($record['a12_4']);
                        }
                        ?></td>
                </tr>
<?php endforeach; ?>
        </tbody>

    </table>
</div>








<?php
include $_SERVER ['DOCUMENT_ROOT'] . '/html/inc/footer.html.inc.php';
?>