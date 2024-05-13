@extends('admin.layouts.app')
@section('title')
<title>New Post</title>
@endsection
@section('main-panel')
<div class="main-panel">
    {{-- <div>
            <ul class="admin-breadcrumb ">
                <li><a href="{{url('super-admin')}}" class="card-heading-link">Home</a></li>
    <li>Setting</li>
    </ul>
</div> --}}
<div class="content-wrapper add-new-design">
    {{-- start loader --}}
    <div class="loader loader-default" id="loader"></div>
    {{-- end loader --}}


    <div class="row">
        <div class="col-sm-12 col-md-12 stretch-card">
            <div class="card-wrap form-block p-0">
                <div class="block-header p-4">
                    <h3>Add New Post</h3>
                    <p class="ms-4 mb-0">Fill the following fields to add new Post.</p>
                    <div class="tbl-buttons">
                        <ul>
                            <li>
                                <a href="{{url('super-admin/posts')}}"><img src="{{url('frontend/cancel-icon.png')}}" alt="cancel-icon" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include('success.success')
                @include('errors.error')
                <div class="row p-4 form-wrap">
                    {!! Form::open(['url' => 'super-admin/posts', 'id' => 'myForm', 'method' => 'POST', 'files' => true]) !!}
                    <div class="form-group batch-form">
                        <div class="col-md-12">
                                <div class="row pt-2">
                                    <div class="col-md-8">
                                        <label>Title<span style="color: red;">*</span></label>
                                        <input class="form-control form-control-lg my-image" type="text" id="" name="title" placeholder="Title">
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-md-8 pt-3 pt-md-0">
                                        <label for="content">Content<span style="color: red;">*</span></label>
                                        <textarea name="content" id="body1" name="content">
                                    </textarea>
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-12 col-md-4 pt-3 pt-md-0">
                                        <label for="author_id">Author:</label>
                                            <select name="author_id" id="author_id" class="form-control">
                                                @foreach($authors as $author)
                                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-12 col-md-4 pt-3 pt-md-0">
                                            <label for="category_id">Category:</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6 col-md-2 pt-3 pt-md-0">
                                        <label for="published_at">Published At</label>
                                        <input type="date" name="published_at" id="published_at" class="form-control">
                                    </div>

                                </div>




                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                    <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                        <option value="" selected disabled>Please select status</option>
                                        @foreach (config('custom.status') as $in2 => $val2)
                                        <option value="{{ $in2 }}" @if (old('status')==$in2) selected @endif>
                                            {{ $val2 }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4 submit-section">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-save ">Save & Continue
                                        <i class="fas fa-angle-double-right"></i></button>
                                    <a href="{{ url('super-admin/posts') }}">
                                        <button type="button" class="btn btn-secondary btn-skip ms-3">Skip <i class="fa-solid fa-angles-right"></i></button>
                                    </a>

                                </div>

                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    ClassicEditor
        .create(document.querySelector('#body1'), {

        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body2'), {


        })
        .catch(error => {
            console.error(error);
        });
        document.addEventListener('DOMContentLoaded', function () {
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
            placeholder: 'Type your text here...',
            modules: {
                toolbar: [
                    [{ 'color': [] }],          // Text color button
                    ['bold', 'italic', 'underline', 'strike'],  // Other buttons
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        document.getElementById('myForm').addEventListener('submit', function (event) {
            // Get the HTML content from the Quill editor and set it as the value of the hidden textarea
            document.querySelector('textarea[name="service_image_description"]').value = quill.root.innerHTML;
        });
    });
    ClassicEditor
        .create(document.querySelector('#body4'), {

        })
        .catch(error => {
            console.error(error);
        });


</script>
@endsection
