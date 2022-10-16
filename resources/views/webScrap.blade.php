
<doctype html>
<html>
    <head>
        
    </head>
    <body>
        eavnej
          <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
        <script>
    
 setInterval(swapImages,20000);
 
  function swapImages(){
    
 
   
               var url = '{{ url("indexWebscrapping") }}';

  $.ajax({
               type:'get',
               url:url,
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                //   $("#msg").html(data.msg);
               }
            });
         }
  
    </script>
        </script>
    </body>
</html>