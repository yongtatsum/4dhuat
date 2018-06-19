@if ($paginator->getLastPage() > 1)
<?php $previousPage = ($paginator->getCurrentPage() > 1) ? $paginator->getCurrentPage() - 1 : 1; ?>  
<ul class="ui pagination menu">  
    @if ($paginator->getCurrentPage() > 1)
	<li>
        <a href="{{ $paginator->getUrl($previousPage) }}">
            <i class="fa fa-caret-left"></i>
			Prev
		</a>
	</li>
    @endif
	@for ($i = 1; $i <= $paginator->getLastPage(); $i++)
	<li>
		<a href="{{ $paginator->getUrl($i) }}"
			class="item{{ ($paginator->getCurrentPage() == $i) ? ' active' : '' }}">
			{{ $i }}
		</a>
	</li>
	@endfor
    @if ($paginator->getCurrentPage() < $paginator->getLastPage())
	<li>
		<a href="{{ $paginator->getUrl($paginator->getCurrentPage()+1) }}">
			Next
            <i class="fa fa-caret-right"></i>
		</a>
	</li>
    @endif
</ul>  
@endif
