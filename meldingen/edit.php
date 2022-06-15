<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp / Meldingen / Aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>

    <div class="container">
        <h1>Melding aanpassen</h1>

        <?php
        require_once '../backend/conn.php';
        $id = $_GET['id'];
        $query="SELECT * FROM meldingen WHERE id =:id";
        $statement = $conn->prepare($query);
        $statement->execute([":id" => $id]);
        $meldingen = $statement->fetch(PDO::FETCH_ASSOC);
        
        ?>

        <form action="../backend/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="attractie">Naam attractie:</label>
                <input type= "text" name ="titel" value="<?php echo $melding['attractie'];  ?>" id = "attractie">
            </div>
        
            <!-- Zorg dat het type wordt getoond, net als de naam hierboven -->
            <div class="form-group">
                <label for="capaciteit">Capaciteit p/uur:</label>
                <input type="number" min="0" name="capaciteit" id="capaciteit" class="form-input"
                    value="<?php echo $meldingen['capaciteit']; ?>">
            </div>
            <div class="form-group">
                <label for="prioriteit">Prio:</label>
                <!-- Let op: de checkbox blijft nu altijd uit, pas dit nog aan -->
                <input type="checkbox" name="prioriteit" id="prioriteit" value="<?php echo $meldingen['prioriteit']; ?>">
                <label for="prioriteit">Melding met prioriteit</label>
            </div>
            <div class="form-group"> 
                <label for="melder">Naam melder:</label>
                <!-- Voeg hieronder nog een value-attribuut toe, zoals bij capaciteit -->
                <input type="text" name="melder" id="melder" class="form-input" value="<?php echo $meldingen['melder']; ?>">
            </div>
            <div class="form-group">
                <label for="overige_info">Overige info:</label>
                <textarea name="overige_info" id="overige_info" class="form-input" rows="4"><?php echo $meldingen['overige_info']; ?> </textarea>
            </div>
            <input type="submit" value="Melding opslaan">
            
        </form>

            <form action="../backend/meldingenController.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Verwijder bericht">
        </form>
        </form>
    </div>  

</body>

</html>
