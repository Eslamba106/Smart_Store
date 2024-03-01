@extends('layouts.navbar')


@section('content2')
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="back-links">
    		<p><a href="index.html">Home</a> >> <a href="#">Electronics</a></p>
    	    </div>
    		<div class="sort">
    		<p>Sort by:
    			<select>
    				<option>Lowest Price</option>
    				<option>Highest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>Lowest Price</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="show">
    		<p>Show:
    			<select>
    				<option>4</option>
    				<option>8</option>
    				<option>12</option>
    				<option>16</option>
    				<option>20</option>
    				<option>In Stock</option>  				   				
    			</select>
    		</p>
    		</div>
    		<div class="page-no">
    			<p>Result Pages:<ul>
    				<li><a href="#">1</a></li>
    				<li class="active"><a href="#">2</a></li>
    				<li><a href="#">3</a></li>
    				<li>[<a href="#"> Next>>></a >]</li>
    				</ul></p>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="/product_image/{{ $item->image }}" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2>{{ $item->name }}</h2>
					<p>{{ $item->description }}</p>					
					<div class="price">
						<p>Price: <span>{{ $item->price }}</span></p>
						<p>Discount Price: <span>{{ $item->discount_price }}</span></p>
						<p>Brand: <span>{{ $item->brand->name }}</span></p>
						<p>Department: <span>{{ $item->category->name }}</span></p>
					</div>

					<div class="share">
						<p>Share Product :</p>
						<ul>
					    	<li><a href="#"><img src="{{ asset('images/youtube.png') }}" alt=""></a></li>
					    	<li><a href="#"><img src="{{ asset('images/facebook.png') }}" alt=""></a></li>
					    	<li><a href="#"><img src="{{ asset('images/twitter.png') }}" alt=""></a></li>
					    	<li><a href="#"><img src="{{ asset('images/linkedin.png') }}" alt=""></a></li>
			    		</ul>
					</div>
				<div class="add-cart">
					<div class="rating">
						<p>Rating:<img src="{{  asset('images/rating.png')}}" alt="" /><span>[3 of 5 Stars]</span></p>
					</div>
					<br><br><br>
					
					<div class="button"><span ><a style="margin: 1px ; padding:10px" href="{{ route('cart.creates' , $item->id) }}">Add to Cart</a></span></div>
					@if (auth()->user()->type == 'admin')
						<div class="button"><span ><a style="margin: 1px ; padding:10px" href="{{ route('products.edit' , $item->id) }}">Edit</a></span></div>
						<div class="button"><span ><a style="margin: 1px ; padding:10px" href="{{ route('products.delete' , $item->id) }}" onclick="conf(event)">Delete</a></div>
					@endif
			@if(Session::has('message'))
                <script>
                    swal("Message" , "{{ Session::get('message') }}" , 'success' , {
                        button: true ,
                        button:"ok",
                        timer:3000,
                        dangerMode: true
                    })
                </script>
            @endif
							{{-- @endif --}}
					<div class="clear"></div>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>
	    <div class="product-tags">
			<h2>Product Tags</h2>
			<h4>Add Your Tags:</h4>
			<div class="input-box">
				<input type="text" value="" />
			</div>
			<div class="button"><span><a href="#">Add Tags</a></span></div>
	    </div>				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>Department</h2>
					<ul>
						@foreach ($categories as $item)
						<li><a href="#">{{ $item->name }}</a></li>
						@endforeach
    				</ul>
    				<div class="subscribe">
    					<h2>Newsletters Signup</h2>
    						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
						    <div class="signup">
							    <form>
							    	<input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';"><input type="submit" value="Sign up">
							    </form>
						    </div>
      				</div>
      				 <div class="community-poll">
      				 	<h2>Community POll</h2>
      				 	<p>What is the main reason for you to purchase products online?</p>
      				 	<div class="poll">
      				 		<form>
      				 			<ul>
									<li>
									<input type="radio" name="vote" class="radio" value="1">
									<span class="label"><label>More convenient shipping and delivery </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="2">
									<span class="label"><label for="vote_2">Lower price</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="3">
									<span class="label"><label for="vote_3">Bigger choice</label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio"  value="5">
									<span class="label"><label for="vote_5">Payments security </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="6">
									<span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
									</li>
									<li>
									<input type="radio" name="vote" class="radio" value="7">
									<span class="label"><label for="vote_7">Other.</label></span>
									</li>
									</ul>
      				 		</form>
      				 	</div>
      				 </div>
 				</div>
 		</div>
 	</div>
	</div>

@endsection