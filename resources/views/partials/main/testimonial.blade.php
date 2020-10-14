<section class="section testimonial-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Clientas <span class="fa fa-heart"></span></h2>
            </div>
        </div>
        <div class="row">
            @foreach ($igLinks as $link)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial text-center">
                        {{-- <p><em>&mdash; @vickycalleros</em></p>
                        --}}
                        @php
                            echo $link;
                        @endphp
                    </div>
                </div>
            @endforeach
        </div>
</section>
