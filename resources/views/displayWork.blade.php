<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ckeditor</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome@6.6.0/css/all.min.css" rel="stylesheet">
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.4.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
    <style>
        .datepick { position: relative; }
        #nepali-datepicker { position: absolute; }
        input#nepali-datepicker {
            width: 20% !important;
            height: 140% !important;
            border-radius: 0.2rem !important;
            border: 0.1px solid rgb(236, 231, 231);
            padding-left: 0.5rem !important;
        }
        .modal-body label {
            font-weight: bold;
            font-size: 13px;
        }
        .modal-body input, .modal-body select {
            width: 100%;
            font-size: 13px;
            padding: 0.5rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .modal-body input[type="file"] {
            padding: 0.3rem;
        }
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            position: sticky;
            bottom: 0;
            padding: 1rem;
            background-color: #f8f9fa;
        }
        .ck-rounded-corners {
            height: 200px;
        }
        .message-box {
            display: none;
            margin-top: 1rem;
            text-align: center;
        }
        .row1 {
            display: flex;
            gap: 2rem;
        }
        input {
            margin: 10px;
        }
        .photo-container {
            position: relative;
            width: 150px;
            height: 150px;
        }
        #defaultImage {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            cursor: pointer;
            margin-left: -5px;
        }
        .fa-solid, .fas {
            position: absolute;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            line-height: 28px;
            background: white;
            border: 1px solid #ced4da;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            text-align: center;
            cursor: pointer;
            top: 10px;
            right: 10px;
            color: #007bff;
        }
        .top {
            display: flex;
            justify-content: space-between;
            gap: 26rem;
        }
        #btn3 {
            height: 30px;
            margin-left: 238px;
        }
        .small {
            font-size: 10px;
        }
        .modal-content {
            width: 900px;
            margin-left: -180px;
            margin-top: 10px;
            height: 800px;
        }
        #ndp-nepali-box {
            position: absolute;
            top: 0;
            z-index: 1000;
        }
        #Table {
            font-size: 10px;
            overflow-x: hidden;
        }
        #Table th, #Table td {
            padding: 4px 8px;
            font-size: 12px;
        }
        .dataTables_info, .dataTables_paginate, .dataTables_length, .dataTables_filter {
            font-size: 12px;
        }
        .no-footer {
            margin: 0;
            border-bottom: 1px solid #111;
            width: 100% !important;
        }
        p {
            height: 100px !important;
        }
        .ck.ck-editor__editable_inline>:last-child {
            height: 100px !important;
        }
        .ck.ck-editor {
            width: 861px;
            margin-left: 18px;
            margin-top: 18px;
        }
        .form-control {
            width: 100px;
        }
    </style>
</head>
<body>
    <!-- Button trigger modal -->
    <div class="top">
        <h5>Add a New Team Member</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="btn2" data-bs-target="#addMemberModal">
            Add Member +
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded dynamically here -->
            </div>
        </div>
    </div>

    <!-- DataTable -->
    <table id="Table" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js"></script>
    <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.4.min.js"></script>
    
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#Table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('employe.data') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                },
                columns: [
                    { data: 'name', name: 'name', orderable: false, width: '15%' },
                    { data: 'description', orderable: false, width: '15%' },
                    { data: 'date', orderable: false, width: '5%' },
                    { data: 'image', orderable: false, width: '5%' },
                    { data: 'action', orderable: false, width: '9%' }
                ]
            });

            // CKEditor Initialization
            ClassicEditor
                .create(document.querySelector('#descriptionEditor'), {
                    plugins: [Essentials, Bold, Italic, Font, Paragraph],
                    toolbar: {
                        items: [
                            'undo', 'redo', '|', 'bold', 'italic', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                        ]
                    }
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error('There was a problem initializing the editor:', error);
                });


         
            // Load Form into Modal
            $('#btn2').on('click', function(e) {
                e.preventDefault();
                var url = '{{ route("form") }}';
                $.get(url, function(response) {
                    $('#addMemberModal .modal-content').html(response);
                    $('#addMemberModal').modal('show');
                });
            });

            // DatePicker Initialization
            $("#nepali-datepicker").nepaliDatePicker({
                container: ".datepick",
            });

            // Image Preview
            $('#uploadIcon').on('click', function() {
                $('#image').trigger('click');
            });

            $('#image').change(function () {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#defaultImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            });

            // Form Submission
            $('#formAddMember').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('description', editor.getData()); // Add CKEditor data to formData

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success) {
                            $('#addMemberModal').modal('hide');
                            $('#Table').DataTable().ajax.reload();
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
