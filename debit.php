<?php
class DebitCard{
    private $ammount;
    private $purpose;
    private $deposit;
    private $withdraw;

    public function __construct($initialAmmount=0, $initialPurpose)
    {
        $this->ammount = $initialAmmount;
        $this->purpose = $initialPurpose;

    }
    
    public function depositAmmount($depositMoney, $depositPurpose){
        $this->deposit = $depositMoney;

        $this->ammount += $depositMoney;
        $this->purpose = $depositPurpose;
    }

    public function withdrawAmmount($withdrawtMoney, $withdrawPurpose){
        if( ($withdrawtMoney>$this->ammount) ){
            $this->withdraw = false;

            $this->ammount -= 0;
            $this->purpose = null;
        }else {
            $this->withdraw = $withdrawtMoney;

            $this->ammount -= $withdrawtMoney;
            $this->purpose = $withdrawPurpose;
        }
            
        
    }

    public function currentAmmount(){
        echo "Your current balance is: {$this->ammount} BDT/=";
        echo "<br>";
    }

    public function currentDeposit(){
        echo "Your current deposit is: {$this->deposit} BDT/=";
        echo "<br>";
    }

    public function currentWithdraw(){
        echo "Your current withdraw is: {$this->withdraw} BDT/=";
        echo "<br>";
    }

    public function currentPurpose(){
        echo "Transection purpose is: {$this->purpose}";
        echo "<br>";
    }

    public function transections(){
        if($this->withdraw === false){
            echo "Sorry! You have insuficient balance.";
            echo "<br>";
        }else{
            if($this->deposit){
                $this->currentDeposit();
            }
            if($this->withdraw){
                $this->currentWithdraw();
            }
            $this->currentAmmount();
            $this->currentPurpose();
        }

        echo "<br>";

        //Clear current deosit and withdraw
        $this->deposit = 0;
        $this->withdraw = 0;
    }



}

$ac1 = new DebitCard(500, 'Account Opening');
$ac1->transections();
$ac1->depositAmmount(200, 'My Deposit');
$ac1->transections();
$ac1->depositAmmount(900, 'Service sale to EcomBD');
$ac1->transections();
$ac1->withdrawAmmount(600, 'Payment for Hosting');
$ac1->transections();
$ac1->depositAmmount(100, 'Product sale to EcomBD');
$ac1->transections();
$ac1->withdrawAmmount(6000, 'Payment for Hosting');
$ac1->transections();
$ac1->withdrawAmmount(600, 'Payment for Domain');
$ac1->transections();

// Output

/* Your current balance is: 500 BDT/=
Transection purpose is: Account Opening

Your current deposit is: 200 BDT/=
Your current balance is: 700 BDT/=
Transection purpose is: My Deposit

Your current deposit is: 900 BDT/=
Your current balance is: 1600 BDT/=
Transection purpose is: Service sale to EcomBD

Your current withdraw is: 600 BDT/=
Your current balance is: 1000 BDT/=
Transection purpose is: Payment for Hosting

Your current deposit is: 100 BDT/=
Your current balance is: 1100 BDT/=
Transection purpose is: Product sale to EcomBD

Sorry! You have insuficient balance.

Your current withdraw is: 600 BDT/=
Your current balance is: 500 BDT/=
Transection purpose is: Payment for Domain */
