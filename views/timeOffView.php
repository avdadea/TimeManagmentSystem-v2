<?php

class TimeOffView {
    public function renderTimeOffRequests($requests, $role) {
        ?>
        <div class="content pb-0">
            <div class="orders">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Time Off Request Master </h4>
                                <?php if ($role == 2) { ?>
                                    <h4 class="box_title_link"><a href="create_request.php">Create time off request</a> </h4>
                                <?php } ?>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                              <th width="3%">No.</th>
                                              <th width="5%">ID</th>
                                              <th width="12%">Employee Name</th>
                                              <th width="7%">Leave Type</th>
                                              <th width="7%">From</th>
                                              <th width="10%">To</th>
                                              <th width="23%">Reason</th>
                                              <th width="13%">Medical Document</th>
                                              <th width="15%">Request Status</th>
                                              <th width="20%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($requests)) {
                                                ?>
                                                	<tr>
                                       <td><?php echo $i?>.</td>
									   <td><?php echo $row['id'] ?></td>
									   <td><?php echo $row['name'] ?></td>
									   <td><?php echo $row['leave_type'] ?></td>  
									   <td><?php echo $row['startdate'] ?></td>
									   <td><?php echo $row['enddate'] ?></td>
									   <td><?php echo $row['reason'] ?></td>
									   <td>
                              <?php if (!empty($row['medical_document'])): ?>
                                   <a href="pdfView.php?id=<?php echo $row['id'] ?>" target="_blank" style="color: blue; text-decoration: underline;">View PDF</a>
                                 <?php else: ?>
                                     No PDF uploaded
                                 <?php endif; ?>
                              </td>


                                       <td style="color: <?php echo ($row['status'] == 1) ? '#add8e6' : (($row['status'] == 2) ? '#8FED92' : '#FF3355'); ?>">
                                         <?php
                                         if ($row['status'] == 1) {
                                               echo "Pending";
                                         }elseif ($row['status'] == 2) {
                                              echo 'Approved';
                                        } else {
                                              echo 'Rejected';
                                          }
                                         ?>
                                          <?php if($_SESSION['role']==1 || $_SESSION['role']==3){ ?>
                                        <select class="form-control" onchange="update_timeoffreq_status('<?php echo $row['id']?>', 
                                        this.options[this.selectedIndex].value)">
                                            <option value="">Update Status</option>
                                            <option value="2">Approved</option>
                                            <option value="3">Rejected</option>
                                        </select>

                                        <?php } ?>
                                      </td>
									   <td> 
                                       <a href="time_off_request.php?id=<?php echo $row['id']?>&type=delete"> Delete</a>
                                    </td>
                                    </tr>
									<?php  
                                    $i++;
                                }?>
                                 </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function update_timeoffreq_status(id, select_value) {
                window.location.href = 'time_off_request.php?id=' + id + '&type=update&status=' + select_value;
            }
        </script>
        <?php
    }
}

?>
