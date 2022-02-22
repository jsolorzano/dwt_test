<!DOCTYPE html>

<html>

<head>

    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @livewireStyles

</head>

<body>
	
	@include('livewire.navbar')
	
	<main class="py-4">
		
		<div class="container">

			<div class="row justify-content-center">

				<div class="col-md-12">

					<div class="card">

						<div class="card-header">

							<h2>Mails</h2>

						</div>

						<div class="card-body">

							@if (session()->has('message'))

								<div class="alert alert-success">

									{{ session('message') }}

								</div>

							@endif

							@livewire('mails')

						</div>

					</div>

				</div>

			</div>

		</div>
		
	</main>

    @livewireScripts

    <script type="text/javascript">

        window.livewire.on('mailStore', () => {

            $('#exampleModal').modal('hide');

        });

        window.livewire.on('mailUpdate', () => {

            $('#updateModal').modal('hide');

        });

    </script>

</body>

</html>
