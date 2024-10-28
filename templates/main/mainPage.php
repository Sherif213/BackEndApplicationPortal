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
            // Show/hide program sections based on selected view
            document.getElementById('summerPrograms').style.display = season === 'summer' ? 'block' : 'none';
            document.getElementById('winterPrograms').style.display = season === 'winter' ? 'block' : 'none';

            // Update active toggle switch styles
            document.getElementById('listViewButton').classList.toggle('active', season === 'winter');
            document.getElementById('mapViewButton').classList.toggle('active', season === 'summer');
        }
    </script> 
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <?php include "include/others/mainPage.php" ?>

            <!-- Text Section -->
            <div class="text-section text-center my-4">
                <h1>CHOOSE YOUR PROGRAM</h1>
            </div>

            <!-- Toggle Switch for Season -->
            <div class="toggle-switch">
                <button id="listViewButton" class="active" onclick="toggleProgram('winter')">Winter Programs</button>
                <button id="mapViewButton" onclick="toggleProgram('summer')">Summer Programs</button>
            </div>

            <!-- Program Options -->
            <div id="winterPrograms" class="information-container" style="display: block;">
                <div class="buttons">
                    <a href="/unescoWinterPeaceProgramInfo" class="button" id="WinterPeace">Junior Peace</a>
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
                <?php include "include/others/footer.php" ?>
            </div>
        </div>
    </div>
</body>
</html>
