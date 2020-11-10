<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Address Component</title>
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
    <button class="btn btn-outline-primary" onclick="location.href='{{route('AdmistrativeUnit')}}'">Admistrative Unit</button>
    <button class="btn btn-outline-primary" onclick="location.href='{{route('UserInput')}}'">User Input</button>

    <p style="text-transform: uppercase; font-size: 1.2em; font-weight: bold; padding-top: 1rem;">
      Danh sách cấu thành địa chỉ
    </p>
  </hr>
  <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Thêm mới cấu thành địa chỉ</button>
  </div>
</hr>
<div class="d-flex">Tổng: <p class="pl-2" id="countTable"></p> </div>
</hr>
<table id="table" class="table table-bordered ">
  <thead class="thead-light">
    <tr>
      <th scope="col">Stt</th>
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
        <th scope="row">{{$item->admistrative_unit_order}}</th>
        <td>{{$item->address_component_code}}</td>
        <td>{{$item->address_component_name}}</td>
        <td>{{$item->address_component_post_code}}</td>
        <td>{{$item->address_component_phone_code}}</td>
        <td>{{$item->address_component_zip_code}}</td>
        <td>{{$item->address_component_unit_code}}</td>
        <td>{{$item->address_component_status}}</td>
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


<!-- Modal -->
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
              <span class="input-group-text w-100" id="">Quốc gia: </span>
            </div>
            <select name="" class="custom-select" id="CountryNameSelectedBox" onchange="changeCountryName();">
              <option disabled selected value> -- select an option -- </option>
              <?php foreach($allCountryName as $itemCountryName) :?>
                <td>
                  <option value="{{$itemCountryName->address_component_code}}">{{$itemCountryName->address_component_name}}</option>
                </td>
              <?php endforeach ;?>
            </select>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend" >
              <span class="input-group-text w-100" id="">Đơn vị hành chính: </span>
            </div>
            <select id="unit_code-select-box" name="address_component_unit_code" class="custom-select" id=""></select>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                <span class="input-group-text w-100" id="">Mã: </span>
              </div>
              <input name="address_component_code" type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                <span class="input-group-text w-100" id="">Tên: </span>
              </div>
              <input name="address_component_name" type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                <span class="input-group-text w-100" id="">Mã bưu chính: </span>
              </div>
              <input name="address_component_post_code" type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                <span class="input-group-text w-100" id="">Mã vùng điện thoại: </span>
              </div>
              <input name="address_component_phone_code" type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                <span class="input-group-text w-100" id="">Zip code: </span>
              </div>
              <input name="address_component_zip_code" type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                <span class="input-group-text w-100" id="">Thứ tự sắp xếp: </span>
              </div>
              <input name="address_component_order" type="text" class="form-control" placeholder="">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend" >
                <span class="input-group-text w-100" id="">Trạng thái: </span>
              </div>
              <select name="address_component_status" class="custom-select" id="">
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

  function changeCountryName() {
    var selectBox = document.getElementById("CountryNameSelectedBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;

    var admisUnitCountryCode = <?php echo $admisUnitCountryCode ?>;
    var admisUnitCode = <?php echo $admisUnitCode ?>;
    
    $('#unit_code-select-box')
    .find('option')
    .remove()
    .end();

    for (i = 0; i < admisUnitCountryCode.length; i++) {
      if(admisUnitCountryCode[i] == selectedValue){
        $("#unit_code-select-box").append(new Option(admisUnitCode[i]));
      }
    }
  }

</script>