@extends('site.layouts.app')

@section('content')
    <!-- start app -->
    <main id="app">

        <div class="videos_page">
            <div class="main-container">
                <div class="title2">
                    <h2> المكتبة الالكترونية</h2>
                </div>
                <div class="main_videos_page">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="links_videos_page">
                                <div class="title_links_videos_page">
                                    <h2>الفيديوهات المرئية</h2>
                                </div>

                                <ul>
                                    @foreach ($videos as $video)
                                        @php
                                            $url = $video->url;
                                            $url_components = parse_url($url);
                                            if (array_key_exists('query', $url_components)) {
                                                parse_str($url_components['query'], $params);
                                                $key = $params['v'];
                                            } else {
                                                $key = str_replace('/', '', $url_components['path']);
                                            }
                                        @endphp

                                        <li class="this_video" data-video="https://www.youtube.com/embed/{{ $key }}"
                                            data-desc="{{ $video->desc }}"
                                            data-keywords="@if(isset($video->keywords))@foreach (json_decode($video->keywords) as $keyword){{ $keyword }}@endforeach @endif">
                                            <a href="#">
                                                <i class="bi bi-camera-video-fill"></i> {{ $video->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-8">
                            <div class="sub_videos_page">
                                <div class="videos_pages_1">
                                    <iframe width="100%" id="frame_video" height="450px" src=""
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                <p id="video_desc">

                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="more_videos_page">
                    <div class="title2">
                        <h2> فيديوهات ذات صلة </h2>
                    </div>
                    <div class="slider_videos_page">
                        <div class="owl-carousel owl-theme maincarousel" id="slider_1">

                            @foreach ($latestVideos as $video)
                                @php
                                    $url = $video->url;
                                    $url_components = parse_url($url);
                                    if (array_key_exists('query', $url_components)) {
                                        parse_str($url_components['query'], $params);
                                        $key = $params['v'];
                                    } else {
                                        $key = str_replace('/', '', $url_components['path']);
                                    }
                                @endphp

                                <div class="item">
                                    <a href="#" class="this_video"
                                        data-video="https://www.youtube.com/embed/{{ $key }}"
                                        data-desc="{{ $video->desc }}">
                                        <div class="sub_more_videos_page">
                                            <div class="img_more_videos_page">
                                                <img src="http://img.youtube.com/vi/{{ $key }}/mqdefault.jpg"
                                                    alt="">
                                            </div>
                                            <h2> {{ $video->title }} </h2>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    @push('js')
        <script>
            $(document).ready(function() {

                // get this video element by class
                var this_video = $('.this_video');

                //  data video from this video first element
                var data_video = this_video.data('video');

                // data desc from this video first element
                var data_desc = this_video.data('desc');

                $('#frame_video').attr('src', data_video);
                $('#video_desc').html(data_desc);

                $(document).on('click', '.this_video', function(e) {
                    e.preventDefault();

                    var frame_video = $(this).attr('data-video');
                    $('#frame_video').attr('src', frame_video);

                    var video_desc = $(this).attr('data-desc');
                    $('#video_desc').html(video_desc);

                    var keywords = $(this).attr('data-keywords');

                    $('meta[name="keywords"]').attr('content', keywords);
                    $('meta[name="description"]').attr('content', video_desc);


                });
            });
        </script>
    @endpush
@endsection
