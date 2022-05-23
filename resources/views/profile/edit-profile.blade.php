<x-dashe-layout>

    <div class=" mx-auto relative mt-4 shadow-2xl rounded my-24 overflow-hidden">
        <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
          <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
          <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="h-24 w-24 object-cover rounded-full">
            <h1 class="text-2xl font-semibold">Antonia Howell</h1>
            <h4 class="text-sm font-semibold">Joined Since '19</h4>
          </div>
        </div>
        <div class="grid grid-cols-12 bg-white " x-data='{tap:1}'>

          <div class="col-span-12 w-full px-3 py-6 dark:bg-darker justify-center flex space-x-4 border-b border-solid lg:space-x-0 lg:space-y-4 lg:flex-col lg:col-span-2 md:justify-start ">

            <button  type="button" :class='tap==1 ? "bg-primary  " : "bg-primary-50 hover:bg-primary" '  class="text-sm  text-center p-2 dark:text-light rounded-md " @click="tap=1">
        Basic Information</button>
            <a @click="tap=2" :class='tap==2 ? "bg-primary  " : "bg-primary-50 hover:bg-primary" ' class="text-sm p-2  bg-primary-50 text-center rounded font-semibold  hover:text-gray-200  cursor-pointer">Another Information</a>

            <a @click="tap=3" :class='tap==3 ? "bg-primary  " : "bg-primary-50 hover:bg-primary" ' class="text-sm p-2 bg-indigo-200 text-center rounded font-semibold  hover:text-gray-200 cursor-pointer">Another Something</a>

          </div>

          <div x-show="tap==1" class="col-span-12 md:border-solid md:border-l dark:bg-dark md:border-black md:border-opacity-25 h-full pb-12 lg:col-span-10">
            <div class="px-4 pt-4">
              <form action="{{route('profile.update',auth()->user()->id)}}" method="POST" class="flex flex-col space-y-8 mx-8">

                @method("PUT")
                @if (session()->has("state"))
                    <span>Has State</span>
                @endif


                <x-auth-session-status class="mb-4" :status="session('status')" />

                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                @csrf
                <div>
                  <h3 class="text-2xl font-semibold">Basic Information</h3>
                  <hr>
                </div>
                <div class="space-y-2 " dir="auto">
                    <x-label for="name" :value="__('الاسم')" />

                        <x-input id="name" class="block  w-full" type="text" name="name"
                        value="{{auth()->user()->name}}"
                        placeholder="{{ __('الاسم') }}" required autofocus />
                </div>

                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">
                    <div class="space-y-2 w-full ">
                        <x-label for="email" :value="__('Email')" />

                        <x-input-with-icon-wrapper>
                            <x-slot name="icon">

                                <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5 text-primary-darker dark:text-primary-light" />



                            </x-slot>
                            <x-input withicon id="email" class="block focus:ring-primary_color focus:border-primary_color w-full" type="email" name="email"
                                value="{{auth()->user()->email}}" placeholder="{{ __('Email') }}" required autofocus />
                        </x-input-with-icon-wrapper>
                    </div>
                    <div class="space-y-2 w-full">
                        <x-label for="username" :value="__('اسم المستخدم')" />

                        <x-input-with-icon-wrapper>
                            <x-slot name="icon" class="border-1 border">

                                <span aria-hidden="true" class="w-5 h-5  text-primary-dark dark:text-primary-light" >@</span>



                            </x-slot>
                            <x-input withicon id="username" class="block focus:ring-primary_color focus:border-primary_color w-full"
                           value="{{auth()->user()->username}}" type="text" name="username"
                            placeholder="{{ __('Username') }}" required autofocus />
                        </x-input-with-icon-wrapper>
                    </div>

                </div>
                <div class="space-y-2 w-full">
                    <x-label for="username" :value="__('رقم الهاتف')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon" class="border-1 border">

                            <span aria-hidden="true" class="w-5 h-5  text-primary-dark dark:text-primary-light" ></span>



                        </x-slot>
                        <x-input withicon id="phone" class="block focus:ring-primary_color focus:border-primary_color w-full"
                       value="{{auth()->user()->phone}}" type="tel" name="phone"
                        placeholder="{{ __('') }}"  />
                    </x-input-with-icon-wrapper>
                </div>
                <div class="form-item w-full" dir="auto">
                    <label class="text-xl ">البايو</label>
            <textarea cols="30" rows="10"
            name="bio" maxlength="191"
             class="ckeditor w-full appearance-none dark:bg-primary-darker dark:text-light text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-primary" >
             {{auth()->user()->bio}}

                    </textarea>
                  </div>
                  <div>
                  <p>Enter your phone number:</p>
   <input id="phone2" type="tel" name="phone2" />
   <input type="submit" class="btn" value="Verify" />

