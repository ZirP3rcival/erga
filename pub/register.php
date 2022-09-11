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
        <form action="studentrecordcontroller.php?prc=S" method="post" id="adminpro-form" class="adminpro-form" enctype="multipart/form-data" role="form">
            <div class="login-bg" style="border-radius: 15px;">
                <div class="row rmargin">
                    <div class="col-lg-12">
                        <div class="login-input-head">
                            <p>LastName</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="login-input-area register-mg-rt">
                             <input class="form-control"  type="text" id="lnme" name="lnme" maxlength="30" />
                            <i class="fa fa-user login-user"></i>
                        </div>
                    </div>
                </div>
                <div class="row rmargin">
                    <div class="col-lg-12">
                        <div class="login-input-head">
                            <p>MiddleName</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="login-input-area register-mg-rt">
                             <input class="form-control"  type="text" id="mnme" name="mnme" maxlength="30" />
                            <i class="fa fa-user login-user"></i>
                        </div>
                    </div>
                </div>
                <div class="row rmargin">
                    <div class="col-lg-12">
                        <div class="login-input-head">
                            <p>FirstName</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="login-input-area register-mg-rt">
                             <input class="form-control"  type="text" id="fnme" name="fnme" maxlength="30" />
                            <i class="fa fa-user login-user"></i>
                        </div>
                    </div>
                </div>
                <div class="row rmargin">
                    <div class="col-lg-12">
                        <div class="login-input-head">
                            <p>Email Address</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="login-input-area register-mg-rt">
                             <input class="form-control"  type="email" id="eadd" name="eadd" maxlength="60" />
                            <i class="fa fa-envelope login-user" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="row rmargin">
                    <div class="col-lg-12">
                        <div class="login-input-head">
                            <p>Contact No.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="login-input-area register-mg-rt">
                             <input class="form-control"  type="number" id="cno" name="cno" maxlength="11" />
                            <i class="fa fa-mobile login-user"></i>
                        </div>
                    </div>
                </div>
                <div class="row rmargin">
                    <div class="col-lg-12">
                        <div class="login-button-pro logbtn" style="padding-top: 15px;">
                            <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>
<!--#########################################################################-->  