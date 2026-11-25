<?php
    // Déclaration d'un tableau associatif (Slide 64)
    $serveurs = [
        "api-01" => ["cpu" => 45 , "ram" => 60 , "status" => "1" ],
        "api-02" => ["cpu" => 92 , "ram" => 78 , "status" => "1" ],
        "db-prod" => ["cpu" => 70 , "ram" => 95 , "status" => "1" ],
        "web-01" => ["cpu" => 30 , "ram" => 40 , "status" => "1" ],
        "web-02" => ["cpu" => 55 , "ram" => 65 , "status" => "0" ],
        "cache-01" => ["cpu" => 88 , "ram" => 92 , "status" => "1" ]
    ];
    // Déclaration et initialisation des variables (Slide 60)
    $total_online_servers = 0;
    $total_scores = 0;
    $best_score = -1;
    $best_serv = "";
    // Déclaration d'une fonction avec paramètres et return (Slide 71)
    function estCritique($ram, $cpu){
        if($cpu>85 || $ram >90){
            return true;
        }
        else{
            return false;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring des serveurs</title>
</head>
<body>
    <table id="table1" border="1">
        <tr>
            <th>Serveur</th>
            <th>CPU%</th>
            <th>RAM%</th>
            <th>Status</th>
            <th>Score</th>
            <th>Etat</th>
        </tr>
        <?php
            // Parcours du tableau associatif avec la boucle foreach (Slide 69)
            foreach($serveurs as $nom => $serveur){
                // Accès aux éléments du tableau associatif (Slide 64)
                $cpu = $serveur["cpu"];
                $ram = $serveur["ram"];
                $status = $serveur["status"];
                // Utilisation des opérateurs arithmétiques (Slide 66)
                $score = 100 - ($cpu + $ram) / 2;
                // Utilisation des conditions if, elseif et else (Slide 67)
                if(estCritique($ram, $cpu)){
                    $etat ="CRITIQUE"; 
                }
                elseif($score >= 50){
                    $etat = "OK";
                }
                else{
                    $etat = "ATTENTION";
                }
                // Utilisation des conditions if, elseif et else (Slide 67)
                if($status == "0"){
                    $couleur ="rgb(200,200,200)" ;
                }
                elseif($etat == "CRITIQUE"){
                    $couleur ="rgb(255,180,180)";
                }
                elseif($score >= 50){
                    $couleur ="rgb(180,255,180)";
                }
                else {
                    $couleur ="rgb(255,220,150)";
                }
                // Utilisation d'une condition et de l'opérateur d'incrémentation (Slides 66 et 67)
                if($status == "1"){
                    $total_online_servers++;
                }
                // Utilisation de l'opérateur d'affectation addition (Slide 66)
                $total_scores += $score;
                // Comparaison avec une condition if (Slide 67)
                if($score > $best_score){
                    $best_score = $score;
                    $best_serv = $nom;
                }
                // Affichage des résultats avec echo (Slide 61)
                 echo "<tr class='row' style='background-color:$couleur'>";
                 echo "<td class='serveur'>$nom</td>";
                 echo "<td class='cpu'>$cpu</td>";
                 echo "<td class='ram'>$ram</td>";
                if ($status == "1"){
                    $statusText = "online";
                }
                else{
                    $statusText ="offline";
                }
                echo "<td class='status'>$statusText</td>";
                echo "<td class='score'>$score</td>";
                echo "<td class='etat'>$etat</td>";
                echo "</tr>";
            }
                // Utilisation de la fonction native count() (Slide 65)
                $moy_scores =$total_scores / count($serveurs);

        ?>
    </table>
    
    <h3>Résumé</h3>
    <p>
        Serveurs online :
        <span id ="total_online_servers">
            <?php echo $total_online_servers;?>
        </span>
    </p>
    <p>
        Score moyen :
        <span id="moy_scores">
        <?php echo $moy_scores; ?>
        </span>
    </p>

    <p>
         Meilleur serveur :
        <span id="best_serv">
        <?php echo $best_serv . " (" . $best_score . ")"; ?>
        </span>
    </p>

</body>
</html>