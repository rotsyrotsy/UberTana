<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Statistiques des chiffres d'affaires par année : 
                            <form class="" action="<?php echo site_url("Admin/affCA")?>" method="post">
                                    <select class="form-control" name="annee" id="year">
                                        <option>Année</option>
                                        <?php for($i=0;$i<count($year);$i++){ ?>
                                            <option><?php echo $year[$i]['annee']; ?></option>
                                        <?php }?>
                                    </select>
                                    <p></p>
                                    <input class="btn btn-primary" type="submit" value="Valider">
                                
                            </form>
                        </h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example --
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                               Moyenne des Chiffre d'affaire (Mois)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div-->
                        <div class="col-xl-3 col-md-6 mb-4">
                            
                        </div>
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Moyenne des Chiffre d'affaire Annuel</div>
                                            
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                                <?php if(ISSET($moyenne)) { 
                                                    echo $moyenne['moyenneca']; 
                                                }
                                                else{
                                                    $moyenne['moyenneca'] = 2021;
                                                    echo $moyenne['moyenneca'];  
                                                }
                                                ?>
                                            </div>
                                           
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Graphe Chiffre d'affaire Annuel : 
                                        <?php if(ISSET($annee)) { 
                                            echo $annee; 
                                        }?>
                                    </h6>
                                    
                                </div>
                                <!-- Card Body -->
                               
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        
                    </div>
                </div>