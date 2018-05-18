<aside id="login">
	<form class="panel panel-group form-horizontal" action="search.php" role="form" autocomplete="off">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="panel-header">
					<h4>Search</h4>
				</div>					
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
					<input class="form-control" type="search" name="search" placeholder="Search" />						
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					</div>
				</div>
				<div class="input-group-btn">
					<div class="col-sm-12">
						<button type="submit" name="submit_search" class="btn btn-default btn-block">Search</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	
	<form class="panel-group form-horizontal" role="form" action="account/login.php" method="post" autocomplete="off">
		<div class="panel panel-default">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="email" class="control-label col-sm-4">User Email</label>
					<div class="col-sm-7">
						<input type="text" id="email" placeholder="User Email" name="email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="control-label col-sm-4">Password</label>
					<div class="col-sm-7">
						<input type="password" id="password" placeholder="Password" name="password" class="form-control">
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success btn-block" name="submit_login">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</aside> 
<aside class="pull-left">
<div class="visible-lg"><?php include 'includes/list.php'; ?></div>
</aside>