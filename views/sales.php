<!-- 3lach var_dump($Aff);  f ay blasa f page ktkon fiha data mes f west lmodal ktwli null -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="assets/styles/css/styles.css" rel="stylesheet" />
        <link href="assets/styles/css/modalstyle.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
 
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">SALES</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/dash">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Midicine</th>
                                            <th>Sale Number</th>
                                            <th>Date</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($Aff as $A): ?>
                                        <tr>
                                            <td><?php echo $A['full_name'] ;   ?> </td>
                                            <td><?php echo $A['med_name'] ;    ?> </td>
                                            <td><?php echo $A['sale_number']; ?> </td>
                                            <td><?php echo $A['sale_date'] ;   ?> </td>
                                            <td>
                                            <button type="button" class="btn btn-primary d-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                               delete
                                                </button>
                                        </td>
                                            <td>
                                                <button type="button" class="btn btn-primary update-btn" onclick="GetFormData(`<?php echo $A['user_id'] ?>`,`<?php echo $A['med_id'] ?>`,`<?php echo $A['full_name'] ?>`, '<?php echo $A['med_name']  ?>','<?php echo $A['sale_number']; ?>' ,  '<?php echo $A['sale_date'] ; ?>')" data-toggle="modal" data-target="#exampleModalCenter">
                                                update                                                             
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:300px !important;width:450px !important; left:40% !important;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="background-color:#2b2b28 !important;">
                                                    <div class="modal-header">
                                                    
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        are you sure you want to delete this sale 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        
                                                        <a href="/deletesale?saleid=<?php echo $A['sale_number']; ?>"><button type="button" class="btn " style ="background: #e3b04b !important;">contunie</button></a>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
<!-- --------------------------- -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="ion-ios-close">+</span>
        </button>
      </div>
      <div class="row no-gutters">
        <div class="col-md-6 d-flex">
          <div class="modal-body p-5 img d-flex img text-center d-flex align-items-center" style="background-image: url(assets/img2/Analgesics.jpeg);"></div>
        </div>
        <div class="col-md-6 d-flex">
          <div class="modal-body p-4 p-md-5 align-items-center color-2">
            <div class="tabulation tabulation2">
              <div class="d-flex tabs">
                <ul class="nav nav-tabs border-0">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#signin">Update Sale</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#signup">Update Sale</a>
                  </li>
                </ul>
              </div>
              <!-- Tab panes -->
              <div class="tab-content border-0">
                <div class="tab-pane p-0 container active" id="signin">
                  <div class="text w-100">
                    
                    <div>
                    <div  class="form-group mb-3">
                    <label for="SelectClient"  class="label">Choose a client</label>
                    <select  class="form-control" name="SelectClient" id="c-select" placeholder=" client" >
                        <option value=""  id="c-option" style="background-color:#2b2b28;"></option>
                        <?php foreach($Users as $a): ?>
                        <option value="<?php echo $a['user_id'] ?>" style="background-color:#2b2b28;"><?php echo $a['full_name'] ?></option>
                        <?php endforeach; ?>

                      
                    </select>
                    
                        </div>

                      <div  class="form-group mb-3">
                        <label for="SelectMIdicine"  class="label">Choose a midicine</label>
                        <select  class="form-control" id="m-select" name="SelectMIdicine"  placeholder=" midicine" >
                        <option value=""  id="m-option" style="background-color:#2b2b28;"></option>
                        <?php foreach($Midi as $m): ?>
                        <option value="<?php echo $m['med_id'] ?>" style="background-color:#2b2b28;"><?php echo $m['med_name'] ?></option>
                  
                        <?php endforeach; ?>
                    </select>
                        </div>
                        <div class="form-group mb-3">
                        <label class="label" for="upDate">DATE</label>
                        <input type="text" name="upDate" id ="upDate" class="datepicker form-control" value="">

                      </div>
                        <!-- Hidden input  -->
                        <input type="hidden" id="myHiddenField" >
 
                      <div class="form-group">
                        <button  onclick="sendForm()" class="form-control btn btn-primary rounded  px-3">Save</button>
                      </div>
                       </div>
                       <?php 


                ?>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal -->






        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="assets/js/js/jquery.min.js"></script>
        <script src="assets/js/js/scripts.js"></script>
        <script src="assets/js/js/popper.js"></script>
        <script src="assets/js/js/bootstrap.min.js"></script>
        <script src="assets/js/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="assets/js/js/datatables-simple-demo.js"></script>
    </body>

        
        

       
</html>
