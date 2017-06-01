<?php
    namespace test;

    require("../vendor/autoload.php");

    use src\Inflection;

    Inflection::irregular ([
        "papel" => "papeis"
    ]);

    echo Inflection::pluralize("test");
    echo "<br>";
    echo Inflection::singularize("tests");