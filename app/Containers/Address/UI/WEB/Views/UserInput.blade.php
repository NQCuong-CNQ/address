<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Input</title>
  <!-- bootstrap -->
  <link href="public/bootstrap/css/bootstrap.css" rel="stylesheet" />

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
<script src="public/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
<script src="public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<script type="text/javascript">
  var allCode = <?php echo $allCode ?>;
  var allLeft = <?php echo $allLeft ?>; 
  var allRight = <?php echo $allRight ?>; 
  var allLevel = <?php echo $allLevel ?>; 
  var allName = <?php echo $allName ?>; 

  function changeSelectOption($level) {

    var selectBox = "";
    switch($level) {
      case 0:
      var selectBox = document.getElementById("inputGroupCountry");
      break;
      case 1:
      var selectBox = document.getElementById("inputGroupCity");
      break;
      case 2:
      var selectBox = document.getElementById("inputGroupDistrict");
      break;
    }

    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    document.getElementById('address_component_code_hidden').value = selectedValue;
    document.getElementById('address_component_right_hidden').value = allRight;

    for (i = 0; i < allCode.length; i++) {
      if(allCode[i] == selectedValue){
        document.getElementById('address_component_left_hidden').value = allLeft[i];
        document.getElementById('address_component_right_hidden').value = allRight[i];
        document.getElementById('address_component_level_hidden').value = allLevel[i];
      }
    }

    var left = document.getElementById('address_component_left_hidden').value;
    var right = document.getElementById('address_component_right_hidden').value;
    var level = parseInt(document.getElementById('address_component_level_hidden').value);

    switch($level) {
      case 0:
        $('#inputGroupCity')
        .find('option')
        .remove()
        .end(); 
        $("#inputGroupCity").append("<option disabled='disabled' SELECTED> -- select an option -- </option>");
        for (i = 0; i < allCode.length; i++) {
          if(allLevel[i] == (level+1) && allLeft[i] > left  && allRight[i] < right){
            $("#inputGroupCity").append(new Option(allName[i], allCode[i]));
          }
        }
        document.getElementById('cityBlock').classList.remove("d-none");
        break;
      case 1:
        $('#inputGroupDistrict')
        .find('option')
        .remove()
        .end(); 
        $("#inputGroupDistrict").append("<option disabled='disabled' SELECTED> -- select an option -- </option>");

        for (i = 0; i < allCode.length; i++) {
          if(allLevel[i] == (level+1) && allLeft[i] > left  && allRight[i] < right){
            $("#inputGroupDistrict").append(new Option(allName[i], allCode[i]));
          }
        }
        document.getElementById('districtBlock').classList.remove("d-none");
        break;
      case 2:
        $('#inputGroupWard')
        .find('option')
        .remove()
        .end(); 
        $("#inputGroupWard").append("<option disabled='disabled' SELECTED> -- select an option -- </option>");
        for (i = 0; i < allCode.length; i++) {
          if(allLevel[i] == (level+1) && allLeft[i] > left  && allRight[i] < right){
            $("#inputGroupWard").append(new Option(allName[i], allCode[i]));
          }
        }
        document.getElementById('wardBlock').classList.remove("d-none");
        break;
    }
  }
</script>