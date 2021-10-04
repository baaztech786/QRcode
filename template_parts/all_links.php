<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Home/Links</li>
        </ol>
    </div>
    <div class="container-fluid" >
        <section id="vendors" style="max-height: 330px; overflow-y:auto;">
        <div class="row shadow-lg rounded p-4 m-4">
              <table class="table table-hover">
                <a href="links.php?page=add" class="btn btn-primary" style="margin-left:90%;margin-bottom:1%;">Add New</a>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th>QRcode</th>
                    <th>Country</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                        $get=$db->prepare("SELECT * FROM record");
                        $get->execute();
                        $record=$get->fetchAll(PDO::FETCH_ASSOC);

                        $i=1;
                        if($get->rowCount() > 0) //check record exists
                        {
                          foreach ($record as $key => $value)
                          {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $value['name']; ?></td>
                              <td><img src="uploads/qrcode/<?php echo $value['qrcode']; ?>" alt="QRcode" width="80"></td>
                              <td><?php echo $value['country']; ?></td>
                              <!-- <td><a href="links.php?page=update&pid=<?php echo $value['rid'];  ?>" class="btn btn-success">Edit</a></td>
                              <td><a href="links.php?page=delete&pid=<?php echo $value['rid'];  ?>" class="btn btn-success">Delete</a></td> -->
                            </tr>

                            <?php
                            $i++;
                          }
                        }
                        else
                        {
                          ?>
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>No Record Found</td>
                              <td></td>
                              <td></td>
                          </tr>
                          <?php
                        }
                      ?>
                </tbody>
              </table>
          </div>
        </section>
    </div>
</main>