<div class="col-md-10">
    <div class="form-group">
        <label  class="display-block text-semibold">Question 1:</label>
        {{ Form::text('element_data[question_1]', $data['selectedElementData']['question_1'], ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <label  class="display-block text-semibold">Question 2:</label>
        {{ Form::text('element_data[question_2]', $data['selectedElementData']['question_2'], ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        <label  class="display-block text-semibold">Question 3:</label>
        {{ Form::text('element_data[question_3]', $data['selectedElementData']['question_3'], ['class' => 'form-control']) }}
    </div>
</div>