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
                        <a class="nav-link " href="<?php echo "cust.php"; ?>">Customers</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo "emp.php"; ?>">Employees</a>   
                    </li>    
                    <li>
                        <a class="nav-link active" href="<?php echo "prod.php"; ?>">Products</a>
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
            <!--Employees-->
            <section class="employee adjust" >
                <div class="title">
                    <h1>Data Products</h1>
                    <form method="GET" action="prod.php" style="text-align: right;">            
                        <input type="text" name="search" placeholder="search..." value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    <div class="center">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Line</th>
                                <th>Product Scale</th>
                                <th>Product Vendor</th>
                                <th>Product Description</th>
                                <th>Quantity In Stock </th>
                                <th>Buy Price</th>
                                <th>MSRP</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                //proses menampilkan data dari database:
                                //siapkan query SQL
                                if(isset($_GET['search'])) {
                                    $searching = $_GET['search'];
                                    $query = "select * from products where productCode like '%"
                                    .$searching."%' or productName like '%".$searching."%' 
                                    or productLine like '%".$searching."%' or productScale like '%".$searching."%' 
                                    or productVendor like '%".$searching."%' or productDescription like '%".$searching."%' 
                                    or quantityInStock like '%".$searching."%' or buyPrice like '%".$searching."%' 
                                    MSRP like '%".$searching."%' order by productCode asc"; 
                                }   
                                else {
                                    $query = "select * from products";
                                }

                                $print = mysqli_query ($conn, $query);
                                while ($data = mysqli_fetch_array($print)) {
                        
                                ?>
                            
                            <tr>
                                <td><?php echo $data['productCode'];  ?></td>
                                <td><?php echo $data['productName'];  ?></td>
                                <td><?php echo $data['productLine'];  ?></td>
                                <td><?php echo $data['productScale'];  ?></td>
                                <td><?php echo $data['productVendor'];  ?></td>
                                <td><?php echo $data['productDescription'];  ?></td>
                                <td><?php echo $data['quantityInStock'];  ?></td>
                                <td><?php echo $data['buyPrice'];  ?></td>  
                                <td><?php echo $data['MSRP']; } ?></td>  
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