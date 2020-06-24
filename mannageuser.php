<?php
require_once "code/login/class.php";
$authorities = $_SESSION["authorities"];
if(empty($authorities)){
  logout();
}else{
  // var_dump($authorities);
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
        <a class="text-dark" href="usermanage.php?id=<?php echo $authorities['Authorities_ID'];?>">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="code/login/logout.php">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>



  <div id="display-m" class="col-9 p-5 border border-dark rounded h-80 w-100" style="display: block;">

    <center><h1 class="mt-10">ยินดีต้อนรับเข้าสู่ระบบ</h1></center>

  </div>

  <div id="display-1" class="col-9 p-5 border border-dark rounded h-80 w-100" style="display: none;"> 

    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <form>
          <center><label>ชื่อชนิดสัตว์ :&nbsp;&nbsp;</label><input type="text" name="annimal_name" class="form"><br>
            <input type="submit" class="btn btn-dark" value="บันทึก"></center>
          </form>
        </div>
        <div class="col-4"></div>
      </div>
      <div class="row mt-5">
        <div class="col-4"></div>
        <div class="col-4">

          <center><form>
            <label>ชื่อชนิดสัตว์ :&nbsp;&nbsp;</label><input type="text" name="annimal_name_search" class="form">&nbsp;&nbsp;<input type="submit" class="btn btn-dark" value="ค้นหา">
          </form></center>


          <table class="table mt-5">
            <thead>
              <tr>
                <th scope="col">ลำดับที่</th>
                <th scope="col">ชื่อชนิดสัตว์</th>
                <th scope="col" id="editannimal">แก้ไข</th>
                <th scope="col">ลบ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td>ลิง</td>
                <td><button class="btn btn-light showeditannimal" ><img src="picture/gg.png" width="20px" height="20px"></button></td>
                <td><button class="btn btn-light deleteannimal" ><img src="picture/delete.png" width="20px" height="20px"></button></td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="col-4"></div>
      </div>

      <button class="btn btn-dark float-left">ย้อนกลับ</button>

    </div>

    <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100" style="display: none;"> 

      <div class="row">
        <div class="col-4"><label>&nbsp;&nbsp;จัดการข้อมูลชนิดสัตว์.</label></div>
        <div class="col-4">
        </div>
        <div class="col-4"></div>
      </div>
      <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">

          <center><form>
            <input type="submit" class="btn btn-dark" value="เพิ่มข้อมูลชนิดสัตว์">&nbsp;&nbsp;<label>ชื่อชนิดสัตว์ :&nbsp;&nbsp;</label><input type="text" name="annimal_name_search" class="form">&nbsp;&nbsp;<input type="submit" class="btn btn-dark" value="ค้นหา">
          </form></center>


          <table class="table mt-5">
            <thead>
              <tr>
                <th scope="col">ลำดับที่</th>
                <th scope="col">ชื่อชนิดสัตว์</th>
                <th scope="col">ชื่อสามัญไทย</th>
                <th scope="col">ชื่อสามัญอังกฤษ</th>
                <th scope="col">ชื่อสามัญวิทยาศาสตร์</th>
                <th scope="col">ดูข้อมูล</th>
                <th scope="col">แก้ไข</th>
                <th scope="col">ลบ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td>บก/ป่า</td>
                <td>ลิง</td>
                <td>monkey</td>
                <td>monkey</td>
                <td><button class="btn btn-light seedtanimal" ><img src="picture/magnifyingglass.png" width="20px" height="20px"></button></td>
                <td><button class="btn btn-light showeditannimal" ><img src="picture/gg.png" width="20px" height="20px"></button></td>
                <td><button class="btn btn-light deleteannimal" ><img src="picture/delete.png" width="20px" height="20px"></button></td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="col-2"></div>
      </div>

      <button class="btn btn-dark float-left">ย้อนกลับ</button>

    </div>

    <div class="col-1 p-5">
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
          <div class="modal-body">
            <form>
              <input type="text" name="nameannimal_edit" class="form-control">
            </form>
          </div>
          <div class="mt-2">
            <center><button type="button" class="btn btn-light">บันทึก</button></center>
          </div>
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
              <button type="button" class="btn btn-light float-left">ยืนยัน</button><button type="button" class="btn btn-light float-right" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
            </div>
          </div>
        </div>
      </div>


      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script type="text/javascript">


        $(document).ready(function() {


          $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
          })

          $('.deleteannimal').on('click', function () {
            $('#deleteannimal').modal('show');
          })

          $('.showeditannimal').on('click', function () {
            $('#showeditannimal').modal('show');
          })
          $('.showqr1').on('click', function () {
            $('#showqr1').modal('show');
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