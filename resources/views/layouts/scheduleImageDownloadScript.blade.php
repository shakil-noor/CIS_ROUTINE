<script type="text/javascript">
    $(document).ready(function(){
      $("#capture").click(function(){
        domtoimage.toBlob(document.getElementById('capture-area')).then(function(blob){
          window.saveAs(blob,"output.png");
          // here we can download jpg image also
          //window.saveAs(blob,"output.jpg");
        })
      })
    })
  </script>