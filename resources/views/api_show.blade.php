<a href="show-json-patient">Create</a>
<div id="patientData"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
       
        $.ajax({
            url: '/api/view-data',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.length > 0) {
                    var patientData = '<table border="1"><tr><th>Patient Id</th><th>Patient Name</th><th>Patient Email</th><th>Patient Phone</th></tr>';
                    
                    $.each(data, function (index, patient) {
                        patientData += '<tr>';
                        patientData += '<td>' + patient.id + '</td>';
                        patientData += '<td>' + patient.name + '</td>';
                        patientData += '<td>' + patient.email + '</td>';
                        patientData += '<td><a href="/edit-data/' + patient.id + '" class="btn btn-primary">Edit</a></td>';
                        patientData += '<td><a href="/delete-data/' + patient.id + '" class="btn btn-danger">Delete</a></td>';
                        patientData += '</tr>';
                    });

                    patientData += '</table>';
                    $('#patientData').html(patientData);
                } else {
                    $('#errorMessage').text('No students found.');
                }
            },
            error: function (error) {
                console.error(error);

                $('#errorMessage').text('An error occurred while fetching data. Please try again later.');
            }
        });

    });
</script>


