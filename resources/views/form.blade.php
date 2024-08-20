@if ($type == 'error')
<div class="modal-header">
    <h1 class="modal-title fs-5" id="addMemberModalLabel">Error</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    {{ $message }}
</div>
@else
<div class="modal-header">
    <h1 class="modal-title fs-5" id="addMemberModalLabel">
        {{ !empty($prevPost->id) ? 'Update Existing Member Details' : 'Add New Member' }}
    </h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <form action="{{ route('employe.save') }}" id="formAddMember" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $prevPost->id ?? '' }}">
        
        <div class="row">
            <div class="col-6">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter name" value="{{ $prevPost->name ?? '' }}" required>
            </div>
            <div class="col-6 form-group datepick">
                <label for="createDate">Date</label>
                <input class="form-control" type="date" id="nepali-datepicker" name="date" placeholder="Select Event Date" value="{{ $prevPost->date ?? '' }}" readonly>
            </div>
        </div>

        <div class="name" id="Ad">
            <label for="image" style="margin-left: -7px;">Photo</label>
            <div class="photo-container">
                <?php
                $photo = asset("images/images.jpeg");
                if (!empty(@$prevPost->image)) {
                    $photo = asset("storage/images/" . $prevPost->image);
                }
                ?>
                <img id="defaultImage" src="{{ $photo }}" alt="Default Image">
                <a class="fa-solid fa-camera profile-edit text-primary" href="javascript:void(0);" id="uploadIcon"></a>
            </div>
        </div>

        <input type="file" name="image" id="image" style="display:none;" accept="image/*">

        <div class="name">
            <label for="description" style="font-size: 13px; margin-left: 8px; font-weight: bold;">Description</label>
            <div id="descriptionEditor" class="raja">
                {!! @$prevPost->description !!}
                <!-- CKEditor will replace this div -->
            </div>
        </div>
    </form>

    <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn34">
            {{ empty($prevPost->id) ? 'Save' : 'Update' }}
        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>

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
      
        
        $(document).ready(function(){
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

            $('#btn34').off('click').on('click', function() {
               
                var formData = new FormData($('#formAddMember')[0]);
                formData.append('description', editor.getData());
               

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
                        
                       
                        Table.ajax.reload();
                        $('#id').val('');
                       
                        
                        $('#formAddMember')[0].reset();
                        $('#addMemberModal').modal('hide');
                    },
                    error: function(xhr) {
                        alert('An error occurred: ' + xhr.responseText);
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#nepali-datepicker').nepaliDatePicker({
                container: ".datepick",
            });

            $('#formAddMember').validate({
            rules: {
                name: "required",
                date: "required",
                description: "required",
               
                image: {
                    required: function() {
                        var id = $('#id').val();
                        return id === '';
                    }
                },
            },
            messages: {
                name: {
                    required: "Please select name."
                },
                date: {
                    required: "Please enter date "
                },

                description: {
                    required: "Please enter description of post.."
                },
              
                image: {
                    required: "Please select feature image."
                },
            },
            highlight: function(element) {
                $(element).addClass('border-danger')
            },
            unhighlight: function(element) {
                $(element).removeClass('border-danger')
            },
        });

        });
    </script>
<!-- rjah ram -->
    <style>
        /* Your existing styles */
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
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 1rem;
            background-color: #f8f9fa;
        }
        .ck-rounded-corners {
            height: 200px;
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
            cursor: pointer;
            margin-left: -5px;
        }
        .fa-camera {
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
        /* Additional styles for datepicker */
        .datepick {
            position: relative;
        }
        #ndp-nepali-box {
            position: absolute;
            top: 60px !important;
            left: 10px !important;
            z-index: 1000;
        }
        .ck.ck-editor {
            width: 861px;
            margin-left: 18px;
            margin-top: 18px;
        }
    </style>
</div>
@endif
