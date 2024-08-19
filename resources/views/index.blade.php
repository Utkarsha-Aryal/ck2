

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ckeditor</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.4.min.css" rel="stylesheet" type="text/css"/>

    <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.4.min.js"></script>

    
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    justify-content: flex-end; /* Align buttons to the right */
    gap: 10px; /* Adjust space between the buttons */
    position: sticky;
    bottom: 0;
    padding: 1rem; /* Ensure enough padding around the buttons */
    background-color: #f8f9fa; /* Optional: background color for the footer */
}
  
.ck-rounded-corners{
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
  
  .modal-body label {
      font-weight: bold;
      font-size: 13px;
  }
  .modal-body input, .modal-body select {
      width: 42%;
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
  #ndp-nepali-box {
    position: absolute;
    top: 0;
    z-index: 1000; /* Ensure the calendar appears above other elements */
}

  .message-box {
      display: none;
      margin-top: 1rem;
      text-align: center;
  }
  body{
    padding: 2rem 7rem;
  }
  /* .row1 {
      display: flex;
      gap: 2rem;
      margin-left: 30px;
      justify-content: center;
  } */
  input {
      margin: 10px;
  }
  .modal-content {
      width: 900px;
      margin-left: -180px;

      margin-top: 10px;
      height: 800px;
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
  }
  .fe-camera {
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
  th {
      font-size: 16px;
  }
  td {
      font-size: 12px;
  }

  #Table {
      font-size: 10px; 
  }
  #Table th {
      font-size: 12px; 
  }
  #Table td {
      font-size: 10px; 
  }
  #Table_wrapper {
  font-size: 12px; 
  border: 1px solid black;
  /* width: 1100px !important; */
}
#Table{
    overflow-x: hidden;
}

#Table th, #Table td {
  padding: 4px 8px; 
  font-size: 12px;  
}

.dataTables_info, .dataTables_paginate, .dataTables_length, .dataTables_filter {
  font-size: 12px;   
}

 
/* Style for calender */
.datepick{
    position: relative !important;
    z-index: 999;
}
#ndp-nepali-box {
    top: 60px !important;
    left: 10px !important;
}


#Table th, #Table td {
  padding: 4px 8px; 
  font-size: 12px; 
}

.dataTables_info, .dataTables_paginate, .dataTables_length, .dataTables_filter {
  font-size: 12px; 
}
#Ad{
    margin-left: 14px;
    font-size: 13px;
    font-weight: bold;
}
#formAddMember{
  margin-left: -10px;
  display: flex;
  flex-direction: column;
}
p{
    height: 100px !important;
}

.ck.ck-editor__editable_inline>:last-child{
    height: 100px !important; 
}
.ck.ck-editor{
    width: 861px;
    margin-left: 18px;
    margin-top: 18px;
}
.form-control{
    width:100px
}


