@if(!empty($breadCrumbs))
<div class="Breadcrumbs Node">
   <ul>
       @foreach($breadCrumbs as $crumb)
           @if($crumb['link'])
                <li class="Breadcrumbs-Item"itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                    <a href="{{$crumb['link']}}" itemprop="url">
                        <span itemprop="title">{{$crumb['title']}}</span>
                    </a>
                </li>
           @else
                <li class="Breadcrumbs-Item">
                    <span>{{$crumb['title']}}</span>
                </li>
           @endif
       @endforeach
   </ul>
</div>
@endif