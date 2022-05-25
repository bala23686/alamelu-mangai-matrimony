   <!-- NEWSLETTER SECTION START -->
   @include('Website.layouts.includes.newsLetter')
   <!-- NEWSLETTER SECTION END -->

   <footer class="footer">
       <div class="footer-top">
           <div class="container">
               <div class="row">
                   <div class="col-lg-3 col-md-6 col-12">

                       <div class="single-footer mobile-app">
                           <h3>Mobile Apps</h3>
                           <div class="app-button">
                               <a href="javascript:void(0)" class="btn btn-sm">
                                   <i class="lni lni-play-store"></i>
                                   <span class="text">
                                       <span class="small-text">Get It On</span>
                                       Google Play
                                   </span>
                               </a>
                               <a href="javascript:void(0)" class="btn btn-sm">
                                   <i class="lni lni-apple"></i>
                                   <span class="text">
                                       <span class="small-text">Get It On</span>
                                       App Store
                                   </span>
                               </a>
                           </div>
                       </div>
                   </div>

                   <div class="col-lg-3 col-md-6 col-12">
                       <div class="single-footer f-link">
                           <h3>Quick Links</h3>
                           <ul>
                               @if (Auth()->check() && Auth()->user()->is_admin != 1)
                                   <li><a href="{{ route('user.dashboard') }}">My Profile</a></li>
                               @endif
                               <li><a href="about">About Us</a></li>
                               <li><a href="about">Search</a></li>
                               <li><a href="about">Contact us</a></li>
                               <li><a href="about">Enquiry</a></li>
                           </ul>
                       </div>
                   </div>

                   <div class="col-lg-3 col-md-6 col-12">
                       <div class="single-footer f-contact">
                           <h3>Contact</h3>
                           <ul>
                               <li class="mb-0">{{ $webInfo->company_address ?? '' }},
                               </li>
                               <li class="mb-2">{{ $webInfo->company_city ?? '' }},
                                   {{ $webInfo->company_state ?? '' }},
                                   {{ $webInfo->company_country ?? '' }},
                                   {{ $webInfo->company_pincode ?? '' }}.</li>
                               <li class="mb-2">Tel: +91-{{ $webInfo->company_contact_number ?? '' }}.</li>
                               <li>Mail: <a href="https://exciteon.com/" class="__cf_email__"
                                       data-cfemail="7d0e080d0d120f093d1e111c0e0e141a0f14190e531e1210">{{ $webInfo->company_email ?? '' }}</a>
                               </li>
                           </ul>
                       </div>
                   </div>

                   <div class="col-lg-3 col-md-6 col-12 footer-bottom">
                       <div class="single-footer f-contact">
                           <h3>Social Links</h3>
                           <ul class="footer-social d-flex justify-content-center">
                               <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                               <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                               <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                               <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="footer-bottom">
           <div class="container">
               <div class="inner">
                   <div class="row">
                       <div class="col-12">
                           <div class="content">
                               <ul class="footer-bottom-links">
                                   <li><a href="javascript:void(0)">Terms of use</a></li>
                                   <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                   <li><a href="javascript:void(0)">Refund & Cancellation Policy</a></li>
                                   <li><a href="javascript:void(0)">More Information</a></li>
                               </ul>
                               <p class="copyright-text mb-3">Designed and Developed by <a href="https://exciteon.com/"
                                       rel="nofollow" target="_blank">Exciteon</a>
                               </p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </footer>

   <a href="#" class="scroll-top btn-hover">
       <i class="lni lni-chevron-up"></i>
   </a>

   @include('Website.layouts.includes.footScript')
