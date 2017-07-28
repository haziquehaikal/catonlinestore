<?php
//core file for admin panel
function sideMenu(){
  echo '<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
  <ul class="nav" id="main-menu">
<li class="text-center">

</li>

      <li>
          <a class="active-menu"  href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
      </li>
      <li>
         <a  href="analytic.php"><i class="fa fa-line-chart"></i> Sales Overview</a>
     </li>
       <li>
          <a  href="productList.php"><i class="fa fa-desktop"></i> Manage Product</a>
      </li>
      <li>
          <a  href="orders.php"><i class="fa fa-table"></i></i> Manage Orders</a>
      </li>
      <li>
          <a  href="users.php"><i class="fa fa-user"></i></i> Manage Users</a>
      </li>
      <li>
          <a  href="../main/logout.php"><i class="fa fa-user"></i></i> Logout</a>
      </li>
          </ul>
        </li>
  </ul>

</div>

</nav>';
}

function vendorList(){
  require_once('../main/connect.php');
  $qr = mysql_query("SELECT * from vendor");
  $count = mysql_num_rows($qr);
  if(!$qr){
    die (mysql_error());
  }else {
    while ($data = mysql_fetch_array($qr)) {
      echo '<option value="'.$data["vendorID"].'">'.$data['companyName'].'</option>';
    }
  }
}

function status($haziqcomel){
  if ($haziqcomel == '2'){
     return '<span class="label label-danger">TRANSACTION FAILED</span>';
  }
  else if($haziqcomel == '1') {
     return '<span class="label label-success">DELIVERED</span>';
  }
  else if($haziqcomel == '0'){
    return '<span class="label label-warning">PENDING</span>';
  }
}

function level($tera){
  if ($tera == '2'){
     return '<span class="label label-danger">BANNED</span>';
  }
  else if($tera == '1') {
     return '<span class="label label-success">ACTIVE</span>';
  }
  else if($tera == '0'){
    return '<span class="label label-warning">SUSPENDED</span>';
  }
}

//display orders
function order(){
  require_once('../main/connect.php');
  $qr = mysql_query("SELECT * from ORDERS");
  $count = mysql_num_rows($qr);
  if(!$qr){
    die (mysql_error());
  }else {
    while ($data = mysql_fetch_array($qr)) {
      echo '
          <tr>
          <td>'.$data['orderid'].'</td>
          <td>'.$data['memid'].'</td>
          <td>RM '.$data['total'].'</td>
          <td>'.$data['date'].'</td>';
          echo '<td>'.status($data['status']).'</td>';
          echo '<td><a href=deleteorder.php?id='.$data['memid'].'><button class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span>  Delete Order</button></a>
          <a href=vieworder.php?id='.$data['orderid'].'><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  View Order</button></a></td>
          </tr>';
    }
  }
}

//maange users
function users(){
  require_once('../main/connect.php');
  $qr = mysql_query("SELECT * from users");
  $count = mysql_num_rows($qr);
  if(!$qr){
    die (mysql_error());
  }else {
    while ($data = mysql_fetch_array($qr)) {
      echo '
          <tr>
          <td>'.$data['memid'].'</td>
          <td>'.$data['email'].'</td>
          <td>'.$data['fname'].'</td>
          <td>'.$data['level'].'</td>';
          echo '<td>'.level($data['status']).'</td>';
          echo '<td><a href=deleteorder.php?id='.$data['memid'].'><button class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span>  Delete User</button></a>
          <a href=viewuser.php?id='.$data['memid'].'><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  View User</button></a></td>
          </tr>';
    }
  }
}
//maange vendor
function vendor(){
  require_once('../main/connect.php');
  $qr = mysql_query("SELECT * from vendor");
  $count = mysql_num_rows($qr);
  if(!$qr){
    die (mysql_error());
  }else {
    while ($data = mysql_fetch_array($qr)) {
      echo '
          <tr>
          <td>'.$data['vendorID'].'</td>
          <td>'.$data['companyName'].'</td>
          <td>'.$data['email'].'</td>';
          echo '<td><a href=deleteorder.php?id='.$data['vendorID'].'><button class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span>  Delete Vendor</button></a>
          <a href=viewvendor.php?id='.$data['vendorID'].'><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  View Vendor</button></a></td>
          </tr>';
    }
  }
}

function viewVendor(){
  $id = $_GET['id'];
  $qr = mysql_query("SELECT * FROM vendor WHERE vendorID = '$id'");
  if(!$qr){
    die ("".mysql_error());
  }else {
    while ($data = mysql_fetch_assoc($qr)) {
      echo '<form method="post" action="updateVen.php?id='.$data['vendorID'].'">
          <div class="form-group">
              <label>Vendor ID:</label>
              <br>
              <b>'.$data['vendorID'].'</b>
          </div>
          <div class="form-group">
              <label>Company name:</label>
              <br>
              <input class="form-control" name="name" value="'.$data['companyName'].'">
          </div>
          <div class="form-group">
              <label>Company email:</label>
              <br>
              <input class="form-control" name="email" value="'.$data['email'].'">
          </div>

      <br />


    </div>

  <div class="col-md-6">
  <div class="form-group">
      <label>Company telephone:</label>
      <br>
      <input class="form-control" name="tel" value="'.$data['tel'].'">
  </div>
  <div class="form-group">
      <label>Company Address</label>
      <textarea class="form-control" rows="3" name="addr">'.$data['address'].'</textarea>
  </div>

      <button type="submit" name="update" class="btn btn-default">Update</button>
      <button type="reset" class="btn btn-primary">Reset</button>

  </div>
</form>';
    }
  }
}
function viewUser(){
  $id = $_GET['id'];
  $qr = mysql_query("SELECT * FROM users WHERE memid = '$id'");
  if(!$qr){
    die ("".mysql_error());
  }else {
    while ($data = mysql_fetch_assoc($qr)) {
      echo '<form method="post" action="updateUsr.php?id='.$data['memid'].'">
          <div class="form-group">
              <label>Member ID:</label>
              <br>
              <b>'.$data['memid'].'</b>
          </div>
          <div class="form-group">
              <label>Prefered username:</label>
              <br>
              <b>'.$data['username'].'</b>
          </div>
          <div class="form-group">
              <label>Customer name:</label>
              <input class="form-control" name="name" value="'.$data['fname'].'">
          </div>
          <div class="form-group">
              <label>customer email:</label>
              <input class="form-control" name="email" value="'.$data['email'].'">
          </div>
          <div class="form-group">
              <label>Telephone:</label>
              <br>
              <input class="form-control" name="tel" value="'.$data['tel'].'">
          </div>

      <br />


    </div>

  <div class="col-md-6">

  <div class="form-group">
      <label>Delivery Address</label>
      <textarea class="form-control" rows="3" name="addr">'.$data['address'].'</textarea>
  </div>


    <div class="form-group">
        <label>Update Access level</label>
        <select class="form-control" name="level">
            <option value="USER">Normal user</option>
            <option value="ADMIN">Administrator</option>
        </select>
    </div>
      <button type="submit" name="update" class="btn btn-warning">Update</button>
      <button type="reset" class="btn btn-primary">Reset</button>

  </div>
</form>';
    }
  }
}
//edit product
function viewOrder(){
  $id = $_GET['id'];
  $qr = mysql_query("SELECT users.memid,email,total,address,ORDERS.status,orderid FROM users,ORDERS WHERE orderid = '$id' and ORDERS.memid = users.memid");
  if(!$qr){
    die (mysql_error());
  }else {
    while ($data = mysql_fetch_assoc($qr)) {
      echo '<form method="post" action="updateStat.php?id='.$data['orderid'].'">
          <div class="form-group">
              <label>Member ID:</label>
              <br>
              <b>'.$data['memid'].'</b>
          </div>
          <div class="form-group">
              <label>Customer email:</label>
              <br>
              <b>'.$data['email'].'</b>
          </div>
          <div class="form-group">
              <label>Order ID:</label>
              <br>
              <b>'.$data['orderid'].'</b>
          </div>
          <div class="form-group">
              <label>Total Price:</label>
              <br>
              RM <b>'.number_format($data['total'],2).'</b>
          </div>
      <br />


    </div>

  <div class="col-md-6">

  <div class="form-group">
      <label>Delivery Address</label>
      <textarea class="form-control" rows="3" name="desc">'.$data['address'].'</textarea>
  </div>


    <div class="form-group">
        <label>Update Status</label>
        <select class="form-control" name="stat">
            <option value="1">Delivers</option>
            <option value="0">Pending</option>
            <option value="2">Issue</option>
        </select>
    </div>
      <button type="submit" name="update" class="btn btn-default">Update</button>
      <button type="reset" class="btn btn-primary">Reset</button>

  </div>
</form>';
    }
  }
}

//edit product
function edit(){
  $id = $_GET['id'];
  $qr = mysql_query("SELECT * FROM PRODUCT where uuid = '$id'");
  if(!$qr){
    die (mysql_error());
  }else {
    while ($data = mysql_fetch_assoc($qr)) {
      echo '<form method="post" action="update.php?id='.$data['uuid'].'">
          <div class="form-group">
              <label>Product Name</label>
              <input class="form-control" value="'.$data['brand'].'" name="name">
          </div>
            <label>Item Price</label>
          <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
              <input type="text" class="form-control" value='.$data['price'].' placeholder="Item Price"  name="price">
          </div>

          <div class="form-group">
              <label>Product Description</label>
              <textarea class="form-control" rows="3" name="desc">'.$data['info'].'</textarea>
          </div>


            <div class="form-group">

            <label>Product Type</label>
            <select class="form-control" name="type">
                <option value="aqua">Aquatic</option>
                <option value="cat">cat</option>
                <option value="supply">Suppply</option>
                <option value="assc">Accories</option>
            </select>
        </div>
      <br />

    </div>

  <div class="col-md-6">
  <table class="table table-bordered table-hover">
        <tr>
          <th>Image</th>
          <td>
            <img src="../gambar/'.$data['image_id'].'" class="img-thumbnail" alt="report image" width="300" height="100">
          </td>
          </tr>
          </table>

      <button type="submit" name="update" class="btn btn-default">Update</button>
      <button type="reset" class="btn btn-primary">Reset</button>

  </div>
</form>';
    }
  }
}

//list out all product in table
function listProduct(){
  require_once('../main/connect.php');
  $qr = mysql_query("SELECT * from PRODUCT");
  $count = mysql_num_rows($qr);
  if(!$qr){
    die (mysql_error());
  }else {
    while ($data = mysql_fetch_array($qr)) {
      echo '
          <tr>
          <td>'.$data['brand'].'</td>
          <td>'.$data['type'].'</td>
          <td>'.$data['uuid'].'</td>
          <td><a href=editProduct.php?id='.$data['uuid'].'><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Edit Product</button></a>
          <a href=delete.php?id='.$data['uuid'].'><button class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span>  Delete Product</button></a></td>
          </tr>';
    }
  }
}
