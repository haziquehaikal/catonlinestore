<?php

function myacc(){
  require_once('connect.php');
  $id = $_SESSION['username'];
  $qr = mysql_query("SELECT * FROM orders_details WHERE username = '$id'");
  if(!$qr){
    die (mysql_error());
  }else {
    while($data = mysql_fetch_array($qr)){
              echo '
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="firstname">Firstname</label>
                              <input type="text" class="form-control" id="firstname" value="'.$data['username'].'">
                          </div>
                      </div>
                  <!-- /.row -->

                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="company">Company</label>
                              <input type="text" class="form-control" id="company">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="street">Street</label>
                              <input type="text" class="form-control" id="street">
                          </div>
                      </div>
                  </div>
                  <!-- /.row -->

                  <div class="row">
                      <div class="col-sm-6 col-md-3">
                          <div class="form-group">
                              <label for="city">Company</label>
                              <input type="text" class="form-control" id="city">
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="form-group">
                              <label for="zip">ZIP</label>
                              <input type="text" class="form-control" id="zip">
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="form-group">
                              <label for="state">State</label>
                              <select class="form-control" id="state"></select>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <div class="form-group">
                              <label for="country">Country</label>
                              <select class="form-control" id="country"></select>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="phone">Telephone</label>
                              <input type="text" class="form-control" id="phone">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" class="form-control" id="email" value="'.$data['email'].'">
                          </div>
                      </div>
                      <div class="col-sm-12 text-center">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>

                      </div>
                ';
            }
          }
        }
//check user orders
function checkOrder(){
  require_once('connect.php');
  $user = $_SESSION['username'];
  $src = mysql_query("SELECT * FROM users WHERE username = '$user'");
  $id = mysql_fetch_array($src);
  $see = $src['memid'];
  $qr = mysql_query("SELECT * FROM orders_details WHERE memid = '$see'");
  if(!$qr){
    die (mysql_error());
  }else {
    while($data = mysql_fetch_array($qr)){
      echo '<tbody>
          <tr>
              <th>#'.$data['orderid'].'</th>
              <td>'.$data['date'].'</td>
              <td>RM '.$data['total'].'</td>
              <td><span class="label label-info">Being prepared</span>
              </td>
          </tr>
      </tbody>';
    }
  }
}

//display user info
function userDeatils(){
  require_once('connect.php');
  $qr = "SELECT * from users";
}
