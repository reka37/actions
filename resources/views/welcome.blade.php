<!DOCTYPE HTML>
<html>
	<head>
		<title>Fair Value</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="{{ asset('public/css/main.css')}}" />
		<link rel="icon" href="{{ asset('public/favicon.ico')}}" type="image/x-icon">
		<script src="https://cdn.jsdelivr.net/npm/socket.io-client@2/dist/socket.io.js"></script>
		<script
		  src="https://code.jquery.com/jquery-3.5.1.js"
		  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
		  crossorigin="anonymous"></script>
		</head>
		<body class="is-preload">
			<div id="wrapper">		
					<header id="header">
						<h1><a href="/">Fair Value</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#"></a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Посик</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Поиск" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Меню</a>
								</li>
							</ul>
						</nav>
					</header>
					<section id="menu">				
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3></h3>
											<p></p>
										</a>
									</li>
							
								</ul>
							</section>
							<section>
								<!--
								<ul class="actions stacked">
									<li><a href="#" class="button large fit">Log In</a></li>
								</ul>
								-->
							</section>
					</section>
				<div id="main">		
			   	   @foreach ($posts as $post)
							<article class="post" id="go{{ $post->id }}">
								<header>
									<div class="meta">
										<time class="published" datetime="2015-11-01">{{ $post->created_at }}</time>
										<a href="#" class="author"><span class="name">Администратор</span><img src="/public/image/photo3.jpg" alt="" /></a>
									</div>
								</header>
								
								<p style="width:200px">{!! $post->data !!}</p>
								<footer>
									<ul class="actions">
										<li><a href="<?=url("/livecomments/$post->id")?>" class="button large">Оставить комментарий</a></li>
									</ul>
									<ul class="stats">
										<li><a href="#">Администратор</a></li>
										<li><a href="#" class="icon solid fa-heart">28</a></li>
										<li><a href="#" class="icon solid fa-comment">128</a></li>
									</ul>
								</footer>
							</article>
						@endforeach
					</div>
					<section id="sidebar">
							<section id="intro">
								<a href="#" class="logo"><img src="images/logo.jpg" alt="" /></a>
								<header>
									<h2>Fair Value</h2>
									<p></p>
								</header>
							</section>
							<section>
								<div class="mini-posts">
									@foreach ($posts as $post)
										<article class="mini-post">
											<header>
												<a href="#go{{ $post->id }}">
												<time class="published" datetime="2015-10-20">{{ $post->created_at }}</time>
												<a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
												</a>
											</header>
											<a href="single.html" class="image"><img src="images/pic04.jpg" alt="" /></a>
										</article>
									@endforeach
								</div>
							</section>

						<!-- 
							<section>
								<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="single.html">Lorem ipsum fermentum ut nisl vitae</a></h3>
												<time class="published" datetime="2015-10-20">October 20, 2015</time>
											</header>
											<a href="single.html" class="image"><img src="images/pic08.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="single.html">Convallis maximus nisl mattis nunc id lorem</a></h3>
												<time class="published" datetime="2015-10-15">October 15, 2015</time>
											</header>
											<a href="single.html" class="image"><img src="images/pic09.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="single.html">Euismod amet placerat vivamus porttitor</a></h3>
												<time class="published" datetime="2015-10-10">October 10, 2015</time>
											</header>
											<a href="single.html" class="image"><img src="images/pic10.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="single.html">Magna enim accumsan tortor cursus ultricies</a></h3>
												<time class="published" datetime="2015-10-08">October 8, 2015</time>
											</header>
											<a href="single.html" class="image"><img src="images/pic11.jpg" alt="" /></a>
										</article>
									</li>
									<li>
										<article>
											<header>
												<h3><a href="single.html">Congue ullam corper lorem ipsum dolor</a></h3>
												<time class="published" datetime="2015-10-06">October 7, 2015</time>
											</header>
											<a href="single.html" class="image"><img src="images/pic12.jpg" alt="" /></a>
										</article>
									</li>
								</ul>
							</section>

						<!-- 
							<section class="blurb">
								<h2>About</h2>
								<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
								<ul class="actions">
									<li><a href="#" class="button">Learn More</a></li>
								</ul>
							</section>

						 -->
							<section id="footer">
								<ul class="icons">
									<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
									<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
								</ul>
								<p class="copyright">Fair Value</p>
							</section>

					</section>

			</div>

		<!-- Scripts -->
	   <script src="https://cdn.jsdelivr.net/npm/socket.io-client@2/dist/socket.io.js"></script>
           <script>
/*
               var socket = io(':6050');
      
              
              function appendChat(data){
                  var now = new Date();
$('.chat').append(
    $('<li></li>').text(data.name  + ' - ' +data.message + ' - ' + now.getHours() + ':' +now.getMinutes(),)
 
); 
              }
              
              $('form').on('submit', function(){
                  var text = $('textarea').val(),
                  name= $('input').val(),
                  msg = { message:text, name:name};
                  
                  socket.send(msg);
                  appendChat(msg);
                   $('textarea').val('');
                  return false;
              });
              
              socket.on("message", function(data){
                     appendChat(data);
              });
     */
      var socket = io(':6050'),
				channel = 'chat:message';
               // /*
               // socket.on('message', function(data){
                   // console.log('Messagae', data);
               // }).on('news', function(data){
                   // console.log(data);
               // });
              // */

			  socket.on('connect', function(){
				  socket.emit('subscribe', channel);
			  });
			  
			  socket.on('error', function(error){
				  console.warn('Error', error);
			  });
			  
			   socket.on('message', function(message){
                   console.info(message);
               });
			  
			  
              function appendChat(data){
                 
				//  console.log(data);
				id = $('#autor').val();
				if (data.autor == id) {
					$('.chat').append(
    $('<li></li>').text(data.autor  + ' - ' +data.content )
 
); 
				}

              }
			  
         
 
			  
/*
                     $('form').on('submit', function(){
                  var content = $('textarea').val(),
                  autor= $('input').val(),
                  msg = { content:content, autor:autor};
                  
                  socket.send(msg);
                  appendChat(msg);
                   $('textarea').val('');
                  return false;
              }); 
*/

	var t =  function (){
				
 
        var content = $("#content").val();
        var autor = $("#autor").val();
   var _token   = $('meta[name="csrf-token"]').attr('content');
     
           
				   
				   
				   
 $.ajax({
              type:'POST',
              url:'/chat/message',
         data:{_token: _token, autor:autor, content:content},
              success:function(data){

//console.log(data);
				
              }
           });
		   
		//   return false;
	  };




			  
              // $('form').on('submit', function(){
				  // /*
                  // var text = $('textarea').val(),
                  // name= $('input').val(),
                  // msg = { message:text, name:name};
                  
                  // socket.send(msg);
                  // appendChat(msg);
                   // $('textarea').val('');
				   // */
				   // // $.ajax({
					   // // 'url' : '',
					   
				   // // });
                  // // return false;
              // });
              
               socket.on("chat:message", function(data){
                      appendChat(data);
				//  console.log(data);
               });
              	 
              
              
           </script>
			
			
	<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/js/browser.min.js')}}"></script>
<script src="{{ asset('public/js/breakpoints.min.js')}}"></script>
<script src="{{ asset('public/js/util.js')}}"></script>	
<script src="{{ asset('public/js/main.js')}}"></script>
	</body>
</html>





