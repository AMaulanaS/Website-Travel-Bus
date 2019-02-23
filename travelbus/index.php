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
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //fonts -->
</head>

<body onload="onLoaderFunc()">
    <h1>Aplikasi Travel Bus</h1>
    <div class="container">

        <div class="sel-reg">
            <!-- input fields -->

            <div class="inputForm">
                <h2>Isikan data dan lakukan pilih kursi</h2>
                <div class="mr_movmain">
                    <div class="movits-left">
                            <label> Pilih Rute
                                <span>*</span>
                            </label>
                            <select name="ruteBerangkat" id="RuteBerangkat" style="width: 191px; margin-left: 15px; border: 3px double #CCCCCC; padding:5px 10px;" required/>
						<?php
						include('db.php');
						$result = mysqli_query($bd, "SELECT * FROM rutetravel");
						while($row = mysqli_fetch_array($result))
							{
                                echo '<option value="'.$row['jalur'].'">';
								echo $row['jalur'];
								echo '</option>';
							}
						?>
						</select>
                            
                    </div>

                    
                </div>

                <div class="mr_movmain">
                    <div class="movits-right">
                        <label>
                            Tanggal keberangkatan
                            <span>*</span>
                        </label>
                        <input name="tglBerangkat" type="date" id="TanggalBerangkat" required/>
						
                    
                    </div>
                </div>

                <div class="mr_movmain">
                    <div class="movits-left">
                        <label> Nama
                            <span>*</span>
                        </label>
                        <input name="namaPenumpang" type="text" id="Username" required>
                    </div>
                    <div class="movits-right">
                        <label> Jumlah Kursi
                            <span>*</span>
                        </label>
                        <input name="jmlKursi" type="number" id="Numseats" required min="1">
                    </div>
                </div>
                <button onclick="takeData()">Start Selecting</button>
            </div>
            <!-- //input fields -->
            <!-- seat availabilty list -->
            <ul class="seat_sel">
                <li class="smallBox greenBox">Kursi yang Dipilih</li>

                <li class="smallBox redBox">Kursi yang Telah Dipesan</li>

                <li class="smallBox emptyBox">Kursi Tersedia</li>
            </ul>
            <!-- seat availabilty list -->
            <!-- seat layout -->
            
            <div class="seatStructure txt-center" style="overflow-x:auto;">
                
                <table id="seatsBlock">
                    <p id="notification"></p>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>2</td>
                        
                        <td></td>
                        <td>3</td>
                        <td>4</td>
                        
                    </tr>

                    <?php
                    for ($i='A'; $i<='E'; $i++)
                    {   
                        if ($i=='C'){
                            echo "<td class='seatVGap'></td>"; } ?>    
                        <tr>
                            <td><?php echo $i; ?></td>
                        
                        <?php
                        for($j=1; $j<=4; $j++)
                        { ?>

                            <td>
                                <input name="pilihKursi[]" type="checkbox" class="seats" value="<?php echo $i.$j ?>">
                            </td>
                            
                            <?php
                            if ($j%2==0){
                                echo "<td class='seatGap'></td>";
                            }
                            ?>
                            
                            <?php } ?>
                        </tr>
                        <?php } ?>

                    <!--<tr>
                        <td>A</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A2">
                        </td>
                        
                        <td class="seatGap"></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="A4">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>B</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="B4">
                        </td>
                        
                    </tr>

                    <tr class="seatVGap"></td>

                    <tr>
                        <td>C</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="C4">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>D</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="D4">
                        </td>
                        
                    </tr>

                    <tr>
                        <td>E</td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E1">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E2">
                        </td>
                        
                        <td></td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E3">
                        </td>
                        <td>
                            <input name="pilihKursi[]" type="checkbox" class="seats" value="E4">
                        </td>
                        
                    </tr> -->

                    

                    
                </table>

                <br>
                <button name="submit" value="Submit" onclick="updateTextArea()">Confirm</button>
            </div>
            <!-- //seat layout -->
            <!-- details after booking displayed here -->
            <form method="post" action="cetak_tiket.php"> 
            <div class="displayerBoxes txt-center" style="overflow-x:auto;">
                <table class="Displaytable sel-table" width="100%">
                    <tr>
                        <th>Tanggal Berangkat</th>
                        <th>Rute</th>
                        <th>Nama</th>
                    </tr>
                    <tr>
                        <td>
                            <textarea id="tanggalDisplay" name="tanggalDisplay"></textarea>
                        </td>
                        <td>
                            <textarea id="ruteDisplay" name="ruteDisplay"></textarea>
                        </td>
                        <td>
                            <textarea id="nameDisplay" name="nameDisplay"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>Tempat Duduk</th>
                    </tr>
                    <tr>
                        <td>
                            <textarea id="NumberDisplay" name="NumberDisplay"></textarea>
                        </td>
                        <td>
                            <textarea id="seatsDisplay" name="seatsDisplay"></textarea>
                        </td>
                    </tr>
                </table>
                <button type="submit">Print</button>
            <!-- <input type="submit" value="Print"> -->
            </form>
            </div>
            <!-- //details after booking displayed here -->
        </div>
                        
    </div>
                        <!-- </form> -->
    <div class="copy-mss">
        <p>© Travel Bus Alkhaf.</p>
    </div>
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- script for seat selection -->
    <script>
        /* ******************************************** */
        /* Koding di sini */
        /* ******************************************** */
        function onLoaderFunc() {
            $(".seatStructure *").prop("disabled", true);
        }

        function takeData() {
            if (($("#Username").val().length == 0) || ($("#Numseats").val().length == 0)) {
                alert("Silahkan Masukkan Data Penumpang dan Jumlah Kursi");
            } else {
                $(".inputForm *").prop("disabled", true);
                $(".seatStructure *").prop("disabled", false);
                document.getElementById("notification").innerHTML =
                    "<b style='margin-bottom:0px;background:#ff9800;letter-spacing:1px;'>Pilih Kursi Dapat Dilakukan!</b>";
            }
        }


        function updateTextArea() {
            if ($("input:checked").length == ($("#Numseats").val())) {
                $(".seatStructure *").prop("disabled", true);

                var allTanggalVals = [];
                var allNameVals = [];
                var allNumberVals = [];
                var allSeatsVals = [];
                var date = new Date($('#TanggalBerangkat').val());
                    day = date.getDate();
                    month = date.getMonth() + 1;
                    year = date.getFullYear();
 
                $('#RuteBerangkat').click(function() {
                    var value = $("#select_option option:selected").val();
                    //To display the selected value we used <p id="result"> tag in HTML file
                    $('#result').append(value);
                });
                var allRuteVals = $("#RuteBerangkat option:selected").val();
                allNameVals.push($("#Username").val());
                allNumberVals.push($("#Numseats").val());
                $('#seatsBlock :checked').each(function () {
                    allSeatsVals.push($(this).val());
                });
                //Menampilkan data
                $('#tanggalDisplay').val([year, month, day].join('-'));
                $('#ruteDisplay').val(allRuteVals);
                $('#nameDisplay').val(allNameVals);
                $('#NumberDisplay').val(allNumberVals);
                $('#seatsDisplay').val(allSeatsVals);
            } else {
                alert("Please select " + ($("#Numseats").val()) + " seats");
            }
        }


        function myFunction() {
            alert($("input:checked").length);
        }

        $(":checkbox").click(function () {
            if ($("input:checked").length == ($("#Numseats").val())) {
                $(":checkbox").prop('disabled', true);
                $(':checked').prop('disabled', false);
            } else {
                $(":checkbox").prop('disabled', false);
            }
        });
    </script>
    <!-- //script for seat selection -->

</body>

</html>