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
      <div class="col-4"><label>&nbsp;&nbsp;แก้ไขข้อมูลสัตว์ป่าของกลาง-ตาย</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>
    <form action="code/mannageannimalcenterhdead/editd1.php" method="POST" enctype="multipart/form-data">
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
              <td><input style="width: 100%;" type="text" required name="W_A_E_number"  placeholder="" value="<?php echo $datajoin[0]['W_A_E_number']; ?>">
                <input style="width: 100%;" type="hidden" name="Wild_Animal_Exhibits_ID" value="<?php echo $datajoin[0]['Wild_Animal_Exhibits_ID']; ?>">
              </td>
            </tr>

            <tr>
              <th><label class="float-right">ชนิดสัตว์ :</label>
              </th>
              <td>
                <input style="width: 100%;" type="text"   placeholder="" disabled="" value="<?php echo $datajoin[0]['Animal_Type_Name'];  ?>">
                <input style="width: 100%;" type="hidden" name="<?php echo $datajoin[0]['Animal_Type_ID'];  ?>"  value="<?php echo $datajoin[0]['Animal_Type_Name'];  ?>">
              </td>
            </tr>

            <tr>
              <th><label class="float-right">ชื่อสามัญไทย :</label>
              </th>
              <td>
                <input style="width: 100%;" type="text"  placeholder="" disabled="" value="<?php echo $datajoin[0]['Thai_Common_Name'] ?>">
                <input style="width: 100%;" type="hidden" name="Thai_Common_Name"   value="<?php echo $datajoin[0]['Thai_Common_Name'] ?>">
              </td>
            </tr>
            <tr>
              <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
              </th> 
              <td>
                <input style="width: 100%;" type="text"  placeholder="" disabled="" value="<?php echo $datajoin[0]['English_Common_Name'] ?>">
                <input style="width: 100%;" type="hidden" name="English_Common_Name" value="<?php echo $datajoin[0]['English_Common_Name'] ?>">
              </td>
            </tr>
            <tr>
              <th><label class="float-right" >ชื่อวิทยาศาสตร์ :</label>
              </th>
              <td>
                <input style="width: 100%;" type="text" disabled=""  value="<?php echo $datajoin[0]['Scientific_Name'] ?>">
                <input style="width: 100%;" type="hidden"  name="Scientific_Name"  value="<?php echo $datajoin[0]['Scientific_Name'] ?>">
              </td>
            </tr>

            <tr>
              <th><label class="float-right">สถานที่ :</label>
              </th>
              <td><select style="width: 100%;" name="W_A_E_Location" required class="form-control">
                <option value="เลือกสะถานที่" selected>เลือกสะถานที่</option>
                <option value="สะถานีนกน้ำบางพระ" >สะถานีนกน้ำบางพระ</option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select></td>
            </tr>

            <?php 
            $date1 = explode(':', $row['W_A_E_Date_of_admission']);
            $datenum = $date[0];
            $montnum = $date[1];
            $yearnum = $date[2];
            ?>
            <tr>
              <th><label class="float-right">วันที่ :</label>
              </th>
              <td>
                <select required  name="day">
                  <?php
                  for( $m=1; $m<=31; ++$m ) {
                    if ($datenum == 0) { ?>
                      <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                    <?php  }else if ($m == $datenum) {?>
                      <option value="<?php echo $datenum; ?>" selected><?php echo $datenum; ?></option>
                    <?php }else{ ?>
                      <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                    <?php } 
                  } ?>
                </select>
                <span>
                  <select name="month">
                    <?php
                    $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                    for( $j=0; $j<=12; $j++ ){
                     if(strcmp($thaimonth[$j],$montnum) == 0){
                      echo '<option value='.$montnum.' selected>'.$montnum.'</option>';
                    }else{
                      echo '<option value='.$thaimonth[$j].'>'.$thaimonth[$j].'</option>';
                    }
                  }
                  ?>
                </select>
              </span>
              <span>
                <select name="year">
                  <?php 
                  $year = date('Y');
                  $min = $yearnum - 60;
                  $max = $year+543;
                  for($i=$max; $i>=$min; $i--){

                    if(strcmp($i,$yearnum) == 0){
                      echo '<option value='.$yearnum.' selected>'.$yearnum.'</option>';
                    }else{
                      echo '<option value='.$i.'>'.$i.'</option>';
                    }
                  }
                  ?>
                </select>
              </span>
            </td>
          </tr>

          <tr>
            <th><label class="float-right">เวลา :</label>
            </th>
            <td><input style="width: 100%;" required name="W_A_E_Time" type="text" value="<?php echo $datajoin[0]['W_A_E_Time'] ?>"   placeholder="" ></td>
          </tr>

          <tr>
            <th><label class="float-right">กรงที่ :</label>
            </th>
            <td><input style="width: 100%;" name="W_A_E_Cage" required type="text" value="<?php echo $datajoin[0]['W_A_E_Cage'] ?>"   placeholder="" ></td>
          </tr>

          <?php 
          $date1 = explode(':', $row['wild_animal_exhibits']);
          $datenum1 = $date[0];
          $montnum1 = $date[1];
          $yearnum1 = $date[2];
          ?>
          <tr>
            <th><label class="float-right">วันที่รับเข้า :</label>
            </th>
            <td>
              <select required  name="day1">
                <?php
                for( $m=1; $m<=31; ++$m ) {
                  if ($datenum1 == 0) { ?>
                    <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                  <?php  }else if ($m == $datenum1) {?>
                    <option value="<?php echo $datenum1; ?>" selected><?php echo $datenum1; ?></option>
                  <?php }else{ ?>
                    <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                  <?php } 
                } ?>
              </select>
              <span>
                <select name="month1">
                  <?php
                  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                  for( $j=0; $j<=12; $j++ ){
                   if(strcmp($thaimonth[$j],$montnum1) == 0){
                    echo '<option value='.$montnum1.' selected>'.$montnum1.'</option>';
                  }else{
                    echo '<option value='.$thaimonth[$j].'>'.$thaimonth[$j].'</option>';
                  }
                }
                ?>
              </select>
            </span>
            <span>
              <select name="year1">
                <?php 
                $year = date('Y');
                $min = $yearnum1 - 60;
                $max = $year+543;
                for($i=$max; $i>=$min; $i--){

                  if(strcmp($i,$yearnum1) == 0){
                    echo '<option value='.$yearnum1.' selected>'.$yearnum1.'</option>';
                  }else{
                    echo '<option value='.$i.'>'.$i.'</option>';
                  }
                }
                ?>
              </select>
            </span>
          </td>
        </tr>

        <tr>
          <th><label class="float-right">น้ำหนัก :</label>
          </th>
          <td><input name="W_A_E_Weight" style="width: 100%;" required type="text" value="<?php echo $datajoin[0]['W_A_E_Weight'] ?>"   placeholder="" ></td>
        </tr>

        <tr>
          <th><label class="float-right">เพศ :</label>
          </th>
          <td><select required  name="W_A_E_Sex" style="width: 100%;" class="form-control">
            <?php if($datajoin[0]['W_A_E_Sex'] == 1){ ?>
              <option value="0" >กรุณาเลือก</option>
              <option value="1" selected>เพศผู้</option>
              <option value="2">เพศเมีย</option>
              <option value="3">อื่นๆ</option>
            <?php }else if($datajoin[0]['W_A_E_Sex'] == 2){ ?>
              <option value="0" >กรุณาเลือก</option>
              <option value="1" >เพศผู้</option>
              <option value="2" selected>เพศเมีย</option>
              <option value="3">อื่นๆ</option>
            <?php }else if($datajoin[0]['W_A_E_Sex'] == 3){ ?>
              <option value="0" >กรุณาเลือก</option>
              <option value="1" >เพศผู้</option>
              <option value="2" >เพศเมีย</option>
              <option value="3" selected>อื่นๆ</option>
            <?php }else{?>
              <option value="0" selected>กรุณาเลือก</option>
              <option value="1" >เพศผู้</option>
              <option value="2" >เพศเมีย</option>
              <option value="3" >อื่นๆ</option>
            <?php }?>
          </select></td>
        </tr>
        <tr>
          <th><label class="float-right">สะถานะสัตว์ :</label>
          </th>
          <td><select class="form-control">
            <option value="เลือกสะถานะสัตว์" selected>เลือกสะถานะสัตว์</option>
            <option value="ของกลาง">ของกลาง</option>
          </select></td>
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
          <td>
            <input style="width: 100%;"   type="text" value="<?php echo $datajoin[0]['Criminal_Case_No'] ?>" disabled="">
            <input style="width: 100%;" name="Criminal_Case_No"  type="hidden" value="<?php echo $datajoin[0]['Criminal_Case_No'] ?>"   >
          </td>
        </tr>

        <tr>
          <th><label class="float-right">ยึดทรัพย์ที่ :</label>
          </th>
          <td>
            <input style="width: 100%;"  type="text" value="<?php echo $datajoin[0]['Confiscation_Case_No'] ?>"   placeholder="" disabled="">
            <input style="width: 100%;" name="Confiscation_Case_No" type="hidden" value="<?php echo $datajoin[0]['Confiscation_Case_No'] ?>">
          </td>
        </tr>

        <tr>
          <th><label class="float-right">เลขห่วงขา :</label>
          </th>
          <td>
            <input style="width: 100%;"  type="text"  value="<?php echo $datajoin[0]['W_A_E_Pin_Number'] ?>"  placeholder="" disabled="">
            <input style="width: 100%;" name="W_A_E_Pin_Number" type="hidden"  value="<?php echo $datajoin[0]['W_A_E_Pin_Number'] ?>">
          </td>
        </tr>
        <tr>
          <th><label class="float-right">DNA :</label>
          </th>
          <td>
           <input type="text" disabled id="W_A_E_DNA_File" value="<?php echo $datajoin[0]['W_A_E_DNA_File'] ?>">
           <input type="file" id="filea" style="display:none ;" name="W_A_E_DNA_File">
           <a href="#" class="btn" name="button" value="Upload" onclick="thisFileUpload('a');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
         </td>
       </tr>
       <tr>
        <th><label class="float-right">ปวจ. ข้อที่ :</label>
        </th>
        <td><input style="width: 100%;" name="W_A_E_Daily_No" require type="text" value="<?php echo $datajoin[0]['W_A_E_Daily_No'] ?>"   placeholder=""></td>
      </tr>

      <tr>
        <th><label class="float-right">เวลา :</label>
        </th>
        <td><input style="width: 100%;" name="W_A_E_Date_time" require type="text" value="<?php echo $datajoin[0]['W_A_E_Date_time'] ?>"   placeholder=""></td>
      </tr>


      <?php 
      $date1 = explode(':', $row['W_A_E_Date']);
      $datenum2 = $date[0];
      $montnum2 = $date[1];
      $yearnum2 = $date[2];
      ?>
      <tr>
        <th><label class="float-right">]ลงวันที่ :</label>
        </th>
        <td>
          <select required  name="day3">
            <?php
            for( $m=1; $m<=31; ++$m ) {
              if ($datenum2 == 0) { ?>
                <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
              <?php  }else if ($m == $datenum2) {?>
                <option value="<?php echo $datenum2; ?>" selected><?php echo $datenum2; ?></option>
              <?php }else{ ?>
                <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
              <?php } 
            } ?>
          </select>
          <span>
            <select name="month3">
              <?php
              $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
              for( $j=0; $j<=12; $j++ ){
               if(strcmp($thaimonth[$j],$montnum2) == 0){
                echo '<option value='.$montnum2.' selected>'.$montnum2.'</option>';
              }else{
                echo '<option value='.$thaimonth[$j].'>'.$thaimonth[$j].'</option>';
              }
            }
            ?>
          </select>
        </span>
        <span>
          <select name="year3">
            <?php 
            $year = date('Y');
            $min = $yearnum2 - 60;
            $max = $year+543;
            for($i=$max; $i>=$min; $i--){

              if(strcmp($i,$yearnum2) == 0){
                echo '<option value='.$yearnum2.' selected>'.$yearnum2.'</option>';
              }else{
                echo '<option value='.$i.'>'.$i.'</option>';
              }
            }
            ?>
          </select>
        </span>
      </td>
    </tr>

    <tr>
      <th><label class="float-right">หน่วยงานที่จับกุม :</label>
      </th>
      <td>
        <?php 
        $tbla ='deliver_department';
        $deliver_department = showAnimalData($tbla,'no'); ?>
        <select style="width: 100%;"  required name="W_A_E_Deliver_Deparment" style="width: 100%;" class="form-control">
          <option value="0">เลือกหน่วยงาน</option>
          <?php foreach ($deliver_department as $key => $val) { ?>
            <?php if($val['ID_Deliver_Department'] == $datajoin[0]['W_A_E_Deliver_Deparment']){ ?>
              <option value="<?php echo $val['ID_Deliver_Department']; ?>" selected><?php echo $val['Deliver_Department']; ?></option>
            <?php } ?>
            <option value="<?php echo $val['ID_Deliver_Department']; ?>"><?php echo $val['Deliver_Department']; ?></option>
          <?php } ?>

        </select></td>
      </tr>

      <tr>
        <th><label class="float-right">หน่วยงานนำส่ง :</label>
        </th>
        <td>
          <?php 
          $tbla ='arrest_deparment';
          $arrest_deparment = showAnimalData($tbla,'no'); ?>
          <select style="width: 100%;" required name="W_A_E_Arrest_Deparment" style="width: 100%;" class="form-control">
            <option value="0" selected>เลือกหน่วยงาน</option>

            <?php foreach ($arrest_deparment as $key => $val) { ?>
              <?php if($val['ID_Arrest_Deparment'] == $datajoin[0]['W_A_E_Arrest_Deparment']){ ?>
                <option value="<?php echo $val['ID_Arrest_Deparment']; ?>" selected><?php echo $val['Arrest_Deparment']; ?></option>
              <?php } ?>
              <option value="<?php echo $val['ID_Arrest_Deparment']; ?>"><?php echo $val['Arrest_Deparment']; ?></option>
            <?php  } ?>
          </select></td>
        </tr>

        <tr>
          <th><label class="float-right">ผู้ที่รับมอบ :</label>
          </th>
          <td>
            <?php 
            $tbla ='authorities';
            $authorities = showAnimalData($tbla,'no'); ?>
            <select style="width: 100%;" required name="Authorities_ID" style="width: 100%;" class="form-control">
              <option >กรุณาเลิกชื่อเจ้าหน้าที่</option>
              <?php foreach ($authorities  as $key => $val) { ?>
                <?php if ($datajoin[0]['Authorities_ID']==$val['Authorities_ID']) { ?>
                  <option value="<?php echo $val['Authorities_ID']; ?>" selected><?php echo $val['Authorities_First_Name']; ?></option>
                <?php  }else { ?>
                  <option value="<?php echo $val['Authorities_ID']; ?>"><?php echo $val['Authorities_First_Name']; ?></option>
                <?php  } ?>
              <?php  } ?>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right">สถานะตามกฎหมาย :</label>
            </th>
            <td><select style="width: 100%;" required name="W_A_E_Legal_Status" style="width: 100%;" class="form-control">
              <?php
              $option = array(
                '0' => 'กรุณาเลือก' ,
                '1' => 'CITES Appendix I',
                '2' => 'CITES Appendix II',
                '3' => 'CITES Appendix III',
                '4' => 'สัตว์ป่าคุ้มครอง',
                '5' => 'สัตว์ป่านอกบัญชี',
              );
              foreach ($option as $key=> $value) { ?>
                <?php if ($key == $datajoin[0]['W_A_E_Legal_Status']) { ?>
                  <option value="<?php echo $key; ?>" selected><?php echo $value;  ?></option> 
                <?php }else{  ?>
                  <option value="<?php echo $key; ?>"><?php echo $value;  ?></option> 
                <?php  } ?>
              <?php  } ?>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right">สถานะนำไปใช้ประโยชน์ :</label>
            </th>
            <td><select style="width: 100%;" required name="Utilization_Status" style="width: 100%;" class="form-control">

              <?php
              $option = array(
                '0' => 'กรุณาเลือก' ,
                '1' => 'สัตว์พ่อ-แม่พันธุ์',
                '2' => 'ปล่อยคืนสู่ธรรมชาติ',
                '3' => 'นำไปใช้ทางวิชาการ',
                '5' => 'อื่น ๆ'
              );
              foreach ($option as $key=> $value) { ?>
                <?php if ($key == $datajoin[0]['Utilization_Status']) { ?>
                  <option value="<?php echo $key; ?>" selected><?php echo $value;  ?></option> 
                <?php }else{  ?>
                  <option value="<?php echo $key; ?>"><?php echo $value;  ?></option> 
                <?php  } ?>
              <?php  } ?>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right"></label>
            </th>
            <td>
             <input type="text" disabled id="W_A_E_File_Ulilization_Status" value="<?php echo $datajoin[0]['W_A_E_File_Ulilization_Status'];?>">
             <input    type="file" id="fileb" style="display:none;" name="W_A_E_File_Ulilization_Status">
             <a href="#" class="btn"  value="Upload" onclick="thisFileUpload('b');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
           </td>
         </tr>


       </tbody>
     </table>


   </div>




   <div class="col-3">

    <div class="row m-10 " align="center">
      <tr>
        <th>
          <?php 
          if($datajoin[0]['W_A_E_Photo_1']){
            echo "havepic";
            $path ="code/picturemannageannimalcenterhlive/".$datajoin[0]['W_A_E_Photo_1'];
          }else{
            $path ="picture/logo.png";

          }
          ?>

          <img id="img" align="center" src="<?php echo $path;?>"  width="300px" class="border border-dark"><br><br>
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
              <img id="img" style="margin: 2px 0 0 0;" align="center" src="code/picturemannageannimalcenterhlive/<?php echo $img[$i] ;?>"  height="50px" class="border border-dark"><br>
            <?php  }
          } ?>


        </th>
      </tr>

    </div>
    <div class="row mt-2">

      <tr>
        <th><input style="width: 100%;" width="100px" OnChange="Preview(this)" required class="form-control" required="เพิ่มรูป"   type="file" name="annimalimg[]" accept="image/*" multiple></th>
      </tr>

    </div>



  </div>


</div>

<div class="float-right">
  <label class="">ผู้กรอกข้อมูล :</label>
  <input type="text"   disabled="" value="ผู้กรอกข้อมูล">
  <input type="hidden" namหe="W_A_E_Fillers"   value="ผู้กรอกข้อมูล">
</div>


<center><button type="submit" class="btn btn-light">บันทึก</button></center>
</form>
<button class="btn btn-light float-left back">ย้อนกลับ</button>

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
      window.location.replace("http://localhost/animal_manager/mannageannimalcenterhdead1.php");

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
<script>
  function thisFileUpload(a) {
    if (a=="a") {
      var name = 'havefiles';
      $('#W_A_E_DNA_File').val(name);
      document.getElementById("filea").click();
      var files = $('#file').val();
      $('#Recording_Document').html(files);
    }
    if (a=="b") {
      var name = 'havefiles';
      $('#W_A_E_File_Ulilization_Status').val(name);
      document.getElementById("fileb").click();
      var filesb = $('#fileb').val();
      $('#Arrest_Document').html(filesb);
    }
  }
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