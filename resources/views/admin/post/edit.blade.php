@extends('admin.layouts.app')
@section('title')
<title>Edit Posts</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="content-wrapper add-new-design">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}


        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="card-wrap form-block p-0">
                    <div class="block-header p-4">
                        <h3>Edit Posts</h3>
                        <p class="ms-4 mb-0">Fill the following fields to add new Posts.</p>
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
                        {!! Form::open(['url' => 'super-admin/posts/'.$post->id, 'class' => 'row g-2 ps-2 pe-0 me-0', 'id' => 'myForm', 'method' => 'POST', 'files' => true]) !!}

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <div class="row pt-2">
                                    <div class="col-md-4">
                                        <label for="title">Title </label>
                                        <input class="form-control form-control-lg my-image" type="text" id="" name="title" placeholder="Enter Title" value="{{ $post->title }}">
                                    </div>

                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6">
                                        <label for="content">Content<span style="color: red;">*</span></label>
                                        <textarea name="content" id="body1" cols="30" rows="5" class="form-control form-control-lg" placeholder="">{!! $post->content !!}</textarea>
                                    </div>

                                </div>

                                <div class="row pt-2">
                                    <div class="col-12 col-md-4 pt-3 pt-md-0">
                                        <label for="author_id">Author:</label>
                                        <select name="author_id" id="author_id" class="form-control">
                                            @foreach($authors as $author)
                                                <option value="{{ $author->id }}" {{ $post->author_id == $author->id ? 'selected' : '' }}>
                                                    {{ $author->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4 pt-3 pt-md-0">
                                        <label for="category_id">Category:</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6 col-md-2 pt-3 pt-md-0">
                                        <label for="published_at">Published At:</label>
                                        <input type="date" name="published_at" id="published_at" class="form-control" value="{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d') : '' }}">
                                    </div>
                                </div>



                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label for="status" class="form-label">Status<span style="color: red;">*</span></label>
                                    <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                        <option value="" selected disabled>Please select status</option>
                                        @foreach(config('custom.status') as $in2 => $val2)
                                        <option value="{{$in2}}" @if($post->status == $in2) selected @endif>{{$val2}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4 submit-section">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-save ">Save & Continue
                                        <i class="fas fa-angle-double-right"></i></button>
                                    <a href="{{url('super-admin/posts')}}">
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
