var selectBox = '';
var left = '';
var right = '';
var level = '';
var countryCode = '';

function changeSelectOption(selectedLevel) {

  var idInput = 'input-level-'+ (selectedLevel).toString();
  selectBox = document.getElementById(idInput);
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  countryCode = document.getElementById("input-level-0").value;

  document.getElementById('address_component_code_hidden').value = selectedValue;

  for (i = 0; i < address_component_code.length; i++) {
    if(address_component_code[i] == selectedValue){
      document.getElementById('address_component_left_hidden').value = address_component_level_left[i];
      document.getElementById('address_component_right_hidden').value = address_component_level_right[i];
      document.getElementById('address_component_level_hidden').value = address_component_level[i];
    }
  }
  left = document.getElementById('address_component_left_hidden').value;
  right = document.getElementById('address_component_right_hidden').value;
  level = parseInt(document.getElementById('address_component_level_hidden').value);

  var idInputNextLevel = '#input-level-'+ (selectedLevel+1).toString();
  var idTitle = '#title-level-'+ (selectedLevel+1).toString();

  for (i = 0; i < admistrative_unit_country_code.length; i++) {
    if(admistrative_unit_country_code[i] == countryCode && admistrative_unit_address_component_level[i] == selectedLevel+1){
      $(idTitle).html(admistrative_unit_name[i]);
    }
  }

  $(idInputNextLevel).find('option').remove().end(); 
  $(idInputNextLevel).append("<option disabled='disabled' SELECTED> -- select an option -- </option>");

  for (i = 0; i < address_component_code.length; i++) {
    if(address_component_level[i] == (level+1) && address_component_level_left[i] > left  && address_component_level_right[i] < right){
      $(idInputNextLevel).append(new Option(address_component_name[i], address_component_code[i]));
    }
  }

  var idContainer = "#level-" + (selectedLevel+1).toString() + "-container";
  $(idContainer).removeClass("d-none");
  for (i = selectedLevel+2; i <= 5; i++) {
    idContainer = "#level-" + i.toString() + "-container";
    $(idContainer).addClass("d-none");
  }

  var stringAddr = '';
  for (i = selectedLevel; i >= 0; i--) {
    for(j = 0; j < address_component_code.length; j++){
      if(address_component_level_left[j] <= left && address_component_level_right[j] >= right && address_component_level[j] == i){
        stringAddr +=  ', '+address_component_name[j];
      }
    }
  }
  document.getElementById('input-address').value = stringAddr.slice(2, stringAddr.length);
}