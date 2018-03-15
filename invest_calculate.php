<?php

session_start();


$_SESSION['file_status'] = $_POST['file_status'];
echo '<h1>'. $_SESSION['file_status'] .'</h1>';

function get_taxed_salary_for_single_person($salary_income, $investment_income){


if(!isset($investment_income)){ $investment_income = 0;}
$gross_income = ($salary_income + $investment_income);

//2015 tax brackets
//http://www.bankrate.com/finance/taxes/tax-brackets.aspx
if ($_SESSION['file_status'] == 'single'){
	
	$income_band[1]['ceiling'] = 9225;
	$income_band[2]['ceiling'] = 37450;
	$income_band[3]['ceiling'] = 90750;
	$income_band[4]['ceiling'] = 189300;
	$income_band[5]['ceiling'] = 411500;
	$income_band[6]['ceiling'] = 413200;
//return $year	
}

elseif ($_SESSION['file_status'] == 'm_joint'){
	
	$income_band[1]['ceiling'] = 18450;
	$income_band[2]['ceiling'] = 74900;
	$income_band[3]['ceiling'] = 151200;
	$income_band[4]['ceiling'] = 230450;
	$income_band[5]['ceiling'] = 411500;
	$income_band[6]['ceiling'] = 464850;
	
}

elseif ($_SESSION['file_status'] == 'm_sep'){
	
	$income_band[1]['ceiling'] = 9225;
	$income_band[2]['ceiling'] = 37450;
	$income_band[3]['ceiling'] = 75600;
	$income_band[4]['ceiling'] = 115225;
	$income_band[5]['ceiling'] = 205750;
	$income_band[6]['ceiling'] = 232425;
	
}

elseif ($_SESSION['file_status'] == 'hoh'){
	
	$income_band[1]['ceiling'] = 13150;
	$income_band[2]['ceiling'] = 50200;
	$income_band[3]['ceiling'] = 129600;
	$income_band[4]['ceiling'] = 209850;
	$income_band[5]['ceiling'] = 411500;
	$income_band[6]['ceiling'] = 439000;
	
}

	//trump changes


elseif ($_SESSION['file_status'] == 't_single'){

	$income_band_trump[1]['ceiling'] = 25000;
	$income_band_trump[2]['ceiling'] = 50000;
	$income_band_trump[3]['ceiling'] = 150000;

}
elseif ($_SESSION['file_status'] == 't_m_joint'){

	$income_band_trump[1]['ceiling'] = 50000;
	$income_band_trump[2]['ceiling'] = 100000;
	$income_band_trump[3]['ceiling'] = 300000;

}
elseif ($_SESSION['file_status'] == 't_hoh'){

	$income_band_trump[1]['ceiling'] = 37500;
	$income_band_trump[2]['ceiling'] = 75000;
	$income_band_trump[3]['ceiling'] = 225000;

}
//var_dump($income_band[2]['ceiling']);



	$income_band_trump[1]['income_tax_percent'] = 1;
	$income_band_trump[1]['range'] = $income_band_trump[1]['ceiling'] - 0;
	$income_band_trump[1]['full_after_tax_earnings'] = $income_band_trump[1]['range'] * $income_band_trump[1]['income_tax_percent'];

	$income_band_trump[2]['income_tax_percent'] = .9;
	$income_band_trump[2]['range'] = $income_band_trump[2]['ceiling'] - $income_band_trump[1]['ceiling'];
	$income_band_trump[2]['full_after_tax_earnings'] = $income_band_trump[2]['range'] * $income_band_trump[2]['income_tax_percent'];

	$income_band_trump[3]['income_tax_percent'] = .85;
	$income_band_trump[3]['range'] = $income_band_trump[3]['ceiling'] - $income_band_trump[2]['ceiling'];
	$income_band_trump[3]['full_after_tax_earnings'] = $income_band_trump[3]['range'] * $income_band_trump[3]['income_tax_percent'];

	$income_band_trump[4]['income_tax_percent'] = .75;
	$income_band_trump[4]['range'] = $income_band_trump[4]['ceiling'] - $income_band_trump[3]['ceiling'];
	$income_band_trump[4]['full_after_tax_earnings'] = $income_band_trump[4]['range'] * $income_band_trump[4]['income_tax_percent'];




$income_band[1]['income_tax_percent'] = .9;
$income_band[1]['range'] = $income_band[1]['ceiling'] - 0;
$income_band[1]['full_after_tax_earnings'] = $income_band[1]['range'] * $income_band[1]['income_tax_percent'];

$income_band[2]['income_tax_percent'] = .85;
$income_band[2]['range'] = $income_band[2]['ceiling'] - $income_band[1]['ceiling'];
$income_band[2]['full_after_tax_earnings'] = $income_band[2]['range'] * $income_band[2]['income_tax_percent'];

$income_band[3]['income_tax_percent'] = .75;
$income_band[3]['range'] = $income_band[3]['ceiling'] - $income_band[2]['ceiling'];
$income_band[3]['full_after_tax_earnings'] = $income_band[3]['range'] * $income_band[3]['income_tax_percent'];

$income_band[4]['income_tax_percent'] = .72;
$income_band[4]['range'] = $income_band[4]['ceiling'] - $income_band[3]['ceiling'];
$income_band[4]['full_after_tax_earnings'] = $income_band[4]['range'] * $income_band[4]['income_tax_percent'];

$income_band[5]['income_tax_percent'] = .67;
$income_band[5]['range'] = $income_band[5]['ceiling'] - $income_band[4]['ceiling'];
$income_band[5]['full_after_tax_earnings'] = $income_band[5]['range'] * $income_band[5]['income_tax_percent'];

$income_band[6]['income_tax_percent'] = .65;
$income_band[6]['range'] = $income_band[6]['ceiling'] - $income_band[5]['ceiling'];
$income_band[6]['full_after_tax_earnings'] = $income_band[6]['range'] * $income_band[6]['income_tax_percent'];


$income_band[7]['income_tax_percent'] = .604;

	if( $_SESSION['file_status'] == 'single' || $_SESSION['file_status'] == 'm_joint' || $_SESSION['file_status'] == 'hoh' ){

if($gross_income > $income_band[6]['ceiling'] ){
//$_SESSION['salary_funct'] = $gross_income;
	$gross_income_after_taxes = (($gross_income - $income_band[6]['ceiling']) * $income_band[7]['income_tax_percent']) + $income_band[6]['full_after_tax_earnings'] + $income_band[5]['full_after_tax_earnings'] + $income_band[4]['full_after_tax_earnings'] + $income_band[3]['full_after_tax_earnings'] + $income_band[2]['full_after_tax_earnings'] + $income_band[1]['full_after_tax_earnings'];
	$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
	$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
	//var_dump($_SESSION['salary_funct'],$gross_income_after_taxes);
	return $gross_income_after_taxes;
	}

if($gross_income > $income_band[5]['ceiling']){
//$_SESSION['salary_funct'] = $gross_income;
	$gross_income_after_taxes = (($gross_income - $income_band[5]['ceiling']) * $income_band[6]['income_tax_percent']) + $income_band[5]['full_after_tax_earnings'] + $income_band[4]['full_after_tax_earnings'] + $income_band[3]['full_after_tax_earnings'] + $income_band[2]['full_after_tax_earnings'] + $income_band[1]['full_after_tax_earnings'];
	$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
	$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
	//var_dump($_SESSION['salary_funct'],$gross_income_after_taxes);
	return $gross_income_after_taxes;
	}
	
if($gross_income > $income_band[4]['ceiling']){
//$_SESSION['salary_funct'] = $gross_income;
	$gross_income_after_taxes = (($gross_income - $income_band[4]['ceiling']) * $income_band[5]['income_tax_percent']) + $income_band[4]['full_after_tax_earnings'] + $income_band[3]['full_after_tax_earnings'] + $income_band[2]['full_after_tax_earnings'] + $income_band[1]['full_after_tax_earnings'];
	$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
	$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
	//var_dump($_SESSION['salary_funct'],$gross_income_after_taxes);
	return $gross_income_after_taxes;
	}

if($gross_income > $income_band[3]['ceiling']){
//$_SESSION['salary_funct'] = $gross_income;
	$gross_income_after_taxes = (($gross_income - $income_band[3]['ceiling']) * $income_band[4]['income_tax_percent']) + $income_band[3]['full_after_tax_earnings'] + $income_band[2]['full_after_tax_earnings'] + $income_band[1]['full_after_tax_earnings'];
	$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
	$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
	//var_dump($_SESSION['salary_funct'],$gross_income_after_taxes);
	return $gross_income_after_taxes;
	}
	
if($gross_income >$income_band[2]['ceiling']){
//$_SESSION['salary_funct'] = $gross_income;
	$gross_income_after_taxes = (($gross_income - $income_band[2]['ceiling']) * $income_band[3]['income_tax_percent']) + $income_band[2]['full_after_tax_earnings'] + $income_band[1]['full_after_tax_earnings'];
	$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
	$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
	//var_dump($_SESSION['salary_funct'],$gross_income_after_taxes);
	return $gross_income_after_taxes;
	}

if($gross_income > $income_band[1]['ceiling']){
    //$_SESSION['salary_funct'] = $gross_income;
	$gross_income_after_taxes = (($gross_income - $income_band[1]['ceiling']) * $income_band[2]['income_tax_percent']) +  $income_band[1]['full_after_tax_earnings'];
	$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
	$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
	return $gross_income_after_taxes;
	}

if($gross_income < $income_band[1]['ceiling']){
    //$_SESSION['salary_funct'] = $gross_income;
	$gross_income_after_taxes = $gross_income * $income_band[1]['income_tax_percent'];
	$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
	$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
	return $gross_income_after_taxes;
	}


}
elseif ($_SESSION['file_status'] == 't_single' || $_SESSION['file_status'] == 't_m_joint' || $_SESSION['file_status'] == 't_hoh' ){

	if($gross_income > $income_band_trump[3]['ceiling']){
//$_SESSION['salary_funct'] = $gross_income;
		$gross_income_after_taxes = (($gross_income - $income_band_trump[3]['ceiling']) * $income_band_trump[4]['income_tax_percent']) + $income_band_trump[3]['full_after_tax_earnings'] + $income_band_trump[2]['full_after_tax_earnings'] + $income_band_trump[1]['full_after_tax_earnings'];
		$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
		$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
		//var_dump($_SESSION['salary_funct'],$gross_income_after_taxes);
		return $gross_income_after_taxes;
	}
	
	if($gross_income >$income_band_trump[2]['ceiling']){
//$_SESSION['salary_funct'] = $gross_income
		$gross_income_after_taxes = (($gross_income - $income_band_trump[2]['ceiling']) * $income_band_trump[3]['income_tax_percent']) + $income_band_trump[2]['full_after_tax_earnings'] + $income_band_trump[1]['full_after_tax_earnings'];
		$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
		$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
		//var_dump($_SESSION['salary_funct'],$gross_income_after_taxes);
		return $gross_income_after_taxes;
	}

	if($gross_income > $income_band_trump[1]['ceiling']){
		//$_SESSION['salary_funct'] = $gross_income;
		$gross_income_after_taxes = (($gross_income - $income_band_trump[1]['ceiling']) * $income_band_trump[2]['income_tax_percent']) +  $income_band_trump[1]['full_after_tax_earnings'];
		$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
		$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
		return $gross_income_after_taxes;
	}

	if($gross_income < $income_band_trump[1]['ceiling']){
		//$_SESSION['salary_funct'] = $gross_income;
		$gross_income_after_taxes = $gross_income * $income_band_trump[1]['income_tax_percent'];
		$taxes_paid_on_gross_income = $gross_income - $gross_income_after_taxes;
		$_SESSION['taxes_paid_on_gross_income'] = $taxes_paid_on_gross_income;
		return $gross_income_after_taxes;
	}

}
	}




