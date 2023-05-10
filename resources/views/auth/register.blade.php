@extends('layouts.auth')

@section('content')

    <div class="page-content page-auth" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
              <h2>
                Memulai untuk jual beli <br>
                dengan cara terbaru
              </h2>
              <form method="POST" action="{{ route('register') }} mt-3">
                @csrf
                <div class="form-group">
                  <label>Full Name</label>
                  <input id="name" type="text" v-model="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <input id="email" type="email" v-model="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Passowrd</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Confirm Passowrd</label>
                  <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Store</label>
                  <p class="text-muted">
                    Apakah anda juga ingin membuka toko ?
                  </p>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true">
                    <label for="openStoreTrue" class="custom-control-label">
                      Iya, Boleh
                    </label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_store_false" id="openStoreFalse" v-model="is_store_open" :value="false">
                    <label for="openStoreFalse" class="custom-control-label">
                      Engga, Makasih
                    </label>
                  </div>
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Nama Toko</label>
                  <input type="text" v-model="store_name" id="store_name" class="form-control @error('store_name') is-invalid @enderror" name="store_name" required autocomplete>
                  @error('store_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="form-group" v-if="is_store_open">
                  <label>Category</label>
                  <select name="categories_id" class="form-control">
                    <option value="" disabled>Select Category</option>
                    @foreach ( $categories as $category )
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="btn btn-success btn-block mt-4">Sign Up Now</button>
                <button href="{{ route('login') }}" class="btn btn-signup btn-block mt-4">Back to Sign In</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: '#register',
        mounted() {
          AOS.init();
          // this.$toasted.error(
          //   "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
          //   {
          //     position: "top-center",
          //     className: "rounded",
          //     duration: 1000
          //   }
          // );
        },
        data: {
          name: "Rangga Putra Ramdhani",
          email: "ranggaputra681@gmail.com",
          password: "",
          is_store_open: true,
          store_name: ""
        }
      });
    </script>
@endpush
