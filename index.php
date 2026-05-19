<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="WykresyTauron6.css">  
<link rel="shortcut icon" href="favicon.ico">
<title>Wykresy Tauron</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "tadek";
$password = "fafik777";
$db = "FRONIUS";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}
?>

<div id='WykresRamka250'>
  <div class="tytulWykresu">dzienna produkcja i oddana energia</div>
<?php

#$query = mysqli_query($dbconnect, "SELECT Id, ROUND(((TotalDay)/10),0) AS Bajty FROM `TRANSFER` ORDER BY Id DESC LIMIT 24")
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

$DataToday = date("Y-m-d");
$DzienBaza = strtotime('-30 days',strtotime($DataToday));
$DzienBaza = date('Y-m-d',$DzienBaza);
$queryzmienna = "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` WHERE Dzien > '$DzienBaza' ORDER BY Dzien";
$query = mysqli_query($dbconnect, $queryzmienna)
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

   or die (mysqli_error($dbconnect));
   $WysokoscRamka = 250;
   $kolorWykresRamka = "WykresRamkaKolor";
   #$WykresSlupekRamka = "<div id='WykresRamka'; class='".$kolorWykresRamka."' style='height:" .$WysokoscRamka. "px;'>";
   $i = 0;
   while ($row = mysqli_fetch_array($query)) {
    $EnergiaDzienna = $row['EnergiaDzienna']; 
    $TauronOddana = $row['TauronOddana'];
    $DzienTemp = $row['Dzien'];
    #$Dzien = date('Y-m-d',$DzienTemp);
    #$Dzien = $DzienTemp;
  
    $godzinaBaza = $DzienTemp;
    #echo gettype($godzina15);
    $godzinaBaza = strtotime('-15 minutes',strtotime($godzinaBaza));
    $Dzien = date('m/d',$godzinaBaza);
  
    $kolortemp = array("belek0","belek20","belek40","belek60","belek80");
    $kolorTlo = "belekTloBelka";
    
    $kolorNapis = "belekNapis";
    $kolorTauron = "belekTauron";
    $kolorFronius = "belekFronius";
    $kolorBackground = "belekBackground";
    $WysokoscGlowny = 200;
    
    $Wysokosc = round($EnergiaDzienna/1000,1);
    $WysokoscWykres = $Wysokosc * 4;
    $WysokoscTauron = round($TauronOddana/1000,1);
    $WysokoscTauronWykres = $WysokoscTauron * 4;
    $WysokoscBackground10 = 40;
    $WysokoscBackground20 = 80;
    $WysokoscBackground30 = 120;
    $WysokoscBackground40 = 160;
    
    
    $WykresSlupek0 = "<div id='Glowny'; class='".$kolorTlo."' style='height:" .$WysokoscGlowny. "px;'>";
    $WykresSlupekBackground10 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground10. "px;'></div>";
    $WykresSlupekBackground20 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground20. "px;'></div>";
    $WykresSlupekBackground30 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground30. "px;'></div>";
    $WykresSlupekBackground40 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground40. "px;'></div>";
    $WykresSlupekNapis = "<div id='SlupekNapis'; class='".$kolorNapis."' style='height:" .$WysokoscNapis. "px;'>$Wysokosc $Dzien</div>";
    $WykresSlupek1 = "<div id='belekszerokosc'; class='".$kolorFronius."' style='height:" .$WysokoscWykres. "px;'></div>";
    $WykresSlupek2 = "<div id='belekszerokosc'; class='".$kolorTauron."' style='height:" .$WysokoscTauronWykres. "px;'></div>";
    $WykresSlupek4 = "</div>";
    
    
    echo $WykresSlupek0;
    echo $WykresSlupekBackground10;
    echo $WykresSlupekBackground20;
    echo $WykresSlupekBackground30;
    echo $WykresSlupekBackground40;
    echo $WykresSlupekNapis;
    echo $WykresSlupek1;
    echo $WykresSlupek2;
    echo $WykresSlupek4;
    
   
     
   }
   
   #echo $WykresSlupekRamka;
?>
</div>
<br>



<div id='WykresRamka250' class='WykresRamkaPobrana'>
  <div class="tytulWykresu">dzienna produkcja i zużyta energia</div>
