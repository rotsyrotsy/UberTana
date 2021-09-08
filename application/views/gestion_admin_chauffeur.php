<h1 class="h3 mb-2 text-gray-800">Tableau</h1>
  <p class="mb-4">Tableau permettant de lister les clients et les chauffeurs avec leurs notes avec la capacité de les 
      supprimer en cas de trop mauvaise note .
  </p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Liste des chauffeurs</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Nom</th>
                          <th>Moyenne des notes</th>
                          <th></th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                          <th>Nom</th>
                          <th>Moyenne des notes</th>
                          <th></th>
                      </tr>
                  </tfoot>
                  <tbody>
                    <?php for($i=0;$i<count($note);$i++){ ?>
                      <tr>
                          <td><a href="#"><?php echo $note[$i]['nom'];?></a></td>
                          <td><?php echo $note[$i]['note'];?></td>
                          <td><a href="#"><i class="fas fa-bell fa-trash"></i> </a></td>
                          
                      </tr>
                    <?php }?> 
                  </tbody>
              </table>
          </div>
      </div>
  </div>