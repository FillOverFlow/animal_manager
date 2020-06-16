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
        <a class="text-dark" href="#">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="#">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

    <div class="row p-5">

     <?php $sql = "SELECT * FROM animal JOIN animal_type ON animal.Animal_Type_ID = animal_type.Animal_Type_ID WHERE animal.Animal_ID = '".$_GET['Animal_ID']."'"; 
     $query = $conn->query($sql);
     $data = $query->fetch_assoc() ?>
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
            <td><label><?php echo $data['Animal_Type_Name'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">ชื่อสามัญไทย :</label>
            </th>
            <td><label><?php echo $data['Thai_Common_Name'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
            </th>
            <td><label><?php echo $data['English_Common_Name'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">ชื่อวิทยาศาสตร์ :</label>
            </th>
            <td><label><?php echo $data['Scientific_Name'];?></label></td>
          </tr>

          <tr>
            <th><label class="float-right">ลักษณะทั่วไป :</label>
            </th>
            <td><label><?php echo $data['General_Characteristics'];?></label></td>
          </tr>
        </tbody>
      </table>


    </div>




    <div class="col-6">

      <div class="row">
        <div class="col-6">
          <tr>
            <th><label class="float-left">รูปภาพ :</label>
            </th>
          </tr>
        </div>
        <div class="col-6">
          <tr>
            <th><label class="float-left">QR-code :</label>
            </th>
          </tr>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <tr>
            <th><img src="<?php echo $data['Animal_Photo'];?>" width="300px" class="border border-dark">
            </th>
          </tr>
        </div>
        <div class="col-6" id="imgp">
          <tr>
            <th><img src="<?php echo $data['QR_Code_Name'];?>" width="100%"  class="border border-dark">
            </th>
          </tr>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-6">
          <tr>
            <th>
            </th>
          </tr>
        </div>
        <div class="col-6">
          <tr>
            <th>
            </th>
          </tr>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col-6">
        </div>
        <div class="col-6">
          <tr>
            <th><button class="btn btn-light float-left" onclick="PrintDiv();">พิมพ์ QR-code</button>
            </th>
          </tr>
        </div>
      </div>



    </div>


  </div>
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
        window.location.replace("http://localhost/animal_manager/annimalmannage.php");

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


    function PrintDiv() {
        var divToPrint = document.getElementById('imgp'); // เลือก div id ที่เราต้องการพิมพ์
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