<?php

######################################### OSTATNI WYKRES - WYKRES 2 #####################

#$query = mysqli_query($dbconnect, "SELECT Id, ROUND(((TotalDay)/10),0) AS Bajty FROM `TRANSFER` ORDER BY Id DESC LIMIT 24")
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

$DataToday = date("Y-m-d");
$DzienBaza = strtotime('-30 days',strtotime($DataToday));
$DzienBaza = date('Y-m-d',$DzienBaza);
$queryzmienna = "SELECT Dzien,EnergiaDzienna, TauronPobrana FROM `EnergiaAutokonsumpcja` WHERE Dzien > '$DzienBaza' ORDER BY Dzien";
$query = mysqli_query($dbconnect, $queryzmienna)
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

   or die (mysqli_error($dbconnect));
   $WysokoscRamka = 250;
   $kolorWykresRamka = "WykresRamkaKolor";
   #$WykresSlupekRamka = "<div id='WykresRamka'; class='".$kolorWykresRamka."' style='height:" .$WysokoscRamka. "px;'>";
   $i = 0;
   while ($row = mysqli_fetch_array($query)) {
    $EnergiaDzienna = $row['EnergiaDzienna']; 
    $TauronOddana = $row['TauronPobrana'];
    $DzienTemp = $row['Dzien'];
    #$Dzien = date('Y-m-d',$DzienTemp);
    #$Dzien = $DzienTemp;
  
    $godzinaBaza = $DzienTemp;
    #echo gettype($godzina15);
    $godzinaBaza = strtotime('-15 minutes',strtotime($godzinaBaza));
    $Dzien = date('m/d',$godzinaBaza);
  
    $kolortemp = array("belek0","belek20","belek40","belek60","belek80");
    $kolorTlo = "belekTloBelka";
    
    $kolorNapis = "belekNapis";
    $kolorTauron = "belekTauron";
    $kolorFronius = "belekFronius";
    $kolorBackground = "belekBackground";
    $WysokoscGlowny = 200;
    
    $Wysokosc = round($EnergiaDzienna/1000,1);
    $WysokoscWykres = $Wysokosc * 4;
    $WysokoscTauron = round($TauronOddana/1000,1);
    $WysokoscTauronWykres = $WysokoscTauron * 4;
    $WysokoscBackground10 = 40;
    $WysokoscBackground20 = 80;
    $WysokoscBackground30 = 120;
    $WysokoscBackground40 = 160;
    $WysokoscBackground50 = 200;
    
    
    $WykresSlupek0 = "<div id='Glowny'; class='".$kolorTlo."' style='height:" .$WysokoscGlowny. "px;'>";
    $WykresSlupekBackground10 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground10. "px;'></div>";
    $WykresSlupekBackground20 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground20. "px;'></div>";
    $WykresSlupekBackground30 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground30. "px;'></div>";
    $WykresSlupekBackground40 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground40. "px;'></div>";
    
    $WykresSlupekNapis = "<div id='SlupekNapis'; class='".$kolorNapis."' style='height:" .$WysokoscNapis. "px;'>$WysokoscTauron $Dzien</div>";
    $WykresSlupek1 = "<div id='belekszerokosc'; class='".$kolorFronius."' style='height:" .$WysokoscWykres. "px;'></div>";
    $WykresSlupek2 = "<div id='belekszerokosc'; class='".$kolorTauron."' style='height:" .$WysokoscTauronWykres. "px;'></div>";
    $WykresSlupek4 = "</div>";
    
    
    echo $WykresSlupek0;
    echo $WykresSlupekBackground10;
    echo $WykresSlupekBackground20;
    echo $WykresSlupekBackground30;
    echo $WykresSlupekBackground40;
    
    echo $WykresSlupekNapis;
    echo $WykresSlupek1;
    echo $WykresSlupek2;
    echo $WykresSlupek4;
    
   
     
   }
   
   #echo $WykresSlupekRamka;
?>
</div>


</br>

<div id='WykresRamka250'>
  <div class="tytulWykresu">miesięczne zużycie energii - strefy</div>
<?php
#################  WYKRES TARYFY ##################

