<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                    <div class="container-fluid">
                        <section id="cards">
                        <div class="row">
                            <div class="col-xl-6 col-sm-6 col-12">
                                <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                        <i class="fas fa-store fa-5x float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                        <?php
                                            //The COUNT SQL statement that we will use.
                                            $sql = "SELECT COUNT(*) AS num FROM record";
                                            //Prepare the COUNT SQL statement.
                                            $stmt = $db->prepare($sql);
                                            //Execute the COUNT statement.
                                            $stmt->execute();
                                            //Fetch the row that MySQL returned.
                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            //The $row array will contain "num". Print it out.
                                        ?>
                                        <h3><?php echo $row["num"]; ?></h3>
                                        <span>Total Links</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-6 col-12">
                                <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                        <i class="fas fa-users fa-5x float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                        <?php
                                            //The COUNT SQL statement that we will use.
                                            $sql1 = "SELECT COUNT(DISTINCT Country) as num FROM record";
                                            //Prepare the COUNT SQL statement.
                                            $stmt1 = $db->prepare($sql1);
                                            //Execute the COUNT statement.
                                            $stmt1->execute();
                                            //Fetch the row that MySQL returned.
                                            $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                                            //The $row array will contain "num". Print it out.
                                        ?>
                                        <h3><?php echo $row1["num"]; ?></h3>
                                        <span>total Countries</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                        <i class="fas fa-chart-line fa-5x float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                        <?php
                                            // $date = date();
                                            // //The COUNT SQL statement that we will use.
                                            // $sql = "SELECT COUNT(*) AS num FROM user where order_status=? OR order_status=?";
                                            // //Prepare the COUNT SQL statement.
                                            // $stmt = $db->prepare($sql);
                                            // //Execute the COUNT statement.
                                            // $stmt->execute(array(0,1));
                                            // //Fetch the row that MySQL returned.
                                            // $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                            //The $row array will contain "num". Print it out.
                                        ?>
                                        <h3>
                                            <?php //echo $row["num"]; ?>
                                        </h3>
                                        <span>Today's Entries</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                        <i class="fas fa-frown fa-5x float-left"></i>
                                        </div>
                                        <div class="media-body text-right">
                                        <h3>1</h3>
                                        <span>Low Rated Vendors</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div> -->
                            </div>
                        </section>
                    </div>
                </main>