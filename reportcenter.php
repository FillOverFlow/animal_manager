<?php
require_once('code/report/class.php');
$type = 
$data = getdata();
$animaltype = gettypeanimal();
// echo "<pre>";
// var_dump($data );
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
  <div id="print">
    <div class="row" style="margin-top: 50px" >
      <div class="container-fluid" align="center">
        <h5>รายงานสรุปผล สถานะการนำไปใช้ประโชยน์<br>ข้อมูลประเภท สัตว์ป่าของกลาง</h5>
      </div>
    </div>
    <div class="row" >
      <div class="col-md-10 offset-md-1">
        <table class="w-100 table-bordered">
          <thead>
            <tr align="center">
              <th scope="col" width="5%">ลำดับที่</th>
              <th scope="col" width="30%">ชนิดสัตว์</th>
              <th scope="col">พ่อ-แม่พันธ์</th>
              <th scope="col">ปล่อยคืนสู่ธรรมชาติ</th>
              <th scope="col">นำไปใช้<br>ในทางวิชาการ</th>
              <th scope="col">ยังไม่จำแนก<br>สถานะ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $num = 0;
            foreach ($animaltype as $key => $value) { ?>
              <tr>
                <td colspan="6" style="padding: 10px;"><?php echo $value['Animal_Type_Name']; ?></td>
              </tr>
              <?php
            // Utilization_Status  int(10)     No  None  สถานะนำไปใชประโยชน์ 0 = กรุณาเลือก 1 = สัตว์พ่อ-แม่พันธุ์ 2 = ปล่อยคืนสู่ธรรมชาติ 3 = นำไปใช้ทางวิชาการ 4 = อื่น ๆ
            // $list = ['-','พ่อ-แม่พันธ์','ปล่อยคืนสู่ธรรมชาติ','นำไปใช้ทางวิชาการ','ยังไม่จำแนกสถานะ'];
            // echo $data[$key]['Animal_ID'];
              foreach ($data as $key => $val) {

                if($value['Animal_Type_ID'] == $val['Animal_Type_ID']){
                  ?>
                  <tr>
                    <td style="padding: 10px;"><?php
                    $num++;
                    echo $num; ?></td>
                    <td style="padding: 10px;"><?php echo $val['Thai_Common_Name']; ?></td>
                    <td style="padding: 10px;">
                      <?php
                      $sum = getcount($val['Animal_ID'],1); 
                      if ($sum>0) {
                       echo $sum;
                     }else{
                      echo "-";
                    }
                    ?></td>
                    <td style="padding: 10px;">
                      <?php
                      $sum = getcount($val['Animal_ID'],2); 
                      if ($sum>0) {
                       echo $sum;
                     }else{
                      echo "-";
                    }
                    ?></td>
                    <td style="padding: 10px;">
                      <?php
                      $sum = getcount($val['Animal_ID'],3); 
                      if ($sum>0) {
                       echo $sum;
                     }else{
                      echo "-";
                    }
                    ?></td>
                    <td style="padding: 10px;">
                      <?php
                      $sum = getcount($val['Animal_ID'],4); 
                      if ($sum>0) {
                       echo $sum;
                     }else{
                      echo "-";
                    }
                    ?></td>
                  </tr>
                <?php  }else{

                }
                ?>

              <?php  } 
              $num = 0; ?>
              <tr>
                <td colspan="2" style="padding: 10px;">รวม<?php echo $value['Animal_Type_Name']; ?></td>
                <td style="padding: 10px;">
                  <?php
                  $sum = getcountall($value['Animal_Type_ID'],1); 
                  // echo $value['Animal_Type_ID'];
                  if ($sum>0) {
                   echo $sum;
                 }else{
                  echo "-";
                }
                ?></td>
                <td style="padding: 10px;">
                  <?php
                  $sum = getcountall($value['Animal_Type_ID'],2); 
                  if ($sum>0) {
                   echo $sum;
                 }else{
                  echo "-";
                }
                ?></td>
                <td style="padding: 10px;">
                  <?php
                  $sum = getcountall($value['Animal_Type_ID'],3); 
                  if ($sum>0) {
                   echo $sum;
                 }else{
                  echo "-";
                }
                ?></td>
                <td style="padding: 10px;">
                  <?php
                  $sum = getcountall($value['Animal_Type_ID'],4); 
                  if ($sum>0) {
                   echo $sum;
                 }else{
                  echo "-";
                }
                ?></td>
              </tr>
            <?php  }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row" >

      <div class="col-sm-6 offset-6" style="margin-top: 20px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label> ลงชื่อ....................เจ้าหน้าที่</label>&nbsp;&nbsp;<label>ลงชื่อ....................แพทย์</label>
      </div>
      <div class="col-sm-2">

      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>