#$query = mysqli_query($dbconnect, "SELECT Id, ROUND(((TotalDay)/10),0) AS Bajty FROM `TRANSFER` ORDER BY Id DESC LIMIT 24")
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

$queryzmienna = "CALL RaportTaryfyEveryMonth();";
$query = mysqli_query($dbconnect, $queryzmienna)
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

   or die (mysqli_error($dbconnect));
   $WysokoscRamka = 250;
   $kolorWykresRamka = "WykresRamkaKolor";
   #$WykresSlupekRamka = "<div id='WykresRamka'; class='".$kolorWykresRamka."' style='height:" .$WysokoscRamka. "px;'>";
   $i = 0;
   while ($row = mysqli_fetch_array($query)) {
    $EnergiaPobranaTania = $row['ConsumedTania']; 
    $EnergiaPobranaSrednia = $row['ConsumedSrednia'];
    $EnergiaPobranaDroga = $row['ConsumedDroga'];
    $DzienTemp = $row['Month'];
    $YearTemp = $row['Year'];
    #$Dzien = date('Y-m-d',$DzienTemp);
    $Dzien = "$YearTemp/$DzienTemp";
  
      
    $kolorTlo = "belekTloBelka";
    
    $kolorNapis = "belekNapis";
    $kolorTauron = "belekTauron";
    $kolorTania = "belekTania";
    $kolorSrednia = "belekSrednia";
    $kolorDroga = "belekDroga";
    $kolorBackground = "belekBackground";
    $WysokoscGlowny = 200;
    
    $EnergiaPobranaTaniaLegenda = round($EnergiaPobranaTania,0);
    $WysokoscTania = round($EnergiaPobranaTania/10,0);
    $WysokoscWykresTania = $WysokoscTania * 2;

    $EnergiaPobranaSredniaLegenda = round($EnergiaPobranaSrednia,0);
    $WysokoscSrednia = round($EnergiaPobranaSrednia/10,0);
    $WysokoscWykresSrednia = $WysokoscSrednia * 2;

    $EnergiaPobranaDrogaLegenda = round($EnergiaPobranaDroga,0);
    $WysokoscDroga = round($EnergiaPobranaDroga/10,0);
    $WysokoscWykresDroga = $WysokoscDroga *2;
    $PozycjaWykresDroga = $WysokoscWykresTania + $WysokoscWykresSrednia;
    $EnergiaPobranaCalaEnergia =  $EnergiaPobranaTaniaLegenda +  $EnergiaPobranaSredniaLegenda +  $EnergiaPobranaDrogaLegenda;
   
    $WysokoscBackground10 = 40;
    $WysokoscBackground20 = 80;
    $WysokoscBackground30 = 120;
    $WysokoscBackground40 = 160;
    
    
    $WykresSlupek0 = "<div id='Glowny'; class='".$kolorTlo."' style='height:" .$WysokoscGlowny. "px;'>";
    $WykresSlupekBackground10 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground10. "px;'></div>";
    $WykresSlupekBackground20 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground20. "px;'></div>";
    $WykresSlupekBackground30 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground30. "px;'></div>";
    $WykresSlupekBackground40 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground40. "px;'></div>";
    $WykresSlupekNapis = "<div id='SlupekNapis'; class='".$kolorNapis."' style='height:" .$WysokoscNapis. "px;'>$EnergiaPobranaCalaEnergia $Dzien</div>";
    $WykresSlupekTania = "<div id='belekszerokosc'; class='".$kolorTania."' style='height:" .$WysokoscWykresTania. "px;'></div>";
    $WykresSlupekSrednia = "<div id='belekszerokosc'; class='".$kolorSrednia."' style='height:" .$WysokoscWykresSrednia. "px; bottom:" .$WysokoscWykresTania. "px;'></div>";
    $WykresSlupekDroga = "<div id='belekszerokosc'; class='".$kolorDroga."' style='height:" .$WysokoscWykresDroga. "px; bottom:" .$PozycjaWykresDroga. "px;'></div>";
    $WykresSlupek4 = "</div>";
    
    
    echo $WykresSlupek0;
    echo $WykresSlupekBackground10;
    echo $WykresSlupekBackground20;
    echo $WykresSlupekBackground30;
    echo $WykresSlupekBackground40;
    echo $WykresSlupekNapis;
    echo $WykresSlupekDroga;
    echo $WykresSlupekSrednia;
    echo $WykresSlupekTania;    
    echo $WykresSlupek4;   
    $dbconnect->close(); 
   }
   $WykresSlupekRamka = "</div>";
   #echo $WykresSlupekRamka;
