<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Input</title>

  <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="public/css/table.css" type="text/css" rel="stylesheet" />

</head>
<body class="p-4">
  <button class="btn btn-outline-primary" onclick="location.href='{{route('AddressComponent')}}'">Address Component</button>
  <button class="btn btn-outline-primary" onclick="location.href='{{route('AdmistrativeUnit')}}'">Admistrative Unit</button>
  <p class="title-text">Địa chỉ</p>
 </hr>
 <div class="w-100 cus-input-group">
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">Địa chỉ: </span>
    </div>
    <input type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">{{$unitNameOfCountry}}:</span>
    </div>
    <select class="custom-select" id="inputGroupCountry" onchange="changeSelectOption(0);">
      <option disabled selected value> -- select an option -- </option>
      <?php foreach($allCountryName as $itemCountryName) :?>
        <td>
          <option value="{{$itemCountryName->address_component_code}}">{{$itemCountryName->address_component_name}}</option>
        </td>
      <?php endforeach ;?>
    </select>
  </div>
  <div id="cityBlock" class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">{{$unitNameOfCity}}:</span>
    </div>
    <select class="custom-select" id="inputGroupCity" onchange="changeSelectOption(1);">

    </select>
  </div>
  <div id="districtBlock" class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">{{$unitNameOfDistrict}}: </span>
    </div>
    <select class="custom-select" id="inputGroupDistrict" onchange="changeSelectOption(2);">

    </select>
  </div>
  <div id="wardBlock" class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">{{$unitNameOfWard}}: </span>
    </div>
    <select class="custom-select" id="inputGroupWard">

    </select>
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">Nhân viên quản lý: </span>
    </div>
    <input type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">Mã số thuế: </span>
    </div>
    <input type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
  <div class="input-group mb-3 pr-3">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">Số fax: </span>
    </div>
    <input type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">Code: </span>
    </div>
    <input id="address_component_code_hidden" type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">left: </span>
    </div>
    <input id="address_component_left_hidden" type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">right: </span>
    </div>
    <input id="address_component_right_hidden" type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
  <div class="input-group mb-3 pr-3 d-none">
    <div class="input-group-prepend">
      <span class="input-group-text w-100" id="">level: </span>
    </div>
    <input id="address_component_level_hidden" type="text" class="form-control" placeholder="" aria-label="Username">
  </div>
</div>
</div>

<?php
  echo "<script>var allCode = " . json_encode($allCode) . "; </script>";
  echo "<script>var allLeft = " . json_encode($allLeft) . "; </script>";
  echo "<script>var allRight = " . json_encode($allRight) . "; </script>";
  echo "<script>var allLevel = " . json_encode($allLevel) . "; </script>";
  echo "<script>var allName = " . json_encode($allName) . "; </script>";
?>

<script src="public/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="public/bootstrap/js/bootstrap.min.js"></script>
<script src="public/js/UserInput.js"></script>
</body>
</html>