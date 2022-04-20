@extends('layouts.event_planer.template')
@section('title', 'Create Organizer')
@section('mainBody')

    <section class="content">
    <div class="container" id="create-org">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <p>Details that apply across your events and venues</p>
                    </div>
                    <!-- /.box-header -->

                    <form method="POST" action="{{ route('insert_organizer') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Add Organizer Profile</h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" required name="name"
                                            placeholder="e.g. Neabz Careers">
                                    </div>
                                </div>
                           
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control" required name="website"
                                            placeholder="e.g: https://www.neabzcareers.com/home">
                                    </div>
                                </div>
                           
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Organizer profile image</label>
                                        <br>

                                        <input type="file" id="img" name="img" required accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Organizer Bio</label>
                                    <p>Describe who you are, the types of events you host, or your mission. The bio is
                                        displayed
                                        on your organizer profile</p>
                                    <textarea cols="80" id="editor1" name="bio" required rows="10" data-sample-short></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Description for event pages</label>
                                    <p>Write a short description of this organizer to show on all your event pages</p>
                                    <textarea cols="80" id="editor2" name="description" required rows="10" data-sample-short></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>

                </div>

            </div>


        </div>
        </div>




    </section>




@endsection
@section('custom-js')
    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/4.17.2/standard-all/ckeditor.js"></script>

    {{-- CKEditor --}}
    <script>
        CKEDITOR.replace('editor1', {
            height: 260,
            width: 700,
            removeButtons: 'PasteFromWord'
        });
    </script>

    <script>
        CKEDITOR.replace('editor2', {
            height: 260,
            width: 700,
            removeButtons: 'PasteFromWord'
        });
    </script>

    <script>
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
            const dropZoneElement = inputElement.closest(".drop-zone");

            dropZoneElement.addEventListener("click", (e) => {
                inputElement.click();
            });

            inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
            });

            dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("drop-zone--over");
            });

            ["dragleave", "dragend"].forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    dropZoneElement.classList.remove("drop-zone--over");
                });
            });

            dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();

                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }

                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        /**
         * Updates the thumbnail on a drop zone element.
         *
         * @param {HTMLElement} dropZoneElement
         * @param {File} file
         */
        function updateThumbnail(dropZoneElement, file) {
            let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

            // First time - remove the prompt
            if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                dropZoneElement.querySelector(".drop-zone__prompt").remove();
            }

            // First time - there is no thumbnail element, so lets create it
            if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("drop-zone__thumb");
                dropZoneElement.appendChild(thumbnailElement);
            }

            thumbnailElement.dataset.label = file.name;

            // Show thumbnail for image files
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();

                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
            } else {
                thumbnailElement.style.backgroundImage = null;
            }
        }
    </script>
@endsection
