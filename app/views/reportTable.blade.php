
<table style="width:100%; margin-left: auto; margin-right: auto;" border='10px'>
    <tr>
        <th style="height: 40px;">پریس ریلیز</th>
        @foreach($newspapers as $newspaper)
        <th>{{$newspaper->name}}<span lang="ur" dir="rtl" style="font-size:9px ; ">({{$newspaper->cityName}})</span></th>
        @endforeach
    </tr>
    @foreach($prs as $pr)
    <tr>
        <td>
            {{$pr->title}}
        </td>
        @foreach($newspapers as $newspaper)
       <td>
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
    
            <input style="width:20px" value="{{$columnNO}}" type="text" name='cl' id="co{{$pr->pr_ID}}l{{$newspaper->ID}}" />
            <input style="width:20px" value="{{$pageNO}}" type="text" name='pg' id="p{{$pr->pr_ID}}g{{$newspaper->ID}}" />
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