@extends('admin.layouts.app')
@section('title')
<title>Post</title>
@endsection
@section('main-panel')
<div class="main-panel">
    <div class="content-wrapper">
        {{--start loader--}}
        <div class="loader loader-default" id="loader"></div>
        {{--end loader--}}
        <div class="row">
            <div class="col-sm-12 col-md-12 stretch-card">
                <div class="card-wrap form-block p-0">
                    <div class="block-header p-4">
                        <h3>Show Post</h3>
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
                    <div class="row p-4">
                        <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                            {{-- {!! Form::open(['url' => 'service/'.$service->id,'method' => 'POST', 'files' => true]) !!}--}}
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <div class="row pt-2">
                                        <div class="col-md-4">
                                            <label for="title">Title </label>
                                            <input class="form-control form-control-lg my-image" type="text" id="" name="title" placeholder="Enter Title" value="{{ $post->title }}" readonly>
                                        </div>



                                    </div>
                                    <div class="row pt-2">
                                        <div class="col-md-6">
                                            <label for="content">Content</label>
                                            <textarea name="content" id="body1" cols="30" rows="5" class="form-control form-control-lg" placeholder="">{!! $post->content !!}</textarea>
                                        </div>

                                    </div>

                                    <div class="row pt-2">
                                        <div class="row pt-2">
                                            <div class="col-12 col-md-4 pt-3 pt-md-0">
                                                <label for="author_id">Author:</label>
                                                <input type="text" class="form-control" value="{{ $post->author->name }}" readonly>
                                            </div>
                                            <div class="col-12 col-md-4 pt-3 pt-md-0">
                                                <label for="category_id">Category:</label>
                                                <input type="text" class="form-control" value="{{ $post->category->name }}" readonly>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6 col-md-2 pt-3 pt-md-0">
                                                <label for="published_at">Published At:</label>
                                                <input type="text" class="form-control" value="{{ $post->published_at }}" readonly>
                                            </div>
                                        </div>

                                    </div>


                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select id="status" name="status" class="form-select" aria-label="Select the status type" required>
                                            <option value="" selected disabled>Please select status</option>
                                            @foreach(config('custom.status') as $in2 => $val2)
                                            <option value="{{$in2}}" @if($post->status == $in2) selected @endif>{{$val2}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- {!! Form::close() !!}--}}
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
    ClassicEditor
        .create(document.querySelector('#body3'), {

        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body4'), {

        })
        .catch(error => {
            console.error(error);
        });


</script>

@endsection
