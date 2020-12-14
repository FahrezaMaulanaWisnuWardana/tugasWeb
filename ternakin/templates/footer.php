<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?=$_ENV['base_url']?>assets/js/js.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      // Cart
      let cart =localStorage.getItem('id') ? JSON.parse(localStorage.getItem('id')) : []
      let peternak =localStorage.getItem('peternak') ? JSON.parse(localStorage.getItem('peternak')) : []
      count = 0;
      function countValues(array, countItem) {
        array.forEach(itm => {
          if (itm == countItem) count++;
        });
        return `${count}`;
      }
        let unique = cart.filter((v,i,a)=>a.indexOf(v)===i)
      $(".cart").on('click',function(){
        cart.push($(this).data('id'))
        peternak.push($(this).data('penjual'))

        localStorage.setItem('id',JSON.stringify(cart))
        localStorage.setItem('peternak',JSON.stringify(peternak))
        
        totalCart($(this).data('harga'))
        $(".count-cart").text(cart.length)

      })
      function totalCart(harga){
        let total = localStorage.getItem('total')
        if (total != null) {
          total = parseInt(total)
          localStorage.setItem('total',total + harga)
        }else{
          localStorage.setItem('total',harga)
        }
      }
      let url = window.location.href;
      let split = url.split('/');
      if (cart !== null) {
        if (cart.length>0) {
          $(".count-cart").text(cart.length)
        }
      }
      $("#logout").on('click',function(){
        localStorage.clear()
      })
      // End Cart
  })
</script>