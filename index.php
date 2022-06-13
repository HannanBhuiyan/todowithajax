<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
   

    
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-10 m-auto">
          <div class="text-center mb-4">
              <h2 class="text-info">Add Name</h2>
          </div>
        <form name="add_name" id="add_name">
          <table class="table text-center table-bordered" id="dynamic_field">
            <tr> 
              <td> 
                <input type="text" name="name[]" id="name" class="form-control"> 
            </td>
              <td>
               <button type="button" id="add" name="add" class="btn btn-info">Add</button>
              </td> 
            </tr>
          </table>
          <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit">
          </form>
        </div>
      </div>
    </div>

    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script>

    $(document).ready(function(){
      var i = 1;


      $("#add").click(function(e){
          i++;
          $("#dynamic_field").append('<tr id="row'+i+'" ><td><input type="text" name="name[]" id="name" class="form-control">   </td>  <td> <button id="'+i+'" name="remove" class="btn btn-danger remove_btn">x</button>  </td></tr>')
      });


      $(document).on('click', '.remove_btn', function(){
        var button_id = $(this).attr('id');
        $('#row'+button_id+'').remove();
      });
 

      $("#submit").click(function(e){
       
          $.ajax({
          url: "insert.php",
          type: "POST",
          data: $("#add_name").serialize(),
          success: function (data) {
            console.log(data);
            $("#add_name")[0].reset();
          },
          error: function(jqXHR, textStatus, errorThrown) {
              console.log(textStatus, errorThrown);
          }
        });
 
    })
});

  
 
    </script>


  </body>
</html>