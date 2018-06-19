<div class="page page-prop">
	<div class="container">

        <div class="row">
            <div class="col-sm-4">
                @if(Session::has('alert.success'))
                    <div class="alert alert-dismissable alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      {{ Session::get('alert.success') }}
                    </div>
                @endif          
            </div>
        </div>

		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default panel-gallery">
					<div class="panel-heading"><h3 class="panel-title">{{ Lang::get('label.payment_success') }}</h3></div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
                                {{ Form::button(Lang::get('label.Close'), array(
                                    'id' => 'btn-success',
                                    'type' => 'button',
                                    'class' => 'btn btn-default',
                                )) }}
							</div>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
