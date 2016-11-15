<div class="container">
	<div class="flex-j-between flex-row flex-a-center">
		<h2><i>Hello {{ App\Auth::user()->first_name }},</i></h2>
		{{ Form::open('/search')}}
			{{ Form::search('term')  }}
			{{ Form::submit('go', ['class' => 'go']) }}
		{{ Form::close() }}
	</div>	

	<br>

	<div class="flex-col">

		<? foreach($user->contacts()->where('deleted', '0')->order_by('last_name', 'asc')->get() as $contact): ?>

			<div class="contact">
				<a href="<?= url('/contact/'.$contact->id) ?>">{{ $contact->last_name}}, 
				{{$contact->first_name }}</a>
				<p>{{ $contact->company }}</p>
				<hr>
			</div>

		<? endforeach ?>

	</div>

</div>

