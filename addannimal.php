<?php 
require_once "code/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/css.css">

    <title>ระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระ จังหวัดชลบุรี</title>
  </head>
  <body>
    <div class="row m-5">
      <div class="col-2">
        <img src="picture/logo.jpg" width="100px" class="float-right">
      </div>
      <div class="col-10">
        <div class="float-left">
          <h4>ระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระ จังหวัดชลบุรี</h4>
        </div>
        <div class="float-right">
          <button class="btn-light user">ผู้ใช้งาน</button>&nbsp;<b>|</b>&nbsp;<button class="btn-light">ออกจากระบบ</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <hr class="float-left" width="94%" size="20" color="black">
      </div>
    </div>


    <div class="container-fluid">

      <?php include('menu.php');  ?>

      <div id="display-1" class="col-sm-9 p-5 border border-dark rounded h-80 w-100"> 

        <div class="row" align="center">
          <div class="col-sm-6 offset-md-3">
            <form action="code/addannimal.php" method="POST">
              <center><label>ชื่อชนิดสัตว์ :&nbsp;&nbsp;</label><input required style="width: 60%;" type="text" name="annimal_name" class="form-control"><br>
                <input type="submit" class="btn btn-light" value="บันทึก"></center>
              </form>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 offset-md-3 mt-2 p-3" align="center">
              <form action="annimal_search.php" method="POST">
                <label class="float-left" style="margin-left: 6px;">ชื่อชนิดสัตว์ :&nbsp;&nbsp;</label>
                <input type="text" required style="width: 60%;" name="annimal_name_search" class="form-control float-left" id="annimal_name_search" value="">
                <button type="submit" class="btn btn-light float-left" id="search" style="margin-left: 5px;">ค้นหา</button>
              </form>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-sm-8 offset-md-2" style="height: 333px; overflow:auto; ">
              <!-- <table class="table table-bordered mt-5 table-striped mb-0"> -->
                <table  class="table table-striped table-bordered table-sm" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th scope="col-sm" align="center">ลำดับที่</th>
                    <th scope="col-sm" align="center">ชื่อชนิดสัตว์</th>
                    <th scope="col-sm" align="center" id="editannimal">แก้ไข</th>
                    <th scope="col-sm" align="center">ลบ</th>
                  </tr>
                </thead>
                <tbody id="tb1">
                  <?php
                  $sql = "SELECT * FROM Animal_Type WHERE status = '1'";
                  $result = $conn->query($sql);
                  $i = 1;
                  while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                      <th><?php echo $i;?></th>
                      <td><?php echo $row['Animal_Type_Name']?></td>
                      <td align="center"><button class="btn btn-light showeditannimal" data-id="<?php  echo $row['Animal_Type_Name']; ?>"><img src="picture/gg.png" width="20px" height="20px"></button></td>
                      <td align="center"> <button class="btn btn-light deleteannimal" data-id="<?php echo $row['Animal_Type_ID']; ?>"><img src="picture/delete.png" width="20px" height="20px"></button></td>
                    </tr>
                    <?php $i++; } ?>



                  </tbody>
                  <tbody id="tb2" style="display: none;">

                  </tbody>
                </table>

              </div>
            </div>

            <button class="btn btn-light float-left back">ย้อนกลับ</button>

          </div>

        </div>





        <div class="modal fade" id="showeditannimal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3">
              <div class="modal-header">
                <h5 class="modal-title float-left" id="exampleModalCenterTitle">แก้ไขชนิดสัตว์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="code/addannimal_edit.php" method="POST">
                <div class="modal-body">

                  <input type="text" name="nameannimal_edit" id="nameannimal_edit" class="form-control" value="">
                  <input type="hidden" name="nameannimal_old" id="nameannimal_old" class="form-control" value="">

                </div>
                <div class="mt-2">
                  <center><button type="submit" class="btn btn-light" >บันทึก</button></center>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="deleteannimal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3">
              <div class="modal-header">
                <h5 class="modal-title float-left" id="exampleModalCenterTitle">ลบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <center><img src="picture/unnamed.png" width="100px" height="100px">
                  <h1>ต้องการลบ<br>ข้อมูลหรือไม่</h1></center>
                </div>
                <div class="mt-2">
                  <form action="code/addannimal_delete.php" method="POST">
                    <input type="hidden" name="idupdate" id="idupdate" class="form-control" value="">
                    <button type="submit" class="btn btn-light float-left">ยืนยัน</button>
                    <button type="button" class="btn btn-light float-right" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content p-3">
                <div class="modal-header">
                  <h5 class="modal-title float-left" id="exampleModalCenterTitle">ข้อมูล user</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" align="center">
                  <img src="picture/user.png" width="50px"><br>
                  <input type="text" name="name" value="ชื่อ" class="form-control"><br>
                  <input type="text" name="name" value="นาามสกุล" class="form-control"><br>
                  <input type="text" name="name" value="เบอร์โทร" class="form-control"><br>
                  <textarea class="form-control">ที่อยู่</textarea>
                </div>
                <div class="mt-2">
                  <button type="button" class="btn btn-light float-right">แก้ไข</button>
                </div>
              </div>
            </div>
          </div>


          <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
          <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
          <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
          <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

          <script type="text/javascript">


            $(document).ready(function() {



             $('.back').on('click', function (e) {
              e.preventDefault()
              window.location.replace("http://localhost/project/mannageuser.php");

            })


             $('#myTab a').on('click', function (e) {
              e.preventDefault()
              $(this).tab('show')
            })

             $('.deleteannimal').on('click', function () {
              $('#deleteannimal').modal('show');
              var id = $(this).data('id');
              $('#idupdate').val(id);
              // alert(name);
            })

             $('.user').on('click', function () {
              $('#user').modal('show');
            })


             $('.showeditannimal').on('click', function () {
              $('#showeditannimal').modal('show');
              var name = $(this).data('id');
              $('#nameannimal_edit').val(name);
              $('#nameannimal_old').val(name);
            })
             $('.editamnimal').on('click', function(event) {
              var nameedit = $("#nameannimal_edit").val();
            });

             $('#search').on('click', function(event) {
              $('#tb1').hide();
              var namesearch = $("#annimal_name_search").val();
            // console.log(namesearch);
            $.ajax({
              url: 'code/annimal_search.php',
              type: 'POST',
              dataType: 'json',
              data: {namesearch:itemname},
              success:function(rs){
                console.log(rs);
              },error(error){
                console.log('error',error)
              }
            })


          });



           });

         </script>
       </body>
       </html>