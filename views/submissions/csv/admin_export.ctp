<?php
$csv->addRow($fields);

foreach($submissions as $submission){
    $csv->addRow($submission);
}

echo $csv->render('export.csv');
?>