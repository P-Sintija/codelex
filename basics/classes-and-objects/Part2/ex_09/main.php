<?php

//Finish bank-account.php
//
//Add the following method:
//
//function show_user_name_and_balance() { }
//Your method should return a string that contains the account's name and balance separated by a comma and space.
//For example, if an account object named ben has the name "Benson" and a balance of 17.25,
//the call of ben.show_user_name_and_balance() should return:
//
//Benson, $17.25
//There are some special cases you should handle.
//If the balance is negative, put the - sign before the dollar sign.
//Also, always display the cents as a two-digit number. For example, if the same object had a balance of -17.5,
//your method should return:
//
//Benson, $17.50

require_once 'BankAccount.php';

$benson = new BankAccount('Benson', -17.50);
echo $benson->showUserNameAndBalance();

