<?php
// Include config for all testcases
include __DIR__ . "/config.php";



// The title of the test case
$title = "Testing img for issue 29";



// Provide a short description of the testcase.
$description = "";



// Use these images in the test
$images = array(
    'issue29/400x265.jpg',
    'issue29/400x268.jpg',
    'issue29/400x300.jpg',
    'issue29/465x304.jpg',
    'issue29/640x273.jpg',
);



// For each image, apply these testcases 
$testcase = array(
    '&w=300&cf&q=80&nc',
    '&w=75&h=75&cf&q=80&nc',
    '&w=75&h=75&q=80',
);



// Applu testcases and present results
include __DIR__ . "/template.php";
