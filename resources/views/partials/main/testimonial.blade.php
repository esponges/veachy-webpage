<section class="section testimonial-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8">
                <h2 class="heading" data-aos="fade-up">Clientas <span class="fa fa-heart"></span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial text-center">
                    {{-- <p><em>&mdash; @vickycalleros</em></p>
                    --}}
                    {{-- <img src="https://instagram.fgdl3-1.fna.fbcdn.net/v/t51.2885-15/e35/121366495_183184883336575_7351778169892793766_n.jpg?_nc_ht=instagram.fgdl3-1.fna.fbcdn.net&_nc_cat=107&_nc_ohc=mqe1QSBhOn4AX-FiLJd&_nc_tp=18&oh=da5dcbb29f76fc4af7ee70c07c4e4225&oe=5FB0A162"> --}}
                    <iframe class="instagram-media instagram-media-rendered"
                        id="instagram-embed-0"
                        src="https://www.instagram.com/p/CFH9Jd2ssR_/embed/captioned/?cr=1&amp;v=12&amp;wp=445&amp;rd=http%3A%2F%2F127.0.0.1%3A8000&amp;rp=%2Fig#%7B%22ci%22%3A0%2C%22os%22%3A2887.219999998706%2C%22ls%22%3A2876.494999998613%2C%22le%22%3A2880.924999999479%7D"
                        allowtransparency="true"
                        allowfullscreen="true"
                        frameborder="0"
                        height="791"
                        data-instgrm-payload-id="instagram-media-payload-0"
                        scrolling="no"
                        style="background: white; max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;">
                    </iframe>
                </div>
            </div>
            @for ($i=0; $i<$arrSize;$i++)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial text-center">
                        <p><em>&mdash; @vickycalleros</em></p>

                        @php
                            echo $igLinks[$i]->ig_link;
                        @endphp
                    </div>
                </div>
            @endfor
        </div>
</section>
