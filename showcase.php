<?php include 'code/connect.php'; ?> 
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

  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;ดูข้อมูลคดี</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row p-5">
      <div class="col-6">

        <?php $id = $_GET['id'];
        $sql = "SELECT * FROM case_animal JOIN deliver_department on case_animal.Department_Case_Animal = deliver_department.ID_Deliver_Department  WHERE case_animal.Case_Animal_ID  = '".$id."' AND case_animal.status = '1'";
        $listid = "SELECT Case_Animal_ID FROM case_animal WHERE status = '1'";
        // echo $sql;
        $result1 = $conn->query($listid);
        $row1 = $result1->fetch_all();
        $max = count($row1);
        $list = [];
        $next;
        $last;
        $page;
        foreach ($row1 as $key => $value) {
          if($value[0] == $id){
            $next = $key+1;
            $page = $key+1;
            $last = $key-1;
            if ($last < 0) {
              $last = 0;
            }
            if($next > $max-1){
              $next = $max-1;
            }
            $list[] = $value[0];
          }else{
            $list[] = $value[0];
          }
          // print_r($value[0]);
        }
        $nextshow = $list[$next];
        $lastshow = $list[$last];
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
          ?>

          <table>
            <thead>
              <tr>

              </tr>
            </thead>
            <tbody>

              <tr>
                <th><label class="float-right">รหัสคดี :</label>
                </th>
                <td><?php echo $row['Case_Animal_ID'];?></td>
              </tr>

              <tr>
                <th><label class="float-right">คดีอาญาที่ :</label>
                </th>
                <td><?php echo $row['Criminal_Case_No'];?></td>
              </tr>

              <tr>
                <th><label class="float-right">ยึดทรัพท์ที่ :</label>
                </th>
                <td><?php echo $row['Confiscation_Case_No'];?></td>
              </tr>

              <tr>
                <th><label class="float-right">ปวจ.ข้อที่ :</label>
                </th>
                <td><?php echo $row['Daily_No'];?></td>
              </tr>

              <tr>
                <th><label class="float-right">วันที่ :</label>
                </th>
                <td>
                 <?php echo $row['Date_Case_Animal'];?>
               </td>
             </tr>

             <tr>
              <th><label class="float-right">เวลา :</label>
              </th>
              <td><?php echo $row['Time_Case_Animal'];?></td>
            </tr>

            <tr>
              <th><label class="float-right">ผู้ต้องหา :</label>
              </th>
              <td><?php echo $row['Suspect'];?></td>
            </tr>

            <tr>
              <th><label class="float-right">หน่วยงานเจ้าของคดี :</label>
              </th>
              <td><?php echo $row['Deliver_Department'];?></td>
            </tr>

            <tr>
              <th><label class="float-right">รายละเอียดของกลางที่รับมอบ :</label>
              </th>
              <td><?php echo $row['Description_exhibit'];?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col-6">

        <table>
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>

            <tr>
              <th><label class="float-right">สะถานะคดี :</label>
              </th>
              <td><?php 
              if($row['Status_Case_Animal'] == 1){
                echo "ระหว่างดำเนินคดี";
              }else if($row['Status_Case_Animal'] == 2){
               echo "ถึงที่สุดแล้ว";}
               else{
                echo "-";}?></td>
              </tr>

              <tr>
                <th><label class="float-right">พิพากษาโดย :</label>
                </th>
                <td><?php echo $row['Judged_by'];?></td>
              </tr>

              <tr>
                <th><label class="float-right">เมื่อวันที่ :</label>
                </th>
                <td>
                  <?php echo $row['Date_Judged'];?>
                </td>
              </tr>

              <tr>
                <th><label class="float-right">คดีดำที่ :</label>
                </th>
                <td><?php echo $row['Undecided_Case_No'];?></td>
              </tr>

              <tr>
                <th><label class="float-right">คดีแดงที่ :</label>
                </th>
                <td><?php echo $row['Dong_Case_No'];?></td>
              </tr>

              <tr>
                <th><label class="float-right">คำสั่งศาล :</label>
                </th>
                <td><?php echo $row['Injunction'];?></td>
              </tr>

              <tr class="mt-2">
                <th><label class="float-right">เพิ่มไฟล์เอกสารของคดี :</label>
                </th>
                <td></td>
              </tr>
              <tr>
                <th>
                </th>
                <td></td>
              </tr>
              <tr>
                <th>
                </th>
                <td></td>
              </tr>
            </tbody>
          </table> 

        <?php } ?> 



        
      </div>





    </div>
    <center><a class="btn btn-light" href="editcase.php?id=<?php echo $_GET['id'];?>">แก้ไข</a>&nbsp;&nbsp;<a class="btn btn-light" href="code/mannageannimalcenter/delete.php?id=<?php echo $_GET['id'];?>">ลบ</a></center>
    <br>
    <center><button class="btn btn-light backButton" >กลับ</button>&nbsp;
      <button class="btn btn-light nextButton" >ถัดไป</button></center>

      <button class="btn btn-light float-left back">ย้อนกลับ</button>
      <label class="float-right"><?php echo $page; echo "/"; echo $max; ?></label>
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
            <center><button type="button" class="btn btn-light">ยืนยัน</button></center>
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

        $('.back').on('click', function (e) {
          e.preventDefault()
          window.location.replace("http://localhost/animal_manager/mannageannimalcenter.php");

        })
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

        $('.nextButton').on('click',function (e){
            //call next Query Here
            window.location.replace("http://localhost/animal_manager/showcase.php?id="+<?php echo $nextshow; ?>);
          })

        $('.backButton').on('click',function (e){
            //call back Query Here
            window.location.replace("http://localhost/animal_manager/showcase.php?id="+<?php echo $lastshow; ?>);
          })
      });


    </script>
  </body>
  </html>