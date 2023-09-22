<!DOCTYPE HTML>
<head>
<title>Free Smart Store Website Template | Home :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{ asset('css/menu.css') }}" rel="stylesheet" type="text/css" media="all"/>
{{-- <link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/jquery-1.7.2.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('js/nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nav-hover.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/dropify.css') }}">
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
    <div class="wrap">
      <div class="header">
          <div class="header_top">
              <div class="logo">
                  <a href="/"><img src="images/logo.png" alt="" /></a>
              </div>
                <div class="header_top_right">
                  <div class="search_box">
                      <form>
                          <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
                      </form>
                  </div>
                  <div class="shopping_cart">
                      <div class="cart">
                          <a href="#" title="View my shopping cart" rel="nofollow">
                              <strong class="opencart"> </strong>
                                  <span class="cart_title">Cart</span>
                                      <span class="no_product">(empty)</span>
                              </a>
                          </div>
                    </div>
          <div class="languages" title="language">
              <div id="language" class="wrapper-dropdown" tabindex="1">EN
                          <strong class="opencart"> </strong>
                          <ul class="dropdown languges">					
                               <li>
                                   <a href="#" title="Français">
                                      <span><img src="images/gb.png" alt="en" width="26" height="26"></span><span class="lang">English</span>
                                  </a>
                               </li>
                                  <li>
                                      <a href="#" title="Français">
                                          <span><img src="images/au.png" alt="fr" width="26" height="26"></span><span class="lang">Français</span>
                                      </a>
                                  </li>
                          <li>
                              <a href="#" title="Español">
                                  <span><img src="images/bm.png" alt="es" width="26" height="26"></span><span class="lang">Español</span>
                              </a>
                          </li>
                                  <li>
                                      <a href="#" title="Deutsch">
                                          <span><img src="images/ck.png" alt="de" width="26" height="26"></span><span class="lang">Deutsch</span>
                                      </a>
                                  </li>
                          <li>
                              <a href="$" title="Russian">
                                  <span><img src="images/cu.png" alt="ru" width="26" height="26"></span><span class="lang">Russian</span>
                              </a>
                          </li>					
                     </ul>
               </div>
               <script type="text/javascript">
              function DropDown(el) {
                  this.dd = el;
                  this.initEvents();
              }
              DropDown.prototype = {
                  initEvents : function() {
                      var obj = this;
  
                      obj.dd.on('click', function(event){
                          $(this).toggleClass('active');
                          event.stopPropagation();
                      });	
                  }
              }
  
              $(function() {
  
                  var dd = new DropDown( $('#language') );
  
                  $(document).click(function() {
                      // all dropdowns
                      $('.wrapper-dropdown').removeClass('active');
                  });
  
              });
  
          </script>
           </div>
              <div class="currency" title="currency">
                      <div id="currency" class="wrapper-dropdown" tabindex="1">$
                          <strong class="opencart"> </strong>
                          <ul class="dropdown">
                              <li><a href="#"><span>$</span>Dollar</a></li>
                              <li><a href="#"><span>€</span>Euro</a></li>
                          </ul>
                      </div>
                       <script type="text/javascript">
              function DropDown(el) {
                  this.dd = el;
                  this.initEvents();
              }
              DropDown.prototype = {
                  initEvents : function() {
                      var obj = this;
  
                      obj.dd.on('click', function(event){
                          $(this).toggleClass('active');
                          event.stopPropagation();
                      });	
                  }
              }
  
              $(function() {
  
                  var dd = new DropDown( $('#currency') );
  
                  $(document).click(function() {
                      // all dropdowns
                      $('.wrapper-dropdown').removeClass('active');
                  });
  
              });
  
          </script>
     </div>
             <div class="login">
                    <span><a href="login.html"><img src="images/login.png" alt="" title="login"/></a></span>
             </div>
           <div class="clear"></div>
       </div>
       <div class="clear"></div>
   </div>
      <div class="menu">
        <ul id="dc_mega-menu-orange" class="dc_mm-orange">
           <li><a href="/">Home</a></li>
              <li>
                <a href="{{ route('products.index') }}">Products</a>
                    <ul>
                      @foreach ($maincategories as $category)
                            <li><a href="products.html">{{ $category->name }}</a>
                             <ul>
                               @foreach ( $category->product as $item) 
                               <li><a href="">{{ $item->name }}</a></li>
                               @endforeach
                             </ul>
                            </li>
                      @endforeach
                    </ul>
              </li>

              <li><a href="{{ route('brand.index') }}">Top Brands</a>
                <ul> 
                    @foreach ($mainbrands as $brand)
                    <li><a href="products.html">{{ $brand->name }}</a></li>
                    @endforeach
                </ul> 
              </li>
    <li><a href="{{ route('category.index') }}">Department</a>
      <ul>
        @foreach ($maincategories as $item)
        <li><a href="#">{{ $item->name }}</a></li>
        @endforeach
      </ul>
    </li> 
  </li>
    <li><a href="about.html">About</a></li>
     <li><a href="#">Delivery</a></li>
    <li><a href="faq.html">FAQS</a></li>
    <li><a href="contact.html">Contact</a> </li>
    <li><a href="{{ route('admin') }}">Admin</a> </li>
    <div class="clear"></div>
  </ul>
  </div>


  @yield('content')

  @include('layouts.footer')


  <script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
         };
        */
        
        $().UItoTop({ easingType: 'easeOutQuart' });
        
    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
                          <script defer src="js/jquery.flexslider.js"></script>
                          <script type="text/javascript">
                            $(function(){
                              SyntaxHighlighter.all();
                            });
                            $(window).load(function(){
                              $('.flexslider').flexslider({
                                animation: "slide",
                                start: function(slider){
                                  $('body').removeClass('loading');
                                }
                              });
                            });
</script>
<script src="{{ asset('js/dropify.js') }}"></script>
<script src="{{ asset('js/dropify.min.js') }}"></script>
<script>$('.dropify').dropify();</script>
</body>
</html>