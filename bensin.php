<?php
echo "<h1>Bahan Bakar</h1>";
if(isset($_POST['liter']) && isset($_POST['bensin'])){
    $liter = $_POST['liter'];
    $bensin = $_POST['bensin'];

    class shell {
        public $liter;
        public $bensin;
        protected $ppn = 0.10;
        protected $shellsuper = 15420;
        protected $shellvpower = 16130;
        protected $shellvpowerdiesel = 18310;
        protected $shellvpowernitro = 16510; 
        
        function __construct($liter, $bensin){
            $this->liter = $liter;
            $this->bensin = $bensin;
        }
    
        function harga(){
            $harga_per_bensin = $this->{$this->bensin};
            $harga_ppn = $this->liter * $harga_per_bensin * $this->ppn;
            $hasil =$this->liter * $harga_per_bensin + $harga_ppn; 
            return number_format($hasil,2);
        }
    }

    class beli extends shell {
        function proses_belanja() {
            $shell_purchase = new shell($this->liter, $this->bensin);
            $total_price = $shell_purchase->harga();
            echo  "<br/>";
            echo "---BUKTI TRANSAKSI---";
            echo "<p>Anda membeli bahan bakar minyak tipe  $this->bensin</p>";
            echo "Dengan jumlah : ". $this->liter ." liter<br>";
            echo "Harga per Liter : Rp. $total_price";
        }
        
    
    }
    
    $purchase = new beli($liter, $bensin);
    $purchase->proses_belanja();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
</head>
<body style="display: flex; flex-direction: column; align-items: center">

    <form action="" method="post">
        <label for="liter">Masukkan jumlah liter: </label>
        <input type="number" name="liter" required><br>
        <label for="bensin">Pilih tipe bahan bakar</label>
        <select name="bensin" id="bensin" placeholder="shellsuper" required>
            <option value="shellsuper">Shell Super</option>
            <option value="shellvpower">Shell V-Power</option>
            <option value="shellvpowerdiesel">Shell V-Power Diesel</option>
            <option value="shellvpowernitro">Shell V-Power Nitro</option>
        </select>
        <input type="submit" value="beli">
    </form>
</body>
</html>
 