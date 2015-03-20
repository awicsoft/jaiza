
<script>
    function addATag(){
       
      
          var tag = $("#atagName").val();
       
         $.post("Tag",
        {
         
          title_tag: tag
        },
        function(data,status){
        
        updateTagOptions();
             
            
       
            
        });
        
    }
    </script>

 <td><input id='atagName' type='text'></td>
                                        <td><div class="btn-group">
                                              <input onclick="addATag()" class="btn btn-success" value ="نیا ٹیگ شامل کریں" readonly /><i class="icon-plus icon-white"></i>
                                      </div>
                                        
                                        
 </td>
