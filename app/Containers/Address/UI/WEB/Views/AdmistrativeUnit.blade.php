<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admistrative Unit</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/3b420fbe16.js" crossorigin="anonymous"></script>

  <style type="text/css">
    .input-group-prepend{
      width: 30%;
    }
  </style>
</head>
<body class="p-4">
  <div>

    <button class="btn btn-outline-primary" onclick="location.href='{{route('AddressComponent')}}'">Address Component</button>
    <button class="btn btn-outline-primary" onclick="location.href='{{route('UserInput')}}'">User Input</button>

    <p style="text-transform: uppercase; font-size: 1.2em; font-weight: bold; padding-top: 1rem;">
      Danh sách đơn vị hành chính
    </p>
  </hr>
  <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Thêm mới</button>
  </div>
</hr>
<div class="d-flex">Tổng số đơn vị hành chính: <p class="pl-2" id="countTable"></p>  </div>
</hr>
<table id="table" class="table table-bordered ">
  <thead class="thead-light">
    <tr>
      <th scope="col">Order</th>
      <th scope="col">Thuộc quốc gia</th>
      <th scope="col">Mã đơn vị hành chính</th>
      <th scope="col">Tên đơn vị hành chính</th>
      <th scope="col">Cấp bậc</th>
      <th scope="col">Loại</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    
    @if($admistrativeUnit !=null)
    <?php
      function getAddressComponentName($addressComponent, $itemAdmisUnit){
        foreach($addressComponent as $itemAddressComponent){
          if($itemAddressComponent->address_component_code == $itemAdmisUnit->admistrative_unit_country_code){
            echo $itemAddressComponent->address_component_name;
            return;
          }
        }echo "Chưa nhập bên Component ạ!";
      }
    ?>

    <?php foreach($admistrativeUnit as $itemAdmisUnit) :?>
      <tr>
        <td>{{$itemAdmisUnit->admistrative_unit_order}}</td>

        <td>
          <?php getAddressComponentName($addressComponent, $itemAdmisUnit);?>
        </td>
        
        <td>{{$itemAdmisUnit->admistrative_unit_code}}</td>
        <td>{{$itemAdmisUnit->admistrative_unit_name}}</td>
        <td>{{$itemAdmisUnit->admistrative_unit_address_component_level}}</td>
        <td>{{$itemAdmisUnit->admistrative_unit_type}}</td>
        <td>{{$itemAdmisUnit->admistrative_unit_status}}</td>
        <td> 
          <div class="d-flex justify-content-center">
            <a href="" class="pr-3"><i class="fas fa-trash-alt"></i></a> 
            <a href=""><i class="fas fa-edit"></i></a>  
          </div>
        </td>
      </tr>
    <?php endforeach ;?>
    @endif
    
  </tbody>
</table>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm đơn vị hành chính</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('addNewAdmistrativeUnit')}}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="input-group mb-3" >
            <div class="input-group-prepend">
              <span class="input-group-text w-100" id="">Tên đơn vị hành chính: </span>
            </div>
            <input name="admistrative_unit_name" type="text" class="form-control" placeholder="" >
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100" id="">Mã đơn vị hành chính: </span>
            </div>
            <input name="admistrative_unit_code" type="text" class="form-control" placeholder="" >
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100" id="">Mã quốc gia: </span>
            </div>
            <input name="admistrative_unit_country_code" type="text" class="form-control" placeholder="" >
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100" id="">Loại đơn vị hành chính: </span>
            </div>
            <select name="admistrative_unit_type" class="custom-select" id="">
              <option selected value="1">COUNTRY</option>
              <option value="2">PROVINCE</option>
              <option value="3">CITY</option>
              <option value="4">DISTRICT</option>
              <option value="5">TOWNSHIP</option>
              <option value="6">ROUTE</option>
              <option value="7">STREET_NUMBER</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100" id="">Cấp bậc đơn vị hành chính: </span>
            </div>
            <input name="admistrative_unit_address_component_level" type="text" class="form-control" placeholder="" >
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100" id="">Thứ tự sắp xếp: </span>
            </div>
            <input name="admistrative_unit_order" type="text" class="form-control" placeholder="" >
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100" id="">Trạng thái: </span>
            </div>
            <select name="admistrative_unit_status" class="custom-select" id="">
              <option selected value="1">Kích hoạt</option>
              <option value="0">Vô hiệu</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>

<script type="text/javascript">
  var iRowCount = document.getElementById('table').rows.length -1;
  document.getElementById('countTable').innerHTML = iRowCount;

  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("table");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
</script>
