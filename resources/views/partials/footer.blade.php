<footer id="footer" class="footer">
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>{{ trans('admin.join_our_newsletter') }}</h4>
            <p>
              {{ trans('admin.subscribe_to_our_newsletter') }}
            </p>

            <form action="{{ route('newsletter.store') }}" method="post" id="newsletter-form">
              @csrf
              <div class="newsletter-form">
                  <input
                      type="email"
                      placeholder="{{ trans('admin.Enter your Email') }}"
                      name="email"
                      required
                  />
                  <input type="submit" value="{{ trans('admin.Subscribe') }}" />
              </div>
          </form>


          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <!--   <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">FlexStart</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Stay connected! Follow us on social media for the latest updates, news, and exclusive content</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div> -->

        <div class="row gx-0 my-5">
          <div class="col-md-4 mb-md-0 mb-4">
            <div
              class="social-links justify-content-md-start justify-content-center"
            >
                <a href="https://www.facebook.com/share/E2X5qVEGB5bJeeMx/?mibextid=qi2Omg" target="_blank">
                    <img src="{{ url('assets') }}/home/img/icons/facebook.svg" alt="Facebook" />
                </a>
                <a href="https://youtube.com/user/EmadBakeries" target="_blank">
                    <img src="{{ url('assets') }}/home/img/icons/youtube.svg" alt="YouTube" />
                </a>
                <a href="https://twitter.com/ebakeries?s=21" target="_blank">
                    <img src="{{ url('assets') }}/home/img/icons/X.svg" alt="Twitter" />
                </a>
                <a href="https://www.instagram.com/emadbakeries/" target="_blank">
                    <img src="{{ url('assets') }}/home/img/icons/instagram.svg" alt="Instagram" />
                </a>
                <a href="https://wa.me/" target="_blank">
                    <img src="{{ url('assets') }}/home/img/icons/whatsapp.svg" alt="WhatsApp" />
                </a>
                <a href="https://www.snapchat.com/add/emad.bakeries" target="_blank">
                    <img src="{{ url('assets') }}/home/img/icons/Snapchat.svg" alt="Snapchat" />
                </a>

            </div>
          </div>
          <div
            class="col-md-8 d-flex justify-content-md-between justify-content-center flex-wrap"
          >

            <a href="{{ route('about-us') }}">{{ trans('admin.about-us') }}</a>
            <a href="{{ route('categories') }}">{{ trans('admin.products') }}</a>
            <a href="{{ route('blogs') }}">{{ trans('admin.blogs') }}</a>
            <a href="{{ route('be-partner',['partner']) }}">{{ trans('admin.be_partners') }}</a>
            <a href="{{ route('be-partner',['career']) }}">{{ trans('admin.be_career') }}</a>

            <a href="{{ route('gallery') }}">{{ trans('admin.gallery') }}</a>
            <a href="{{ route('branches') }}">{{ trans('admin.branches') }}</a>
          </div>
        </div>
      </div>
    </div>

    <div class="copyright py-5 mt-4">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-4 text-center text-md-start">
            <p class="mb-md-0 mb-5">
              © <span>{{trans('admin.Copyright')}} {{ date('Y') }}</span>
              <strong class="px-1 sitename">{{ config('app.name', 'Emad Bakeries') }}</strong>
              <span>{{trans('admin.All Rights Reserved')}}</span>
          </p>
          </div>
          <div class="col-md-8">
            <div
              class="logos d-flex justify-content-md-end justify-content-center flex-wrap"
            >
            @foreach (App\Models\Footersocial::get() as $item)
            <img src="{{it()->url($item->photo)}}" alt="ff" />
            
            @endforeach
            
            </div>
          </div>
        </div>
      </div>

      <!--  <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
    </div>
  </footer>

