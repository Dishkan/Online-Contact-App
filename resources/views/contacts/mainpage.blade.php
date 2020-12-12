<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! $title !!}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body id="app-layout">        
			   <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center;">
					<h3>
                       Online Contact App
					</h3>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <tbody>
							  <tr>
							    <td style="text-align: center; "> 
								<h4>
<p>Welcome my dear friend! I created this web application especially for you because once you said</p>
<p>that you lose your mobile phones very often and by this situation you need to rewrite contacts again and again </p>
<p>so I found you a smart solution to keep and maintain your all contacts online!!!</p>
                                </h4>
							    </td>
							  </tr>
							  <tr>
							    <td style="text-align: center; ">
								<img style="width: 30%; height: 30%;" src="{{ asset('logo.jpg') }}" alt="logo" />
								</td>
							  </tr>
                                    <tr>
                                       <td style="text-align: center; ">
									   <a href="{{ route('main.index') }}">
                                                <button type="submit" class="btn btn-primary" style="width:25%;">
                                <i class="fa fa-btn fa-create"></i>Start
                                                </button>
										</a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
 
</body>
</html>