<div class="container">	
	<div class="flex-j-between flex-row flex-a-center">
		<h2><i>Search results for:</i> "{{ $term }}"</h2>

		{{ Form::open('/search')}}
			{{ Form::search('term')  }}
			{{ Form::submit('go', ['class' => 'go']) }}
		{{ Form::close() }}
	</div>

	<? foreach($contacts as $contact): ?>

		<div class="contact">

			<a href="<?= url('/contact/'.$contact->id) ?>">{{ $contact->first_name }} {{ $contact->last_name }}</a>
			<p>{{ $contact->company }}</p>

			<hr>

		</div>

	<? endforeach ?>
</div>	