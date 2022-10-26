<footer id="footer">
    <div class="container">
        <div class="footer">
            <div class="row m-5">
                <div class="col-md-3 text-end">
                    <p>
                        <a href="{{ route('welcome') }}"">Home</a>
                        <br />
                        <a href="{{ route('about') }}">About us</a>
                        <br />
                        <a href="{{ route('contact') }}">Conatct us</a>
                        <br />
                        <a data-toggle="modal" data-target="#returnsModal" href="#">Returns policy</a>
                        <br />
                        <a data-toggle="modal" data-target="#privacyModal" href="#">Privacy policy</a>
                        <br />
                        <a data-toggle="modal" data-target="#termsModal" href="#">Term and conditions</a>
                    </p>
                </div>
                <div class="col-md-6 borders">
                    <p>
                        Copyright &copy; <?php echo date("Y"); ?>. All rights reserved
                        <br /><br />
                        Powered by
                        <img src="{{ asset('images/icons/yoco_colour.svg') }}" class="yoco" alt="Yoco Approved!" />
                    </p>
                    <p>Our products</p>
                    <img src="{{ asset('images/tropical_salads.png') }}" class="intheloop" alt="MissVee Tropical Salads" />
                    <img src="{{ asset('images/in_the_loop.png') }}" class="intheloop" alt="InTheLoop Software Solutions" />
                    <img src="{{ asset('images/foundation.png') }}" class="intheloop" alt="MissVee Gracious God Foundation" />
                </div>
                <div class="col-md-3 text-start">
                    <p>
                        <strong>Our offices</strong><br />
                        199 Uys Rd, <br />
                        Rynfield,<br />
                        Benoni,<br />
                        1501
                        <br /><br />
                        <a href="https://wa.me/27681037459" class="no-animation" target="_blank"><i class="fab fa-whatsapp"></i></a> |
                        <a href="https://web.facebook.com/miss.vee.famous.look/" class="no-animation" target="_blank"><i class="fab fa-facebook-f"></i></a> | 
                        <a href="https://www.instagram.com/missvee.online/" class="no-animation" target="_blank"><i class="fab fa-instagram"></i></a> | 
                        <a href="https://www.tiktok.com/@missveepty_ltd?is_from_webapp=1&sender_device=pc" class="no-animation" target="_blank"><i class="fab fa-tiktok"></i></a> | 
                        <a href="https://www.youtube.com/channel/UChgq9B81nHI4DPfxiPvSjpg" class="no-animation" target="_blank"><i class="fab fa-youtube"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