.modal-body input[type="text"], .modal-body input[type="date"] {
    width: 42%;
    font-size: 13px;
    padding: 0.5rem;
    margin-top: 0.5rem;
    margin-bottom: 1rem;
    border-radius: 5px;
    border: 1px solid #ced4da;
}
.no-footer {
    margin: 0;
    border-bottom: 1px solid #111;
    width: 100% !important;
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
  <div class="message-box"></div>
<div class="confirm-box"></div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addMemberModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formAddMember" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-6">
                    <div class="name">
                        <label for="name">Name</label>
                        <input  class="form-control" type="text" name="name" id="name" placeholder="Enter name" required>
                    </div>
                </div>
                
                <div class="form-group datepick" class="col-6">
                    <label for="createDate">Date</label>
                    <input class="form-control"  type="date" id="nepali-datepicker" placeholder="Select Event Date" readonly name="date">
                </div>
            </div>
                <!-- <div class="col-6">
                    <div class="name">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" placeholder="Enter date" required/>
                    </div>
                </div> -->
                </div>
                    <div class="name" id="Ad">
                        <label for="image" style="margin-left: -7px;">Photo</label>
                        <div class="photo-container">
                            <img id="defaultImage" src="{{ asset('images/images.jpeg') }}" alt="Default Image">
                            <a class="fa-solid fa-camera profile-edit text-primary"  href="JavaScript:void(0);" id="uploadIcon"></a>
                        </div>
                    </div>
    
                    <input type="file" name="image" id="image" style="display:none;" accept="image/*" >

                

                <div class="name">
                    <label for="description" style="
                    font-size: 13px;
                    margin-left: 8px;
                    font-weight: bold;
                ">Description</label>
                    <div id="descriptionEditor" class="raja" >
                        <!-- its now hereee -->

                    </div> <!-- CKEditor will replace this div -->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn34">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <table id="Table" class="display">
    <thead>
        <tr>
            
            <th>Name</th>
            <th>Description
                
            </th>
            <th>Date</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
</table>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  
  <script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
  </script>

  <script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph
    } from 'ckeditor5';

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



  </script>

  <script>
    $(document).ready(function () {
//datepicker -start
        var mainInput = document.getElementById("nepali-datepicker");
                mainInput.nepaliDatePicker();
                $("#nepali-datepicker").nepaliDatePicker({
                    container: ".datepick",
                });
//datepicker -end
     
        var table = $('#Table').DataTable({
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
                
                { data: 'name', name: 'name',orderable:false ,width:'15%'},
                { data: 'description',orderable:false ,width:'15%'},
                { data: 'date',orderable:false,width:'5%' },
                { data: 'image',orderable:false,width:'5%'},
                { data: 'action',orderable:false ,width:'9%' }
            ]
        });


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

        $('#formAddMember').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('description', editor.getData()); // Add CKEditor data to formData

            $.ajax({
                url: "{{ route('employe.save') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('.message-box').html(response.message).css('display', 'block').css('opacity', 1);
                    setTimeout(function() {
                        $('.message-box').css('transition', 'opacity 0.5s').css('opacity', 0);
                        setTimeout(function() {
                            $('.message-box').css('display', 'none');
                        }, 500);
                    }, 2000);
                    table.ajax.reload(); 
                    $('#formAddMember')[0].reset(); 
                    $('#addMemberModal').modal('hide'); 
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                    console.log(xhr.responseText); 
                }
            });
        });

        $('#btn2').click(function() {
            $('#formAddMember')[0].reset();
            $('#id').val('');
            editor.setData(''); 
            $('#addMemberModalLabel').text('Add New Team Member');
            $('#btn34').text('Save');  // Set button text to "Save"
            $('#defaultImage').attr('src', '{{ asset("images/images.jpeg") }}');
        });


        // Edit button click handler
        $('#Table').on('click', '.edit-btn', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('employe.about') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(data) {
                    if (data) {
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        editor.setData(data.description); 
                       
                        $('#nepali-datepicker').val(data.date);
                        $('#defaultImage').attr('src', '/storage/images/' + data.image);
                        $('#btn34').text('Update');  // Change button text to "Update"
                        $('#addMemberModalLabel').text('Edit Team Member');
                        $('#addMemberModal').modal('show');
                    } else {
                        alert('Failed to fetch data for editing.');
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

                // Delete button click handler
                $('#Table').on('click', '.delete-btn', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this member?')) {
                $.ajax({
                    url: "{{ route('employe.delete') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id
                    },
                    success: function (response) {
                        $('.confirm-box').html(response.message).css('display', 'block').css('opacity', 1);
                        setTimeout(function() {
                            $('.confirm-box').css('transition', 'opacity 0.5s').css('opacity', 0);
                            setTimeout(function() {
                                $('.confirm-box').css('display', 'none');
                            }, 500);
                        }, 1000);
                        table.ajax.reload(); 
                    },
                    error: function (xhr) {
                        alert('An error occurred: ' + xhr.responseText);
                        console.log(xhr.responseText);
                    }
                });
            }
        });


        var myModal = new bootstrap.Modal(document.getElementById('addMemberModal'), {
    backdrop: true,
    keyboard: true,
    focus: true
});
    });

// Show modal when button is clicked
// document.querySelector('[data-bs-target="#addMemberModal"]').addEventListener('click', function () {
//     myModal.show();
// });
//     });

   


  </script>
</body>
</html>






