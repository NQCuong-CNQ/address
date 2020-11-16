function changeSelectOption($selectedLevel) {
  
  var selectBox = "";
  switch($selectedLevel) {
    case 0:
    var selectBox = document.getElementById("input-level-0");
    break;
    case 1:
    var selectBox = document.getElementById("input-level-1");
    break;
    case 2:
    var selectBox = document.getElementById("input-level-2");
    break;
  }

  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  var countryCode = document.getElementById("input-level-0").value;

  document.getElementById('address_component_code_hidden').value = selectedValue;
  document.getElementById('address_component_right_hidden').value = address_component_level_right;

  for (i = 0; i < address_component_code.length; i++) {
    if(address_component_code[i] == selectedValue){
      document.getElementById('address_component_left_hidden').value = address_component_level_left[i];
      document.getElementById('address_component_right_hidden').value = address_component_level_right[i];
      document.getElementById('address_component_level_hidden').value = address_component_level[i];
    }
  }

  var left = document.getElementById('address_component_left_hidden').value;
  var right = document.getElementById('address_component_right_hidden').value;
  var level = parseInt(document.getElementById('address_component_level_hidden').value);

  switch($selectedLevel) {
    case 0:

    for (i = 0; i < admistrative_unit_country_code.length; i++) {
      if(admistrative_unit_country_code[i] == countryCode && admistrative_unit_address_component_level[i] == $selectedLevel+1){
        document.getElementById('title-level-1').innerHTML = admistrative_unit_name[i];
      }
    }

    $('#input-level-1')
    .find('option')
    .remove()
    .end(); 

    $("#input-level-1").append("<option disabled='disabled' SELECTED> -- select an option -- </option>");
    for (i = 0; i < address_component_code.length; i++) {
      if(address_component_level[i] == (level+1) && address_component_level_left[i] > left  && address_component_level_right[i] < right){
        $("#input-level-1").append(new Option(address_component_name[i], address_component_code[i]));
      }
    }
    document.getElementById('level-1-container').classList.remove("d-none");
    document.getElementById('level-2-container').classList.add('d-none');
    document.getElementById('level-3-container').classList.add('d-none');
    break;
    case 1:

    for (i = 0; i < admistrative_unit_country_code.length; i++) {
      if(admistrative_unit_country_code[i] == countryCode && admistrative_unit_address_component_level[i] == $selectedLevel+1){
        document.getElementById('title-level-2').innerHTML = admistrative_unit_name[i];
      }
    }

    $('#input-level-2')
    .find('option')
    .remove()
    .end(); 
    $("#input-level-2").append("<option disabled='disabled' SELECTED> -- select an option -- </option>");

    for (i = 0; i < address_component_code.length; i++) {
      if(address_component_level[i] == (level+1) && address_component_level_left[i] > left  && address_component_level_right[i] < right){
        $("#input-level-2").append(new Option(address_component_name[i], address_component_code[i]));
      }
    }
    document.getElementById('level-2-container').classList.remove("d-none");
    break;
    case 2:

    for (i = 0; i < admistrative_unit_country_code.length; i++) {
      if(admistrative_unit_country_code[i] == countryCode && admistrative_unit_address_component_level[i] == $selectedLevel+1){
        document.getElementById('title-level-3').innerHTML = admistrative_unit_name[i];
      }
    }

    $('#input-level-3')
    .find('option')
    .remove()
    .end(); 
    $("#input-level-3").append("<option disabled='disabled' SELECTED> -- select an option -- </option>");
    for (i = 0; i < address_component_code.length; i++) {
      if(address_component_level[i] == (level+1) && address_component_level_left[i] > left  && address_component_level_right[i] < right){
        $("#input-level-3").append(new Option(address_component_name[i], address_component_code[i]));
      }
    }
    document.getElementById('level-3-container').classList.remove("d-none");
    break;
  }
}