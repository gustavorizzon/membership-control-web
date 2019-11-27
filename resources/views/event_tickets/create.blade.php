@extends('adminlte::page')

@section('title', 'Event Tickets - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Event Tickets Form') }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => 'event_tickets.store']) !!}
							
								{!! Form::hidden('event_id', $event_id) !!}

								<div class="row">
									<div class="col-sm-8">
										<div class="form-group {{ $errors->has('ticket_type_id') ? 'has-error' : '' }}">
											{!! Form::label('ticket_type_id', __('Ticket Type'), ['class' => 'control-label']) !!}
											{!! Form::select('ticket_type_id', 
												\App\TicketType::orderBy('name')->pluck('name', 'id')->toArray(),
												null,
												['class' => 'form-control', 'required'])
											!!}
											{!! $errors->first('ticket_type_id', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
											{!! Form::label('amount', __('Amount'), ['class' => 'control-label']) !!}
											{!! Form::number('amount', null, ['class' => 'form-control', 'required']) !!}
											{!! $errors->first('amount', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>

								<div class="form-group">
									{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Create!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
									<a href="{{ route('event_tickets', ['id' => $event_id]) }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
								</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection