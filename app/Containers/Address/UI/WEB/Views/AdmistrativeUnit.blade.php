<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admistrative Unit</title>

  <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="public/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="public/css/custom-input.css" type="text/css" rel="stylesheet" />
  <link href="public/table/datatables.min.css" type="text/css" rel="stylesheet" />

</head>
<body class="p-4">
  <button class="btn btn-outline-primary" onclick="location.href='{{route('AddressComponent')}}'">Address Component</button>
  <button class="btn btn-outline-primary" onclick="location.href='{{route('UserInput')}}'">User Input</button>

  <p class="title-text">
    Danh sách đơn vị hành chính
  </p>
</hr>
<div class="d-flex justify-content-end mb-3">
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Thêm mới</button>
</div>

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
            <a href="{{route('removeAdmisUnit',['uuid'=> $itemAdmisUnit->admistrative_unit_uuid])}}" class="pr-3"><i class="fas fa-trash-alt"></i></a> 
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
              <span class="input-group-text w-100">Tên đơn vị hành chính: </span>
            </div>
            <input name="admistrative_unit_name" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100">Mã đơn vị hành chính: </span>
            </div>
            <input name="admistrative_unit_code" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100">Mã quốc gia: </span>
            </div>
            <input name="admistrative_unit_country_code" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100">Loại đơn vị hành chính: </span>
            </div>
            <select name="admistrative_unit_type" class="custom-select">
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
              <span class="input-group-text w-100">Cấp bậc đơn vị hành chính: </span>
            </div>
            <input name="admistrative_unit_address_component_level" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100">Thứ tự sắp xếp: </span>
            </div>
            <input name="admistrative_unit_order" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text w-100">Trạng thái: </span>
            </div>
            <select name="admistrative_unit_status" class="custom-select">
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

<script src="public/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/table/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $('#table').DataTable();
  });
</script>
</body>
</html>