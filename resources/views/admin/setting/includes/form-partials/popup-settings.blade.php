{{--Target--}}
<div class="form-group">
    <label  class="display-block text-semibold">Target:</label>
    {{ Form::select('value[target]', ['all' => 'All', 'referrer' => 'Referrer' ], null, ['class' => 'form-control target']) }}
    @if($errors->has('value[target]'))
        <span class="text-danger">{{ $errors->first('value[target]') }}</span>
    @endif
</div>

{{--Referrer Url--}}
<div class="form-group referrer-url">
    <label>Referrer Url:</label>
    {{ Form::text('value[referrer_url]', null, ['class' => 'form-control']) }}
    @if($errors->has('value[referrer_url]'))
        <span class="text-danger">{{ $errors->first('value[referrer_url]') }}</span>
    @endif
</div>

{{--Trigger Type--}}
<div class="form-group">
    <label  class="display-block text-semibold">Trigger Type:</label>
    {{ Form::select('value[trigger_type]', ['instant' => 'Instant', 'delay' => 'Delay', 'after_rand_clicks' => 'After few random clicks' ], null, ['class' => 'form-control trigger-type']) }}
    @if($errors->has('value[trigger_type]'))
        <span class="text-danger">{{ $errors->first('value[trigger_type]') }}</span>
    @endif
</div>

{{--Delay Time (In Sec)--}}
<div class="form-group delay-time">
    <label>Delay Time (In Sec):</label>
    {{ Form::text('value[delay_time]', null, ['class' => 'form-control']) }}
    @if($errors->has('value[delay_time]'))
        <span class="text-danger">{{ $errors->first('value[delay_time]') }}</span>
    @endif
</div>

{{--Min Click Count--}}
<div class="form-group min-click-count">
    <label>Min Click Count:</label>
    {{ Form::text('value[min_click_count]', null, ['class' => 'form-control']) }}
    @if($errors->has('value[min_click_count]'))
        <span class="text-danger">{{ $errors->first('value[min_click_count]') }}</span>
    @endif
</div>

{{--Max Click Count--}}
<div class="form-group max-click-count">
    <label>Max Click Count:</label>
    {{ Form::text('value[max_click_count]', null, ['class' => 'form-control']) }}
    @if($errors->has('value[max_click_count]'))
        <span class="text-danger">{{ $errors->first('value[max_click_count]') }}</span>
    @endif
</div>

{{--Content--}}
<div class="form-group">
    <label>Content:</label>
    {{ Form::textarea('value[content]', null, ['class' => 'form-control myeditablediv']) }}
    @if($errors->has('value[content]'))
        <span class="text-danger">{{ $errors->first('value[content]') }}</span>
    @endif
</div>