$investment['principal'] = $_POST['principal'];
$_SESSION['principal'] = $_POST['principal'];



$yearly_expenses['vacation'] = $_POST['vacation'];

$_SESSION['vacation'] = $_POST['vacation'];

$yearly_expenses['car_maintenance'] = $_POST['car_maintenance'];

$_SESSION['car_maintenance'] = $_POST['car_maintenance'];

$yearly_expenses['gym_membership'] = (12*($_POST['gym_membership']));

$_SESSION['gym_membership'] = $_POST['gym_membership'];

$yearly_expenses['car_insurance'] = (12*($_POST['car_insurance']));

$_SESSION['car_insurance'] = $_POST['car_insurance'];

$yearly_expenses['health_insurance'] = (12*($_POST['health_insurance']));

$_SESSION['health_insurance'] = $_POST['health_insurance'];

$yearly_expenses['phone']  = (12*($_POST['phone']));

$_SESSION['phone'] = $_POST['phone'];

$yearly_expenses['loan'] = (12*($_POST['loan']));

$_SESSION['loan'] = $_POST['loan'];

$_SESSION['loan_yearstopayoff'] = $_POST['loan_yearstopayoff'];

$yearly_expenses['rent'] = (12*($_POST['rent']));

$_SESSION['rent'] = $_POST['rent'];

