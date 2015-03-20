<table style="width:100%; margin-left: auto; margin-right: auto;"  border='3px'>
    @foreach($columnvs as $col)
    <tr>
        <td style="width:300px;" >
            کالمز:
            {{$col->title}}
          <span lang="ur" dir="rtl">
            ({{$col->newspaperName}})
          </span>
          </td>
        <td>
            {{$col->summay}}
            
            
        </td>
    </tr>
    @endforeach
    
</table>