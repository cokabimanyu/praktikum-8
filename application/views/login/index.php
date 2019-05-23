<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

<style type="text/css">
  body{
  font-family: sans-serif;
  background: #d5f0f3;
}
 
h1{
  text-align: center;
  /*ketebalan font*/
  font-weight: 300;
}
 
.tulisan_login{
  text-align: center;
  /*membuat semua huruf menjadi kapital*/
  text-transform: uppercase;
}
 
.kotak_login{
  width: 350px;
  background: white;
  /*meletakkan form ke tengah*/
  margin: 80px auto;
  padding: 30px 20px;
}
 
label{
  font-size: 11pt;
}
 
.form_login{
  /*membuat lebar form penuh*/
  box-sizing : border-box;
  width: 100%;
  padding: 10px;
  font-size: 11pt;
  margin-bottom: 20px;
}
 
.tombol_login{
  background: #46de4b;
  color: white;
  font-size: 11pt;
  width: 100%;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
}
 
.link{
  color: #232323;
  text-decoration: none;
  font-size: 10pt;
}
</style>
</head>
<body>
	<form action="auth_login" method="post">
	
	  <div class="kotak_login">	  	
	  	<?php if($this->session->flashdata('message')): ?>
	  	<center><h4 style="color: red;"><?php echo $this->session->flashdata('message'); ?></h4></center>
	  	<?php endif; ?>
	  	<center><h1>LOGIN</h1></center>
	    <label for="username"><b>Username</b></label>
	    <input class="form_login" type="text" placeholder="Enter Username" name="username" required>
	    <label for="password"><b>Password</b></label>
	    <input class="form_login " type="password" placeholder="Enter Password" name="password" required>
	    <button class="tombol_login" type="submit">Login</button>		
	  </div>
	
	</form>
</body>
</html>