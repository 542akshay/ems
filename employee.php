<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Employee</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
  <body>
    <br>
    <h1 class="text-center">Employee Details</h1>
    <div class="container my-5 p-3 text-center bg-dark text-light">
        <h3>Education Details</h3>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>                    
                    <th scope="col">Course</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">University</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="dynamicadd">
                <tr>
                    <td><input type="text" name="course[]" id="course" class="form-control"></td>
                    <td><input type="date" id="from" class="form-control">
                        
                    </td>
                    <td><input type="date" id="to" class="form-control">
                       
                    </td>
                    <td><input type="text" name="university[]" id="university" class="form-control"></td>
                    <td><button type="button" id="add" class="btn btn-outline-success">+</button></td>
                </tr>
            
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $("#add").click(function(){
                i++;
                $("#dynamicadd").append('<tr id="row'+i+'"><td><input type="text" name="course[]" id="course" class="form-control"></td><td><input type="date" id="from" class="form-control"></td><td><input type="date" id="to" class="form-control"></td><td><input type="text" name="university[]" id="university" class="form-control"></td><td><button type="button" id="'+i+'" class="btn btn-danger remove_row">-</button></td></tr>');
            });
            $(document).on('click','.remove_row', function(){
                var row_id = $(this).attr("id");
                $('#row'+row_id+'').remove();
            });
        });
    </script>
<hr>
<br>

    <div class="container my-5 p-3 text-center bg-dark text-light">
        <h3>Experience Details</h3>
    </div>

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>                    
                    <th scope="col">Company</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="dynamicadd2">
                <tr>
                    <td><input type="text" name="company[]" id="company" class="form-control"></td>
                    <td><input type="date" id="from2" class="form-control">
                        
                    </td>
                    <td><input type="date" id="to2" class="form-control">
                       
                    </td>
                    <td><input type="text" name="designation[]" id="designation" class="form-control"></td>
                    <td><button type="button" id="add2" class="btn btn-outline-primary">+</button></td>
                </tr>
            
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            var i=1;
            $("#add2").click(function(){
                i++;
                $("#dynamicadd2").append('<tr id="row1'+i+'"><td><input type="text" name="company[]" id="company" class="form-control"></td><td><input type="date" id="from2" class="form-control"></td><td><input type="date" id="to2" class="form-control"></td><td><input type="text" name="designation[]" id="designation" class="form-control"></td><td><button type="button" id="'+i+'" class="btn btn-warning remove_row1">-</button></td></tr>');
            });
            $(document).on('click','.remove_row1', function(){
                var row_id2 = $(this).attr("id");
                $('#row1'+row_id2+'').remove();
            });
        });
    </script>


    </body>
</html>