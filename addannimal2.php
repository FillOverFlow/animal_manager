<?php 
require_once "code/connect.php";
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
        <a class="text-dark" href="usermanage.php">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="code/login/logout.php">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>



  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;เพิ่มข้อมูลชนิดสัตว์</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>
    <form action="code/addannimal2.php" method="POST" enctype="multipart/form-data">
      <div class="row p-5">
        <div class="col-6">
          <table>
            <thead>
              <tr>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th><label class="float-right">ชนิดสัตว์ :</label>
                </th>
                <td>
                  <select name="Animal_Type" style="width: 100%;">
                   <option>เลือกชนิดสัตว์</option>
                   <?php
                   $sql = "SELECT * FROM Animal_Type WHERE status = '1'";
                   $result = $conn->query($sql);
                   $i = 1;
                   while($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['Animal_Type_ID']; ?>"><?php echo $row['Animal_Type_Name'];?></option>
                    <?php $i++; } ?>

                  </select>
                </td>
              </tr>

              <tr>
                <th><label class="float-right">ชื่อสามัญไทย :</label>
                </th>
                <td><input type="text" name="thname" required  placeholder=""></td>
              </tr>

              <tr>
                <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
                </th>
                <td><input type="text" name="engname" required   placeholder=""></td>
              </tr>

              <tr>
                <th><label class="float-right">ชื่อวิทยาศาสตร์ :</label>
                </th> 
                <td><input type="text" name="sciname" required   placeholder=""></td>
              </tr>

              <tr>
                <th><label class="float-right">ลักษณะทั่วไป :</label>
                </th>
                <td><textarea required name="detail" style="width: 100%;"></textarea></td>
              </tr>
            </tbody>
          </table>


        </div>




        <div class="col-6">

          <div class="row">
            <div class="col-6">
              <tr>
                <th><label class="float-left">เพิ่มรูป :</label>
                </th>
              </tr>
            </div>
            <div class="col-6">
              <tr>
                <!-- <th><label class="float-left">สร้าง QR-code :</label> -->
                </th>
              </tr>
            </div>
          </div>
          <div class="row" align="center">
            <div class="col-6">
              <tr>
                <th>
                  <!-- <img src="" width="200px"  class="border border-dark"> -->
                  <img id="img" src="picture/nopicture.jpg" alt="" style="width: 120px;"/></th>
                </tr>
              </div>
              <div class="col-6">
                <tr>
                  <!-- <th><img src="picture/logo.png" width="200px" class="border border-dark"> -->
                  </th>
                </tr>
              </div>
            </div>

            <div class="row mt-2" >
              <div class="col-6">
                <tr>
                  <!-- multiple -->
                  <th><input width="100px" OnChange="Preview(this)" required class="form-control" required="เพิ่มรูป"   type="file" name="annimalimg[]" accept="image/*"></th>
                  </tr>
                </div>
                <div class="col-6" align="center">
                  <tr>
                    <!-- <th><button type="button" class="btn btn-dark showqr1">สร้าง QR-code</button> -->
                    </th>
                  </tr>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-6">
                </div>
                <div class="col-6" align="center">
                  <tr>
                    <!-- <th><button type="button" class="btn btn-dark" >พิมพ์ QR-code</button> -->
                    </th>
                  </tr>
                </div>
              </div>



            </div>


          </div>


          <center><button type="submit" class="btn btn-light ">บันทึก</button></center>
        </form>

        <button type="button" class="btn btn-light float-left back">ย้อนกลับ</button>

      </div>
      <div class="col-1 p-5">
      </div>





      <div class="modal fade" id="showqr1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content p-3">
            <div class="modal-header">
              <h5 class="modal-title float-left" id="exampleModalCenterTitle">สร้าง QR-code</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="picture/logo.png" width="100%" height="100%" class="border border-dark">
            </div>
            <div class="mt-2">
              <center><button type="button" class="btn btn-light qrcode">ยืนยัน</button></center>
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
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript">


          $(document).ready(function() {

            $('.back').on('click', function (e) {
              e.preventDefault()
              window.location.replace("http://localhost/animal_manager/annimalmannage.php");

            })
            
            $('#myTab a').on('click', function (e) {
              e.preventDefault()
              $(this).tab('show')
            })

            $('.deleteannimal').on('click', function () {
              $('#deleteannimal').modal('show');
            })

            $('.showqr1').on('click', function () {
              $('#showqr1').modal('show');
            })

            $('.showeditannimal').on('click', function () {
              $('#showeditannimal').modal('show');
            })
            $('.qrcode').click(function(event) {

            });

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

          function Preview(ele) {
            $('#img').attr('src', ele.value);
            if (ele.files && ele.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                $('#img').attr('src', e.target.result);
              }
              reader.readAsDataURL(ele.files[0]);
            }
          }


        </script>
      </body>
      </html>