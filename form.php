<!DOCTYPE html>
<html lang="en">
<!-- HEAD SECTION -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1.0">
    <meta http-equiv="=X-UA-Compatible content="ie=edge">
    <title>Terry Wells PHP Final Project</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>

<!-- BODY SECTION -->
<body>
    <header>
      <div class="w3-container w3-teal w3-center">
        <h1>PHP 1 Final Project</h1>
        <h3>Loan Amortization Calculator</h3>
      </div>
    </header>

<main>

    <!--Loan Card -->
      <div class="w3-container w3-border-teal w3-round-large w3-khaki w3-cell">
        <div class="input">
        <h3>Input Loan Details</h3>
        <p>Please enter requested information. Fields with an (*) are required.</p>
        <form action="index.php" method="post" class="input">
             <!--Loan Amount-->
              <label for="amount" class="userInput">Enter Loan Amount:*
             <input type="text" name="loan_amount" value="" maxlength="8" size="10"></label>
            
            <br>
            <br>

            <!--Interest Rate-->
              <label for="interest_f" class="userInput">Select Interest Rate:*
                 <input type="text" name="interest_f" value="" maxlength="3" size="3"></label>
                    <br>
                    <br>

                <!--Loan Length-->

                  <label for="loan_length" class="userInput">Select Loan Length*</label>
                  <input type="text" name="loan_length" class="userInput"></label><br>

                   <label for="months" class="userInput">
                   <input type="radio" name="length" value="months" id="months"> Months </label>&nbsp;

                   <label for="years" class="userInput">
                   <input type="radio" name="length" value="years" id="years"> Years </label>
                   <br>
                   <br>

                   <!--Extra Payment Amount-->
                        <label>Enter Extra Monthly Payment Amount: </label>
                            <input type="text" name="extra_pay" value="" maxlength="5" size="7">
                    
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Submit" id="button">
                    <!--button type="reset" name="reset" value="Reset">Reset</button-->

                   <!--apply currency and percentage formatting to  user and amortization table values

                    // convert user input loan_amount, extra_pay, principal, monthly_pay & new_balance to currency
                    //$loan_amount = "$" . number_format($loan_amount,2) . "<br>";
                    //$monthly_pay = "$" . number_format($monthly_pay,2) . "<br>";
                    //$principal = "$" . number_format($principal,2) . "<br>";
                    //$new_balance = "$" . number_format($new_balance,2) . "<br>";
                    //$extra_pay = "$" . number_format($extra_pay,2) . "<br>";
                    //$interest_f = $interest_f . "%"; // user interest_rate
                    //$interest_paid = $interest_paid . "%"; // user interest_rate -->
            </form>
          </div>
    </div>

    <!--display user input and loan results -->
    <div class="w3-container w3-white w3-cell">
      <div class="user">
        <h3>You've Requested:</h3>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <?php
        if(isset($_POST['submit'])) {
          echo 'Loan Amount: $' . number_format($loan_amount,2);
          echo "<br>";
          echo 'Interest Rate: ' . $interest_f . '%';
          echo "<br>";
          echo 'Loan Length: ' . $months;
          echo "<br>";
          echo 'Extra Payment: $' . number_format($extra_pay,2);
          echo "<br>";
          echo 'Total Payments: $' . number_format($getTotal,2);
          echo "<br>";
          echo 'Total Interest: $' . number_format($getInterest,2);
        }
// if reset button pressed clear user input section display
        if(isset($_POST['reset'])) {
          echo 'Loan Amount:';
          echo "<br>";
          echo 'Interest Rate: ';
          echo "<br>";
          echo 'Loan Length: ';
          echo "<br>";
          echo 'Extra Payment: ';
        }

        ?>

      </div> 
    </div> <!-- end user input -->
  


    <!--display amortization schedule -->
    <div class="schedule">
        <h3>Loan Amortization Schedule</h3>
            <p>Below are loan repayment details for your review.</p>
            <table class="schedule w3-table-all">          
                  <thead>
                      <tr class="w3-teal">
                          <th>Payment No</th>
                          <th>Payment Date</th>
                          <th>Payment Amount</th>
                          <th>Principal</th>
                          <th>Interest</th>
                          <th>Extra Payment</th>
                          <th>Loan Balance</th>
                      </tr>
                   </thead>
                <tbody>
                    
<!--for loop for amortization schedule -->
                    <?php for($n=1; $n <= $months; $n++) :
                       $interest_s = $new_balance * $interest_c; // monthly schedule
                        $principal = $monthly_pay - $interest_s; // monthly principal
                        $new_balance = $new_balance - $principal - $extra_pay;
                        
                        if ($n === 1) {
                            $newMonth = $nd;
                        } else {
                            $newMonth = $nd->modify('+1 month');
                        } 
   
                        
                        
                        ?>               
                        <tr>
                            <td><?php echo $n;?></td>
                            <td><?php echo $newMonth->format('m/1/Y');?></td>
                            <td><?php echo number_format($monthly_pay,2);?></td>
                            <td><?php echo number_format($principal,2);?></td>
                            <td><?php echo number_format($interest_s,2);?></td>
                            <td><?php echo number_format($extra_pay,2);?></td>
                            <td><?php echo number_format($new_balance,2);?></td>
                        </tr>
                        
                        
                    <?php endfor; ?>
                        
                       
                </tbody>
            </table>
                    
              </div>
              
</main>
              <footer>
                <div class="w3-container w3-teal w3-center" "copyright" style="text-align:center;">
                  &copy; <!--?php echo date("Y") ; ?--> Terry Wells Spring Final Project</p>
                </div>
              </footer>
            </body>
</html>