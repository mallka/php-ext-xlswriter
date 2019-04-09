<?php

$config = [
    'path' => './tests'
];

$fileObject  = new \Vtiful\Kernel\Excel($config);

$fileObject = $fileObject->fileName('tutorial.xlsx');
$fileHandle = $fileObject->getHandle();

$chart         = new \Vtiful\Kernel\Chart($fileHandle, \Vtiful\Kernel\Chart::CHART_LINE);
$chartResource = $chart->series('Sheet1!$A$2:$A$7')->toResource();

$filePath = $fileObject->header(['number'])
    ->data([
        [10],
        [40],
        [50],
        [20],
        [10],
        [50],
    ])
    ->insertChart(0, 3, $chartResource)
    ->output();