<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Pemesanan Travel bus</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Tayo Travel, Idola">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //fonts -->
</head>

<body>
    
    <!-- <h2>Silahkan cek kembali sebelum dicetak.</h2> -->
    <div class="container">
    <form method="post" action="cetak_tiket.php"> 
            <div id="printableArea" class="displayerBoxes txt-center" style="overflow-x:auto;">
            <h1>Aplikasi Travel Bus</h1>
                <table class="Displaytable sel-table" width="100%">
                    <tr>
                        <th>Tanggal Berangkat</th>
                        <td>Rute</td>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Tempat Duduk</th>
                    </tr>
                    <tr>
                        <td><?php echo $_POST['tanggalDisplay'];?></td>
                        <td><?php echo $_POST['ruteDisplay'];?></td>
                        <td><?php echo $_POST['nameDisplay'];?></td>
                        <td><?php echo $_POST['NumberDisplay'];?></td>
                        <td><?php echo $_POST['seatsDisplay'];?></td>
                        <!-- Membuat aplikasi Create -->
                        <?php
                            $tgl = $_POST['tanggalDisplay'];
                            $rute = $_POST['ruteDisplay'];
                            $nama = $_POST['nameDisplay'];
                            $jumlahkur = $_POST['NumberDisplay'];
                            $tmpduk = $_POST['seatsDisplay'];
                            
                            $ro = mysqli_query($bd, "SELECT * FROM rutetravel WHERE jalur='$rute'");
                            $row=mysqli_fetch_array($ro);
                            $jalur = $row['id'];

                            $no =0;
                            include('db.php');
                            $result1 = mysqli_query($bd, "SELECT tmp_duduk FROM pemesanan");
                            while($row1 = mysqli_fetch_array($result1)){
                                $td = $row1['tmp_duduk'];
                                if($td==$tmpduk){
                                    $no++;?>
                                    <script language="JavaScript">
                                            alert('Kursi telah dipesan');
                                            document.location='index.php';
                                    </script>
                                    <?php
                                }
                            }
                        if($no==0){
                            $sql = "INSERT INTO pemesanan (tgl, jalur, jml_kursi, tmp_duduk) 
                            VALUE ('$tgl', '$rute', '$jumlahkur', '$tmpduk')";
                            $query = mysqli_query($bd, $sql);
                        }

                            
                        ?>

                    </tr>
                    
                </table>
            </div>
            <button onclick="printDiv()">Print</button>
            <!-- <input type="submit" value="Print"> -->
            </form>
            <!-- //details after booking displayed here -->
        </div>
                        
    </div>
                       
    <div class="copy-mss">
        <p>© Travel Bus Alkhaf.</p>
    </div>
    <script>
       function printDiv() {
            var printContents = document.getElementById("printableArea").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            console.log("ditekan");
        }
    </script>

</body>

</html>