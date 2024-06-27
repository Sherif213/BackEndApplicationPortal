<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="aydin University" href="images/IAU.png">
    <title>UNESCO APPLICATION FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="src/css/selectionWindow.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include "include/mainPage.php" ?>


            <!-- Text Section -->
            <div class="text-section">
                <h1></h1>
            </div>

            <!-- Information Container -->
            <div class="information-container">
                <div class="section">
                    <h3 id="courseText">CHOOSE YOUR PROGRAM</h3>
                </div>
                <div class="section">
                    <div class="buttons">
                        <a href="/unescoPeaceProgramInfo" class="button" id="winter">Junior Peace</a>
                        <a href="/unescoSummerProgramInfo" class="button" id="summer">Summer Diplomacy</a>
                    </div>
                </div>

            </div>

            <div class="bottomSection">

            </div>
            <?php include "include/footer.php" ?>
        </div>
    </div>

</body>

</html>