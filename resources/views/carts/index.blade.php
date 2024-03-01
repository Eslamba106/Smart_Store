@extends('layouts.navbar')

@section('content2')
<div class="section group">
    @foreach ($carts  as $item)
    @if (auth()->user()->id == $item->user_id)

            <div class="grid_1_of_4 images_1_of_4">
                <div >
                </div>
                <h2>{{ $item->name }} </h2>
                <h2>{{ $item->id }} </h2>
                <a href="" ><img style="width:150px" src="/product_image/{{ $item->image }}" alt="" /></a>

                <p>Price: ${{ $item->price }}</p>
                <p>Discount Price : ${{ $item->discount_price }}</p>
                <p>Quantity : {{ $item->quantity }}</p>

                <div class="button"><span><a href="{{ route('products.show' , $item->id) }}" class="details">Details</a></span></div>
                <div class="button"><span><a href="{{ route('cartitems.delete' , $item->id) }}" class="details" onclick="conf(event)">Delete</a></span>                
                    <script type="text/javascript">
                        function conf(ev){
                            ev.preventDefault();
                            let urlToRedirect = ev.currentTarget.getAttribute('href');
                            console.log(urlToRedirect);
                            swal({
                                title:"Are you sure to delete this ? ",
                                text: "You won't be able to revert this delete",
                                icon: "warning",
                                buttons:true,
                                dangerMode:true,
                            })
                            .then((willCancel)=>
                            {
                                if(willCancel){
                                    window.location.href = urlToRedirect;
                                }
                            });
                        }
                    </script>
                </div>
                {{-- @if(Session::has('message'))
                <script>
                    swal("Message" , "{{ Session::get('message') }}" , 'success' , {
                        button: true ,
                        button:"ok",
                        timer:3000,
                        dangerMode: true
                    })
                </script>
            @endif --}}
            </div>
        @endif
            @endforeach
</div>

	<script type="text/javascript">
		function conf(ev){
			ev.preventDefault();
			let urlToRedirect = 
		}
	</script>
@endsection