?>
</div>

</br>

<div id='WykresRamka300' class='WykresRamkaPobrana'>
  <div class="tytulWykresu">miesięczne zużycie energii + autokonsumpcja - strefy</div>

<?php
######################################### OSTATNI WYKRES - WYKRES 3 #####################

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

$queryzmienna3 = "CALL RaportTaryfyAutokonsumpcjaEveryMonthTemp3();";
$query3 = mysqli_query($dbconnect, $queryzmienna3)
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

   or die (mysqli_error($dbconnect));
   $WysokoscRamka = 250;
   $kolorWykresRamka = "WykresRamkaKolor";
   #$WykresSlupekRamka = "<div id='WykresRamka'; class='".$kolorWykresRamka."' style='height:" .$WysokoscRamka. "px;'>";
   $i = 0;
   while ($row = mysqli_fetch_array($query3)) {
    $EnergiaPobranaTania = $row['ConsumedTania']; 
    $EnergiaPobranaSrednia = $row['ConsumedSrednia'];
    $EnergiaPobranaDroga = $row['ConsumedDroga'];
    $EnergiaAutokonsumpcja = $row['Autokonsumpcja'];
    $Dzien = $row['RokMiesiac'];
    #$Rok = $row['Year'];
    #$Miesiac = $row['Month'];
    #$RokMiesiac = "$Rok/$Miesiac";
    #$RokMiesiac = "$Dzien";

         
    $kolorTlo = "belekTloBelka";
    
    $kolorNapis = "belekNapis";
    $kolorNapis1 = "belekNapis1";
    $kolorNapis2 = "belekNapis2";
    $kolorNapis3 = "belekNapis3";
    $kolorTauron = "belekTauron";
    $kolorTania = "belekTania";
    $kolorSrednia = "belekSrednia";
    $kolorDroga = "belekDroga";
    $kolorAutokonsumpcja = "belekAutokonsumpcja";
    $kolorBackground = "belekBackground";
    $WysokoscGlowny = 240;
    $WysokoscNapis1 = 15;
    $WysokoscNapis2 = 15;
    $WysokoscNapis3 = 15;
    
    $EnergiaPobranaTaniaLegenda = round($EnergiaPobranaTania,0);
    $EnergiaPobranaTaniaWysokosc = round($EnergiaPobranaTaniaLegenda/10,0);
    $EnergiaPobranaTaniaWykres = $EnergiaPobranaTaniaWysokosc* 2;

    $EnergiaPobranaSredniaLegenda = round($EnergiaPobranaSrednia,0);
    $EnergiaPobranaSredniaWysokosc = round($EnergiaPobranaSredniaLegenda/10,0);
    $EnergiaPobranaSredniaWykres = $EnergiaPobranaSredniaWysokosc* 2;

    $EnergiaPobranaDrogaLegenda = round($EnergiaPobranaDroga,0);
    $EnergiaPobranaDrogaWysokosc = round($EnergiaPobranaDrogaLegenda/10,0);
    $EnergiaPobranaDrogaWykres = $EnergiaPobranaDrogaWysokosc* 2;
    
    $EnergiaAutokonsumpcjaLegenda = round($EnergiaAutokonsumpcja,0);
    $WysokoscAutokonsumpcja = round($EnergiaAutokonsumpcja/10,0);
    $WysokoscWykresAutokonsumpcja = $WysokoscAutokonsumpcja *2;

    $PozycjaWykresSrednia= $EnergiaPobranaTaniaWykres;
    $PozycjaWykresDroga= $EnergiaPobranaTaniaWykres + $EnergiaPobranaSredniaWykres;
    $PozycjaWykresAutokonsumpcja= $EnergiaPobranaTaniaWykres + $EnergiaPobranaSredniaWykres + $EnergiaPobranaDrogaWykres;

    $EnergiaPobranaCalaEnergiaLegenda =  $EnergiaPobranaTaniaLegenda +  $EnergiaPobranaSredniaLegenda + $EnergiaPobranaDrogaLegenda + $EnergiaAutokonsumpcjaLegenda;
      
    $WysokoscBackground10 = 40;
    $WysokoscBackground20 = 80;
    $WysokoscBackground30 = 120;
    $WysokoscBackground40 = 160;
    $WysokoscBackground50 = 200;
    
    
    $WykresSlupek0 = "<div id='Glowny'; class='".$kolorTlo."' style='height:" .$WysokoscGlowny. "px;'>";
    $WykresSlupekBackground10 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground10. "px;'></div>";
    $WykresSlupekBackground20 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground20. "px;'></div>";
    $WykresSlupekBackground30 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground30. "px;'></div>";
    $WykresSlupekBackground40 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground40. "px;'></div>";
    $WykresSlupekBackground50 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground50. "px;'></div>";
    $WykresSlupekNapis1 = "<div id='SlupekNapis'; class='".$kolorNapis1."' style='height:" .$WysokoscNapis1. "px;'>$EnergiaAutokonsumpcjaLegenda</div>";
    $WykresSlupekNapis2 = "<div id='SlupekNapis'; class='".$kolorNapis2."' style='height:" .$WysokoscNapis2. "px;'>$EnergiaPobranaCalaEnergiaLegenda</div>";
    $WykresSlupekNapis3 = "<div id='SlupekNapis'; class='".$kolorNapis3."' style='height:" .$WysokoscNapis3. "px;'>$Dzien</div>";

    $WykresSlupekTania = "<div id='SlupekNapis';  class='".$kolorTania."' style='height:" .$EnergiaPobranaTaniaWykres. "px;'></div>";
    $WykresSlupekSrednia = "<div id='SlupekNapis';  class='".$kolorSrednia."' style='height:" .$EnergiaPobranaSredniaWykres. "px; bottom:" .$PozycjaWykresSrednia.  "px;'></div>";
    $WykresSlupekDroga = "<div id='SlupekNapis';  class='".$kolorDroga."' style='height:" .$EnergiaPobranaDrogaWykres. "px; bottom:" .$PozycjaWykresDroga. "px;'></div>";
    $WykresSlupekAutokonsumpcja = "<div id='SlupekNapis';  class='".$kolorAutokonsumpcja."' style='height:" .$WysokoscWykresAutokonsumpcja. "px; bottom:" .$PozycjaWykresAutokonsumpcja. "px;'></div>";
    #$WykresSlupekAutokonsumpcja = "<div class='".$kolorAutokonsumpcja."' style='height:" .$WysokoscWykresAutokonsumpcja. "px; bottom:" .$PozycjaWykresAutokonsumpcja. "px;'></div>";

    echo $WykresSlupek0;
    echo $WykresSlupekBackground10;
    echo $WykresSlupekBackground20;
    echo $WykresSlupekBackground30;
    echo $WykresSlupekBackground40;
    echo $WykresSlupekBackground50;
    
    echo $WykresSlupekNapis1;
    echo $WykresSlupekNapis2;
    echo $WykresSlupekNapis3;    
    echo $WykresSlupekTania;
    echo $WykresSlupekSrednia;
    echo $WykresSlupekDroga;
    echo $WykresSlupekAutokonsumpcja;
            
    echo $WykresSlupek4;   
     
   }
   $WykresSlupekRamka = "</div>";
   echo $WykresSlupekRamka;

