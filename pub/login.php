<style>
.login-input-area .login-user {
    top: 5px;
}

.login-input-area .login-user {
    position: absolute;
    top: 0px;
    right: 15px;
    height: 35px;
    width: 35px;
    border-left: 1px solid #ccc;
    line-height: 35px;
    text-align: center;
    color: #888;
}	

.logbtn {
		text-align: right;
	}
	
.rmargin {
		margin: 10px 0px;
	}	
</style>	
<div class="col-lg-12" style="padding: 0px;">
<form id="adminpro-form" class="adminpro-form" action="verify.php" method="post">
        <div class="login-bg" style="border-radius: 15px;">
            <div class="row rmargin">
                <div class="col-lg-12">
                    <div class="login-input-head">
                        <p>Username</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="login-input-area">
                        <input class="form-control" type="text" name="username" />
                        <i class="fa fa-user login-user" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="row rmargin">
                <div class="col-lg-12">
                    <div class="login-input-head">
                        <p>Password<span style="float: right; color: #000; font-size: 11px;"><input type="checkbox" onclick="myFunction()">&nbsp;Show Password</span></p>	
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="login-input-area">
                        <input class="form-control" type="password" id="password" name="password" />
                        <i class="fa fa-lock login-user"></i>
                    </div>
                    <div class="row rmargin">
                        <div class="col-lg-12" style="padding: 0px;">
                            <div class="login-keep-me">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" checked>&nbsp;Keep me logged in
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row rmargin">
				<div class="col-lg-12">
					<div class="login-button-pro logbtn">
						<button type="submit" class="btn btn-success">Log in</button>
						<button type="button" class="btn btn-primary" id="logprob">Log in Problem</button>
					</div>
				</div>
			</div>
        </div>
</form>
</div>
<!--#########################################################################-->  
<script type="text/javascript">
    function myFunction() {
    var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        } 
</script> 