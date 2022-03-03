
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lake</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="2/css/all.min.css">
</head>

<body>
  
    <div class="kontener">
        <div class="lewy" id="btn1">
            <i class="fa-solid fa-arrow-left strzalkal"></i>
        </div>

        <div class="zdjecie">
            <img src="lake.jpg" id="zdj" alt="lake">
        </div>

        <div class="prawy" id="btn2">
            <i class="fa-solid fa-arrow-right strzalkap"></i>
        </div>
    </div>

    <?php
        $db = mysqli_connect ('localhost','root','','praktyki')
     or die ('Error connecting to MySQL server.');

         ?>
    

    <?php
                     $query = "SELECT * FROM ksiazka";
           mysqli_query($db, $query) or die('Error querying database.');
        ?>

        <?php
                  $result = mysqli_query($db, $query);
              $row = mysqli_fetch_array($result);

            

                while ($row = mysqli_fetch_array($result)) {
                     echo $row['opis'] . ' ' . $row['obraz'];

                }
                   ?>
    <script>

        var zdjecia = <?php echo json_encode($row); ?>;
        var n = 0;

        var image = document.getElementById('zdj');
        var przycisk1 = document.getElementById('btn1');
        var przycisk2 = document.getElementById('btn2');
        przycisk1.onclick=myFunction1;
        przycisk2.onclick=myFunction2;
        function myFunction1() {
            n--;
            if (n < 0) {
                n = zdjecia.length-1;
            console.log (n) 
            }
            
            image.src = zdjecia[n];
        }

        function myFunction2() {
            n++;
            if (n >= zdjecia.length) {
                n = 0;
                console.log (n)
            }
            image.src = zdjecia[n];
        } 
        

    
    </script>
   <form> 
   <input type="text" name="numer1" placeholder="Numer1">    
   <input type="text" name="numer2" placeholder="Numer2">
<select name="operator">
<option>Nic</option>
 <option>Dodaj</option>
 <option>Odejmij</option>
 <option>Pomnóż</option>
 <option>Podziel</option>
</select>
<br>
<button type="submit" name="submit" value="submit">Oblicz</button>

</form>
   <p>Wynik działań</p>
<?php 
    if(isset($_GET['submit'])) {
     $wynik1 =  $_GET['numer1'];
     $wynik2 =  $_GET['numer2'];
     $operator =  $_GET['operator'];
     switch ($operator) {
        case "Nic": 
        echo "Wybierz metode obliczeń";
        break;
        case "Dodaj": 
        echo $wynik1 + $wynik2;
        break;
        case "Odejmij": 
        echo $wynik1 - $wynik2;
        break;
        case "Pomnóż": 
        echo $wynik1 * $wynik2;
        break;
        case "Podziel": 
        echo $wynik1 / $wynik2;
        break;
     }
    }
?>

</body>

</html>