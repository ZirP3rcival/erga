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
<!-- Account Verification Start-->
<div class="col-lg-12 div2" style="padding: 0px;">
    <div class="col-lg-12" style="padding: 0px;">
    <form action="accountcontroller.php?prc=R" method="post" id="adminpro-form" class="adminpro-form" enctype="multipart/form-data" role="form">
            <div class="login-bg" style="border-radius: 15px;">
                 <div class="row rmargin">
                    <div class="col-lg-12">
                        <div class="login-input-head">
                            <p>Email Address</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="login-input-area">
                            <input class="form-control" type="text" name="eadd" required />
                            <i class="fa fa-envelope-square login-user" aria-hidden="true"></i>
                        </div>
                    </div>
                 </div>
                 <div class="row rmargin">
						<div class="col-xs-12 col-md-12" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Security Question : </span></div>
						<div class="col-xs-12 col-md-12">
						<select name="sqs" required class="form-control" id="sqs" style="display: inline-block; position:inherit; width:100%; font-size: 11px;">
								  <option value="What is the first name of your favorite uncle?" >What is the first name of your favorite uncle?</option>
								  <option value="Where did you meet your spouse?" >Where did you meet your spouse?</option>
								  <option value="What is your oldest cousin&#39;s name?" >What is your oldest cousin&#39;s name?</option>
								  <option value="What is your youngest child&#39;s nickname?" >What is your youngest child&#39;s nickname?</option>
								  <option value="What is your oldest child&#39;s nickname?" >What is your oldest child&#39;s nickname?</option>
								  <option value="What is the first name of your oldest niece?" >What is the first name of your oldest niece?</option>
								  <option value="What is the first name of your oldest nephew?" >What is the first name of your oldest nephew?</option>
								  <option value="What is the first name of your favorite aunt?" >What is the first name of your favorite aunt?</option>
								</select>
						</div>
							<div class="clearfix"></div>
						<div class="col-xs-12 col-md-4" style="margin-top:10px;"><span class="mf" style="float:left; margin-right:10px;">Answer : </span></div>
						<div class="col-xs-12 col-md-8" style="margin-top:10px; float: right;">
						<input name="sqa" type="text" required class="form-control" id="sqa" placeholder="Question Answer" value=""/></div>
							<div class="clearfix"></div>
                </div>
                <div class="row rmargin">
            <div class="col-lg-12">
                <div class="login-button-pro logbtn">
                    <button type="button" class="btn btn-success" id="lgbtn">Log In</button>
                    <button type="submit" class="btn btn-primary">Request</button>
                    <div class="clearfix"></div>
                </div>
            </div>
                </div>
            </div>
    </form>
    </div>
</div>
<!-- Account Verification End-->