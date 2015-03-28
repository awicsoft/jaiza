
<table style="width:100%; margin-left: auto; margin-right: auto;" border='5px'>
    <tr>
        <th style= "width: 20px;text-align: center;"></th>
        <th style="height: 40px; text-align: center;">جاری کردہ خبر یں</th>
        @foreach($newspapers as $newspaper)
        <th style= "text-align: center;">{{$newspaper->name}}<!--<span lang="ur" dir="rtl" style="font-size:9px ; ">({{$newspaper->cityName}})</span>--></th>
        @endforeach
    </tr>
    <?php $count =1;?>
    @foreach($prs as $pr)
    <tr>
        <td style= "width: 20px;text-align: center;">
            <?php echo $count; $count++;?>
        </td>
        <td >
            @if($pr->type=='PIC')
            تصویر:
            @endif
            {{$pr->title}}
        </td>
        @foreach($newspapers as $newspaper)
       <td  style= "text-align: center;">
           <form method="post"> 
               <input style="width:10px" type="hidden" name='prID' value="{{$pr->pr_ID}}" />
            <input style="width:10px" type="hidden" name='npID' value="{{$newspaper->ID}}" />
            <?php 
            $columnNO  = "";
            $pageNO = "";
            
           
            foreach($reports as $report){
                    if($report->pressrelease_ID == $pr->pr_ID && $report->newspaper_ID == $newspaper->ID){
                       $columnNO  =  $report->columnNO;
                        $pageNO = $report->pageNO;
                        
                    }
                    
            }    
            ?>
            @if ($gReport == true)
                {{$columnNO}}/{{$pageNO}}
            @else
                
            
            <input style="width:20px" value="{{$pageNO}}" type="text" name='pg' id="p{{$pr->pr_ID}}g{{$newspaper->ID}}" />
            
            <select style="width:40px" value="" type="text" name='cl' id="co{{$pr->pr_ID}}l{{$newspaper->ID}}" >
            
                <option @if($columnNO=='f') 
                         selected="selected"
                         @endif
                         >f</option>    
                <option
                    @if($columnNO=='b') 
                         selected="selected"
                         @endif
                    >b</option>    
                <option
                    @if($columnNO=='n') 
                         selected="selected"
                         @endif
                    >n</option>    
                <option 
                        @if($columnNO=='i') 
                         selected="selected"
                         @endif
                        >i</option>    

            </select>
            
            @endif

            <!-- <button>a</button>-->
           </form>
          </td>
        @endforeach
    </tr>
    @endforeach
    
</table>

  </div>
  @if(Input::has('add'))
<div class="form-actions">
                                        
    <button id="btn1" onclick="adddReport();"class="btn btn-primary">رپورٹ شامل کریں</button>
  </div>
  @endif