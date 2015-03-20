<table style="width:100%; margin-left: auto; margin-right: auto;"  border='3px'>
    @foreach($importantNews as $in)
    <tr>
        <th style="width:300px;">
           
اہم خبریں
            {{$in->title}}
        </th>
        <td>
            {{$in->summary}}
            
            
        </td>
    </tr>
    @endforeach
    
</table>