<?php
session_start();
require_once('code/mannageannimalcenter/class.php');
$id = $_GET['id'];
$tbldeliver_department = "deliver_department";
$tblarrest_deparment = "arrest_deparment";
$tblauthorities = "authorities";
$dataanimal = joinshowwild($id);
$deliver_department = showAnimalData($tbldeliver_department,'no');
$arrest_deparment = showAnimalData($tblarrest_deparment,'no');
$authorities = showAnimalData($tblauthorities,'no');
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="css/css.css">

  <title>ระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระ จังหวัดชลบุรี</title>
  <style type="text/css">
    .forminput input{
      width: 100%;
    }
  </style>
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
      <div class="col-4"><label>&nbsp;&nbsp;เพิ่มข้อมูลสัตว์ป่าของกลางตาย</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>
    <?php foreach ($dataanimal as $key => $value) { ?>
     <form action="code/mannageannimalcenterhlive/addd1.php" method="POST" enctype="multipart/form-data" class="forminput">
      <div class="row p-5">
        <div class="col-5">
          <table>
            <thead>
              <tr>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th><label class="float-right">หมายเลขสัตว์ :</label>
                </th>
                <td>
                  <input style="width: 100%;" type="text" name="W_A_E_number" required  placeholder="" value="">
                  <input style="width: 100%;" type="hidden" id="Wild_Animal_Exhibits_ID" name="Wild_Animal_Exhibits_ID"   placeholder=""  value="<?php echo $value['Wild_Animal_Exhibits_ID'];  ?>">
                  <input type="hidden" name="Animal_Dead_ID" value="<?php echo $value['Animal_Dead_ID']; ?>">
                </td>
              </tr>
            </tr>

            <tr>
              <th><label class="float-right">วัน/เดือน/ปี การชันสูตรศพ :</label>
              </th>
              <td>
                <span>
                  <select required name="AutopsyDate">
                    <?php 
                    $start_date = 1;
                    $end_date   = 31;
                    for( $j=$start_date; $j<=$end_date; $j++ ) {
                      echo '<option value='.$j.'>'.$j.'</option>';
                    }
                    ?>
                  </select>
                </span>
                <span>
                 <select required name="AutopsyMount">
                  <?php 
                  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                  for($i=0; $i<=11; $i++) { 
                    ?>
                    <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                  <?php } ?>
                </select> 
              </span>
              <span>
                <select required name="AutopsyYear">
                  <?php 
                  $year = date('Y')+543;
                  $min = $year - 60;
                  $max = $year;
                  for( $i=$max; $i>=$min; $i-- ) {
                    echo '<option value='.$i.'>'.$i.'</option>';
                  }
                  ?>
                </select>
              </span>
            </td>
          </tr>

          <tr>
            <th><label class="float-right">ชนิดสัตว์ :</label>
            </th>
            <td><input style="width: 100%;" type="text" name=""  placeholder="" disabled="" value="<?php echo $value['Animal_Type_Name']; ?>"><input style="width: 100%;" type="hidden" name="Animal_Type_Name"  placeholder="" value="<?php echo $value['Animal_Type_Name']; ?>"></td>
          </tr>

          <tr>
            <th>
              <label  class="float-right">ชื่อสามัญไทย :</label>
            </th>
            <td> 
              <input style="width: 100%;" type="text" id="Thai_Common_Name"  placeholder="" disabled="" value="<?php echo $value['Thai_Common_Name']; ?>">
              <input style="width: 100%;" type="hidden" name="Thai_Common_Name"   placeholder=""  value="<?php echo $value['Thai_Common_Name']; ?>"></td>
            </tr>
            <tr>
              <th>
                <label class="float-right">ชื่อสามัญอังกฤษ :</label>
              </th>
              <td>
                <input style="width: 100%;" type="text"  id="English_Common_Name"   placeholder="" disabled="" value="<?php echo $value['English_Common_Name']; ?>">
                <input style="width: 100%;" type="hidden" name="English_Common_Name"   placeholder=""  value="<?php echo $value['English_Common_Name']; ?>"></td>
              </tr>
              <tr>
                <th>
                  <label class="float-right">ชื่อวิทยาศาสตร์ :</label>
                </th>
                <td>
                  <input style="width: 100%;" type="text" id="Scientific_Name"    placeholder="" disabled="" value="<?php echo $value['Scientific_Name']; ?>">
                  <input style="width: 100%;" type="hidden" name="Scientific_Name"   placeholder=""  value="<?php echo $value['Scientific_Name']; ?>"></td>
                </tr> 

                <tr>
                  <th><label class="float-right" disabled="">สิ่งที่แนบมา :</label>
                  </th>
                  <td><input type="text" name="Attachment" ></td>
                </tr>

                <tr>
                  <th><label class="float-right">เพศ :</label>
                  </th>
                  <td><select required  name="W_A_E_Sex" style="width: 100%;" class="form-control">
                    <option value="0" selected>กรุณาเลือก</option>
                    <option value="1">เพศผู้</option>
                    <option value="2">เพศเมีย</option>
                    <option value="3">อื่นๆ</option>
                  </select></td>
                </tr>
                <tr>
                  <th><label class="float-right" disabled="">อายุ :</label>
                  </th>
                  <td><input type="text" name="Animal_Dead_Age" ></td>
                </tr>
                <tr>
                  <th><label class="float-right" disabled="">เลขคดีอาญา :</label>
                  </th>
                  <td><input  style="width: 100%;" type="text"   placeholder="" disabled="" value="<?php echo $value['Criminal_Case_No']; ?>">
                    <input name="Criminal_Case_No" style="width: 100%;" type="hidden" value="<?php echo $value['Criminal_Case_No']; ?>"></td>
                  </tr>

                  <tr>
                    <th><label class="float-right" disabled="">เลขคดียึดสินทรัพท์ :</label>
                    </th>
                    <td><input style="width: 100%;" type="text"   placeholder="" disabled="" value="<?php echo $value['Confiscation_Case_No']; ?>">
                      <input name="Confiscation_Case_No" style="width: 100%;" type="hidden" value="<?php echo $value['Confiscation_Case_No']; ?>"></td>
                    </tr>

                    <tr>
                      <th><label class="float-right">วันรับมอบ :</label>
                      </th>
                      <td>
                        <span>
                          <select required name="DeliveryDate">
                            <?php 
                            $start_date = 1;
                            $end_date   = 31;
                            for( $j=$start_date; $j<=$end_date; $j++ ) {
                              echo '<option value='.$j.'>'.$j.'</option>';
                            }
                            ?>
                          </select>
                        </span>
                        <span>
                         <select required name="DeliveryMount">
                          <?php 
                          $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                          for($i=0; $i<=11; $i++) { 
                            ?>
                            <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                          <?php } ?>
                        </select> 
                      </span>
                      <span>
                        <select required name="DeliveryYear">
                          <?php 
                          $year = date('Y')+543;
                          $min = $year - 60;
                          $max = $year;
                          for( $i=$max; $i>=$min; $i-- ) {
                            echo '<option value='.$i.'>'.$i.'</option>';
                          }
                          ?>
                        </select>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <th><label class="float-right">วันที่ตาย :</label>
                    </th>
                    <td>
                      <span>
                        <select required name="Animal_Dead_Date">
                          <?php 
                          $start_date = 1;
                          $end_date   = 31;
                          for( $j=$start_date; $j<=$end_date; $j++ ) {
                            echo '<option value='.$j.'>'.$j.'</option>';
                          }
                          ?>
                        </select>
                      </span>
                      <span>
                       <select required name="Animal_Dead_Mount">
                        <?php 
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        for($i=0; $i<=11; $i++) { 
                          ?>
                          <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                        <?php } ?>
                      </select> 
                    </span>
                    <span>
                      <select required name="Animal_Dead_Year">
                        <?php 
                        $year = date('Y')+543;
                        $min = $year - 60;
                        $max = $year;
                        for( $i=$max; $i>=$min; $i-- ) {
                          echo '<option value='.$i.'>'.$i.'</option>';
                        }
                        ?>
                      </select>
                    </span>
                  </td>
                </tr>

                <tr>
                  <th><label class="float-right" disabled="">ข้อมูลแวดล้อม :</label>
                  </th>
                  <td><input type="text" name="Environment_information"></td>
                </tr>

                <tr>
                  <th><label class="float-right" disabled="">ประวัติรักษา :</label>
                  </th>
                  <td><input type="text" name="Treatment_History"></td>
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
                  <td><input type="text"  name="Basic_Diagnosis"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ระยะเวลาป่วยตาย :</label>
                  </th>
                  <td><input type="text" name="Death_Period"></td>
                </tr>

                <tr>
                  <th><label class="float-right">สภาพซาก :</label>
                  </th>
                  <td><input type="text"  name="Condition_Carcass"></td>
                </tr>
                <tr>
                  <th><label class="float-right">คะแนนความสมบูรณ์ของร่างกาย :</label>
                  </th>
                  <td><select class="form-control" name="Body_Integrity_Score">
                    <?php 
                    $list = array(
                      '0' => 'กรุณาเลือก',
                      '1' => 'แย่มาก',
                      '2' => 'แย่',
                      '3' => 'ปานกลาง',
                      '4' => 'ดี',
                      '5' => 'ดีมาก',
                    );
                    foreach ($list as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php }?>
                  </select></td>
                </tr>
                <tr>
                  <th><label class="float-right">น้ำหนักตัว :</label>
                  </th>
                  <td><input type="text" name="Animal_Dead_Weight"></td>
                </tr>
                <tr>
                  <th><label class="float-right">ข้อสุงเกตุเพิ่มเติม :</label>
                  </th>
                  <td><input type="text"   name="Additional_Observations"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ผลการชันสูตร :</label>
                  </th>
                  <td><input type="text" name="Autopsy_Results"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ตัวอย่างห้องปฎิบัติการ :</label>
                  </th>
                  <td><input type="text" name="Laboratory_Sample"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ผลการทดสอบ :</label>
                  </th>
                  <td><input type="text" name="Test_Result"></td>
                </tr>

                <tr>
                  <th><label class="float-right">สาเหตุเบื้องต้น :</label>
                  </th>
                  <td><input type="text" name="Basic_Cause"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ปัจจัยโน้มนำ :</label>
                  </th>
                  <td><input type="text" name="Lead_Factor"></td>
                </tr>

                <tr>
                  <th><label class="float-right">ผู้รับมอบ :</label>
                  </th>
                  <td>
                    <select required name="Authorities_ID" style="width: 100%;" class="form-control">
                      <option selected>กรุณาเลิกชื่อเจ้าหน้าที่</option>
                      <?php foreach ($authorities  as $key => $val) { ?>
                        <option value="<?php echo $val['Authorities_ID']; ?>"><?php echo $val['Authorities_First_Name']; ?></option>
                      <?php  } ?>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th><label class="float-right">เจ้าหน้าที่นำส่ง :</label>
                  </th>
                  <td>
                    <select required name="Authorities_ID" style="width: 100%;" class="form-control">
                      <option selected>กรุณาเลิกชื่อเจ้าหน้าที่</option>
                      <?php foreach ($authorities  as $key => $val) { ?>
                        <option value="<?php echo $val['Authorities_ID']; ?>"><?php echo $val['Authorities_First_Name']; ?></option>
                      <?php  } ?>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th><label class="float-right">ผู้กรอกข้อมูล :</label>
                  </th> 
                  <td><input type="text" disabled="" value="<?php echo $_SESSION['authorities']['Authorities_First_Name'];?>">
                    <input type="hidden" name="Animal_Dead_Fillers" value="<?php echo $_SESSION['authorities']['Authorities_First_Name'];?>"></td>
                  </tr>



                </tbody>
              </table>


            </div>




            <div class="col-3">







              <table>
                <thead>
                  <tr>

                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <th><label class="float-right">สะถานะการทำลายซาก :</label>
                    </th>
                    <td><select class="form-control" name="Destroy_The_Remains_Status">
                      <?php
                      $list = array(
                        '0' => 'กรุณาเลือก',
                        '1' => 'ทำลายแล้ว',
                        '2' => 'ยังไม่ทำลาย',
                      );
                      foreach ($list as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php  }
                      ?>

                    </select></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">สาเหตุการตาย :</label>
                    </th>
                    <td><textarea name="Cause_of_Death"></textarea></td>
                  </tr>

                  <tr>
                    <td><label class="float-left">เพิ่มรูป :</label>
                    </td>
                    <td><label class="float-left">สร้าง QR-code :</label></td>
                  </tr>

                  <tr>
                    <th>
                      <img id="img" src="picture/nopicture.jpg" alt="" style="width: 120px;"/>
                    </th>
                    <th>
                      <img id="imgQR" src="picture/nopicture.jpg" alt="" style="width: 120px;"/>
                      <input  id="nameqr" type="hidden" name="nameqr">
                    </th>
                  </tr>

                  <tr>
                    <th>
                      <input width="100px" OnChange="Preview(this)"  class="form-control" required="เพิ่มรูป" width="150px"   type="file" name="annimalimg[]" accept="image/*" multiple>
                    </th>
                    <th><button type="button" class="btn btn-light showqr1">สร้าง QR-code</button>
                    </th>
                  </tr>
                </tr>
                <tr>
                  <th>
                  </th>
                  <td><button class="btn btn-light float-left" onclick="PrintDiv();" >พิมพ์ QR-code</button>
                  </tr>
                  <tr class="mt-5">
                    <td></td>
                  </tr>
                  <tr class="mt-5">
                    <td></td>

                  </tr>
                  <tr class="mt-5">
                    <td></td>

                  </tr>
                </tbody>
              </table>
              <center><button type="submit" class="btn btn-light mt-5 m-5" >บันทึก</button></center>
            </div>
            <button class="btn btn-light float-left back">ย้อนกลับ</button>
          </div>
        </form>
      <?php } ?>
      <div class="col-1">
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
          <div class="modal-body" id="printimg">
            <img id="imgQRmodel" src="<?php echo $data['QR_Code_Name'];?>" width="100%" class="border border-dark">
          </div>
          <div class="mt-2">
            <center><button type="button" class="btn btn-light closs" data-dismiss="modal" aria-label="Close"> ยืนยัน</button></center>
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
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script type="text/javascript">


        $(document).ready(function() {

          $('.back').on('click', function (e) {
            e.preventDefault()
            window.location.replace("http://localhost/animal_manager/mannageannimalcenterhdead.php");

          })
          $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
          })

          $('.deleteannimal').on('click', function () {
            $('#deleteannimal').modal('show');
          })

          $('.showqr1').on('click', function () {



            var nameEng = $('#English_Common_Name').val();
            var nameTH = $('#Thai_Common_Name').val();
            var nameSci = $('#Scientific_Name').val();
            var Wild_Animal_Exhibits_ID = $('#Wild_Animal_Exhibits_ID').val();
            $.ajax({
              type: 'POST',
              url: 'code/QR/generateQR.php',
              data: {Wild_Animal_Exhibits_ID:Wild_Animal_Exhibits_ID,nameEng:nameEng,nameTH:nameTH,nameSci:nameSci},
            })
            .done(function(rs) {
              var obj = JSON.parse(rs);
              var src1 = 'code/QR/deadQR/'+obj.namefile;
              $("#nameqr").attr("value", obj.namefile);
              $("#imgQR").attr("src", src1);
              $("#imgQRmodel").attr("src", src1);
              $('#showqr1').modal('show');
            })
            .fail(function() {
              console.log("error");
            });

            
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

        function PrintDiv() {
        var divToPrint = document.getElementById('printimg'); // เลือก div id ที่เราต้องการพิมพ์
        var html =  '<html>'+ // 
        '<head>'+
        '<link href="css/print.css" rel="stylesheet" type="text/css">'+
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