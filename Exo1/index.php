    <?php
            // Déclaration d'un tableau associatif (Slide 64)
            $etudiantNote = [ "JOHN" => 9,
                               "BOB" => 15.5 ,
                               "RAYANE " => 7,
                               "ROSIE" => 13,
                            ];
            // Déclaration d'une fonction (Slide 71)
            function  estAdmissible($note){
                 // Condition if / else (Slide 67)
                if($note >= 10){
                   return true;
                }
                else {
                  return false;
                }
            }                   
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    <table id="table1" border="1">
        <tr>
            <th>Etudiant</th>
            <th>Note</th>
        </tr>
        <?php
             // Parcours du tableau avec foreach (Slide 69)
            foreach($etudiantNote as $nom => $note){
                // Vérification de l'admissibilité (Slide 67)
                if(estAdmissible($note)){
                    $couleur = "rgb(136,248,136)";
                } 
                else{
                    $couleur = "rgb(251,173,173)";
                }
                 // Affichage des lignes du tableau (Slide 61)
                echo "<tr class='row'>";
                echo " <td class='etud'>$nom</td>";
                echo " <td class='note' style='background-color : $couleur'>$note</td>";
                echo "</tr>";
                
            }
            
        ?>
    </table>

</body>

</html>