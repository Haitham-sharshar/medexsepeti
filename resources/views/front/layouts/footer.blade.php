<!-- ------- Footer ---------- -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 pb-md-0 col-12 d-flex justify-content-center align-items-center pb-5">
                <img src="{{asset('medex.jpeg')}}" class="img-fluid" alt="">

            </div>
            <div class="col-sm-4 ">
                <h5 class="pb-2">About Us</h5>
                <p style="color: #7a797c; font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis doloribus quasi, nisi voluptatibus ullam vero ratione qui fugit nobis ducimus. Dolores officiis, unde recusandae eveniet reiciendis inventore eligendi animi cumque!</p>
            </div>
            <!-- <div class="col-lg-3 col-sm-4 col-5">
                <h5 class="pb-4">useful links</h5>
                <ul class="px-0">
                    <li><a href="#" class="active">home</a></li>
                    <li><a href="#">about school</a></li>
                    <li><a href="#">revisions</a></li>
                    <li><a href="#">student results</a></li>
                    <li><a href="#">videos</a></li>
                    <li><a href="#">apply for a job</a></li>
                    <li><a href="#">gallery</a></li>
                    <li><a href="#">latest news</a></li>
                    <li><a href="#">contact us</a></li>
                </ul>
            </div> -->
        </div>
    </div>
    <div class="row" id="copyrights">
        <p>MedexSepeti © {{trans('front.Copyrights 2023 All Rights Reserved')}} <a href="https://www.medexsepeti.com/">MedexSepeti</a></p>
    </div>
</footer>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/umd/popper.min.js" integrity="sha512-uaZ0UXmB7NHxAxQawA8Ow2wWjdsedpRu7nJRSoI2mjnwtY8V5YiCWavoIpo1AhWPMLiW5iEeavmA3JJ2+1idUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/select2.min.js')}}"></script>
@if(app()->getLocale() =='en')
<script src="{{asset('assets/front/js/main2.js')}}"></script>
@else
<script src="{{asset('assets/front/js/rtl.js')}}"></script>
@endif
<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
@yield('script')
</body>
</html>
