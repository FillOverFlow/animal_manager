<?php 
session_start();
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
}
require_once('code/mannageannimalcenter/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$tblanimal = 'animal';
$tblwild_animal_exhibits = 'wild_animal_exhibits';
$id = $_GET['id'];
$datajoin = joinshowliverow($id);
$dataall = showAnimalData($tblwild_animal_exhibits,0);
$max = count($dataall);
$list = [];
$next;
$last;
$page;
foreach ($dataall as $key => $value) {
  if($value['Wild_Animal_Exhibits_ID'] == $id){
    $next = $key+1;
    $page = $key+1;
    $last = $key-1;
    if ($last < 0) {
      $last = 0;
    }
    if($next > $max-1){
      $next = $max-1;
    }
    $list[] = $value['Wild_Animal_Exhibits_ID'];
  }else{
    $list[] = $value['Wild_Animal_Exhibits_ID'];
  }
          // print_r($value[0]);
}
$nextshow = $list[$next];
$lastshow = $list[$last];
// echo "<pre>";
// var_dump($dataall);
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
      <div class="col-4"><label>&nbsp;&nbsp;แก้ไขข้อมูลสัตว์ป่าของกลาง-มีชีวิต</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row p-5" id="print">
      <div class="col-3">
        <table >
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th><label>หมายเลขสัตว์ :</label>
              </th>
              <td><label><?php echo $datajoin[0]['W_A_E_number'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ชนิดสัตว์ :</label>
              </th>
              <td><label><?php echo $datajoin[0]['Animal_Type_Name'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">ชื่อสามัญไทย :</label>
              </th>
              <td><label><?php echo $datajoin[0]['Thai_Common_Name'];?></label></td>
            </tr>
            <tr>
              <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
              </th>
              <td><label><?php echo $datajoin[0]['English_Common_Name'];?></label></td>
            </tr>
            <tr>
              <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
              </th>
              <td><label><?php echo $datajoin[0]['Scientific_Name'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">สถานที่ :</label>
              </th>
              <td><label><?php echo $datajoin[0]['W_A_E_Location'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">วันที่ :</label>
              </th>
              <td><label><?php echo $datajoin[0]['wild_animal_exhibits_date'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">เวลา :</label>
              </th>
              <td><label><?php echo $datajoin[0]['W_A_E_Time'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">กรงที่ :</label>
              </th>
              <td><label><?php echo $datajoin[0]['W_A_E_Cage'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">วันรับเข้า :</label>
              </th>
              <td><label><?php echo $datajoin[0]['W_A_E_Date_of_admission'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">น้ำหนัก :</label>
              </th>
              <td><label><?php echo $datajoin[0]['W_A_E_Weight'];?></label></td>
            </tr>

            <tr>
              <th><label class="float-right">เพศ :</label>
              </th>
              <td><label><?php
              if($datajoin[0]['W_A_E_Sex'] == 1){
                echo "เพศผู้";
              }else if($datajoin[0]['W_A_E_Sex'] == 2){
                echo "เพศเมีย";
              }else{
                echo "อื่น ๆ";
              }

              ?></label></td>
            </tr>
            <tr>
              <th><label class="float-right">สะถานะสุขถาพสัตว์ :</label>
              </th>
              <td><label>

                <?php
                if ($datajoin[0][' W_A_E_Animal_Health_Status'] == 1) {
                  echo "สมบูรณ์";
                }else if($datajoin[0][' W_A_E_Animal_Health_Status'] == 2){
                  echo "อื่น ๆ";
                }else{
                  echo "อื่น ๆ";
                }

                ?>
                
              </label>
            </td>
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
            <th><label class="float-right">คดีอาญาที่ :</label>
            </th>
            <td><label><?php echo $datajoin[0]['Criminal_Case_No'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">ยึดทรัพย์ที่ :</label>
            </th>
            <td><label><?php echo $datajoin[0]['Confiscation_Case_No'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">เลขห่วงขา :</label>
            </th>
            <td><label><?php echo $datajoin[0]['W_A_E_Pin_Number'];?></label></td>
          </tr>
          <tr>
            <th><label class="float-right">DNA :</label>
            </th>
            <td><label><?php echo $datajoin[0]['W_A_E_DNA_File'];?></label></td>
          </tr>
          <tr>
            <th><label class="float-right" disabled="">ปวจ. ข้อที่ :</label>
            </th>
            <td><label><?php echo $datajoin[0]['W_A_E_Daily_No'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right" disabled="">เวลา :</label>
            </th>
            <td><label><?php echo $datajoin[0]['W_A_E_Date_time'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">วันรับเข้า :</label>
            </th>
            <td><label><?php echo $datajoin[0]['W_A_E_Date'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">หน่วยงานที่จับกุม :</label>
            </th>
            <td><label><?php echo $datajoin[0]['Deliver_Department'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">หน่วยงานนำส่ง :</label>
            </th>
            <td><label><?php echo $datajoin[0]['Arrest_Deparment'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">ผู้ที่รับมอบ :</label>
            </th>
            <td><label><?php echo $datajoin[0]['Username'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">สถานะตามกฎหมาย :</label>
            </th>
            <td><label><?php
            if ($datajoin[0]['W_A_E_Legal_Status'] == 1) {
              echo "CITES Appendix I";
            }else if($datajoin[0]['W_A_E_Legal_Status'] == 2){
              echo "CITES Appendix II";
            }else if($datajoin[0]['W_A_E_Legal_Status'] == 3){
              echo "CITES Appendix III";
            }else if($datajoin[0]['W_A_E_Legal_Status'] == 4){
              echo "สัตว์ป่าคุ้มครอง";
            }else{
              echo "สัตว์ป่านอกบัญชี";
            }
            ?>
          </label>
        </td>
      </tr>

      <tr>
        <th><label class="float-right">สถานะนำไปใช้ประโยชน์ :</label>
        </th>
        <td><label><?php
        if ($datajoin[0]['Utilization_Status'] == 1) {
          echo "สัตว์พ่อ-แม่พันธุ์";
        }else if($datajoin[0]['Utilization_Status'] == 2){
          echo "ปล่อยคืนสู่ธรรมชาติ";
        }else if($datajoin[0]['Utilization_Status'] == 3){
          echo "นำไปใช้ทางวิชาการ";
        }else if($datajoin[0]['Utilization_Status'] == 4){
          echo "อื่นๆ";
        }else{
          echo "-";
        }
        ?></label></td>
      </tr>
    </tbody>
  </table>


</div>




<div class="col-3">
  <div class="row m-10">
      <img id="img" align="center" src="code/picturemannageannimalcenterhlive/<?php echo $datajoin[0]['W_A_E_Photo_1'] ;?>"  width="30%" class="border border-dark">
      <?php
      $img = array(
        '0'=> $datajoin[0]['W_A_E_Photo_2'],
        '1'=> $datajoin[0]['W_A_E_Photo_3'],
        '2'=> $datajoin[0]['W_A_E_Photo_4'],
        '3'=> $datajoin[0]['W_A_E_Photo_5'],
      );
      for ($i=0; $i < 5; $i++) {  
        if($img[$i] == ""){

        }else{?>
          <img id="img" style="margin: 2px 0 0 0;" align="center" src="code/picturemannageannimalcenterhlive/<?php echo $img[$i] ;?>"  width="30%" class="border border-dark">
        <?php  }
      } ?>
  </div>
  <center><div class="row mt-5">
    <a href="edith1.php?" class="btn btn-light" style="margin: auto;">แก้ไข</a>
  </div></center>
  <div class="row mt-2">
    <button class="btn btn-light deleteannimal" style="margin: auto;">ลบ</button>
  </div>
</div>
<div class="float-right row">
  <label class="" disabled="">ผู้กรอกข้อมูล :</label>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</div><br>
<div>
  <center><button class="btn btn-light backButton" ><<</button>&nbsp;
    <button class="btn btn-light nextButton " >>></button></center>
  </div>
  <div class="mt-5 row">
    <div class="col float-left"><button class="btn btn-light back">ย้อนกลับ</button></div>
    <div class="col float-right" align="right">
      <label><?php echo $page; echo "/"; echo $max; ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-light" target="_blank" href="code/report/reportshowh1.php?id=<?php echo $id;?>"><img class="" src="picture/prin.png" width="50" height="50"></a>
    </div>

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
      window.location.replace("http://localhost/animal_manager/mannageannimalcenterhlive1.php");

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

    $('.nextButton').on('click',function (e){
            //call next Query Here
            window.location.replace("http://localhost/animal_manager/showh1.php?id="+<?php echo $nextshow; ?>);
          })

    $('.backButton').on('click',function (e){
            //call back Query Here
            window.location.replace("http://localhost/animal_manager/showh1.php?id="+<?php echo $lastshow; ?>);
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

   function PrintDiv() {
        var divToPrint = document.getElementById('print'); // เลือก div id ที่เราต้องการพิมพ์
        var html =  '<html>'+ // 
        '<head>'+
        '<link href="css/css.css" rel="stylesheet" type="text/css">'+
        '</head>'+
        '<body onload="window.print(); window.close();">'
        + divToPrint.innerHTML + 
        '</body>'+
        '</html>';

        var popupWin = window.open();
        popupWin.document.open();
        popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
        popupWin.document.close();  
      }


    </script>
  </body>
  </html>