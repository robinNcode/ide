<?php

use JetBrains\PhpStorm\Language;

$language = strtolower($_POST['language']);
    $code = $_POST['code'];

    $random = substr(md5(mt_rand()), 0, 7);

    //writing on file
    $file_path = "temp_data/".$random.".".$language;

    $program_file = fopen($file_path, "w");

    fwrite($program_file, $code);
    fclose($program_file);

    if($language == 'c'){
        $outputExe = $random . 'exe';
        shell_exec("gcc $file_path -o $outputExe 2>&1");

        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    else if($language == 'cpp'){
        $outputExe = $random . 'exe';
        shell_exec("g++ $file_path -o $outputExe 2>&1");

        $output = shell_exec(__DIR__ . "//$outputExe");
        echo $output;
    }
    else if($language == 'php'){
        $output = shell_exec("php $file_path 2>&1");
        echo $output;
    }
    else if($language == 'py'){
        $output = shell_exec("python $file_path 2>&1");
        echo $output;
    }
    else if($language == 'js'){
        $output = shell_exec("node $file_path 2>&1");
        echo $output;
    }
    
?>