<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Input</title>

  <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="public/css/custom-input.css" type="text/css" rel="stylesheet" />

</head>
<body class="p-4">
  <button class="btn btn-outline-primary" onclick="location.href='{{route('AddressComponent')}}'">Address Component</button>
  <button class="btn btn-outline-primary" onclick="location.href='{{route('AdmistrativeUnit')}}'">Admistrative Unit</button>
  <p class="title-text">Địa chỉ</p>
 </hr>
 <div class="w-100 cus-input-group">
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">Địa chỉ: </span>
    </div>
    <input type="text" class="form-control">
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">Quốc gia: </span>
    </div>
    <select class="custom-select" id="input-level-0" onchange="changeSelectOption(0);">
      <option disabled selected value> -- select an option -- </option>
      <?php foreach($addressComponent as $itemAddr) :?>
        @if($itemAddr->address_component_unit_level == 0)
        <td>
          <option value="{{$itemAddr->address_component_country_code}}">{{$itemAddr->address_component_name}}</option>
        </td>
        @endif
      <?php endforeach ;?>
    </select>
  </div>
  <div id="level-1-container" class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span id="title-level-1" class="input-group-text w-100"></span>
    </div>
    <select class="custom-select" id="input-level-1" onchange="changeSelectOption(1);">

    </select>
  </div>
  <div id="level-2-container" class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span id="title-level-2" class="input-group-text w-100"></span>
    </div>
    <select class="custom-select" id="input-level-2" onchange="changeSelectOption(2);">

    </select>
  </div>
  <div id="level-3-container" class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span id="title-level-3" class="input-group-text w-100"></span>
    </div>
    <select class="custom-select" id="input-level-3">

    </select>
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">Nhân viên quản lý: </span>
    </div>
    <input type="text" class="form-control">
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">Mã số thuế: </span>
    </div>
    <input type="text" class="form-control">
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">Số fax: </span>
    </div>
    <input type="text" class="form-control">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">Code: </span>
    </div>
    <input id="address_component_code_hidden" type="text" class="form-control">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">left: </span>
    </div>
    <input id="address_component_left_hidden" type="text" class="form-control">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">right: </span>
    </div>
    <input id="address_component_right_hidden" type="text" class="form-control">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100">level: </span>
    </div>
    <input id="address_component_level_hidden" type="text" class="form-control">
  </div>
</div>
</div>

<?php
  echo "<script>var address_component_code = " . json_encode(array_column($addrComponentArray, "address_component_code")) . "; </script>";
  echo "<script>var address_component_level_left = " . json_encode(array_column($addrComponentArray, "address_component_level_left")) . "; </script>";
  echo "<script>var address_component_level_right = " . json_encode(array_column($addrComponentArray, "address_component_level_right")) . "; </script>";
  echo "<script>var address_component_level = " . json_encode(array_column($addrComponentArray, "address_component_level")) . "; </script>";
  echo "<script>var address_component_name = " . json_encode(array_column($addrComponentArray, "address_component_name")) . "; </script>";

  echo "<script>var admistrative_unit_name = " . json_encode(array_column($admisUnitArray, "admistrative_unit_name")) . "; </script>";
  echo "<script>var admistrative_unit_country_code = " . json_encode(array_column($admisUnitArray, "admistrative_unit_country_code")) . "; </script>";
  echo "<script>var admistrative_unit_address_component_level = " . json_encode(array_column($admisUnitArray, "admistrative_unit_address_component_level")) . "; </script>";
?>

<script src="public/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="public/bootstrap/js/bootstrap.min.js"></script>
<script src="public/js/UserInput.js"></script>
</body>
</html>