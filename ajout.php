
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Ajouter une Recette</title>
            </head>
            <body>
                <h1>Ajouter une Recette</h1>
                <form action="ajouter_recette.php" method="POST">
                    <label for="nom">Nom de la recette :</label>
                    <input type="text" id="nom" name="nom" required>
                    <br>
                    
                    <label for="preparation">Préparation :</label>
                    <textarea id="preparation" name="preparation" rows="5" required></textarea>
                    <br>
                    
                    <label for="difficulte">Difficulté :</label>
                    <select id="difficulte" name="difficulte">
                        <option value="1">Débutant</option>
                        <option value="2">Intermédiaire</option>
                        <option value="3">Expert</option>
                    </select>
                    <br>
            
                    <label for="image">ID de l'image (facultatif) :</label>
                    <input type="number" id="image" name="image">
                    <br>
                    
                    <button type="submit">Ajouter</button>
                </form>
            </body>
            </html>
            