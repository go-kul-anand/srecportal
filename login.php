<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: 1.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<html lang="en">

<head>
    <link rel="icon" href="SREC_logo.png" type="image/ico">
    <script src="https://rawgit.com/evidenceprime/html-docx-js/master/dist/html-docx.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.0.1/mammoth.browser.min.js"></script>
</head>

<body>
    <title>Mentor mentor_mentee_system_track_record</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpd4K-pjmQUKAGuVfJ3ynKc7tySLlVX_7Slw&usqp=CAU" alt="SREC_logo.png"
        style="width:150px;height:150px; text-align:center; font-size: 5rem; margin: 18px; float: left; max-width: 100%; max-height: 100%; padding: 1px;">
    <img src="https://srec.ac.in/uploads/resource/src/8yeEAIUofd01022018043456srec-logo.jpg"
        alt="SNR_trust_logo" style="width:150px;height:150px; text-align:center;font-size: 5rem; float: right; margin: 18px; max-width: 100%; max-height: 100%; padding: 1px;">

    <div class="container-fluid" style="background-color:rgb(125, 40, 159)">
        <font color="white" style="font-family:Verdana;font-style:cursive;">
            <h2
                style="text-align: center; padding: 0px ;font-size:50px;background-color:purple;color:transparent;-webkit-text-stroke:1px #fff;background:url(assets/SREC_and_SNR_logo_header_back.png);clip:text;background-position:0 0;animation:back 20s linear infinite;">
                <b>
                    <style>
                        @keyframes back{
                            100%{
                                background-position: 2000px 0;
                            }
                        }
                    </style>
                    <h1 style="font-size:40px">SRI RAMAKRISHNA ENGINEERING COLLEGE</h1>
                    <h4>[Educational Service: SNR Sons Charitable Trust]<br>
[Autonomous Institution, Reaccredited by NAAC with ‘A+’ Grade]<br>
    [Approved by AICTE and Permanently Affiliated to Anna University, Chennai]<br>
[ ISO 9001:2015 Certified and all eligible programmes Accredited by NBA]<br>
                                    VATTAMALAIPALAYAM, N.G.G.O. COLONY POST, COIMBATORE – 641 022.</h4>    
        </font>
    </div>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }

        .img1 {
            margin: 4px 4px;
        }

        br body {
            font-family: Verdana;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        br div {
            width: 100%;
            max-width: 1000px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        table,
        th,
        td {
            border: 10px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            width: 10%;
            text-align: left;
        }

        th {
            width: 10%;
            background-color: #f2f2f2;
        }

        .input-section {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            box-sizing: border-box;
        }

        .input-section input {
            width: calc(32% - 28px);
            margin-bottom: 15px;
            box-sizing: border-box;
            padding: 10px;
        }

        .input-section input[type="button"] {
            width: 100%;
            padding: 10px;
            align-self: center;
        }

        .display-section {
            margin-top: 20px;
            overflow-x: auto;
        }
    </style> <meta name="viewport" content="width=device-width, initial-scale=1">
           
           <div class="">
               <div class="container">
                   <div class="row">
                       <div class="col-md-6 col-md-offset-3 jumbotron">
                           <form action="login.php" method="post">
                             <div class="form-group">
                                 Username:<input type="text" class="form-control" name="user_name" placeholder=" Enter Username" required>
                             </div>
                           <div class="form-group">
                                 Password:<input type="password" class="form-control" name="password" placeholder="Enter Passoword" required>
                           </div>
                             <div class="form-group">
                                 <button><a href="index.html">Login</a></button>
                             </div> 
                           </form>
                       </div>
                   </div>
               </div>
           </div>
           
    <div class="footer" style="position: fixed;">
        <img class="flicker" src="https://i.postimg.cc/hvLb3FdQ/In-Shot-20240123-200347756-1.jpg"
    
    style="width: 150px; height: 80px;">
    </div>
    <style>
        .footer img.flicker {
            animation: flickerAnimation 1s infinite;
        }
    
        @keyframes flickerAnimation {
            0%, 100% {
                opacity: 1;
            }
    
            50% {
                opacity: 0.5;
            }
        }
    </style>
        </style>
      
</body>
</html>