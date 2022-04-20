@extends('layouts.event_planer.template')
@section('title', 'Edit Organizer')
@section('mainBody')

<section class="content">
  <div class="row">

      <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
              <div class="box-header with-border">
                  <p>Details that apply across your events and venues</p>
              </div>
              <!-- /.box-header -->

              <form method="POST" action="{{ route('update_organizer') }}" enctype="multipart/form-data">
                @csrf

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Edit Organizer Profile</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" required name="name" value="{{$organizer->name}}"
                                    placeholder="e.g. Neabz Careers">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" class="form-control" required name="website" value="{{$organizer->website}}"
                                    placeholder="e.g: https://www.neabzcareers.com/home">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Organizer profile image</label>
                                <br>
                                <img class="img-square" src="{{ asset($organizer->image) }}" style="width:100px; height:100px;"
                                alt="User Avatar">
                            <br><br>
                                <input type="file" id="img" name="img"  accept="image/*" value="{{$organizer->image}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Organizer Bio</label>
                            <p>Describe who you are, the types of events you host, or your mission. The bio is
                                displayed
                                on your organizer profile</p>
                            <textarea cols="80" id="editor1" name="bio" required rows="10" value="{{$organizer->bio}}" data-sample-short>{{$organizer->bio}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Description for event pages</label>
                            <p>Write a short description of this organizer to show on all your event pages</p>
                            <textarea cols="80" id="editor2" name="description" value="{{$organizer->description}}" required rows="10"  data-sample-short>{{$organizer->description}}</textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="organizer_id" value="{{$id}}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>


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

<script>
  $(".copied").click(function() {
      /* Get the text field */
      var copyText = document.getElementById("event-url");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */

      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);

  });
</script>

@endsection
