<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="{{ url('site') }}/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="{{ url('site') }}/js/anime.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="{{ url('site') }}/js/owl.carousel.min.js"></script>
<script src="{{ url('site') }}/js/lightgallery.min.js"></script>


<script src="{{ url('site') }}/js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('js')

<script>
    $(document).ready(function() {

        $(document).on('keyup', '#input_search', function(e) {
            e.preventDefault();
            $('#search_result').html('');

            var search = $(this).val();
            var url = $(this).data('url');
            if(search.length > 1) {
                // send request to server
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        search: search
                    },
                    success: function(data) {

                        if (data.result.length > 0) {
                            $('.details_search').css('display', 'block');
                            var results = [];
                            data.result.forEach(function(res) {
                                var link_articl = window.location.origin + '/article-details/' + res.id;
                                var link_research = window.location.origin + '/research-details/' + res.id;
                                var link_book = window.location.origin + '/book-details/' + res.id;
                                if(res.type){
                                    if(res.type == 'article'){
                                        results += '<li><a href="' + link_articl + '">' + res.title + '</a></li>';
                                    }else{
                                        results += '<li><a href="' + link_research + '">' + res.title + '</a></li>';
                                    }
                                } else {
                                    results += '<li><a href="' + link_book   + '">' + res.title + '</a></li>';
                                }

                            });
                            $('#search_result').append(results);
                        } else {
                            $('.details_search').css('display', 'block');
                            $('#search_result').append('<li>لا يوجد نتائج</li>');
                        }

                    }
                });

            } else {
                $('.details_search').css('display', 'none');
            }

        });
    });
</script>

@if (session()->has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: "{{ session()->get('success') }}"
        })
    </script>
@endif

@if (session()->has('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'error',
            title: "{{ session()->get('error') }}"
        })
    </script>
@endif
