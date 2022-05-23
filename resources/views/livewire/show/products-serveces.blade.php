<div >
    {{$products->links()}}
<div class="grid grid-cols-3 gap-2 my-3">


    @foreach ($products as $product)

    <div class="relative rounded-md border-primary border">
        <a class="block bg-center bg-no-repeat bg-cover h-40 w-full rounded-lg" href="{{route('products.show',['product'=>$product->id])}}"
        style="background-image:url('{{$product->img}}')" ></a>
        <span class="bg-primary rounded-xl font-bold text-xl absolute left-0 bottom-0 text-dark px-2" >{{$product->price}}<span class="text-xs">/ر.ي</span></span>
        <span class="bg-primary rounded-xl font-bold text-xl absolute right-0 bottom-0 text-dark px-2" >{{$product->name}}</span>

        @if ($proORserv=="pro")

        <span style="background-color:  @foreach ($product->colors as $key => $v)
        {{$v}}
        @php
            break;
        @endphp
        @endforeach"  class=" rounded-xl font-bold text-xl absolute top-0 right-0 h-2  text-dark px-2" ></span>

        @endif

    </div>

    @endforeach


</div>
</div>
