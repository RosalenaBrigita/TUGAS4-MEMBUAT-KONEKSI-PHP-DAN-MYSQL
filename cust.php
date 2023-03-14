<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Classic Database</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>  
        <div class="container">
       
            <div class="nav">
                <ul>
                    <li>
                        <a class="nav-link active" href="<?php echo "cust.php"; ?>">Customers</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo "emp.php"; ?>">Employees</a>   
                    </li>            
                </ul>              
            </div>
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </div>
                        <a href="#" class="logo">Database</a>
                </div>
            <!--Customers-->
            <section class="customers adjust" >
                <div class="title">
                    <h1>Data Customers</h1>
                    <form method="GET" action="cust.php" style="text-align: center">
                        <input type="text" name="search" placeholder="search..." value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>

                    <div class="center">
                    <table>
                        <thead>
                            <tr>
                            <th>Customer Number</th>
                            <th>Customer Name</th>
                            <th>Contact Last Name</th>
                            <th>Contact First Name</th>
                            <th>Phone</th>
                            <th>Address Line 1</th>
                            <th>Address Line 2</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Postal Code</th>
                            <th>Country</th>
                            <th>Sales Rep Employee Number</th>
                            <th>Credit Limit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            //proses menampilkan data dari database:
                            //siapkan query SQL
                            if(isset($_GET['search'])) {
                                $searching = $_GET['search'];
                                $query = "select * from customers where customerNumber like '%"
                                .$searching."%' or customerName like '%".$searching."%' 
                                or contactLastName like '%".$searching."%' or contactFirstName like '%".$searching."%' 
                                or phone like '%".$searching."%' or addressLine1 like '%".$searching."%' 
                                or addressLine2 like '%".$searching."%' or city like '%".$searching."%' 
                                or state like '%".$searching."%' or postalCode like '%".$searching."%'  
                                or country like '%".$searching."%' or salesRepEmployeeNumber like '%".$searching."%' 
                                or creditLimit like '%".$searching."%' order by customerNumber asc"; 
                            }   
                            else {
                                $query = "select * from customers";
                            }

                            $print = mysqli_query ($conn, $query);
                            while ($data = mysqli_fetch_array($print)) {
                    
                            ?>

                            <tr>
                                <td><?php echo $data['customerNumber'];  ?></td>
                                <td><?php echo $data['customerName'];  ?></td>
                                <td><?php echo $data['contactLastName'];  ?></td>
                                <td><?php echo $data['contactFirstName'];  ?></td>
                                <td><?php echo $data['phone'];  ?></td>
                                <td><?php echo $data['addressLine1'];  ?></td>
                                <td><?php echo $data['addressLine2'];  ?></td>
                                <td><?php echo $data['city'];  ?></td>
                                <td><?php echo $data['state'];  ?></td>
                                <td><?php echo $data['postalCode'];  ?></td>
                                <td><?php echo $data['country'];  ?></td>
                                <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
                                <td><?php echo $data['creditLimit']; } ?></td>     
                            </tr> 
                        </tbody>
                    </table>
                    </div>
                </div>
            </section>


            </div>
        <script>
            let toggle = document.querySelector('.toggle');
            let topbar = document.querySelector('.topbar');
            let nav = document.querySelector('.nav ');
            let main = document.querySelector('.main ');

            toggle.onclick = function() {
                toggle.classList.toggle('active');
                topbar.classList.toggle('active');
                nav.classList.toggle('active');
                main.classList.toggle('active');
            }
        </script>
    </body>
</html>