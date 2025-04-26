<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Login Page
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #0a74da;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .background {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .background img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.2;
        }
        .login-container {
            position: relative;
            background: rgba(255, 255, 255, 0.1);
            padding: 60px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index: 1;
            text-align: center;
            width: 100%;
            max-width: 400px;
            margin: 20px;
        }
        .login-container h1 {
            color: white;
            margin-bottom: 20px;
        }
        .login-container h2 {
            color: white;
            margin-bottom: 20px;
        }
        .login-container label {
            color: white;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #004080;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-container .register {
            margin-top: 20px;
            color: white;
        }
        .login-container .register a {
            color: white;
            text-decoration: underline;
        }
  </style>
 </head>
 <body>
  <div class="background">
   <img alt="Abstract background with blue shapes" height="1080" src="/images/CarLandingPage.png" width="1920"/>
  </div>
  <div class="login-container">
   <h1>
    Your logo
   </h1>
   <h2>
    Login
   </h2>
   <form>
    <label for="email">
     Email
    </label>
    <input id="email" placeholder="username@gmail.com" type="email"/>
    <label for="password">
     Password
    </label>
    <input id="password" placeholder="Password" type="password"/>
    <button type="submit">
     Sign in
    </button>
   </form>
   <div class="register">
    Don't have an account yet?
    <a href="#">
     Register for free
    </a>
   </div>
  </div>
 </body>
</html>