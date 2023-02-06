<?php
/*
HF consultancy wants to build a very simple commission-calculating calculator for their Admission agents. Usually, the commission is twenty-five percent of the tuition fee if the tuition is above twenty thousand dollars. But if the tuition fee is above ten thousand dollars but less than twenty thousand dollars, the commission is twenty percent. If the tuition fee is less than ten thousand dollars but greater than seven thousand dollars,  the commission rate is fifteen percent. If the tuition fee is below seven thousand dollars the data will be invalid. As a developer please help HF Consultancy for building this simple calculator using a ternary operator in Php.
*/
//since the problem said "Above 20,000 Dollars I am assuming you meant amount starting from 20,001 Dollars for the first condition"

$tution_fees = 200;

$commission = $tution_fees > 20000 ? ($tution_fees*25)/100  : (($tution_fees <=20000 && $tution_fees > 10000) ? ($tution_fees*20)/100 : (($tution_fees <=10000 && $tution_fees > 7000) ? ($tution_fees*15)/100 : "Not Eligible"));

echo "Commision : ".$commission.$currency=$commission==="Not Eligible" ? "":" USD" ;