<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Echo-Sonix</title>
        <meta charset="utf-8">
        <link href="Echo_Sonix_Statistiques.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <header>
        </header>

        <section class="bandeau_haut_de_pages">
            <div class="score_affichage">
                <img src="drapeau_France.jpg" class="n1">
                
                <div class="score+button">
                    
                    <div id="score">France 0 - 0 Uruguay</div>
                    <br>
                    <button class="mis_a_jour_Button" onclick="updateScore()">Mettre à jour le score</button>
                </div>
                
                <img src="drapeau_Uruguay.jpg" class="n1">
                <script>
                    function updateScore() {
                        var scoreEquipeA = Math.floor(Math.random()*5);
                        var scoreEquipeB = Math.floor(Math.random()*5);

                        document.getElementById('score').textContent =  'France  ' + scoreEquipeA + ' - '+ scoreEquipeB + '  Uruguay';
                    }
                </script>
            </div>
            
        </section>
        <br>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'line', // Changez le type de graphique ici (line, bar, pie, etc.)
                
                data: {
                    labels: ['10 min', '20 min', '30 min', '40 min', '50 min', '60 min','70 min','80 min','90 min'], // Ces labels représentent les points de données
                    datasets: [
                        {
                        label: 'Décibels Domicile', 
                        data: [60, 72, 85, 67, 78, 88, 89, 92, 84], 
                        backgroundColor: 'white',
                        borderColor: 'black',
                        borderWidth: 2
                        },
                        {
                        label: 'Décibels Visiteurs', 
                        data: [54, 63, 77, 85, 79, 77, 86, 84, 80], 
                        backgroundColor: 'white',
                        borderColor: 'limegreen',
                        borderWidth: 2
                    }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    
    <div id="button_paris">
            <a href="paris.php"><button class="mis_a_jour_Button">Paris</button></a>            
        </div>

       

    </body>
</html>