$yearly_expenses['utilities']  = (12*($_POST['utilities']));

$_SESSION['utilities'] = $_POST['utilities'];

$yearly_expenses['grocceries']  = (52*($_POST['grocceries']));

$_SESSION['grocceries'] = $_POST['grocceries'];

$yearly_expenses['eating_out']  = (52*($_POST['eating_out']));

$_SESSION['eating_out'] = $_POST['eating_out'];

$yearly_expenses['pocket_money'] = (52*($_POST['pocket_money']));

$_SESSION['pocket_money'] = $_POST['pocket_money'];

$yearly_expenses['gas_cost'] = (12*($_POST['gas_cost']));

$_SESSION['gas_cost'] = $_POST['gas_cost'];



$expenses_all =  array_sum($yearly_expenses);

var_dump($expenses_all);



//52 weeks in a year, 12 months in a year





$money_after_taxes = get_taxed_salary_for_single_person($_POST['salary'], 0); // stuff to do here

//var_dump($money_after_taxes);



$money_for_investing = $money_after_taxes - $expenses_all;

$_SESSION['money_for_investing'] = $money_for_investing;

$_SESSION['expenses_all'] = $expenses_all;

$money_for_investing_formated = '$ '.number_format($money_for_investing);

$investment_rate =  (($_POST['investment_rate']/100)+1);  //1.05;

