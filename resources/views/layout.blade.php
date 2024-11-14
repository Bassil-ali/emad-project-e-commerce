

   
        @include('partials.header')
    

    <!-- Main Content -->
   
        @yield('content')
   

    <!-- Footer -->
   
        @include('partials.footer')
   

      <!-- Scroll Top -->
  <a
    href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"
    ><i class="bi bi-arrow-up-short"></i
  ></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="{{ url('assets') }}/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('assets') }}/home/vendor/aos/aos.js"></script>
  <script src="{{ url('assets') }}/home/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ url('assets') }}/home/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ url('assets') }}/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ url('assets') }}/home/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ url('assets') }}/home/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="{{ url('assets') }}/home/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Add this in the <head> section -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Main JS File -->
  <script src="{{ url('assets') }}/home/js/main.js"></script>

  <script>
  document.getElementById('newsletter-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    fetch('{{ route('newsletter.store') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token
        }
    })
    .then(response => response.json())
    .then(data => {
        
        if (data.success) {
            Swal.fire({
                title: '{{ trans('admin.Your subscription was successful!') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }else{
            Swal.fire({
                title: '{{ trans('admin.this email already taken !') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
       
        Swal.fire({
                title: '{{ trans('admin.somthing get wrong !') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
    });
});

    </script>
    
</body>
</html>
