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