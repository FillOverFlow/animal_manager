<?php
require_once('code/mannageannimaledit/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$listanimal = listanimal();
$Animal_Case_Correction_ID = $_GET['Animal_Case_Correction_ID'];
$data = showcorrectionrowdead($Animal_Case_Correction_ID);
// echo "<pre>";
// var_dump($data);
// echo "</pre>";

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

  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;ดูข้อมูลสัตว์กรณีแก้ไขตาย</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row p-5">
      <div class="col-4">


        <table>
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th><label class="float-right">หมายเลขสัตว์ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Animal_number']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">วัน/เดือน/ปี<br>การชันสูตรศพ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Autopsy_date']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ชนิดสัตว์ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Animal_Type_Name']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ชื่อสามัญไทย :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Thai_Common_Name']; ?></label></td>
            </tr>
            <tr>
              <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['English_Common_Name']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Scientific_Name']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">สิ่งที่แนบมา :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Attachment']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">เพศ :</label>
              </th>
              <!-- Animal_Dead_Sex int(10)     No  None  เพศสัตว์ตาย 0 = กรุณาเลือก 1 = เพศผู้ 2 = เพศเมีย -->
              <?php
              $list = ['-','เพศผู้','เพศเมีย'];
              $Animal_Dead_Sex = $data[0]['Animal_Dead_Sex'];
              $sex = $list[$Animal_Dead_Sex];
              ?>
              <td><label class="float-left"><?php echo  $sex; ?></label></td>
            </tr>
            <tr>
              <th><label class="float-right" disabled="">อายุ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Animal_Dead_Age']; ?></label></td>
            </tr>
            <tr>
              <th><label class="float-right">วันรับมอบ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Animal_Dead_Date_of_Admission']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">วันที่ตาย :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Animal_Dead_Date']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">ข้อมูลแวดล้อม :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Environment_information']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">ประวัติรักษา :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Treatment_History']; ?></label></td>
            </tr>

          </tbody>
        </table>


      </div>

      <div class="col-4">


        <table>
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th><label class="float-right">การวินิฉัยเบื้องต้น :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Basic_Diagnosis']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ระยะเวลาป่วยตาย :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Death_Period']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">สภาพซาก :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Condition_Carcass']; ?></label></td>
            </tr>
            <tr>
              <th><label class="float-right">คะแนนความสมบูรณ์ของร่างกาย :</label>
              </th>
              <!-- Body_Integrity_Score  int(10)     No  None  คะแนนความสมบูรณ์ของร่างกาย 0 = กรุณาเลือก 1 = 1 (แย่มาก) 2 = 2 (แย่) 3 = 3 (ปานกลาง) 4 = 4 (ดี) 5 = 5 (ดีมาก)  -->
              <?php 
              $list = ['-','(แย่มาก)','(แย่)','(ปานกลาง)','(ดี)','(ดีมาก)'];
              $Body_Integrity_Score = $data[0]['Body_Integrity_Score'];
              $show = $list[$Body_Integrity_Score];
              ?>
              <td><label class="float-left"><?php echo $show ; ?></label></td>
            </tr>
            <tr>
              <th><label class="float-right">น้ำหนักตัว :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Animal_Dead_Weight']; ?></label></td>
            </tr>
            <tr>
              <th><label class="float-right">ข้อสังเกตุเพิ่มเติม :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Additional_Observations']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ผลการชันสูตร :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Autopsy_Results']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ตัวอย่างห้องปฎิบัติการ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Laboratory_Sample']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ผลการทดสอบ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Test_Result']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">สาเหตุเบื้องต้น :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Basic_Cause']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ปัจจัยโน้มนำ :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Lead_Factor']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ผู้รับมอบ :</label>
              </th>
              <?php
              $tbl = 'authorities';
              $id = $data[0]['Animal_Dead_Consignee'];
              $field = 'Authorities_ID';
              $data1 = getdbrow($tbl,$id,$field);
              ?>
              <td><label class="float-left"><?php echo $data1[0]['Authorities_First_Name']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">หน่วยงานเจ้าหน้าที่นำส่ง :</label>
              </th>
              <?php
              $tbl = 'arrest_deparment';
              $id = $data[0]['Animal_Dead_Authorities_Deliver'];
              $field = 'ID_Arrest_Deparment';
              $data1 = getdbrow($tbl,$id,$field);
              ?>
              <td><label class="float-left"><?php echo $data1[0]['Arrest_Deparment']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ผู้กรอกข้อมูล :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Animal_Dead_Fillers']; ?></label></td>
            </tr>



          </tbody>
        </table>


      </div>




      <div class="col-4" align="center">

        <table style="width:100%;" >
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>

            <tr>
              <th><label class="float-right">สะถานะการทำลายซาก :</label>
              </th>
              <!-- Destroy_The_Remains_Status  int(11)     No  None  สถานะทำรายซาก 0 = กรุณาเลือก 1 = ทำลายแล้ว 2 = ยังไม่ทำลาย -->
              <?php 
              $list = ['-','ทำลายแล้ว','ยังไม่ทำลาย'];
              $Destroy_The_Remains_Status = $data[0]['Destroy_The_Remains_Status'];
              $show = $list[$Destroy_The_Remains_Status];
              ?>
              <td><label class="float-left"><?php echo $show; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">สาเหตุการตาย :</label>
              </th>
              <td><label class="float-left"><?php echo $data[0]['Cause_of_Death']; ?></label></td>
            </tr>

            <tr >
             <th style="margin-top: 10px;">
              <?php
              $photolist = [$data[0]['Animal_Dead_Photo_1'],$data[0]['Animal_Dead_Photo_2'],$data[0]['Animal_Dead_Photo_3'],$data[0]['Animal_Dead_Photo_4'],$data[0]['Animal_Dead_Photo_5']];
              for ($i=0; $i < 5; $i++) { 
                if ($i < 3) {
                  if($photolist[$i] == ''){ ?> 
                  <?php  }else{ ?> 
                    <img src="code/mannageannimaledit/picture/<?php echo $photolist[$i];?>" width="100px" class="border border-dark">
                 <?php  }
               }else if ($i >= 3){ 
                if($photolist[$i] == ''){}
                  else{
                    if($i == 3){?> 
                      <img src="code/mannageannimaledit/picture/<?php echo $photolist[$i];?>" width="100px" style="margin-left: 50px;" class="border border-dark">
                    <?php }else{ ?>
                     <img src="code/mannageannimaledit/picture/<?php echo $photolist[$i];?>" width="100px" class="border border-dark">
                   <?php } 
                 }
               }
             }
             ?> 
           </th>
         </tr>



       </tbody>
     </table>

     <button class="btn btn-light">แก้ไข</button>&nbsp;
     <button class="btn btn-light">ลบ</button>
   </div>





 </div>

 <div class="mt-5 row">
  <div class="col float-left"><button class="btn btn-light back">ย้อนกลับ</button></div>
  <div class="col float-right" align="right"><img class="" src="picture/prin.png" width="50" height="50">  </div>
</div>


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
        window.location.replace("http://localhost/animal_manager/mannageannimaleditdead1.php");

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