?>
</div>
<br>
<div id='WykresRamka300' class='WykresRamkaPobrana'>
  <div class="tytulWykresu">miesięczna produkcja i wysłana energia</div>

<?php
######################################### OSTATNI WYKRES - WYKRES 4 #####################

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}

$queryzmienna4 = "CALL RaportOddanaEveryMonth();";
$query4 = mysqli_query($dbconnect, $queryzmienna4)
#$query = mysqli_query($dbconnect, "SELECT Dzien,EnergiaDzienna, TauronOddana FROM `EnergiaAutokonsumpcja` ORDER BY Dzien DESC LIMIT 30 ")

   or die (mysqli_error($dbconnect));
   $WysokoscRamka = 250;
   $kolorWykresRamka = "WykresRamkaKolor";
   #$WykresSlupekRamka = "<div id='WykresRamka'; class='".$kolorWykresRamka."' style='height:" .$WysokoscRamka. "px;'>";
   $i = 0;
   while ($row = mysqli_fetch_array($query4)) {
    $EnergiaTauronOddana = $row['TotalTauronOddana_kWh']; 
    $EnergiaDziennaCala = $row['TotalEnergiaDzienna_kWh'];
    $EnergiaAutokonsumpcja = $$EnergiaDziennaCala - $EnergiaTauronOddana;
    $Dzien = $row['RokMiesiac'];
         
    $kolorTlo = "belekTloBelka";
    
    $kolorNapis = "belekNapis";
    $kolorNapis1 = "belekNapis1";
    $kolorNapis2 = "belekNapis2";
    $kolorNapis3 = "belekNapis3";
    $kolorTauron = "belekTauron";
    $kolorTania = "belekTania";
    $kolorSrednia = "belekSrednia";
    $kolorDroga = "belekDroga";
    $kolorBackground = "belekBackground";
    $WysokoscGlowny = 240;
    $WysokoscNapis1 = 15;
    $WysokoscNapis2 = 15;
    $WysokoscNapis3 = 15;
    
    $EnergiaTauronOddanaLegenda = round($EnergiaTauronOddana,0);
    $EnergiaTauronWysokosc = round($EnergiaTauronOddanaLegenda/10,0);
    $EnergiaTauronWykres = $EnergiaTauronWysokosc* 2;

    $EnergiaDziennaCalaLegenda = round($EnergiaDziennaCala,0);
    $EnergiaCalaWysokosc = round($EnergiaDziennaCalaLegenda/10,0);
    $EnergiaCalaWykres = $EnergiaCalaWysokosc* 2;
    
      
    $WysokoscBackground10 = 40;
    $WysokoscBackground20 = 80;
    $WysokoscBackground30 = 120;
    $WysokoscBackground40 = 160;
    $WysokoscBackground50 = 200;
    
    
    $WykresSlupek0 = "<div id='Glowny'; class='".$kolorTlo."' style='height:" .$WysokoscGlowny. "px;'>";
    $WykresSlupekBackground10 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground10. "px;'></div>";
    $WykresSlupekBackground20 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground20. "px;'></div>";
    $WykresSlupekBackground30 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground30. "px;'></div>";
    $WykresSlupekBackground40 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground40. "px;'></div>";
    $WykresSlupekBackground50 = "<div id='belekBackground'; class='".$kolorBackground."' style='height:" .$WysokoscBackground50. "px;'></div>";
    $WykresSlupekNapis1 = "<div id='SlupekNapis'; class='".$kolorNapis1."' style='height:" .$WysokoscNapis1. "px;'>$EnergiaTauronOddanaLegenda</div>";
    $WykresSlupekNapis2 = "<div id='SlupekNapis'; class='".$kolorNapis2."' style='height:" .$WysokoscNapis2. "px;'>$EnergiaDziennaCalaLegenda</div>";
    $WykresSlupekNapis3 = "<div id='SlupekNapis'; class='".$kolorNapis3."' style='height:" .$WysokoscNapis3. "px;'>$Dzien</div>";
    $WykresSlupekCala = "<div id='belekszerokosc'; class='".$kolorFronius."' style='height:" .$EnergiaCalaWykres. "px;'></div>";
    $WykresSlupekTauronOddana = "<div id='belekszerokosc'; class='".$kolorTauron."' style='height:" .$EnergiaTauronWykres. "px;'></div>";
    
    $WykresSlupek4 = "</div>";
    
    
    echo $WykresSlupek0;
    echo $WykresSlupekBackground10;
    echo $WykresSlupekBackground20;
    echo $WykresSlupekBackground30;
    echo $WykresSlupekBackground40;
    echo $WykresSlupekBackground50;
    echo $WykresSlupekNapis1;
    echo $WykresSlupekNapis2;
    echo $WykresSlupekNapis3;
    
    echo $WykresSlupekCala;
    echo $WykresSlupekTauronOddana;
            
    echo $WykresSlupek4;   
     
   }
   $WykresSlupekRamka = "</div>";
   echo $WykresSlupekRamka;
?>

        
</body>
  
</html>