$_SESSION['investment_rate'] = $_POST['investment_rate'];

$age = $_POST['age'];

$_SESSION['age'] = $_POST['age'];

$_SESSION['retirement_age'] = $_POST['retirement_age'];

$_SESSION['salary'] = $_POST['salary'];



echo $money_for_investing_formated;



$inflation_rate = (1 - .03);



echo '<pre>';

print_r($yearly_expenses);

echo "<BR><BR>Investment Rate: ".$investment_rate;

echo "<BR>Inflation Rate: ".($inflation_rate - 1);

echo '</pre>';


var_dump($income_band[2]['ceiling']);




if(isset($_POST['reinvest'])) { $status = 'Net Income on Investments <i>being reienvested</i>'; } else {$status = 'Net Income on Investments <i>not being re-invested (spend it!)</i>';}

?>



<table style="text-align: center;">

<tr><th>AGE</th><th>YEAR</th><th>SUM</th><th><?PHP echo $status; ?></th><th>Past year investment</th><th>Expenses</th><th>Total Taxes</th><th>Net Gross</th><th>diff</th><th>Wealth Growth Rate</th><th>Real Worth ( aftr Inflation )</th></tr>

<?php

$sum = $investment['principal'];

$inflated_sum = $investment['principal'];

for ($year = 0; $age <= 100;) {



 if($age  <= $_POST['retirement_age']){ $money_for_investing = $_SESSION['money_for_investing']; }

  if($year == 0 ) { $money_for_investing = 0; $expenses_all = 0; } else { $expenses_all = $_SESSION['expenses_all']; }







$previous_sum_2 = $inflated_sum;

$previous_sum_2x = $inflated_sum;

$previous_sum_x = $sum;

$previous_sum = $sum;







if ($year % 10 == 0) { $style = 'blue';} else { $style = 'black';}

if($year > $_SESSION['loan_yearstopayoff'] ) { $money_for_investing = ($money_for_investing + $yearly_expenses['loan']); }







 



 

 

//if($year >= $_SESSION['loan_yearstopayoff'];  ) { 

//for($countz = 0){

//$diff = ($expenses_all - ($yearly_expenses['loan'] * $countz++) + $total_taxes + $money_for_investing) - $net_gross; 

//}

//}

 

 

  //if($year == 0 ) { $money_for_investing = $_SESSION['money_for_investing'];}

  if($age >= $_POST['retirement_age'] && $year > $_SESSION['loan_yearstopayoff']){$_POST['salary'] = 0; $money_for_investing = (-1 * $expenses_all) + $yearly_expenses['loan']; }

 



 

 







 

 if($year > $_SESSION['loan_yearstopayoff'] ) { $diff = (($expenses_all - $yearly_expenses['loan'] + $total_taxes + $money_for_investing) - $net_gross) + $taxed_investment_earnings; $expenses_all = $expenses_all - $yearly_expenses['loan'];

 } else { $diff = ($expenses_all  + $total_taxes + $money_for_investing) - $net_gross + $taxed_investment_earnings; }

 

 //if($age  >= $_POST['retirement_age'])



  // $net_gross = $net_gross + $taxed_investment_earnings;



 if($year == 0 ) { $net_gross = 0; $total_taxes = 0; }



 if($wealth > 0){$wealth_style = 'green';} else {$wealth_style = 'red';}

 if($age == $_POST['retirement_age']) { echo '<tr><td colspan="11"><BR>Retirement<HR></td></tr>';}
 echo '<tr style="color: '.$style.';">

 <td>'.$age++.'</td>

 <td>'.$year++.'</td>

 <td>$ '.number_format($sum).'</td>

 <td>$ '.number_format($taxed_investment_earnings).'</td>

 <td>$ '.number_format($money_for_investing).'</td>

 <td>$ '.number_format($expenses_all).'</td>

 <td>$ '.number_format($total_taxes).'</td>

 <td>$ '.number_format($net_gross).'</td>

 <td>diff: $ '.number_format($diff).' </td>

 <td style ="color: '.$wealth_style.'"><b>'.$wealth.' %</b></td>

 <td>$ '.number_format($inflated_sum).'</td>

 </tr>';

if($age  < $_POST['retirement_age']){ $money_for_investing = $_SESSION['money_for_investing'];}

  if($year == 0 ) {  $sum = ($previous_sum + $money_for_investing) * $investment_rate;  } else { $money_made = ((($previous_sum + $money_for_investing) * $investment_rate) - ($previous_sum + $money_for_investing)); }

 

 



 if($age  >= $_POST['retirement_age']){$money_after_taxes= 0; $net_gross = $money_made; } else {$net_gross = $_POST['salary']  + $money_made;}

  if($age >= $_POST['retirement_age']){$taxed_investment_earnings  = get_taxed_salary_for_single_person($money_made);} else {$taxed_investment_earnings  = get_taxed_salary_for_single_person($_POST['salary'], $money_made) - $money_after_taxes;}

 //echo $year.'Taxed Investment Earnings->'.$taxed_investment_earnings

//$total_taxes = $taxed_investment_earnings +  $_SESSION['taxes_paid_on_gross_income'];

$total_taxes = $_SESSION['taxes_paid_on_gross_income'];

 $taxes_on_investment = $money_made -  $taxed_investment_earnings;

 



   // if($age >= $_POST['retirement_age']){ $previous_sum = $previous_sum - 

  

//$money_for_investing = (-1 * $expenses_all); 

//$money_made = (($previous_sum + $money_for_investing) * $investment_rate) - $previous_sum ;

//$x = get_taxed_salary_for_single_person($_POST['salary'], $money_made);

 //if($age >= $_POST['retirement_age']){$money_after_taxes = (-1 * $expenses_all);}

//$net_gross = $money_after_taxes  + $money_made;



//$taxed_investment_earnings = get_taxed_salary_for_single_person($_POST['salary'], $money_made);

//number_format($taxed_investment_earnings);

//$taxes_on_investment = $money_made * (1 - $tax_percent);

//$taxed_investment_earnings = $money_made * $tax_percent;





//var_dump($money_made, $x, $_SESSION['taxes_paid_on_gross_income']);

//var_dump($money_for_investing);

//var_dump($taxed_investment_earnings);



//var_dump($sum,$previous_sum_x);

//prev sum minus expenses



if(isset($_POST['reinvest'])) { $sum = $money_for_investing + $taxed_investment_earnings + $previous_sum; } else { $sum = $money_for_investing + $previous_sum; } 

$wealth = round(((($sum / $previous_sum_x) - 1) * 100),1);



if(isset($_POST['reinvest'])) { $inflated_sum = $money_for_investing + $taxed_investment_earnings + $previous_sum_2; } else { $inflated_sum = $money_for_investing + $previous_sum_2; } 

$inflated_sum = ($inflated_sum*$inflation_rate);

}




?>

</table>
<?









