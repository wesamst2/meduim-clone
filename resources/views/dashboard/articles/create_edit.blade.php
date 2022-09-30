@extends('layout')
@section('title') Manage Articles @endsection


@section('body')
    <div class="container">
        <h3>Create New Article</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger m-0 text-center">{{ $error }}</p>
            @endforeach
        @endif
        <div class="col-12 mt-3">
            <form method="POST" enctype="multipart/form-data" action="{{ $edit?route('articles.update',$article->id):route('articles.store') }}">
                @csrf
                @if($edit)
                    @method('PUT')
                @endif

                <div class="form-floating mb-2">
                    <input type="text" placeholder="Title" class="form-control" id="titleInput" name="title" value="{{$edit?$article->title: ""}}" oninput="updateSlug(this);" required autofocus>
                    <label for="titleInput">Title</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" placeholder="Slug" class="form-control" id="slugInput" name="slug" value="{{$edit?$article->slug: ""}}" required autofocus>
                    <label for="titleInput">Slug</label>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label col-12">Main Image</label>
                    @if($edit)
                        <img src="{{ asset($article->image) }}" class="mb-2" width="200"/>
                    @endif
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="form-floating mb-2">
                    <textarea id="briefInput" class="form-control" name="brief" placeholder="Brief" required>{{$edit?$article->brief: ''}}</textarea>
                    <label for="briefInput">Brief</label>
                </div>

                <div class="form-check mb-2 p-0">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description">{{$edit?$article->description: ''}}</textarea>
                </div>
                <div class="mb-2">
                    <label for="tagsInput" class="form-label">Tags</label>
                    <select name="tags[]" class="form-control" id="tagsInput" multiple required>
                        @foreach($tags as $tag)
                            <option {{$edit?$article->tags->contains($tag->id)?'selected':'':''}} value="{{$tag->title}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-grid mt-4">
                    <button class="btn btn-dark text-uppercase fw-bold" type="submit">{{$edit?'Edit': 'Create'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tagsInput').select2({
                tags: true,
            })
        })
    </script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        var slugInput = document.getElementById('slugInput');

        var slug = function(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
            var to   = "aaaaaeeeeeiiiiooooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        };

        function updateSlug(e) {
            slugInput.value = slug(e.value);
            // console.log(e.value);
        }
        // import SimpleUploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter';
        // require('ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter');
        ClassicEditor
            .create( document.querySelector( '#description' ),{
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    uploadUrl: '{{route('ckeditorupload', ['_token' => csrf_token() ])}}',

                    // Enable the XMLHttpRequest.withCredentials property.
                    withCredentials: true,

                    // Headers sent along with the XMLHttpRequest to the upload server.
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                    }
                }
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endPush
