@extends('layouts.event_planer.template')
@section('title', 'Edit Details')

@section('mainBody')

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Details</h3>

                    </div>




                    <div class="box-body">
                        <form method="POST" action="{{route('update_details')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Main Event Image</label>
                                    <p>This is the first image attendees will see at the top of your listing. Use a high
                                        quality image: 2160x1080px (2:1 ratio).</p>
                                        <div class="form-group">
                                            <img class="img-square" src="{{asset($event->event_image)}}" alt="Event Image">
                                            <br><br>
                                            <input type="file" name="image" id="img">
                                        </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Description</label>
                                <p>Add more details to your event like your schedule, sponsors, or featured guests.</p>
                                <div class="form-group">
                                    <label>Summary(*)</label>
                                    <textarea class="form-control" rows="3" name="summary" value="{{$event->event_summary}}"
                                        placeholder="Write a short event summary to get attendees excited.">{{$event->event_summary}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <textarea cols="80" id="editor1" name="details" value="{{$event->event_details}}" rows="10" data-sample-short> {{$event->event_details}}</textarea>
                            </div>
                    </div>

                    <input type="hidden" name="event_id" value={{$id}}>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>

                </form>
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
