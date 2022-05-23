<x-dashe-layout>
    <div class="max-w-4xl md:m-8 mx-auto bg-white dark:bg-primary-dark">

        <div class="px-3 py-2">

            <div class="flex">
            <div class="flex flex-col p-4 border-dark dark:border-light border-2 rounded-xl  gap-1 ">
                <a class="block  bg-center bg-no-repeat bg-cover w-20 h-20 rounded-full border border-gray-400 shadow-lg" href="" style="background-image: url('{{$user->avatar}}')"></a>
                <p class="font-serif font-semibold ">{{$user->name}}</p>
               <a href="{{'@'.$user->username}}"> <span class="text-sm  font-bold text-blue-800">{{'@'.$user->username}}</span></a>
                <span class="text-sm text-gray-800 dark:text-light font-bold">{{$user->email}}</span>

            </div>
            <div class="flex flex-col p-4 border-dark dark:border-light border-2 rounded-xl  gap-1 ">
                <a class="block  bg-center bg-no-repeat bg-cover w-20 h-20 rounded-full border border-gray-400 shadow-lg" href="" style="background-image: url('{{$user->avatar}}')"></a>
                <p class="font-serif font-semibold ">{{$user->name}}</p>
               <a href="{{'@'.$user->username}}"> <span class="text-sm  font-bold text-blue-800">{{'@'.$user->username}}</span></a>
                <span class="text-sm text-gray-800 dark:text-light font-bold">{{$user->email}}</span>

            </div>
        </div>
            <div class="p-8">
                <p>
                    @php
                        echo $user->bio;
                    @endphp
                </p>
            </div>


            <div class="flex justify-center items-center gap-2 my-3">
                <div class="font-semibold text-center mx-4">
                    <p class="text-black">{{$user->products()->count()+$user->services()->count()}}</p>
                    <span class="text-gray-400">العروض</span>
                </div>

                <div class="font-semibold text-center mx-4">
                    <p class="text-black">{{$user->following(App\Models\Bussinse::class)->count()}}</p>
                    <span class="text-gray-400">اتابعهم</span>
                </div>
            </div>



            <div class="flex justify-center gap-2 my-5">
                <a href="{{route("profile.create")}}" ><button class="bg-primary px-10 py-2 rounded-full text-white shadow-lg">تعديل البيانات</button></a>
                <button class="bg-white border border-gray-500 px-10 py-2 rounded-full shadow-lg">Message</button>
            </div>



            <div x-data="{selectedbus:'ps'}">

            <div class="flex justify-between items-center">
                <button @click="selectedbus='ps'" :class="{'border-b-2 border-primary':selectedbus=='ps'}" class="w-full py-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                      </svg>
                      العروض
                </button>
                <button class="w-full py-2" :class="{'border-b-2 border-primary':selectedbus=='bus'}" @click="selectedbus='bus'">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                      </svg>
                    الحسابات التسويقية لهذا المستخدم
                </button>
            </div>


            <div  x-show="selectedbus=='ps'">

                <div x-data="{selected:'pro'}">
            <div class="flex justify-between w-1/2 items-center">
                <button @click="selected='pro'" :class="{'border-b-2 border-primary':selected=='pro'}" class="w-full py-2 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                      </svg>
                      المنتجات
                </button>
                <button @click="selected='serv'" :class="{'border-b-2 border-primary':selected=='serv'}" class="w-full py-2">
                    <svg xmlns="http://www.w3.org/2000/svg"  class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                      </svg>
                      الخدمات
                </button>
            </div>
            {{-- <div class="bg-darker h-full w-full right-0 opacity-10 mx-auto absolute z-30 top-16 ">

                <div class="absolute mx-auto z-50 opacity-100 bg-white h-80 w-80 ">

                    ksdc sdck
                </div>
            </div> --}}
               <div class="">

                <div x-show="selected=='pro'" >
                {{-- <template x-for="(product,index) in products">
                   <div class="relative">
                   <a class="block bg-center bg-no-repeat bg-cover h-40 w-full rounded-lg" href="" :style="'background-image:url('+product.img+')'" ></a>
                <span class="bg-primary rounded-xl font-bold text-xl absolute left-0 bottom-0 text-dark px-2" x-text="product.price+'/ر.ي'"><span x-text="'/ry'" class="text-xs">/ر.ي</span></span>
                </div>
                </template> --}}
                @livewire('show.products-serveces', ['username' => $user->username], key($user->id."okkkk"))

            </div>
                <div x-show="selected=='serv'">
                    @livewire('show.products-serveces', ['username' => $user->username,$proORserv='serv'], key($user->id))


                </div>

               </div>
            </div>
        </div>
        <div class="min-h-full" x-show="selectedbus=='bus'">
            <div class="grid grid-cols-1 gap-2 my-3">
                @foreach ($user->bussinses as $buss)
                    <div class="flex bg-white rounded-md w-full m-4">
                        <span>{{$buss->name}}</span>
                        <span>{{$buss->username}}</span>


                    </div>
                @endforeach
            </div>


        </div>
    </div>




        </div>


    </div>

      <x-slot name="script">

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">

// const phoneInputField = document.querySelector("#phone");
//    const phoneInput = window.intlTelInput(phoneInputField, {
//      utilsScript:
//        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
//    });

// $(document).ready(function () {
//         $('.ckeditor').ckeditor();
//     });



</script>

      </x-slot>
</x-dashe-layout>
