    <div class="input-group mb-3">
        @if(isset($image))
        <input type="hidden" class="form-control @error('image') is-invalid @enderror" value="{{url('uploads')}}/{{$image}}" id="image" name="image">
        @else
        <input type="hidden" class="form-control @error('image') is-invalid @enderror" value="" id="image" name="image">
        @endif
        <div class="input-group-append w-100">
            <button type="button" class="btn btn-primary" href="#modal-upload" data-toggle="modal"><i class="fas fa-plus"></i></button>
        </div>
        @if(isset($image))
        <img src="{{url('uploads')}}/{{$image}}" id="img_show" class="img-fluid mt-2" alt="">
        @else
        <img src="" id="img_show" class="img-fluid mt-2" alt="">
        @endif
        @error('image')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1000px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{url('file')}}/dialog.php?akey=iwGeh4J5XFdIc4MVpG5M20BFejSGEw3bJeqpi3Vgm8w&field_id=image" width="100%" height="400px" style="border: 0;overflow-y:auto;" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
    @section('js')
    <script>
        $('#modal-upload').on('hide.bs.modal', function() {
            var _img = $('input#image').val();
            $('img#img_show').attr('src', _img);
        });
    </script>
    @stop()