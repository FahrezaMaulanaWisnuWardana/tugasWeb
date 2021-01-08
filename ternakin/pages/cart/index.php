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
      <div class="row" id="cart-list"></div>
      <div class="row">
        <div class="col-lg-12" id="total-harganya">
          <h5>Jumlah : <span id="jml"></span></h5>
        </div>
        <div class="col-lg-12" id="btn-process">
          <?php 
              if (isset($_SESSION['user']['id'])) {
                ?>
                <button class="btn btn-success form-control text-uppercase" id="bayar">Buat pesanan</button>
                <?php   
              }else{
                ?>
                <a href="<?=$_ENV['base_url']?>/login" class="btn btn-secondary form-control text-uppercase">Silahkan login untuk melakukan pemesanan</a>
                <?php
              }
           ?>
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
        let peternak =localStorage.getItem('peternak') ? JSON.parse(localStorage.getItem('peternak')) : []
        let total = localStorage.getItem('total')
        if (cart.length<1) {
          $("#btn-process").remove()
          $("#total-harganya").remove()
          $("#cart-list").addClass('text-center')
          $("#cart-list").html('<h1 class="my-5 mx-auto text-secondary">Keranjang Kosong... <p>Yuk Belanja :)</p></h1>')
        }else{
          $("#cart-list").removeClass('text-center')
        }

        function rupiah(harga){
            var number_string = harga.toString(),
              sisa  = number_string.length % 3,
              rupiah  = number_string.substr(0, sisa),
              ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                
            if (ribuan) {
              separator = sisa ? '.' : '';
              return rupiah += separator + ribuan.join('.');
            }else{
              return rupiah =""
            }
        }
        function countValues(array, countItem) {
          count = 0;
          array.forEach(itm => {
            if (itm == countItem) count++;
          });
          return `${count}`;
        }
        let unique = cart.filter((v,i,a)=>a.indexOf(v)===i)
        var counts = {};

        for (var i = 0; i < peternak.length; i++) {
          var num = cart[i];
          counts[num] = counts[num] ? counts[num] + 1 : 1;
        }

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
                      var html = `<div class="col-3 my-1 produk-hewan">
                      <div class="card overflow-hidden">
                        <button class="rounded-circle btn btn-danger position-absolute btn-cancel" data-peternak="${data[i].id_peternak}" data-harga="${data[i].harga * countValues(cart, data[i].id)}" data-id="${data[i].id}" data-totalcart="${countValues(cart, data[i].id)}" style="width:40px; height:40px; top:-20px; right:-20px;"><i class="fas fa-times"></i></button>
                        <div class="text-center">
                        <img src="<?=$_ENV['base_url']?>assets/image/produk/${data[i].id_peternak}/${data[i].img}" class="card-img-top" style="width:200px;">
                        </div>
                        <div class="card-body">
                        <small class="card-text"><span class="badge badge-secondary">${data[i].jenis}</span></small>
                        <h5 class="card-title">${data[i].nama}</h5>
                        <div class="d-flex justify-content-between">
                        <h6 class="card-title">Jumlah : <span class="jml"> ${countValues(cart, data[i].id)}</span></h6>
                          <div>
                            <button type="button" class="btn btn-primary mr-1 btn-minus" data-totalcart="${countValues(cart, data[i].id)}" data-id="${data[i].id}" data-harga="${data[i].harga}" style="padding: .25rem .5rem;font-size: .875rem;line-height: 1.5;border-radius: .2rem;"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-primary btn-plus" data-id="${data[i].id}"  data-harga="${data[i].harga}" style="padding: .25rem .5rem;font-size: .875rem;line-height: 1.5;border-radius: .2rem;"><i class="fas fa-plus"></i></button>
                          </div>
                       </div>
                          <span class="text-primary font-weight-bold d-inline">Rp.<span class="hrg">${rupiah(data[i].harga * countValues(cart, data[i].id))}</span></span>
                        </div>
                        </div>
                      </div>
                      </div>`
                    $("#cart-list").append(html)
                  }
                  $("#jml").text('Rp.'+rupiah(total))
              }
            }
          });
        
      // End Cart
        $(document).on('click','.btn-cancel',function(){
          for (var i = 0; i < cart.length; i++) {
            if (cart[i] === $(this).data("id")){
                cart.splice(i,$(this).data("totalcart"))
                localStorage.setItem('id',JSON.stringify(cart))

            }
          }
          for (var a = 0; a < peternak.length; a++) {
            if (peternak[a]=== $(this).data("peternak")){
              peternak.splice(a,$(this).data("totalcart"))
              localStorage.setItem('peternak',JSON.stringify(peternak))
            }
          }
          kurangCart($(this).data('id'),$(this).data('harga'))
          location.reload()
        })
        $(document).on('click','.btn-minus',function(){
            let valNow= parseInt($(this).closest('.d-flex').find('.jml').text())
            $(this).closest('.d-flex').find('.jml').text(valNow-1)

            kurangCart($(this).data('id'),$(this).data('harga'))

            $(".count-cart").text(cart.length)
            location.reload()
        })
        $(document).on('click','.btn-plus',function(){
            let valNow= parseInt($(this).closest('.d-flex').find('.jml').text())
            $(this).closest('.d-flex').find('.jml').text(valNow+1)

            tambahCart($(this).data('id'),$(this).data('harga'))

            $(".count-cart").text(cart.length)
            location.reload()
        })

        function tambahCart(id,harga){
          let total = localStorage.getItem('total')
          if (total != null) {
            total = parseInt(total)
            localStorage.setItem('total',total + harga)
          }else{
            localStorage.setItem('total',harga)
          }
          cart.push(id)
          localStorage.setItem('id',JSON.stringify(cart))
        }

        function kurangCart(id,harga){
            i = cart.indexOf(id);
            if(i >= 0) {
               let kurang = cart.splice(i,1);
               localStorage.setItem('id',JSON.stringify(cart))
            }
            let total = localStorage.getItem('total')
            if (total != null) {
              total = parseInt(total)
              localStorage.setItem('total',total - harga)
            }else{
              localStorage.setItem('total',harga)
            }
        }
        function kurangPeternak(id){
            i = peternak.indexOf(id);
            if(i >= 0) {
               let kurang = peternak.splice(i,1);
               localStorage.setItem('peternak',JSON.stringify(peternak))
            }
        }

        $("#bayar").click(function(){
          $.ajax({
            url : link,
            method:"POST",
            data:{
              aksi:'proses-produk',
              produk:cart,
              peternak:peternak
            },
            dataType:'json',
            success:function(data){
              localStorage.clear()
              location.reload()
            }
          })
        })
      });
    </script>
</html>