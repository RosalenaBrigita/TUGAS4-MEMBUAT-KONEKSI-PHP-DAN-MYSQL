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
                        <a class="nav-link active" href="<?php echo "emp.php"; ?>">Employees</a>   
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
                    <h1>Data Employees</h1>
                    <form method="GET" action="cust.php" style="text-align: right;">            
                        <input type="text" name="search" placeholder="search..." value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                    <div class="center">
                    <table>
                        <thead>
                            <tr>
                                <th>Employee Number</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Extension</th>
                                <th>email</th>
                                <th>Office Code</th>
                                <th>Reports To</th>
                                <th>Job Title</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                //proses menampilkan data dari database:
                                //siapkan query SQL
                                if(isset($_GET['search'])) {
                                    $searching = $_GET['search'];
                                    $query = "select * from employees where employeeNumber like '%"
                                    .$searching."%' or lastName like '%".$searching."%' 
                                    or firstName like '%".$searching."%' or extension like '%".$searching."%' 
                                    or email like '%".$searching."%' or officeCode like '%".$searching."%' 
                                    or reportsTo like '%".$searching."%' or jobTitle like '%".$searching."%' 
                                    order by employeeNumber asc"; 
                                }   
                                else {
                                    $query = "select * from employees";
                                }

                                $print = mysqli_query ($conn, $query);
                                while ($data = mysqli_fetch_array($print)) {
                        
                                ?>
                            
                            <tr>
                                <td><?php echo $data['employeeNumber'];  ?></td>
                                <td><?php echo $data['lastName'];  ?></td>
                                <td><?php echo $data['firstName'];  ?></td>
                                <td><?php echo $data['extension'];  ?></td>
                                <td><?php echo $data['email'];  ?></td>
                                <td><?php echo $data['officeCode'];  ?></td>
                                <td><?php echo $data['reportsTo'];  ?></td>
                                <td><?php echo $data['jobTitle']; } ?></td>  
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