@extends('layout-leader')

@section('content')
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        {{-- {{dd($member)}} --}}
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Form <span>/ {{isset($post) ? "Update Post" : "Create Post"}}</span></h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-30">
        <!--Form With Advance Form Elements Start-->
        <div class="col-lg-12 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Manage Posts</h4>
                    <hr>
                    <a href="{{ route('posts.index') }}">
                        <i class="ti ti-arrow-left"></i> Back to Posts
                    </a>  
                </div>
                <div class="box-body">
                    <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($post))
                            @method('PUT')
                        @endif
                        <div class="row mbn-20">
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="nameSt">Student Name</label>
                                        <input type="text" id="nameSt" name="nameSt" value="{{ isset($post) ? $post->nameSt : '' }}" class="form-control" placeholder="Student Name">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="idSt">Student ID</label>
                                        <input type="text" id="idSt" name="idSt" value="{{ isset($post) ? $post->idSt : '' }}" class="form-control" placeholder="Student ID">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="link">Name Art</label>
                                        <input type="text" id="name" name="name" value="{{ isset($post) ? $post->name : '' }}" class="form-control" placeholder="Name Art">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="link">Link Video</label>
                                        <input type="text" id="link" name="link" value="{{ isset($post) ? $post->link : '' }}" class="form-control" placeholder="Link">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="{{ isset($post) ? $post->email : '' }}" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="submission_date">Submission Date</label>
                                        <input type="date" id="submission_date" name="submission_date" value="{{ isset($post) ? $post->submission_date : '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <div class="row mbn-20">
                                    <div class="col-lg-6 mb-20">
                                        <label for="description_1">Description 1</label>
                                        <textarea id="description_1" name="description_1" class="form-control" placeholder="Description 1">{{ isset($post) ? $post->description_1 : '' }}</textarea>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label for="description_2">Description 2</label>
                                        <textarea id="description_2" name="description_2" class="form-control" placeholder="Description 2">{{ isset($post) ? $post->description_2 : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-20">
                                <label for="formLayoutFile2">Upload a File</label>
                                    <input type="file" id="image" name="image" class="dropify">
                                @if(isset($post) && $post->image)
                                    <p>Current Image*: There already has an image of {{ $post->name }}</p>
                                @endif
                            </div>                            

                            <div class="col-12 mb-20">
                                <input type="submit" value="{{ isset($post) ? 'Update' : 'Submit' }}" class="button button-primary">
                                @if(isset($post))
                                    <hr>
                                    <a href="{{ route('posts.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Posts
                                    </a>                                
                                @else
                                    <input type="reset" value="cancel" class="button button-danger">
                                    <hr>
                                    <a href="{{ route('posts.index') }}">
                                        <i class="ti ti-arrow-left"></i> Back to Posts
                                    </a>                                    
                                @endif
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <!--Form With Advance Form Elements End-->
    </div>
</div><!-- Content Body End -->
@endsection