</div>



                <x-button class="justify-center ">
                <span>    حفظ</span>
                </x-button>

{{--
                <div>
                  <h3 class="text-2xl font-semibold ">More About Me</h3>
                  <hr>
                </div>


                <div>
                  <h3 class="text-2xl font-semibold">My Social Media</h3>
                  <hr>
                </div>

                <div class="form-item">
                  <label class="text-xl ">Instagram</label>
                  <input type="text" value="https://instagram.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                </div>
                <div class="form-item">
                  <label class="text-xl ">Facebook</label>
                  <input type="text" value="https://facebook.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                </div>
                <div class="form-item">
                  <label class="text-xl ">Twitter</label>
                  <input type="text" value="https://twitter.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " disabled>
                </div> --}}


              </form>
            </div>
          </div>
          <div x-show="tap==2" x-data="{isshow:true}" class="col-span-12 md:border-solid md:border-l dark:bg-dark md:border-black md:border-opacity-25 h-full pb-12 lg:col-span-10">

            <div class="flex flex-col space-y-8 mx-8 mt-8 p-16">
                        <!-- Password -->
                        <div class="space-y-2" >
                          <x-label for="password" :value="__('كلمة المرور')" />
                          <x-input-with-icon-wrapper >
                              <x-slot name="icon">
                                  <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                              </x-slot>
                              <x-input withicon withrighticon id="password" class="block w-full"  x-bind:type=" isshow ? 'text' : 'password'" name="password" required
                                  autocomplete="new-password"  placeholder="{{ __('كلمة المرور') }}" />
                                  <x-slot name="righticon">
                                      <button type="button" @click="isshow=!isshow" class="z-30 ">
                                          <x-heroicon-o-eye x-show="!isshow" aria-hidden="true" class="w-5 h-5 " />
                                          <x-heroicon-o-eye-off x-show="isshow" aria-hidden="true" class="w-5 h-5 " />
                                      </button>
                                  </x-slot>

                              </x-input-with-icon-wrapper>

                              @error("password")

                          <hr class="text-danger bg-danger border-2 border-danger"/>
                          <span class="text-danger text-xs ">{{$message}}</span>
                          @enderror

                      </div>

                      <!-- Confirm Password -->
                      <div class="space-y-2">
                          <x-label for="password_confirmation" :value="__('تاكيد كلمة المرور')" />
                          <x-input-with-icon-wrapper>
                              <x-slot name="icon">
                                  <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                              </x-slot>
                              <x-input withicon id="password_confirmation" x-bind:type=" isshow ? 'text' : 'password'" class="block w-full"
                                  name="password_confirmation" required placeholder="{{ __('تاكيد كلمة المرور') }}" />
                                  <x-slot name="righticon">
                                      <button type="button" @click="isshow=!isshow" class="z-30 ">
                                          <x-heroicon-o-eye x-show="!isshow" aria-hidden="true" class="w-5 h-5 " />
                                          <x-heroicon-o-eye-off x-show="isshow" aria-hidden="true" class="w-5 h-5 " />
                                      </button>
                                  </x-slot>

                              </x-input-with-icon-wrapper>
                          @error("password_confirmation")

                          <hr class="text-danger bg-danger border-2 border-danger"/>
                          <span class="text-danger text-xs ">{{$message}}</span>
                          @enderror

                      </div>
                      <x-button type="submit">حفظ </x-button>
            </div>




                  </div>

                   </div>


        </div>


      <x-slot name="script">

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">

const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry:"ye",
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });


$(document).ready(function () {
        $('.ckeditor').ckeditor();
    });



</script>

      </x-slot>
</x-dashe-layout>
