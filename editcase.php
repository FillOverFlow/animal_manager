<?php include'code/connect.php'; ?>

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
        <a class="text-dark" href="#">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="#">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>

  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;แก้ไขข้อมูลคดี</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>
    <form action="code/mannageannimalcenter/editcase.php" method="POST" enctype="multipart/form-data">
      <div class="row p-5">
        <div class="col-6">

         <?php $id = $_GET['id']; 
         $sql = "SELECT * FROM case_animal JOIN deliver_department on case_animal.Department_Case_Animal = deliver_department.ID_Deliver_Department  WHERE case_animal.Case_Animal_ID  = '".$id."' AND case_animal.status = '1'";
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
                <td><input style="width:100%;" type="text
                  " disabled   placeholder="" value="<?php echo $row['Case_Animal_ID']; ?>">
                <input style="width:100%;" type="hidden" placeholder="" value="<?php echo $row['Case_Animal_ID']; ?>" name="Case_Animal_ID"></td>
                </tr>

                <tr>
                  <th><label class="float-right">คดีอาญาที่ :</label>
                  </th>
                  <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Criminal_Case_No']; ?>" name="Criminal_Case_No"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ยึดทรัพท์ที่ :</label>
                  </th>
                  <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Confiscation_Case_No']; ?>" name="Confiscation_Case_No"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ปวจ.ข้อที่ :</label>
                  </th>
                  <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Daily_No']; ?>" name="Daily_No"></td>
                </tr>

                <tr>
                  <th><label class="float-right">วันที่ :</label>
                  </th>
                  <td>
                    <?php 
                    $date = explode(':', $row['Date_Case_Animal']);
                    $datenum = $date[0];
                    $montnum = $date[1];
                    $yearnum = $date[2];
                    ?>
                    <span>
                      <select name="day">

                        <?php
                        for( $m=1; $m<=31; ++$m ) { 
                          if ($m == $datenum) {?>
                            <option value="<?php echo $datenum; ?>" selected><?php echo $datenum; ?></option>
                          <?php }else{ ?>
                            <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                          <?php } 
                        } ?>

                      </select> 
                    </span>
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
                <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Time_Case_Animal']; ?>" name="Time_Case_Animal"></td>
              </tr>

              <tr>
                <th><label class="float-right">ผู้ต้องหา :</label>
                </th>
                <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Suspect']; ?>" name="Suspect"></td>
              </tr>

              <tr>
                <th><label class="float-right">หน่วยงานเจ้าของคดี :</label>
                </th>
                <td><select style="width:100%;" name="Department_Case_Animal">
                  <?php 
                  $select = "SELECT * FROM deliver_department WHERE status = 1";
                  $resultd = $conn->query($select);
                  while ($rowd = $resultd->fetch_assoc()){

                    if($row['Department_Case_Animal'] == $rowd['ID_Deliver_Department']){ ?>
                      <option selected value="<?php echo $rowd['ID_Deliver_Department']; ?>"><?php echo $rowd['Deliver_Department'];?></option>
                    <?php }else{?>
                      <option value="<?php echo $rowd['ID_Deliver_Department']; ?>"><?php echo $rowd['Deliver_Department'];?></option>
                    <?php }}?>
                  </select></td>
                </tr>

                <tr>
                  <th><label class="float-right">รายละเอียดของกลางที่รับมอบ :</label>
                  </th>
                  <td><textarea style="width:100%;" name="Description_exhibit"><?php echo $row['Description_exhibit']; ?></textarea></td>
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
                  <td><select style="width:100%;" name="Status_Case_Animal">

                    <?php if($row['Status_Case_Animal'] == 1){ ?> 
                      <option value="0">เลือกสะถานะคดี</option>
                      <option value="1" selected>ระหว่างดำเนินคดี</option>
                      <option value="2">ถึงที่สุดแล้ว</option>
                      <?php}else if($row[' Status_Case_Animal'] == 2){?>
                        <option value="0">เลือกสะถานะคดี</option>
                        <option value="1">ระหว่างดำเนินคดี</option>
                        <option value="2" selected>ถึงที่สุดแล้ว</option>
                      <?php }else{ ?>
                        <option value="0" selected>เลือกสะถานะคดี</option>
                        <option value="1">ระหว่างดำเนินคดี</option>
                        <option value="2">ถึงที่สุดแล้ว</option>
                      <?php } ?>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th><label class="float-right">พิพากษาโดย :</label>
                  </th>
                  <td><input style="width:100%;" type="text"  placeholder="" value="<?php echo $row['Judged_by']; ?>" name="Judged_by"></td>
                </tr>

                <tr>
                  <th><label class="float-right">เมื่อวันที่ :</label>
                  </th>
                  <td>
                    <span>
                      <?php 
                  // $date[1]
                      $date1 = explode(':', $row['Date_Judged']);
                      $datenum1 = $date[0];
                      $montnum1 = $date[1];
                      $yearnum1 = $date[2];

                      ?>
                      <span>
                        <select name="day1">

                          <?php
                          for( $m=1; $m<=31; ++$m ) { 
                            if ($m == $datenum1) {?>
                              <option value="<?php echo $datenum; ?>" selected><?php echo $datenum; ?></option>
                            <?php }else{ ?>
                              <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
                            <?php } 
                          } ?>

                        </select> 
                      </span>
                      <span>
                        <select name="month1">
                          <?php
                          $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                          for( $j=0; $j<=12; $j++ ){

                           if(strcmp($thaimonth[$j],$montnum1) == 0){
                            echo '<option value='.$montnum.' selected>'.$montnum.'</option>';
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
                        $min = $yearnum - 60;
                        $max = $year+543;
                        for($i=$max; $i>=$min; $i--){

                          if(strcmp($i,$yearnum1) == 0){
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
                  <th><label class="float-right">คดีดำที่ :</label>
                  </th>
                  <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Undecided_Case_No']; ?>" name="Undecided_Case_No"></td>
                </tr>

                <tr>
                  <th><label class="float-right">คดีแดงที่ :</label>
                  </th>
                  <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Dong_Case_No']; ?>" name="Dong_Case_No"></td>
                </tr>

                <tr>
                  <th><label class="float-right">คำสั่งศาล :</label>
                  </th>
                  <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Injunction']; ?>" name="Injunction"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ผู้ต้องหา :</label>
                  </th>
                  <td><input style="width:100%;" type="text"   placeholder="" value="<?php echo $row['Suspect']; ?>" name="Suspect"></td>
                </tr>

                <tr class="mt-2">
                  <th><label class="float-right">เอกสารบันทึกประจำวัน :</label>
                  </th>
                  <td>
                    <input id="Recording_Document" type="text" value="<?php echo $row['Recording_Document']; ?>" disabled>
                    <input type="file" id="file" style="display:none;" name="Recording_Document">
                    <a href="#" class="btn"id="button" name="button" value="Upload" onclick="thisFileUpload('a');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
                  </td>
                </tr>
                <tr>
                  <th>
                  </th>
                  <td>
                   <input type="text" value="<?php echo $row['Arrest_Document']; ?>" disabled id="Arrest_Document">
                   <input type="file" id="fileb" style="display:none ;" name="Arrest_Document">
                   <a href="#" class="btn" name="button" value="Upload" onclick="thisFileUpload('b');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
                 </td>
               </tr>
               <tr>
                <th>
                </th>
                <td>
                 <input id="Deliver_Document" type="text" value="<?php echo $row['Deliver_Document']; ?>" disabled> 
                 <input type="file" id="filec" style="display:none ;" name="Deliver_Document">
                 <a href="#" class="btn" name="button" value="Upload" onclick="thisFileUpload('c');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
               </td>
             </tr>

           </tbody>
         </table>

       <?php } ?>


     </div>


   </div>


   <center><button class="btn btn-light">บันทึก</button></center>

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
   });




 </script>

 <script>
   function thisFileUpload(a) {
    if (a=="a") {document.getElementById("file").click(); var files = $('#file').val(); $('#Recording_Document').html(files); console.log(files.Recording_Document);}
    if (a=="b") {document.getElementById("fileb").click(); var filesb = $('#fileb').val(); $('#Arrest_Document').html(filesb);}
    if (a=="c") {document.getElementById("filec").click(); var filesc = $('#filec').val(); $('#Deliver_Document').html(filesc);}
  }
</script>
</body>
</html>