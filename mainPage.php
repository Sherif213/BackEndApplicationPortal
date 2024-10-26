<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="images/IAU.png">
    <title>UNESCO APPLICATION FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/selectionWindow.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script>
        function toggleProgram(season) {
            // Show/hide program sections
            document.getElementById('summerPrograms').style.display = season === 'summer' ? 'block' : 'none';
            document.getElementById('winterPrograms').style.display = season === 'winter' ? 'block' : 'none';

            // Update active button styles
            document.getElementById('summerButton').classList.toggle('active', season === 'summer');
            document.getElementById('winterButton').classList.toggle('active', season === 'winter');
        }
    </script>
    <style>
        /* Custom styles */
        .container {
            max-width: 900px;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .text-section h1 {
            font-size: 28px;
            font-weight: 700;
            color: #0056b3;
            margin-bottom: 10px;
        }

        .season-toggle {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 25px 0;
        }

        .season-toggle .btn {
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 8px;
        }

        .season-toggle .btn.active {
            background-color: #0056b3;
            color: #fff;
        }

        .information-container {
            background-color: #f9f9f9;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 100%;
        }


        .buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .button {
            padding: 15px 30px;
            background-color: #43766C;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include "include/mainPage.php" ?>

            <!-- Text Section -->
            <div class="text-section text-center my-4">
                <h1>CHOOSE YOUR PROGRAM</h1>
            </div>

            <!-- Season Toggle Buttons -->
            <div class="season-toggle">
                <button id="winterButton" class="btn btn-outline-secondary active" onclick="toggleProgram('winter')">Winter Programs</button>
                <button id="summerButton" class="btn btn-outline-primary" onclick="toggleProgram('summer')">Summer Programs</button>
            </div>

            <!-- Program Options -->
            <div id="winterPrograms" class="information-container" style="display: block;">
                <div class="buttons">
                    <a href="/unescoWinterPeaceProgramInfo" class="button" id="WinterPeace">Winter Peace</a>
                    <a href="/unescoWinterDiplomacyProgramInfo" class="button" id="WinterDiplomacy">Winter Diplomacy</a>
                </div>
            </div>

            <div id="summerPrograms" class="information-container" style="display: none;">
                <div class="buttons">
                    <a href="/unescoPeaceProgramInfo" class="button" id="Peace">Junior Peace</a>
                    <a href="/unescoSummerProgramInfo" class="button" id="Diplomacy">Summer Diplomacy</a>
                    <a href="/unescoMedicalProgramInfo" class="button" id="Medical">Summer Medical</a>
                    <a href="/unescoDentalProgramInfo" class="button" id="Dental">Summer Dental</a>
                </div>
            </div>

            <div class="bottomSection mt-4">
                <?php include "include/footer.php" ?>
            </div>
        </div>
    </div>
</body>

</html>
