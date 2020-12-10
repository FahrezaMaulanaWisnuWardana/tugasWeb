<?php 
  $title = "Cart";
  include"../../config/database.php";
  include"../../templates/header.php";
 ?>
</head>
<body>
    <?php 
      include"../../partials/navbar.php"; 
    ?>

    <div class="container my-5">
      <div class="row" id="cart-list">
      </div>
      <div class="row">
      	<div class="col-lg-12">
      		<h5>Jumlah :<span id="jml"></span> </h5>
      	</div>
      </div>
    </div>
</div>
    <?php include"../../partials/footer.php"; ?>
  </body>
    <?php include"../../templates/footer.php"; ?>
    <script type="text/javascript">
    	$(document).ready(function(){
    		// Cart
    		let cart =localStorage.getItem('id') ? JSON.parse(localStorage.getItem('id')) : []
		    function countValues(array, countItem) {
		      count = 0;
		      array.forEach(itm => {
		        if (itm == countItem) count++;
		      });
		      return `${count}`;
		    }
    		let unique = cart.filter((v,i,a)=>a.indexOf(v)===i)
		      let link ="<?=$_ENV['base_url']?>cms-dashboard/api/produk-cart"
  		    $.ajax({
  		      url : link,
  		      method:"POST",
  		      data:{
  		        aksi:'all-produk',
  		      },
  		      dataType:'json',
  		      success:function(data){
  		        for (var i = 0; i < data.length; i++) {
  		          if (unique.includes(data[i].id)) {
      					var	number_string = data[i].harga.toString(),
      						sisa 	= number_string.length % 3,
      						rupiah 	= number_string.substr(0, sisa),
      						ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
      							
      					if (ribuan) {
      						separator = sisa ? '.' : '';
      						rupiah += separator + ribuan.join('.');
      					}
            			var html = '<div class="col-3 my-1">'+
          			'<div class="card overflow-hidden">'+
            			'<div class="text-center">'+
              		'<img src="<?=$_ENV['base_url']?>assets/image/produk/'+data[i].id_peternak+'/'+data[i].img+'" class="card-img-top" style="width:200px;">'+
            			'</div>'+
            			'<div class="card-body">'+
              		'<small class="card-text"><span class="badge badge-secondary">'+data[i].jenis+'</span></small>'+
              		'<h5 class="card-title">'+ data[i].nama+'</h5>'+
              		'<div class="d-flex justify-content-between">'+
              			'<h6 class="card-title">Jumlah : <span class="jml">'+ countValues(cart, data[i].id) +'</span></h6>'+
                		'<div>'+
    	            		'<button type="button" class="btn btn-primary mr-1 btn-minus" style="padding: .25rem .5rem;font-size: .875rem;line-height: 1.5;border-radius: .2rem;"><i class="fas fa-minus"></i></button>'+
    	            		'<button type="button" class="btn btn-primary btn-plus" style="padding: .25rem .5rem;font-size: .875rem;line-height: 1.5;border-radius: .2rem;"><i class="fas fa-plus"></i></button>'+
                		'</div>'+
              		'</div>'+
                		'<span class="text-primary font-weight-bold d-inline">Rp.<span class="hrg">'+data[i].harga+'</span></span>'+
                		'<div class="rating">'+
                		'<div class="text-secondary">4'+'/5 (200)</div>'+
                		'</div>'+
              		'</div>'+
            			'</div>'+
          			'</div>'+
        				'</div>'
  		            $("#cart-list").append(html)
  		          }
  		        }
              let sum=0;
              $(".hrg").each(function(){
                sum += parseFloat($(this).text())

                var number_string = sum.toString(),
                  sisa  = number_string.length % 3,
                  rupiah  = number_string.substr(0, sisa),
                  ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                    
                if (ribuan) {
                  separator = sisa ? '.' : '';
                  rupiah += separator + ribuan.join('.');
                }
                $("#jml").text('Rp.'+rupiah)
              })
  		      }
  		    });
		  // End Cart
		  $(document).on('click','.btn-minus',function(){
          let valNow= parseInt($(this).closest('.d-flex').find('.jml').text())
          $(this).closest('.d-flex').find('.jml').text(valNow-1)
          if (valNow<1) {
            $("#jml").text('Rp.'+rupiah)
          }
		  })
		  $(document).on('click','.btn-plus',function(){
          let valNow= parseInt($(this).closest('.d-flex').find('.jml').text())
          $(this).closest('.d-flex').find('.jml').text(valNow+1)
		  })
    	});
    </script>
</html>