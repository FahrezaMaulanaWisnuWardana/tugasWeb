    <?php 
      $title="Situs jual beli hewan dan hasil hewan";
      include"../../config/database.php";
      include"../../templates/header.php";
      $sqldaerah = mysqli_query($con,"SELECT * FROM tb_kota");
      $sqlpeternak = mysqli_query($con,"SELECT * FROM tb_peternak");
      $sqlproduk = mysqli_query($con,"SELECT * FROM tb_produk");
    ?>
    <link rel="stylesheet" href="<?=$_ENV['base_url']?>pages/about-us/Page-1.css" type="text/css">
    <link rel="stylesheet" href="<?=$_ENV['base_url']?>pages/about-us/nicepage.css" type="text/css">
  </head>
  <body>
    <?php 
      include"../../partials/navbar.php";
    ?>
    <section class="u-align-center u-clearfix u-image u-shading u-section-2">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-center-md u-align-center-sm u-align-center-xs u-text u-text-default u-title u-text-1">Ternakin</h1>
        <p class="u-align-center u-large-text u-text u-text-variant u-text-2">Ternakin merupakan Marketplace di mana para peternak dapat memperjual belikan hasil ternaknya sekaligus mendapatkan informasi tentang harga pasaran ataupun informasi cara beternak yang dapat menyejahterakan peternak di Indonesia.</p>
      </div>
    </section>
    <div class="u-align-center u-clearfix u-section-3" id="sec-d9e7">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-1">TERNAKIN</h1>
        <p class="u-custom-font u-text u-text-2">Menyediakan Hewan Ternak Pilihan Serta Olahan Ternak Terbaik.</p>
        <p class="u-custom-font u-text u-text-2">Sapi , Ayam , Kambing , Daging , Susu , Keju dan lainnya.</p>
        <a href="<?=$_ENV['base_url']?>login" class="u-active-none u-border-5 u-border-active-palette-2-dark-1 u-border-custom-color-2 u-border-hover-custom-color-2 u-btn u-button-style u-custom-font u-heading-font u-hover-none u-none u-text-custom-color-2 u-btn-1">Pasarkan Sekarang</a>
      </div>
    </div>
    <div class="u-align-center u-clearfix u-section-1" id="sec-8b67">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-sheet-1">
        <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="33.3%">
              <col width="33.3%">
              <col width="33.4%">
            </colgroup>
            <tbody class="u-table-body">
              <tr style="height: 114px;">
                <td class="u-align-center u-table-cell u-table-cell-1"><?php echo mysqli_num_rows($sqldaerah); ?></td>
                <td class="u-align-center u-custom-font u-heading-font u-table-cell u-table-cell-2"><?php echo mysqli_num_rows($sqlpeternak); ?></td>
                <td class="u-align-center u-custom-font u-heading-font u-table-cell u-table-cell-3"><?php echo mysqli_num_rows($sqlproduk); ?></td>
              </tr>
              <tr style="height: 100px;">
                <td class="u-align-center u-custom-font u-heading-font u-table-cell u-text-black u-table-cell-4">Daerah Terjangkau</td>
                <td class="u-align-center u-custom-font u-heading-font u-table-cell u-table-cell-5">Peternak</td>
                <td class="u-align-center u-custom-font u-heading-font u-table-cell u-table-cell-6">Produk</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php 
    include "../../templates/footer.php";
    include "../../partials/footer.php"; 
    ?>
  </body>
</html>