$(document).ready(function() {

    $(document).on('change', '#height', function() {
        Height = parseFloat($(this).val());
        Weight = parseFloat($('#weight').val());


        if (Height === "" || isNaN(Height)) {
            $('#height').css("background-color", "#f68993");
            $('#height').val(1)
            Height = 1;
        } else if (Weight === "" || isNaN(Weight)) {
            $('#weight').css("background-color", "#f68993");
            $('#weight').val(1)
            Weight = 1;
        } else {
            $('#weight').css("background-color", "");
            $('#height').css("background-color", "");
            call_to_compute(Height, Weight);
        }

    });

    $(document).on('change', '#weight', function() {
        Weight = parseFloat($(this).val());
        Height = parseFloat($('#height').val());

        if (Weight === "" || isNaN(Weight)) {
            $('#weight').css("background-color", "#f68993");
            $('#weight').val(1)
            Weight = 1;
        } else if (Height === "" || isNaN(Height)) {
            $('#height').css("background-color", "#f68993");
            $('#height').val(1)
            Height = 1;
        } else {
            $('#weight').css("background-color", "");
            $('#height').css("background-color", "");
            call_to_compute(Height, Weight);
        }

    });

    function call_to_compute(height, weight) {
        let bmi = (weight / ((height * height) / 10000)).toFixed(2);
        $('#bmi').val(bmi);

    }

    $(document).on('change', '#phone', function() {
        var phone = $('#phone').val();
        $('#password').val(phone)
    });



    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function() {
        readURL(this);
    });



    // LOAD STATE AND LGA DROPLIST
    $("#state").change(function() {

        var $dropdown = $(this);

        $.getJSON("lga.json", function(data) {

            var key = $dropdown.val();
            var vals = [];

            switch (key) {
                case 'Abuja':
                    vals = data.Abuja.split(",");
                    break;
                case 'Abia':
                    vals = data.Abia.split(",");
                    break;
                case 'Adamawa':
                    vals = data.Adamawa.split(",");
                    break;
                case 'AkwaIbom':
                    vals = data.AkwaIbom.split(",");
                    break;
                case 'Anambra':
                    vals = data.Anambra.split(",");
                    break;
                case 'Bauchi':
                    vals = data.Bauchi.split(",");
                    break;
                case 'Bayelsa':
                    vals = data.Bayelsa.split(",");
                    break;
                case 'Benue':
                    vals = data.Benue.split(",");
                    break;
                case 'Borno':
                    vals = data.Borno.split(",");
                    break;
                case 'Cross-River':
                    vals = data.Cross - River.split(",");
                    break;
                case 'Delta':
                    vals = data.Delta.split(",");
                    break;
                case 'Ebonyi':
                    vals = data.Ebonyi.split(",");
                    break;
                case 'Edo':
                    vals = data.Edo.split(",");
                    break;
                case 'Ekiti':
                    vals = data.Ekiti.split(",");
                    break;
                case 'Enugu':
                    vals = data.Enugu.split(",");
                    break;
                case 'Gombe':
                    vals = data.Gombe.split(",");
                    break;
                case 'Imo':
                    vals = data.Imo.split(",");
                    break;
                case 'Jigawa':
                    vals = data.Jigawa.split(",");
                    break;
                case 'Kaduna':
                    vals = data.Kaduna.split(",");
                    break;
                case 'Kano':
                    vals = data.Kano.split(",");
                    break;
                case 'base':
                    vals = ['Please choose from above'];
            }

            var $secondChoice = $("#lga");
            $secondChoice.empty();
            $.each(vals, function(index, value) {
                $secondChoice.append("<option>" + value + "</option>");
            });

        });
    });



    // File type validation
    $("#profile-img").change(function() {
        var file = this.files[0];
        var fileType = file.type;
        var match = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))) {
            alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
            $("#file").val('');
            return false;
        }
    });



    // FILL PATIENT TABLE LIST
    fill_patient_table();


    function fill_patient_table(param = '') {
        var dataTable = $('#PatientListTable').DataTable({
            "processing": true,
            "serverSide": true,
            "paging": false,
            "searching": true,
            "order": [],
            "ajax": {
                url: "patientlist.php",
                type: "POST",
                data: { action: 'fill_table', param: param },
            },

            "columnDefs": [{
                "orderable": false,
            }, ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        // console.log('called');

    }


    $('#age').change(function() {
        var age = $('#age').val();
        $('#gender').val("");
        $('#bmi').val('');
        $('#PatientListTable').DataTable().destroy();
        fill_patient_table(age);
    });

    $('#gender').change(function() {
        var gender = $('#gender').val();
        $('#age').val('');
        $('#bmi').val('');
        $('#PatientListTable').DataTable().destroy();
        fill_patient_table(gender);
        console.log(gender);
    });

    $('#bmi').change(function() {
        var bmi = $('#bmi').val();
        $('#age').val("");
        $('#gender').val("");
        $('#PatientListTable').DataTable().destroy();
        fill_patient_table(bmi);
    });


    // THIS CODE BRINGS PATIENT DEATILS MODAL AND POPULATE WITH INFO
    $(document).on('click', '.patientDetails', function() {
        var patient_id = $(this).attr('id');

        // alert(user_id);

        $.ajax({
            url: "patientlist.php",
            method: "POST",
            data: { action: 'fetch_detail', patient_id: patient_id },
            beforeSend: function() {
                $('#' + patient_id).addClass("btn-progress");
                // exit;

                // $('#setup').attr("disabled", true);

            },
            success: function(data) {
                $('#' + patient_id).removeClass("btn-progress");

                $('#patient_details').html(data);
                $('#patientDetalsModal').modal('show');
            }
        });
    });


    // FILL PATIENT ENCOUNTER TABLE LIST
    fill_patient_encounter_tb();

    function fill_patient_encounter_tb() {
        var dataTable = $('#PatientEncounterTable').DataTable({
            "processing": true,
            "serverSide": true,
            // "paging":   false,
            "searching": true,
            "order": [],
            "ajax": {
                url: "patientlist.php",
                type: "POST",
                data: { action: 'fill_encounter_table' },
            },

            "columnDefs": [{
                "orderable": false,
            }, ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        // console.log('called');

    }

    // THIS  BRINGS PATIENT ENCOUNTER FORM MODAL 
    $(document).on('click', '.createEncounter', function() {
        console.log('gdgdgdgdgdgdg');
        var patient_id = $(this).attr('id');
        var $row = $(this).closest('tr');
        var patient_weight = $row.find('.p_weight').val();
        var patient_height = $row.find('.p_height').val();
        var patient_bmi = $row.find('.p_bmi').val();
        var hworker = $('#hworker_id').html();
        $('#patientform .weight').val(patient_weight);
        $('#patientform .height').val(patient_height);
        $('#patientform .bmi').val(patient_bmi);
        $('#patientform .patient_id').val(patient_id);
        $('#patientform .staff_id').val(hworker);
        $('#patientEncounterModal').modal('show');

    });


    // THIS  SUBMIT PATIENT ENCOUNTER FORM 
    $(document).on('click', '#patientSubmitEncounter', function() {
        var idate = $('#date').val();
        var itime = $('#time').val();
        var visit = $('#visit').val();
        var weight = parseFloat($('#weight').val()).toFixed(2);
        var height = parseFloat($('#height').val()).toFixed(2);
        var bmi = parseFloat($('#bmi').val()).toFixed(2);
        var bp = parseFloat($('#bp').val()).toFixed(2);
        var temp = parseFloat($('#temp').val()).toFixed(2);
        var rr = parseFloat($('#rr').val()).toFixed(2);
        var complaint = $('#complaint').val();
        var diagnosis = $('#diagnosis').val();
        var treatment = $('#treatment').val();
        var patient_id = $('#patient_id').val();
        var staff_id = $('#staff_id').val();
        // console.log(patient_id);
        if (idate === "" || itime === "" || visit === "" || weight === "" || height === "" || bmi === "" || bp === "" || temp === "" ||
            rr === "" || complaint === "" || diagnosis === "" || treatment === "" || patient_id === "" || staff_id === "") {
            alert("No field must be empty!")
            return false;
        }


        $.ajax({
            url: "patientlist.php",
            method: "POST",
            data: {
                action: 'create_encounter',
                idate: idate,
                itime: itime,
                visit: visit,
                weight: weight,
                height: height,
                bmi: bmi,
                bp: bp,
                temp: temp,
                rr: rr,
                complaint: complaint,
                diagnosis: diagnosis,
                treatment: treatment,
                patient_id: patient_id,
                staff_id: staff_id
            },
            beforeSend: function() {
                $('#patientSubmitEncounter').addClass("btn-progress");
                $('#patientSubmitEncounter').html("Saving...");

            },
            success: function(data) {
                $('#patientSubmitEncounter').removeClass("btn-progress");
                $('#patientSubmitEncounter').addClass("btn-success");
                $('#patientSubmitEncounter').html("Saved");
                setTimeout(function() {
                    $('#patientEncounterModal').modal('hide');
                }, 1000);

                $('#PatientEncounterTable').DataTable().destroy();
                // fill_patient_encounter_tb();
            }
        });

    });


    // OPEN ENCOUNTER TRASFER CONFIRMATION AND FETCH ENCOUNTER ID

    $(document).on('click', '.transferEncounter', function() {
        var patient_id = $(this).attr('id');

        $.ajax({
            url: "encounterTransfer.php",
            method: "POST",
            data: { action: 'fetch_enc_id', patient_id: patient_id },

            success: function(data) {
                $('#encfileid').val(data);
                $('#encounterTransferModal').modal('show');
            }
        });

    });


    // OPEN ENCOUNTER TRASFER CONFIRMATION AND FETCH ENCOUNTER ID AND FINALLY SEND

    $(document).on('click', '#encTransferNow', function() {
        // var patient_id = $(this).attr('id');
        var encfile_id = $('#encfileid').val();
        var transfer_from_id = $('#transfer_from').val();
        var transfer_to_id = $('#hworker').val();

        if (encfile_id === '' || transfer_from_id === '' || transfer_to_id === '') {

            alert("No field should be empty!");
            return false;
        }



        $.ajax({
            url: "encounterTransfer.php",
            method: "POST",
            data: { action: 'enc_transfer', encfile_id: encfile_id, transfer_from_id: transfer_from_id, transfer_to_id: transfer_to_id },

            beforeSend: function() {
                $('#encTransferNow').addClass("btn-progress");
                $('#encTransferNow').html("Transfering...");
            },
            success: function(data) {
                $('#encTransferNow').removeClass("btn-progress");
                $('#encTransferNow').addClass("btn-success");
                $('#encTransferNow').html("Saved");
                setTimeout(function() {
                    $('#encounterTransferModal').modal('hide');
                }, 1000);

                $('#PatientEncounterTable').DataTable().destroy();
                // fill_patient_encounter_tb();
            }
        });

    });


    // LAUNCH CHAT PLATFORM FOR HEALTH WORKER

    $(document).on('click', '#openChat', function() {
        var $row = $(this).closest('tr');
        var patient_id = $row.find('.createEncounter').attr('id');
        console.log(patient_id);

        setTimeout(function() {
            window.location.href = 'chat.php?user=' + patient_id;
        }, 500);


    });


    //  FILL HEALTH WORKERS LIST TABLE ON THE PATIENT PAGE

    var patient_id = $('#patient_id').html();
    fill_hworker_list_tb();

    function fill_hworker_list_tb() {
        var dataTable = $('#healthWorkersListTable').DataTable({
            "processing": true,
            "serverSide": true,
            // "paging":   false,
            "searching": true,
            "order": [],
            "ajax": {
                url: "healthworkers.php",
                type: "POST",
                data: {
                    action: 'fill_hwokerslist_table',
                    patient_id: patient_id
                },
            },

            "columnDefs": [{
                "orderable": false,
            }, ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        // console.log('called');

    }


    // LAUNCH CHAT PLATFORM FOR PATIENT

    $(document).on('click', '.openChat', function() {
        var hw_id = $(this).attr('id');
        // var $row = $(this).closest('tr');
        // var hw_id = $row.find('.createEncounter').attr('id');
        // alert(patient_id);

        setTimeout(function() {
            window.location.href = 'chat.php?user=' + hw_id;
        }, 500);


    });








});