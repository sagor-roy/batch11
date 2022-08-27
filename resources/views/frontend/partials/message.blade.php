@if (Session::has('message'))
              <div class="alert 
              @if (Session::has('type'))
                {{ Session::get('type') == 'success' ? 'alert-success':'alert-danger' }}
              @endif
              ">
                {{ Session::get('message') }}
              </div>
          @endif