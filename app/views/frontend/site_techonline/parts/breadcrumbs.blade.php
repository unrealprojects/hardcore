@if(!empty($breadCrumbs))
<div class="Breadcrumbs Node">
   <ul>
       @foreach($breadCrumbs as $crumb)
           @if($crumb['link'])
                <li><a href="{{$crumb['link']}}">{{$crumb['title']}}</a></li>
           @else
                <li>{{$crumb['title']}}</li>
           @endif
       @endforeach
   </ul>
</div>
@endif