@extends('layout')

@section('title', trans('admin.be partner'))
@section('content')
     <!-- Alt categories Section -->
     <section class="section mb-5 mt-md-4 mt-2">
      <div class="container">
        <!-- Section Title -->
        <div
          class="section-title pb-5 mb-md-2 mb-0"
          data-aos="fade-up"
          data-aos-delay="100"
        >
        @if (request()->is('*career'))
        <div class="partners-section">
          <h2>{{ trans('admin.career') }}</h2>
          <p>{{ trans('admin.be_career') }}</p>
          <span>{{ trans('admin.partners_thank_you') }}</span>
        </div>
        @endif
        @if (request()->is('*partner'))
        <div class="partners-section">
          <h2>{{ trans('admin.partners') }}</h2>
          <p>{{ trans('admin.be_partners') }}</p>
          <span>{{ trans('admin.partners_thank_you') }}</span>
        </div>
        @endif
        </div>
      </div>

      <div class="container">
        <form
            action="{{ route('partner-save') }}"
            method="post"
            class="partner-form"
            data-aos="fade-up"
            data-aos-delay="200"
            enctype="multipart/form-data"
        >
        @csrf
            <div class="row gy-4">
               
                  
                    <input
                        type="text"
                        name="partner_type"
                        hidden
                        value="{{ request()->is('*career') ? 'career' : 'partner' }}"
                        class="form-control"
                        placeholder="{{ trans('admin.enter_full_name') }}"
                        
                        
                    />
               
                <div class="col-md-4">
                    <label for="name">{{ trans('admin.full_name') }} *</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="{{ trans('admin.enter_full_name') }}"
                        required
                    />
                </div>
                <div class="col-md-4">
                    <label for="mobile">{{ trans('admin.mobile_number') }} *</label>
                    <input
                        type="text"
                        name="phone_number"
                        class="form-control"
                        placeholder="{{ trans('admin.enter_mobile_number') }}"
                        required
                    />
                </div>
                @if (!request()->is('*career'))
                <div class="col-md-4"  >
                    <label for="business_name">{{ trans('admin.business_name') }}</label>
                    <input
                        type="text"
                        name="business_name"
                        class="form-control"
                        placeholder="{{ trans('admin.enter_business_name') }}"
                    />
                </div>
                @endif
                <div class="col-md-4">
                    <label for="email">{{ trans('admin.email') }} *</label>
                    <input
                        type="email"
                        name="email_address"
                        class="form-control"
                        placeholder="{{ trans('admin.enter_email') }}"
                        required
                    />
                </div>
                <div class="col-md-4">
                @if (request()->is('*career'))
                    <label for="cv">{{ trans('admin.attach_cv') }}</label>
                @endif
                @if (request()->is('*partner'))
                    <label for="cv">{{ trans('admin.attach_file') }}</label>
                @endif
                
                    <input
                        type="file"
                        name="file"
                        class="form-control"
                        accept=".pdf,.doc,.docx"
                    />
                </div>
                <div class="col-md-12">
                    <label for="message">{{ trans('admin.message') }}</label>
                    <textarea
                        class="form-control"
                        name="message"
                        rows="6"
                        placeholder="{{ trans('admin.enter_message') }}"
                        required
                    ></textarea>
                </div>
                <div class="col-md-12 text-center d-flex gap-4 justify-content-center align-items-center submit-sec">
                    <button type="submit" class="btn btn-primary">{{ trans('admin.send_message') }}</button>
                    <a href="#" class="btn btn-secondary" onclick="event.preventDefault(); document.querySelector('.partner-form').reset();">{{ trans('admin.reset') }}</a>
                </div>
            </div>
        </form>
    </div>
    
    <script>
        // Handle form submission with SweetAlert
        document.querySelector('.partner-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;
            // Show SweetAlert with a loading animation
        Swal.fire({
          
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading(); // Start the loading animation
            }
        });

            // Perform AJAX form submission
            var formData = new FormData(form);
            
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        
                        text: '{{ trans('admin.form_submitted_successfully') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        form.reset();
                    });
                } else {
                    Swal.fire({
                        
                        text: data.message || '{{ trans('admin.validation_error') }}',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    
                    text: '{{ trans('admin.something_went_wrong') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
    
    
    </section>
    <!-- /Alt Services Section -->
@endsection