<section class="left-sec bg-navy">
    <a href="level1_step_1.html" class="site-branding"><img src="{{ asset('html/images/apps-logo.png') }}" alt=""></a>
    <h3 class="tagline-head">Let your <br/>journey begins</h3>
    <div class="menu-accordion">
        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
            @if($levels)
                @foreach($levels as $i => $item)
                <div class="panel panel-default panel-faq {{ $i === 0 ? 'active' : '' }}">
                    <div class="panel-heading" role="tab" id="heading-{{ $i }}">
                        <div class="panel-title clearfix">
                            <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse-{{ $i }}" aria-expanded="true" aria-controls="collapseOne">
                                <figure><img src="{{ asset('html/images/journey/img_1.png') }}" alt=""></figure>
                                <h6>{{ $item->name }}</h6>
                            </a>
                        </div>
                    </div>
                    @if($item->children)
                    <div id="collapse-{{ $i }}" class="panel-collapse collapse {{ $i === 0 ? 'in' : '' }}" role="tabpanel" aria-labelledby="heading-{{ $i }}">
                        <div class="panel-body">
                            <ul class="getting-start-list">
                                @foreach($item->children as $child)
                                <li><a href="{{ route('start.section', $child->id) }}">
                                        <span class="circle-span complete"></span>{{ $child->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>