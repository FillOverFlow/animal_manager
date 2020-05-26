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

  <?php include('menu.php');?>


  <div id="display-2" class="col-9 p-2 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-sm"><label>&nbsp;&nbsp;รายงานสรุปผล</label></div>
      <div class="col-sm">
      </div>
      <div class="col-sm"></div>
    </div>

    <div class="row p-2">
      <div class="col-sm-6 offset-2" align="center">
        <table class="table table-borderless">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th><label class="float-right">ประเภทข้อมูล :</label>
              </th>
              <td><select class="form-control">
                <option>กรุณาเลือก</option></select></td>
              </tr>

              <tr>
                <th><label class="float-right">ชนิดสัตว์ :</label>
                </th>
                <td><select class="form-control">
                  <option>กรุณาเลือก</option></select></td>
                </tr>
                <tr>
                  <th><label class="float-right">วัน/เดือน/ปี :</label>
                  </th>
                  <td><select class="form-control">
                    <option>วัน/เดือน/ปี</option></select></td>
                  </tr>
                  <tr>
                    <th>
                    </th>
                    <td align="center"><label>ถึง</label></td>
                  </tr>
                  <tr>
                    <th><label class="float-right"></label>
                    </th>
                    <td><select class="form-control">
                      <option>วัน/เดือน/ปี</option></select></td>
                    </tr>
                    <tr>
                      <th>
                      </th>
                      <td><button type="submit" class="btn btn-light report">ค้นหา</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>



            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script type="text/javascript">

              $(document).ready(function() {
                $('.report').click(function(event) {
                  window.location.assign("http://localhost/project/reportprint.php")
               });
              });


            </script>
          </body>
          </html>