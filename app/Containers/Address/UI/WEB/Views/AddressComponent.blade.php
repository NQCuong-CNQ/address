<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Address Component</title>

  <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="public/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="public/css/custom-input.css" type="text/css" rel="stylesheet" />
  <link href="public/table/datatables.min.css" type="text/css" rel="stylesheet" />

</head>
<body class="p-4">
  <div>
    <button class="btn btn-outline-primary" onclick="location.href='{{route('AdmistrativeUnit')}}'">Admistrative Unit</button>
    <button class="btn btn-outline-primary" onclick="location.href='{{route('UserInput')}}'">User Input</button>

    <p class="title-text">Danh sách cấu thành địa chỉ</p>
  </hr>
  <div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Thêm mới cấu thành địa chỉ</button>
  </div>

<table id="table" class="table table-bordered ">
  <thead class="thead-light">
    <tr>
      <th scope="col">Order</th>
      <th scope="col">Mã</th>
      <th scope="col">Tên</th>
      <th scope="col">Mã bưu chính</th>
      <th scope="col">Mã vùng điện thoại</th>
      <th scope="col">Zip code</th>
      <th scope="col">Đơn vị hành chính</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    @if($addressComponent !=null)
    <?php foreach($addressComponent as $item) :?>
      <tr>
        <td>{{$item->address_component_order}}</td>
        <td>{{$item->address_component_code}}</td>
        <td>{{$item->address_component_name}}</td>
        <td>{{$item->address_component_post_code}}</td>
        <td>{{$item->address_component_phone_code}}</td>
        <td>{{$item->address_component_zip_code}}</td>

        <?php foreach($admistrativeUnit as $itemAdmis) :?>
          @if($itemAdmis->admistrative_unit_code == $item->address_component_unit_code && $itemAdmis->admistrative_unit_country_code == $item->address_component_country_code)
            <td>{{$itemAdmis->admistrative_unit_name}}</td>
          @endif
        <?php endforeach ;?>

        <td>{{$item->address_component_status}}</td>
        <td> 
          <div class="d-flex justify-content-center">
            <a href="{{route('removeAddressComponent',['uuid'=> $item->address_component_uuid])}}" class="pr-3"><i class="fas fa-trash-alt"></i></a> 
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
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('addNewAddressComponent')}}">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Quốc gia: </span>
            </div>
            <select name="" class="custom-select" id="CountryNameSelectedBox" onchange="changeCountryName();">
              <option disabled selected value> -- select an option -- </option>

              <?php foreach ($addressComponent as $itemAddr) { ?>
                @if($itemAddr->address_component_unit_level == 0)
                <td>
                  <option value="{{$itemAddr->address_component_code}}">{{$itemAddr->address_component_name}}</option>
                </td>
                @endif
              <?php } ?>

            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Đơn vị hành chính: </span>
            </div>
            <select id="unit_code-select-box" name="address_component_unit_code" class="custom-select" onchange="changeAdmisUnit();">
              <option disabled selected value="COUNTRY">Quốc gia</option>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Mã: </span>
            </div>
            <input name="address_component_code" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Tên: </span>
            </div>
            <input name="address_component_name" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Mã bưu chính: </span>
            </div>
            <input name="address_component_post_code" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Mã vùng điện thoại: </span>
            </div>
            <input name="address_component_phone_code" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Zip code: </span>
            </div>
            <input name="address_component_zip_code" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Thứ tự sắp xếp: </span>
            </div>
            <input name="address_component_order" type="text" class="form-control">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">Trạng thái: </span>
            </div>
            <select name="address_component_status" class="custom-select">
              <option selected value="1">Kích hoạt</option>
              <option value="0">Vô hiệu</option>
            </select>
          </div>
          <div class="input-group mb-3 d-none">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">country_code: </span>
            </div>
            <input id="address_component_unit_country_code_hidden" name="address_component_unit_country_code_hidden" type="text" class="form-control" value="">
          </div>
          <div class="input-group mb-3 d-none">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">all type: </span>
            </div>
            <input id="address_component_unit_all_type_hidden" name="address_component_unit_all_type_hidden" type="text" class="form-control" value="">
          </div>
          <div class="input-group mb-3 d-none">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">type: </span>
            </div>
            <input id="address_component_unit_type_hidden" name="address_component_unit_type_hidden" type="text" class="form-control" value="">
          </div>
          <div class="input-group mb-3 d-none">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100">level: </span>
            </div>
            <input id="address_component_unit_level_hidden" name="address_component_unit_level_hidden" type="text" class="form-control" value="0">
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

<?php
echo "<script>var admistrative_unit_address_component_level = " . json_encode(array_column($admisUnitArray, "admistrative_unit_address_component_level")) . "; </script>";
echo "<script>var admistrative_unit_country_code = " . json_encode(array_column($admisUnitArray, "admistrative_unit_country_code")) . "; </script>";
echo "<script>var admistrative_unit_type = " . json_encode(array_column($admisUnitArray, "admistrative_unit_type")) . "; </script>";
echo "<script>var admistrative_unit_code = " . json_encode(array_column($admisUnitArray, "admistrative_unit_code")) . "; </script>";
echo "<script>var admistrative_unit_name = " . json_encode(array_column($admisUnitArray, "admistrative_unit_name")) . "; </script>"; 
?>

<script src="public/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="public/bootstrap/js/bootstrap.min.js"></script>
 
<script src="public/js/AddressComponent.js"></script>
<script type="text/javascript" src="public/table/datatables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $('#table').DataTable();
  });
</script>
</body>
</html>