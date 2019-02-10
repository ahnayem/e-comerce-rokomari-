
<!-- /.body -->
<!-- Le javascript ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/plugins2.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/tabb.js"></script>
<script src="assets/js/camera.min.js"></script>

<!-- CALL CAMERA SLIDER -->
<script type="text/javascript" src="assets/js/menuzord.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
		jQuery("#menuzord").menuzord({
			align: "left"
		});
	});
</script>

<script>
	jQuery(function(){
		jQuery('#camera_wrap_4').camera({
				height: '400px',
				loader: 'bar',
				pagination: false,
				thumbnails: true
		});

		jQuery('#camera_wrap_2').camera({
			height: '400px',
			loader: 'bar',
			pagination: false,
			thumbnails: false
		});
	});
</script>
<!-- CALL FEATURED WORK -->
<script type="text/javascript">
$(window).load(function(){			
			$('#recent-projects').carouFredSel({
				responsive: true,
				width: '100%',
				auto: true,
				circular	: true,
				infinite	: false,
				prev : {
					button		: "#car_prev",
					key			: "left",
						},
				next : {
					button		: "#car_next",
					key			: "right",
							},
				swipe: {
					onMouse: true,
					onTouch: true
					},
				scroll : 1500,
				items: {
					visible: {
						min: 1,
						max: 1
					}
				}
			});
		});	
</script>
<!-- CALL ACCORDION -->
<script type="text/javascript">
	$(".accordion h3").eq(0).addClass("active");
	$(".accordion .accord_cont").eq(0).show();
	$(".accordion h3").click(function(){
		$(this).next(".accord_cont").slideToggle("slow")
		.siblings(".accord_cont:visible").slideUp("slow");
		$(this).toggleClass("active");
		$(this).siblings("h3").removeClass("active");
	});	
</script>
<!-- Call opacity on hover images from recent news-->
<script type="text/javascript">
$(document).ready(function(){
    $("img.imgOpa").hover(function() {
      $(this).stop().animate({opacity: "0.6"}, 'slow');
    },
    function() {
      $(this).stop().animate({opacity: "1.0"}, 'slow');
    });
  });
</script>

<script>
	$(window).load(function(e) {
		$("#bn3").breakingNews({
			effect		:"slide-v",
			autoplay	:true,
			timer		:3000,
			color		:"turquoise",
			border		:true
		});
    });
 </script>

 <script type="text/javascript">
    $(function () {
        $("#demo3").bootstrapNews({
            newsPerPage: 3,
            autoplay: false,
            autoplay: true,
			pauseOnHover:true,
            direction: 'up',
			navigation: false,
            onToDo: function () {
                //console.log(this);
            }
        });
    });
</script>

    <script src="assets/js/jquery.newsTicker.js"></script>
    <script>
		var nt_example2 = $('#nt-example2').newsTicker({
			row_height: 70,
			max_rows: 3,
			duration: 4000,
			prevButton: $('#nt-example2-prev'),
			nextButton: $('#nt-example2-next')
		});

		var nt_example1 = $('#nt-example1').newsTicker({
			row_height:80,
			max_rows: 4,
			duration: 5000
		});

		var nt_example1 = $('#nt-example3').newsTicker({
			row_height:75,
			max_rows: 2,
			duration: 5000
		});
	</script>