<?php 
session_start();
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
}
require_once('../mannageannimalcenter/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$tblanimal = 'animal';
$tblwild_animal_exhibits = 'wild_animal_exhibits';
$id = $_GET['id'];
$datajoin = joinshowliverow($id);
// echo "<pre>";
// var_dump($datajoin);
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
<body onload="window.print()">
  <!-- <?php include('menu.php');  ?> -->

  <div id="display-2" class="col-md-12 p-5 border border-dark rounded h-80 w-100"> 

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

    <div class="col-5">


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

<!--       <tr>
        <th><label class="float-right"></label>
        </th>
        <td><img class="float-right" src="picture/+file.png" width="20px" height="20px"><hr></td>
      </tr> -->

    </tbody>
  </table>


</div>




<div class="col-3">

  <div class="row m-10 ">
        <img id="img" align="center" src="../picturemannageannimalcenterhlive/<?php echo $datajoin[0]['W_A_E_Photo_1'] ;?>"  width="30%" class="border border-dark"><br>
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
            <img id="img" style="margin: 2px 0 0 0;" align="center" src="../picturemannageannimalcenterhlive/<?php echo $img[$i] ;?>"  width="30%" class="border border-dark">
          <?php  }
        } ?>
  </div>
  <div class="row mt-2">
    <!-- <a href="edith1.php?" class="btn btn-light" style="margin-left: 125px">แก้ไข</a> -->
  </div>
  <div class="row mt-2">
    <!-- <button class="btn btn-light deleteannimal" style="margin-left: 135px">ลบ</button> -->
  </div>



</div>


</div>

<div class="float-right row">
  <label class="" disabled="">ผู้กรอกข้อมูล :</label><?php echo $datajoin[0]['W_A_E_Fillers'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>


</div>

</body>
</html>