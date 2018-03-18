<?php
session_start();
?>
<title>Investment Planner</title>
<style>

td {
}

 #mainbox {
  margin-right: auto;
  margin-left: auto;
  width: 60%;
  border: 1px solid black;
 }
 
</style>

<h1>Investment Planner</h1>
<p>Ceteris Paribus</p>


<!-- TODO: add monthly, daily weekly, yearly select att -->
<form target="_blank" action="invest_calculate.php" method="post" enctype="multipart/form-data">
<table>
 <tr><td>
<label for="file_status"><b style="color: green;">Tax Filer Status </b></label><select name="file_status"/>
<?php if(isset($_SESSION['file_status'])) {echo '<option value="'.$_SESSION['file_status'].'">'.$_SESSION['file_status'].'</option>';} ?>
<option value="single">Single filers</option>
<option value="m_joint">Married filing jointly or qualifying widow/widower</option>
<option value="m_sep">Married filing separately</option>
<option value="hoh">Head of household</option>
   <option value="t_single">Trump - Single filers</option>
   <option value="t_m_joint">Trump - Married filing jointly or qualifying widow/widower</option>
   <option value="t_hoh">Trump - Head of household</option>   
</select>
  </td>

 <td>

<label for="salary">How much you make: </label><input name="salary" type="number" value="<?php if(isset($_SESSION['salary'])) {echo $_SESSION['salary'];} ?>"/></td></tr>
<!--<p>What is earned after taxes: <?php //echo $salary_after_taxes; ?></p>

<label for="investment_rate">Investment Rate: </label> -->

 <tr><td><label for="principal">Principal money to invest: </label>
   <input name="principal" type="number" value="<?php if(isset($_SESSION['principal'])) {echo $_SESSION['principal'];} ?>"/></td>
  <td><label for="vacation">Dollars spent on Vacation? (Yearly) </label>
   <input size="2" name="vacation" type="number" value="<?php if(isset($_SESSION['vacation'])) {echo $_SESSION['vacation'];} ?>"/></td></tr>

 <tr><td colspan="2"><label for="age">How old are you? </label>
   <input size="2" name="age" type="number" value="<?php if(isset($_SESSION['age'])) {echo $_SESSION['age'];} ?>"/>
   <label for="retirement_age">Retirement Age? </label>
   <input size="2" name="retirement_age" type="number" value="<?php if(isset($_SESSION['retirement_age'])) {echo $_SESSION['retirement_age'];} ?>"/></td></tr>


<tr>
 <td><label for="investment_rate"><b style="color: green;">Investment Growth Rate: </b></label><select name="investment_rate"/>

<?php if(isset($_SESSION['investment_rate'])) {echo '<option value="'.$_SESSION['investment_rate'].'">'.$_SESSION['investment_rate'].' %</option>';} ?>

<?php

//to become invest what you can percentage

for ($inv = 100; $inv <= 66600;) {

 echo '<option value="'.$inv.'">'.$inv.' %</option>';

$inv =  $inv + 100;

}

//topped out at 40 percent before, haha, changed 8-11-2017
?>

</select></td>

<td><label for="reinvest">Reinvest Investment Earnings?: </label><input name="reinvest" type="checkbox" value="<?php if(isset($_SESSION['reinvest'])) {echo $_SESSION['reinvest'];} ?>"/>
</td>
</tr>
 <tr><td colspan="2" text-align="center"><h2 align="center">Bills</h2></td></tr>










<tr><td><label for="car_maintenance">Car Maintenence <b>(yearly)</b></label></td><td><input name="car_maintenance" type="number" value="<?php if(isset($_SESSION['car_maintenance'])) {echo $_SESSION['car_maintenance'];} ?>"/></td></tr>

<tr><td><label for="gym_membership">Gym Membership <b>(monthly)</b></label></td><td><input name="gym_membership" type="number" value="<?php if(isset($_SESSION['gym_membership'])) {echo $_SESSION['gym_membership'];} ?>"/></td></tr>

<tr><td><label for="car_insurance">Car Insurance <b>(monthly)</b></label></td><td><input name="car_insurance" type="number" value="<?php if(isset($_SESSION['car_insurance'])) {echo $_SESSION['car_insurance'];} ?>"/></td></tr>
<tr><td><label for="health_insurance">Health Insurance <b>(monthly)</b></label></td><td><input name="health_insurance" type="number" value="<?php if(isset($_SESSION['health_insurance'])) {echo $_SESSION['health_insurance'];} ?>"/></td></tr>
<tr><td><label for="phone">Cell Phone <b>(monthly)</b></label></td><td><input name="phone" type="number" value="<?php if(isset($_SESSION['phone'])) {echo $_SESSION['phone'];} ?>"/></td></tr>
<tr><td><label for="loan">Loan <b>(monthly)</b></label>
 <input name="loan" type="number" value="<?php if(isset($_SESSION['loan'])) {echo $_SESSION['loan'];} ?>"/></td>
  <td><label for="loan">Years to pay off: </label>
 <input name="loan_yearstopayoff" type="number" value="<?php if(isset($_SESSION['loan_yearstopayoff'])) {echo $_SESSION['loan_yearstopayoff'];} ?>"/></td></tr>
<tr><td><label for="rent">Rent <b>(monthly)</b></label></td><td><input name="rent" type="number" value="<?php if(isset($_SESSION['rent'])) {echo $_SESSION['rent'];} ?>"/></td></tr>
<tr><td><label for="utilities">Utilities <b>(monthly)</b></label></td><td><input name="utilities" type="number" value="<?php if(isset($_SESSION['utilities'])) {echo $_SESSION['utilities'];} ?>"/></td></tr>




<tr><td><label for="grocceries">Grocceries <b>(weekly)</b></label></td><td><input name="grocceries" type="number" value="<?php if(isset($_SESSION['grocceries'])) {echo $_SESSION['grocceries']; } ?>"/></td></tr>

<tr><td><label for="eating_out">Eating Out <b>(weekly)</b></label></td><td><input name="eating_out" type="number" value="<?php if(isset($_SESSION['eating_out'])) {echo $_SESSION['eating_out']; } ?>"/></td></tr>



<tr><td><label for="pocket_money">Pocket Money <b>(weekly)</b></label></td><td><select name="pocket_money" type="number">

<?php if(isset($_SESSION['pocket_money'])) {echo '<option value="'.$_SESSION['pocket_money'].'">$ '.$_SESSION['pocket_money'].'</option>';} ?>

<?php //to become invest what you can percentage

for ($inv_increm = 0; $inv_increm <= 200;) {

 echo '<option value="'.$inv_increm.'">$ '.$inv_increm.'</option>';

 $inv_increm = $inv_increm + 5 ;

}

?>

</select></td></tr>




<tr><td><label for="gas_cost">Gas Cost <b>(monthly)</b></label></td><td><input name="gas_cost" type="number" value="<?php if(isset($_SESSION['gas_cost'])) {echo $_SESSION['gas_cost']; } ?>"/></td></tr>

</table>




 <input type="submit" name="submit" value="Calculate Investment Funds">

 </form>

<?PHP

echo '</body></html>';




