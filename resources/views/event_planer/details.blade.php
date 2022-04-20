@extends('layouts.event_planer.template')
@section('title', 'Details')
@section('custom-css')
    <style>
        .drop-zone {
            /* max-width: 200px; */
            height: 200px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 4px dashed #009578;
            border-radius: 10px;
        }

        .drop-zone--over {
            border-style: solid;
        }

        .drop-zone__input {
            display: none !important;
        }

        .drop-zone__thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .drop-zone__thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;
        }

    </style>
@endsection
@section('mainBody')

    <section class="content">
    <div class="container details10" id="create-org">
        <div class="row">

        
            <!-- left column -->
            <div class="col-md-6">

                <div class="box box-info">
                    <div class="box-header with-border">
                        
                        
                        <h3 class="box-title">Details</h3>

                    </div>




                    <div class="box-body">
                        <form method="POST" action="{{route('insert_details')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Main Event Image</label>
                                    <p>This is the first image attendees will see at the top of your listing. Use a high
                                        quality image: 2160x1080px (2:1 ratio).</p>
                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="image" required class="drop-zone__input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Description</label>
                                <p>Add more details to your event like your schedule, sponsors, or featured guests.</p>
                                <div class="form-group">
                                    <label>Summary(*)</label>
                                    <textarea class="form-control" rows="3" name="summary" required
                                        placeholder="Write a short event summary to get attendees excited."></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <textarea cols="80" id="editor1" name="details" rows="10" required data-sample-short></textarea>
                            </div>
                    </div>

                    <input type="hidden" name="event_id" value={{$id}}>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-default mt-5">Next</button>
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

    <script>
        $(document).ready(function() {
            $(".add-block").attr('disabled','disabled');
        });
    </script>

@endsection
