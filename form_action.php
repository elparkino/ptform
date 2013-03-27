<?php

// define variables for required fields and error messages and initialize with empty values
$sampleTestErr = $sampleTest = '';
$nameFirstErr = $firstName = '';
$nameLastErr = $lastName = '';
$jobTitleErr = $jobTitle = '';
$schoolNameErr = $schoolName = '';
$cityErr = $city = '';
$emailErr = $email = '';
$emailVerifyErr = $emailVerify= '';



// define variables for required fields and error messages and initialize with empty values


$questions = "";
$phone = "";
$emailAdditional = "";
$emailAdditionalTwo = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["sample_test"])) {
        $sampleTestErr = "Please Select a Sample Test";
    }
    else {
        $sampleTest = $_POST["sample_test"];
    }
    if (empty($_POST["first_name"])) {
        $nameFirstErr = "Please tell us your First Name";
    }
    else {
        $firstName = $_POST["first_name"];
    }
    if (empty($_POST["last_name"])) {
        $nameLastErr = "Please Tell us your Last Name";
    }
    else {
        $lastName = $_POST["last_name"];
    }
    if (empty($_POST["job_title"])) {
        $jobTitleErr = "Please give us your Job Title";
    }
    else {
        $jobTitle = $_POST["job_title"];
    }

    if (empty($_POST["school_name"])) {
        $schoolNameErr = "Please tell us the name of your School";
    }
    else {
        $schoolName = $_POST["school_name"];
    }

    if (!isset($_POST["city_name"])) {
        $cityErr = "Please tell us what city you're in";
    }
    else {
        $city = $_POST["city_name"];
    }
    if (empty($_POST["email"]))  {
        $emailErr = "Please give us your e-mail address";
    }
    else {
        $emailVerify = $_POST["email"];
    }
    if (empty($_POST["email_verify"]))  {
        $emailVerifyErr = "Please verify your e-mail address";
    }
    else {
        $emailVerify = $_POST["email_verify"];
    }
}

?>