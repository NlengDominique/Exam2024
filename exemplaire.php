<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire Exemplaire</title>
</head>
<body>
    <div class="container">
        <h2>Formulaire Exemplaire</h2>
        <form action="" method="post">
            <label for="">Date d'Acquisition :</label>
            <input type="date"  name="dateAquisition" required>

            <label for="">Durée de Vie :</label>
            <input type="text"  name="dureeVie" required>

            <label for="">Emprunteur :</label>
            <select name="codeBarreEmp" required>
                
                <option value="1">Emprunteur 1</option>
                <option value="2">Emprunteur 2</option>
               
            </select>

            <label >Rayon :</label>
            <select  name="numrayon" required>
              
                <option value="A">Rayon A</option>
                <option value="B">Rayon B</option>
               
            </select>

            <label>Ouvrage :</label>
            <select name="ISBN" required>
               
                <option value="101">101</option>
                <option value="102">102</option>
              
            </select>

            <input type="submit" value="Enregistrer">
        </form>
    </div>
</body>
</html>
