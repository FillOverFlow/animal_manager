<?php 
require_once 'code/connect.php';
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
}
 ?>
<!doctype html>
<html lang="en">
<head>
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
        <a class="text-dark" href="#">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="code/login/logout.php">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>

  <div id="display-1" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>จัดการหน่วยงานจับกุม :&nbsp;&nbsp;</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <form action="code/mannagecompanny1_add.php" method="POST"> 
          <center><label>ชื่อหน่วยงานจับกุม :&nbsp;&nbsp;</label><input type="text" name="Deliver_Department" class="form"><br>
            <input type="submit" class="btn btn-light" value="บันทึก"></center>
          </form>
        </div>
        <div class="col-4"></div>
      </div>
      <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">

          <center><form action="mannagecompanny1.php" method="GET">
            <label>ชื่อหน่วยงานจับกุม :&nbsp;&nbsp;</label><input type="text" name="Deliver_Department" class="form">&nbsp;&nbsp;<input type="submit" class="btn btn-light" value="ค้นหา">
          </form></center>


          <table class="table mt-5">
            <thead>
              <tr>
                <th scope="col">ลำดับที่</th>
                <th scope="col">ชื่อหน่วยงานจับกุม</th>
                <th scope="col" id="editannimal">แก้ไข</th>
                <th scope="col">ลบ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                $search = $_GET['Deliver_Department'];
                if ($search != "") {
                  $sql = "SELECT * FROM deliver_department WHERE Deliver_Department like '%".$search."%' AND status = '1'";
                }else{
                 $sql = "SELECT * FROM deliver_department WHERE status = '1'";
               }
               
               $result = $conn->query($sql);
               $i = 1;
               while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <th><?php echo $i;?></th>
                  <td><?php echo $row['Deliver_Department']?></td>
                  <td align="center"><button class="btn btn-light showeditannimal" data-id="<?php  echo $row['Deliver_Department']; ?>"><img src="picture/gg.png" width="20px" height="20px"></button></td>
                  <td align="center"> <button class="btn btn-light deleteannimal" data-id="<?php echo $row['ID_Deliver_Department']; ?>"><img src="picture/delete.png" width="20px" height="20px"></button></td>
                </tr>
                <?php $i++; } ?>
               <!--  <th>1</th>
                <td>A companny</td>
                <td><button class="btn btn-light showeditannimal" ><img src="picture/gg.png" width="20px" height="20px"></button></td>
                <td><button class="btn btn-light deleteannimal" ><img src="picture/delete.png" width="20px" height="20px"></button></td> -->
              </tr>
            </tbody>
          </table>

        </div>
        <div class="col-2"></div>
      </div>

      <button class="btn btn-light float-left back">ย้อนกลับ</button>

    </div>
    <div class="col-1 p-5">
    </div>





    <div class="modal fade" id="showeditannimal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
          <div class="modal-header">
            <h5 class="modal-title float-left" id="exampleModalCenterTitle">แก้ไข</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="code/mannagecompanny1_edit.php" method="POST">
            <div class="modal-body">

              <center><label>ชื่อหน่วยงานจับกุม :</label>
                <input type="text" name="Deliver_Department" id="Deliver_Department">
                <input type="text" name="Deliver_Departmentold" id="Deliver_Departmentold" hidden=""></center>

              </div>
              <div class="mt-2">
                <center><button type="submit" class="btn btn-light">บันทึก</button></center>
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
            <form action="code/mannagecompanny1_delete.php" method="POST">
              <div class="modal-body">
                <center><img src="picture/unnamed.png" width="100px" height="100px">
                  <h1>ต้องการลบ<br>ข้อมูลหรือไม่</h1></center>
                  <input type="hidden" name="ID_Deliver_Department" id="ID_Deliver_Department">
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-light float-left">ยืนยัน</button><button type="button" class="btn btn-light float-right" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript">


          $(document).ready(function() {
            $('.back').on('click', function (e) {
              e.preventDefault()
              window.location.replace("http://localhost/animal_manager/mannageuser.php");

            })

            $('#myTab a').on('click', function (e) {
              e.preventDefault()
              $(this).tab('show')
            })
            $('.showqr1').on('click', function () {
              $('#showqr1').modal('show');
             
            })

            $('.deleteannimal').on('click', function () {
              $('#deleteannimal').modal('show');
               var id = $(this).data('id');
              $('#ID_Deliver_Department').val(id);
            })

            $('.showeditannimal').on('click', function () {
              $('#showeditannimal').modal('show');
              var id = $(this).data('id');
              $('#Deliver_Department').val(id);
              $('#Deliver_Departmentold').val(id);

            })

            $('.mnl').click(function(event) {

              var page = 0;
              var id = $(this).data('id');
              var dism = document.getElementById("display-m");
              var dis1 = document.getElementById("display-1");
              var dis2 = document.getElementById("display-2");



              if (id==1) {
                dis1.style.display = 'block';
                dism.style.display = 'none';
                dis2.style.display = 'none';
                page == 1 ;
              }
              if (id==2) {
                dism.style.display = 'none';
                dis1.style.display = 'none';
                dis2.style.display = 'block';
              }
              else{

              }

            });
          });
        </script>
      </body>
      </html>