<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
    <title>Dashoard</title>
</head>
<body>
    <div class="container my-5">
            <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">
				Add Consignment
		    </button>
            <button id="pdf" class="btn btn-danger">TO PDF</button>
		  <!-- Modal -->
		  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
					<form action="/add_consigmnent" method="post">
						@csrf
						<div class="modal-body">
								<div class="form-group">
									<label for="company">Company</label>
									<input type="text" name="company" class="col-lg-12 form-control" id="company">
								</div>
								<div class="form-group">
									<label for="contact">Contact</label>
									<input type="text" name="contact" class="col-lg-12 form-control" id="contact">
								</div>
								<div class="form-group">
									<label for="addressline1">Addressline1</label>
									<input type="text" name="addressline1" class="col-lg-12 form-control" id="addressline1">
								</div>		
                                <div class="form-group">
									<label for="addressline2">Addressline2</label>
									<input type="text" name="addressline2" class="col-lg-12 form-control" id="addressline2">
								</div>		
                                <div class="form-group">
									<label for="addressline3">Addressline3</label>
									<input type="text" name="addressline3" class="col-lg-12 form-control" id="addressline3">
								</div>		
                                <div class="form-group">
									<label for="city">City</label>
									<input type="text" name="city" class="col-lg-12 form-control" id="city">
								</div>		
                                <div class="form-group">
									<label for="country">Country</label>
									<input type="text" name="country" class="col-lg-12 form-control" id="country">
								</div>				
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
			  </div>
			</div>
		  </div>
        <table class="table" id="Consignment">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">company</th>
                <th scope="col">contact</th>
                <th scope="col">addressline1</th>
                <th scope="col">addressline2</th>
                <th scope="col">addressline3</th>
                <th scope="col">city</th>
                <th scope="col">country</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;
                @endphp
                @if ($Consignments !=NULL)
                    @foreach ($Consignments as $Consignment)
                        <tr>
                            <td>{{$counter++}}</td>
                            <td>{{$Consignment->company}}</td>
                            <td>{{$Consignment->contact}}</td>
                            <td>{{$Consignment->addressline1}}</td>
                            <td>{{$Consignment->addressline2}}</td>
                            <td>{{$Consignment->addressline3}}</td>
                            <td>{{$Consignment->city}}</td>
                            <td>{{$Consignment->country}}</td>
                        </tr>
                    @endforeach
                @else
                        <tr>
                            <td>Record Not Found</td>
                        </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#pdf", function () {
            html2canvas($('#Consignment')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                    // pdfMake.createPdf(docDefinition).download("Table.pdf");
    
                }
            });
        });
    </script>
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>