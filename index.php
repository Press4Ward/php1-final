<?php
//require('form.php');

/********** START INPUT FORM PHP STATEMENTS ******/

// set error messages to empty strings

$loan_amountErr = "Oops, let's try that again and enter a valid number." . "<br>";
$interest_fErr = "Oops, let's try that again and enter a valid number." . "<br>";
$loan_lengthErr = "Oops, let's try that again and enter a valid number." . "<br>";
$extra_payErr = "Oops, let's try that again and enter a valid number." . "<br>";

// get user loan data values from loan entry form
    $loan_amount = filter_input(INPUT_POST, 'loan_amount', FILTER_VALIDATE_INT); // get loan_amount
    $interest_f = filter_input(INPUT_POST, 'interest_f', FILTER_VALIDATE_FLOAT); // get selected annual interest_rate
    $loan_length = filter_input(INPUT_POST, 'loan_length', FILTER_VALIDATE_INT); // get selected loan_length
    $extra_pay = filter_input(INPUT_POST, 'extra_pay', FILTER_VALIDATE_INT); // get extra_payment
   
  // validate entered loan amount
if ($loan_amount == FALSE || empty($loan_amount)) {
    //$loan_amountErr = "Oops, let's try that again and enter a valid number.";
    echo $loan_amountErr;
} else {
    // echo 'Cool, thanks for entering the correct format. Lets continue.' . $loan_amount; 
    echo $loan_amount;
}

  // validate entered loan length
if ($loan_length == FALSE || empty($loan_length)) {
    //$loan_lengthErr = "Oops, let's try that again and enter a valid number.";
    echo $loan_lengthErr;
} else {
    // calculate number of months for loan lifetime  (example: 12months * 30 years = 360 months)
        $months = filter_input(INPUT_POST, 'length');
        if ($months === 'years') {
            $months = $loan_length * 12;
        } else {
            $months = $loan_length;
        }
}

  // validate entered interest
if ($interest_f == FALSE || empty($interest_f)) {
   // $interest_fErr = "Oops, let's try that again and enter a valid number.";
    echo $interest_fErr;
} else {
   /*echo 'Cool, thanks for entering the correct format. Lets continue.' . $interest_f;*/
   echo $interest_f;
}

  // validate entered extra payment
if ($extra_pay == FALSE || empty($extra_pay)) {
   // $extra_payErr = "Oops, let's try that again and enter a valid number.";
    echo $extra_payErr;
} else {
    //echo 'Cool, thanks for entering the correct format. Lets continue.' . $extra_pay;
    echo $extra_pay;
}

 /*****END INPUT FORM PHP STATEMENTS *****/


 /******START AMAORTIZATION TABLE STATEMENTS ********/
 /* variables used for reference only
 * $interest_f = annual interest retrieved from user input
 * $loan_amount = loan amount entered by user
 * $principal = loan amount divided by months in length of loan; monthly principle amount only
 * $monthly_pay = total monthly loan payment
 * $months = convert selected user input into months
 * $extra_pay = any extra payment amount values entered
 * $new_balance = new revised balance less payments
*/

 //amortization table variables
    $n = 1; // payment number
    $d = new DateTime();  // payment date on the first of the month
    $nd = $d->modify('next month');
    $monthly_pay = 0; // monthly_payment including principal and interest
    $principal = 0; // monthly principal only amount
    $interest_s = 0;  // monthly interest on amort. schedule
    //$extra_pay = 0; // extra payment amount
    $new_balance = 0; // new loan balance after monthly payment
    $interest_c = (($interest_f /100) / 12); //r
    $var = pow((1+$interest_c), $months);

// monthly payment calculation
    $monthly_pay = $loan_amount * (($interest_c * $var) / ($var - 1));
    echo $monthly_pay;
    echo $var;
    
    $new_balance = $loan_amount;

    // get total amount with principal and interest
    $getTotal = $monthly_pay * $months;
    
     // get total interest paid
    $getInterest = $getTotal - $loan_amount;
    

// calculate monthly interest on requested loan amount
      
        // example ex = $100,000 * 0.045 = $45,000
        
      //echo 'Loan in months: ' . $months; // echo total number of months for loan
        //var_dump('months variable: ' . $months) . "<br><br>";

// calculate base principle amount of loan (example: 100,000 / 360 months)
        //$principal = $loan_amount / $months;
        //echo "Principal: " . $principal . "<br><br>";



// formula part 2 - get total of exponent of monthly interest, calculate monthly interest rate to the exponent factor of total loan months
        //$interest_e = (pow(1.005,180) . "<br>"."<br>");
        //$interest_e = (pow($new_interest_m, $months));
        //echo 'Exponent value: ' .$interest_e  . "<br>"."<br>";

// formula part 3 - get monthly interest paid: take exponent / monthly interest) and divide by (exponent -1)
        /*example: (interest_e * .005) / ($interest_e - 1)  */
        //$interest_paid = ($interest_e * $new_interest_m) / ($interest_e - 1);
        //echo 'Monthly interest paid: ' .$interest_paid ."<br>"."<br>";


// formula part 6 -  get monthly principal amount paid (example: total loan amount - monthly payment - monthly-interest
        //$monthly_pay = $interest * 100000;
          //  echo 'Monthly payment: ' .$monthly_pay ."<br>"."<br>";

// calculate new balance
           // $new_balance = $monthly_pay - $extra_pay;
            //echo 'New loan balance: ' .$new_balance ."<br>"."<br>";

// format monthly payment to decimal
        //$monthly_pay = number_format((float) $monthly_pay,2);
       // echo 'formatted Monthly payment: ' .$monthly_pay  ."<br>"."<br>";

// format monthly interest to decimal
       // $interest_paid = number_format((float) $interest_paid,2);
       // echo 'formatted Monthly Interest Paid: ' .$interest_paid ."<br>"."<br>";

 // format balance to decimal
        //$new_balance = number_format((float) $new_balance,2);
        //echo 'formatted New Balance: ' .$new_balance  ."<br>"."<br>";

// calculate total monthly interest paid
      //  $interest_paid = ($loan_amount - $monthly_pay);
        //echo 'Monthly interest paid: ' .$interest_paid;


   // apply currency and percentage to the user values entered and for amortization table values

   // convert user input loan_amount to currency
   //$loan_amount= "$" .number_format($loan_amount, 2) ."<br>";


   

    include 'form.php';
?>