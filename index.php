<?php
$chk = '';
if( isset($_GET["chk"]) ) $chk = $_GET['chk'];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>PL-TRANSFORM | Inventory System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="layout" content="main"/>
    <link rel="shortcuticon icon" type="image/x-icon" href="images/pl-transform-logo.png">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    
    <link href="css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

    <style>
    </style>
</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container" style="padding-top:5px">
                   <img src="images/pl-transform-logo.png" alt="Logo" width="100px" height="100px" />                    
                </div>
            </div>
        </div>
        <div id="body-container">
                    <div id="body-content">
                        
                        
            <div class='container'>
                
                <div class="signin-row row">
                    <div class="span4"></div>
                    <div class="span8">
                        <div class="container-signin">
                            <legend>Please Login</legend>
                            <form action='indexA' method='POST' id='loginForm' class='form-signin' autocomplete='off'>
                                <div class="form-inner">
                                    <div class="input-prepend">
                                        
                                        <span class="add-on" rel="tooltip" title="Username or E-Mail Address" data-placement="top"><i class="icon-envelope"></i></span>
                                        <input type='text' class='span4' id='user' name="user"/>
                                    </div>

                                    <div class="input-prepend">
                                        
                                        <span class="add-on"><i class="icon-key"></i></span>
                                        <input type='password' class='span4' id='password' name="password"/>
                                    </div>
                                    <label class="checkbox" for='remember_me'>Remember me
                                        <input type='checkbox' id='remember_me' name="password"/>
                                    </label>
                                </div>
                                <footer class="signin-actions">
                                    <input class="btn btn-primary" type='submit' id="submit" value='Log in' name="Submitc"/>
                                </footer>
                            </form>
                        </div>
                    </div>
                    <div class="span3"></div>
                </div>

				<?php if($chk == 20){ ?>
                <div class="signin-row row">
                    <div class="span4"></div>
                    <div class="span8">
                        <div class="well well-small well-shadow">
                            <legend class="lead" style="color:#F00">Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.</legend>
                        </div>
                    </div>
                    <div class="span8"></div>
                </div>              
                <?php
					}
					?>
					
					<?php
						if ($chk == 5)
					{
					?>
					<tr>
						<td valign="top">
							<p style="background-color:#FFEBE8;border:1px solid #FF0000;padding:10px;font-family:Arial, Helvetica, sans-serif;font-size:12px; text-align:center">
								<?php echo "Sorry, You are using trial version of this software <br /> OR <br/><br> You do not bought this software from Onwer. <br> Attempt of running this trial version will EMPTY YOU DATABASE.
								Contact Norak Technologies Ltd. (08062439476) for enterprise edition. Thanks."; ?>
							</p>
						</td>
					</tr>
					<?php
					}
					
					if ($chk == 30)
					{
					?>
					<tr>
						<td valign="top">
							<p style="background-color:#FFEBE8;border:1px solid #FF0000;padding:10px;font-family:Arial, Helvetica, sans-serif;font-size:12px; text-align:center">
								<?php echo "Your Licence period has expired <br/><br> You need to pay for Licence. <br> Attempt of running this software will EMPTY YOU DATABASE.
								Contact Norak Technologies Ltd. (+2348062439476, +2348185490357) for new subcription. Thanks."; ?>
							</p>
						</td>
					</tr>
					<?php
					}
				?>
            <!--<div class="span4">

                </div>-->
            </div>
    

            </div>
        </div>
		<?php
			$d =date("Y");
			if ($d == 2016 or $d == 2017 or $d == 2018) {
				/*rename("index.php","help.php");
				rename("dashboard.php","event.php");
				rename("controlpanel/assessment.php","log2.php");
				rename("result/index.php","tution.php");*/
				//echo "The file index renamed to help";
			}
		
		?>
        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>

        <footer class="application-footer">
            <div class="container">
                <p>Developed by JESTOP..</p>
                <div class="disclaimer">
                    <p>All right reserved.</p>
                    <p>Copyright © JESTOP .. <?php echo date("Y")?></p>
                </div>
            </div>
        </footer>
        
	</body>
</html>

