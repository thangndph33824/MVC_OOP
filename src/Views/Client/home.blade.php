@extends('layouts.master')
@section('content')
@section('title')
Trang chủ
@endsection


<!-- ======= Hero Slider Section ======= -->
<!-- End Hero Slider Section -->

<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-4">
                @include('components.post-entry-1',['post'=>$postFirstLatest])

            </div>

            <div class="col-lg-8">
                <div class="row g-5">
                    @foreach ($postTopSixchunk as $item)
                    <div class="col-lg-6 border-start custom-border">
                       @foreach ($item as $post)
                       @include('components.post-entry-1',[
                        'post'=>$post,
                        'hiddenAuthor'=>false,
                        'hiddenExcerpt'=>false,
                       ])
                       @endforeach
                    </div>
                        
                    @endforeach

                    <!-- Trending Section -->
                    <!-- End Trending Section -->
                </div>
            </div>

        </div> <!-- End .row -->
    </div>
</section> <!-- End Post Grid Section -->

<!-- ======= Culture Category Section ======= -->
<!-- End Culture Category Section -->

<!-- ======= Business Category Section ======= -->
<!-- End Business Category Section -->

<!-- ======= Lifestyle Category Section ======= -->
<!-- End Lifestyle Category Section -->


@endsection