<?php
require_once('../mannageannimaledit/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$listanimal = listanimal();
$Animal_Case_Correction_ID = $_GET['Animal_Case_Correction_ID'];
$data = showcorrectionrow($Animal_Case_Correction_ID);
$Animal_Case_Correction = 'animal_case_correction';
$dataall = showAnimalDataedit($Animal_Case_Correction,0);
$max = count($dataall);
$list = [];
$next;
$last;
$page;
foreach ($dataall as $key => $value) {
  if($value['Animal_Case_Correction_ID'] == $Animal_Case_Correction_ID){
    $next = $key+1;
    $page = $key+1;
    $last = $key-1;
    if ($last < 0) {
      $last = 0;
    }
    if($next > $max-1){
      $next = $max-1;
    }
    $list[] = $value['Animal_Case_Correction_ID'];
  }else{
    $list[] = $value['Animal_Case_Correction_ID'];
  }
          // print_r($value[0]);
}
$nextshow = $list[$next];
$lastshow = $list[$last];
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
<body onload="window.print();">
  


  <div id="display-2" class="col-md-12 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;ดูข้อมูลสัตว์กรณีแก้ไขมีชีวิต</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row p-5">
      <div class="col-4">


        <table>
          <thead>
          </thead>
          <tbody>
            <tr>
              <th><label class="float-right">หมายเลขสัตว์ :</label>
              </th>
              <td><label class="float-left">&nbsp;&nbsp;<?php echo $data[0]['Animal_number']; ?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">สถานที่ :</label>
              </th>
              <td><label class="float-left">&nbsp;&nbsp;
                <?php
                if($data[0]['A_C_C_Place'] == ''){
                  echo "-";
                }else{
                 echo $data[0]['A_C_C_Place'];
               }
               ?>

             </label></td>
           </tr>

           <tr>
            <th><label class="float-right">ชนิดของสัตว์ :</label>
            </th>
            <td><label class="float-left">&nbsp;&nbsp;<?php echo $data[0]['Animal_Type_Name']; ?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">ชื่อสามัญไทย :</label>
            </th>
            <td><label class="float-left">&nbsp;&nbsp;<?php echo $data[0]['Thai_Common_Name']; ?></label></td>
          </tr>
          <tr>
            <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
            </th>
            <td><label class="float-left">&nbsp;&nbsp;<?php echo $data[0]['English_Common_Name']; ?></label></td>
          </tr>

          <tr>
            <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
            </th>
            <td><label class="float-left">&nbsp;&nbsp;<?php echo $data[0]['Scientific_Name']; ?></label></td>
          </tr>

          <tr>
            <th><label class="float-right" disabled="">แหล่งที่มา :</label>
            </th>
            <td><label class="float-left">&nbsp;&nbsp;
              <?php 
              if ($data[0]['A_C_C_Source'] == '') {
                echo "-";
              }else{
                echo $data[0]['A_C_C_Source'];              }
                ?>
                
              </label></td>
            </tr>

            <tr>
              <th><label class="float-right">วันรับเข้า :</label>
              </th>
              <td><label class="float-left">&nbsp;&nbsp;
                <?php
                if ($data[0]['A_C_C_Date_of_Admission'] == '') {
                  echo "-";
                }else
                {
                  echo $data[0]['A_C_C_Date_of_Admission'];
                }
                ?>

              </label></td>
            </tr>

            <tr>
              <th><label class="float-right">ตรวจสุขภาพเบื่องต้น :</label>
              </th>
              <td><label class="float-left">&nbsp;&nbsp;
                <?php 
                if ($data[0]['Basic_Health_Examination'] == '') {
                  echo "-";
                }else
                {
                 echo $data[0]['Basic_Health_Examination']; 
               }
               ?>

             </label></td>
           </tr>

           <tr>
            <th><label class="float-right" disabled="">หมายเหตุ :</label>
            </th>
            <td><label class="float-left">&nbsp;&nbsp;
              <?php
              if ($data[0]['A_C_C_Note'] == '') {
                echo "-";
              }else{
                echo $data[0]['A_C_C_Note'];
              }
              ?>
            </label></td>
          </tr>

          <tr>
            <th><label class="float-right">สถานะนำไปใช้<br>ประโยชน์ :</label>
            </th>
            <!-- 0 = กรุณาเลือก 1 = พ่อ-แม่พันธุ์ 2 = ปล่อยคืนสู่ธรรมชาติ 3 = นำไปใช้ทางวิชาการ 4 = ยังไม่ได้จำแนกสถานะ   -->
            <?php $list =['-','พ่อ-แม่พันธุ์','ปล่อยคืนสู่ธรรมชาติ','นำไปใช้ทางวิชาการ','ยังไม่ได้จำแนกสถานะ'];  ?>
            <td><label class="float-left">&nbsp;&nbsp;<?php echo $list[$data[0]['A_C_C_Utilization_Status']]; ?></label></td>
          </tr>

        </tbody>
      </table>


    </div>

    <div class="col-4">


      <table>
        <thead>
        </thead>
        <tbody>
          <tr>
            <th><label class="float-right">ประเภทการรับเข้า :</label>
            </th>
            <?php $list = ['-','บุคคลธรรมดา','หน่วยงาน','อื่น ๆ']; ?>
            <td><label class="float-left">&nbsp;&nbsp;<?php echo $list[$data[0]['Category_Admission']]; ?></label></td>
          </tr>
          <tr>
            <th><label class="float-right">หมายเหตุ :</label>
            </th>
            <td><label class="float-left">&nbsp;&nbsp;
              <?php
              if($data[0][' A_C_C_Note'] == ''){
                echo "-";
              }else{
               echo $data[0][' A_C_C_Note'];
             }
             ?>
           </label></td>
         </tr>

         <tr>
          <th><label class="float-right">เลขที่ห่วงขา :</label>
          </th>
          <td><label class="float-left">&nbsp;&nbsp;<?php echo $data[0]['A_C_C_Pin_Number']; ?></label></td>
        </tr>
        <tr>
          <th><label class="float-right">วันที่ติดห่วงขา :</label>
          </th>
          <td><label class="float-left">&nbsp;&nbsp;<?php echo $data[0]['A_C_C_Date_Pin_Number']; ?></label></td>
        </tr>
        <tr>
          <th><label class="float-right">DNA :</label>
          </th>
          <td><label class="float-left">&nbsp;&nbsp;
            <?php
            if ($data[0]['A_C_C_DNA_File'] == '') {
              echo "-";
            }else{
             echo $data[0]['A_C_C_DNA_File'];  
           }
           ?>
         </label></td>
       </tr>
       <tr>
        <th><label class="float-right">เพศ :</label>
        </th>
      </th>
      <?php $list= ['-','เพศผู้','เพศเมีย','อื่น ๆ']; ?>
      <td><label class="float-left">&nbsp;&nbsp;<?php echo $list[$data[0]['A_C_C_Sex']]; ?></label></td>
    </tr>

    <tr>
      <th><label class="float-right">อายุ :</label>
      </th>

      <td><label class="float-left">&nbsp;&nbsp;
        <?php
        if ($data[0]['A_C_C_Age'] == '') {
         echo "-";
       }else
       {
        echo $data[0]['A_C_C_Age']; 
      }

      ?></label></td>
    </tr>

    <tr>
      <th><label class="float-right">ช่วงวัย :</label>
      </th>
      <?php $list = ['-','วัยเด็ก','โตเต็มวัย']; ?>
      <td><label class="float-left">&nbsp;&nbsp;<?php echo $list[$data[0]['A_C_C_Age_Range']]; ?></label></td>
    </tr>

    <tr>
      <th><label class="float-right">น้ำหนัก :</label>
      </th>
      <td><label class="float-left">&nbsp;&nbsp;
        <?php
        if ($data[0]['A_C_C_Weight'] == '') {
          echo "-";      }
          else{
           echo $data[0]['A_C_C_Weight'];
         }
         ?>
       </label>
     </tr>

     <tr>
      <th><label class="float-right">ผู้รับมอบ :</label>
      </th>
      <td><label class="float-left">&nbsp;&nbsp;
        <?php
        if ($data[0]['A_C_C_Consignee'] == '') {
          echo "-";
        }else
        {
         echo $data[0]['A_C_C_Consignee']; 
       }
       ?>

     </label></td>
   </tr>

   <tr>
    <th><label class="float-right">ผู้กรอกข้อมูล :</label>
    </th>
    <td><label class="float-left">&nbsp;&nbsp;
      <?php
      if ($data[0]['A_C_C_Fillers'] == '') {
        echo "-";
      }else{
       echo $data[0]['A_C_C_Fillers'];
     }
     ?>

   </label></td>
 </tr>

</tbody>
</table>


</div>




<div class="col-4" align="center">
  <table style="width:100%">
    <thead>
    </thead>
    <tbody>

      <tr>
       <th>
        <?php
        $photolist = [$data[0]['A_C_C_Photo_1'],$data[0]['A_C_C_Photo_2'],$data[0]['A_C_C_Photo_3'],$data[0]['A_C_C_Photo_4'],$data[0]['A_C_C_Photo_5']];
        for ($i=0; $i < 5; $i++) { 
          if ($i < 3) {
            if($photolist[$i] == ''){ ?> 
            <?php  }else{ ?> 
             <img src="../mannageannimaledit/picture/<?php echo $photolist[$i];?>" width="30%" class="border border-dark">
           <?php  }
         }else if ($i >= 3){ 
          if($photolist[$i] == ''){}
            else{
              if($i == 3){?> 
                <img src="../mannageannimaledit/picture/<?php echo $photolist[$i];?>" width="30%" style="margin-left: 50px;" class="border border-dark">
              <?php }else{ ?>
               <img src="code/mannageannimaledit/picture/<?php echo $photolist[$i];?>" width="30%" class="border border-dark">
             <?php } 
           }
         }
       }
       ?> 
     </th>
   </tr>
 </tbody>
</table>

<!-- <button class="btn btn-light" style="">แก้ไข</button>&nbsp;
<button class="btn btn-light">ลบ</button> -->


</div>




</div>
<!-- <center><button class="btn btn-light backButton" ><<</button>&nbsp;
  <button class="btn btn-light nextButton " >>></button></center>
  <div class="mt-5 row">
    <div class="col float-left"><button class="btn btn-light back">ย้อนกลับ</button></div>
    <div class="col float-right" align="right">
      <a href="code/report/<?php echo $Animal_Case_Correction_ID; ?>"></a><img class="" src="picture/prin.png" width="50" height="50">
    </div>
  </div> -->



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
        window.location.replace("http://localhost/animal_manager/mannageannimaledit1.php");

      })

      $('.nextButton').on('click',function (e){
            //call next Query Here
            window.location.replace("http://localhost/animal_manager/addseehave.php?Animal_Case_Correction_ID="+<?php echo $nextshow; ?>);
          })

      $('.backButton').on('click',function (e){
            //call back Query Here
            window.location.replace("http://localhost/animal_manager/addseehave.php?Animal_Case_Correction_ID="+<?php echo $lastshow; ?>);
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