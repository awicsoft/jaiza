<table style="width:100%; margin-left: auto; margin-right: auto;"  border='3px'>
    @foreach($idarias as $i)
    <tr>
        <td style="width:300px;">
          
                  
            اداریہ:
            {{$i->title}}
              <span lang="ur" dir="rtl">
            ({{$i->newspaperName}})
            </span>
            </td>
        <td>
            {{$i->summary}}
            
            
        </td>
    </tr>
    @endforeach
    
</table>