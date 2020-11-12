<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Input</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <style type="text/css">
  .input-group-prepend{
    width: 30%;
  }
  </style>
</head>
<body class="p-4">
    <div>
      <button class="btn btn-outline-primary" onclick="location.href='{{route('AddressComponent')}}'">Address Component</button>
      <button class="btn btn-outline-primary" onclick="location.href='{{route('AdmistrativeUnit')}}'">Admistrative Unit</button>
      
      <p style="text-transform: uppercase; font-size: 1.2em; font-weight: bold; padding-top: 1rem;">
       Địa chỉ
      </p>
      </hr>
      <div class="w-100 " style="display: grid; grid-template-columns: auto auto;">
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
          <select class="custom-select" id="inputGroupCountry" onchange="changeCountryName();">
            <option disabled selected value> -- select an option -- </option>
              <?php foreach($allCountryName as $itemCountryName) :?>
                <td>
                  <option value="{{$itemCountryName->address_component_code}}">{{$itemCountryName->address_component_name}}</option>
                </td>
              <?php endforeach ;?>
          </select>
        </div>
        <div id="cityBlock" class="input-group mb-3 pr-3" style="display: none;">
          <div class="input-group-prepend">
            <span class="input-group-text w-100" id="">{{$unitNameOfCity}}:</span>
          </div>
          <select class="custom-select" id="inputGroupCity" onchange="changeCityName();">
            
          </select>
        </div>
        <div id="districtBlock" class="input-group mb-3 pr-3" style="display: none;">
          <div class="input-group-prepend">
            <span class="input-group-text w-100" id="">{{$unitNameOfDistrict}}: </span>
          </div>
          <select class="custom-select" id="inputGroupDistrict" onchange="changeDistrictName();">
            
          </select>
        </div>
        <div id="wardBlock" class="input-group mb-3 pr-3" style="display: none;">
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
      </div>
    </div>

</body>
</html>

<script type="text/javascript">
  function changeCountryName() {
      document.getElementById('cityBlock').style.display = "flex";
  }
  function changeCityName() {
      document.getElementById('districtBlock').style.display = "flex";
  }
  function changeDistrictName() {
      document.getElementById('wardBlock').style.display = "flex";
  }
</script>