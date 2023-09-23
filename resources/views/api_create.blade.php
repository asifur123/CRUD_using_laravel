<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE PATIENT</title>
</head>
<style>
    h1{
        font-size: 30px;
        text-align: center;
        margin-bottom:50px;
    }
    form{
        text-align: center;
    }
    .error{
        color:red;
    }
</style>

<body>
<div class="container">
<div id="successMessage" class="success"></div>
<div id="errorMessage" class="error"></div>

        <div class="content">
            <div class="content-3">
                <h1>CREATE A NEW PATIENT</h1>
                     
                <form action="" method="POST">
                  {{@csrf_field()}}
                  <label>PATIENT NAME</label><br>
                  <input type="text" name="name" id="name"><br>

                  <label>PATIENT EMAIL</label><br>
                  <input type="text" name="email" id="email"><br>

                  <label>PATIENT PHONE</label><br>
                  <input type="text" name="phone" id="phone"><br>

                  <label>PATIENT ADDRESS</label><br>
                  <input type="text" name="address" id="address"><br>

                 
                  <button>ADD</button>
                </form>  
            </div>
        </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function deleteStudent(patientId) {
        }

        $.ajax({
            url: '/api/view-data',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
            },
            error: function (error) {
            }
        });

        $('form').submit(function (e) {
            e.preventDefault();
            
            var formData = {
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                address: $('#address').val()
            };

            $.ajax({
                url: '/api/store-data',
                type: 'POST',
                dataType: 'json',
                data: formData,
                success: function (data) {
                    console.log('Patient stored successfully.');
                    $('#successMessage').text('Patient stored successfully.');
                    window.location.href = '/show-json-patient';
                },
                error: function (error) {
                    console.error(error);
                    $('#errorMessage').text('An error occurred while storing the Patient. Please try again later.');
                }
            });
        });
    });
</script>