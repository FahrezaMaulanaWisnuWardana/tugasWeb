<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(window).resize(function(){
          ($(window).width() > 768)?$("#sidebar").removeClass("active"):'';
        })
        $("#sidebarCollapse").on("click", function() {
          $("#sidebar").addClass("active");
        });

        $("#sidebarCollapseX").on("click", function() {
          $("#sidebar").removeClass("active");
        });

        $("#sidebarCollapse").on("click", function() {
          if ($("#sidebar").hasClass("active")) {
            $(".overlay").addClass("visible");
            console.log("it's working!");
          }
        });

        $("#sidebarCollapseX").on("click", function() {
          $(".overlay").removeClass("visible");
        });
      });
    </script>