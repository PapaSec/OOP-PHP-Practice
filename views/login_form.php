<div class="login-box">
    <h1>Login</h1>
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <p>You don't have account?<a href="index.php?page=signup"> Register</a></p>
</div>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f4f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-box h1 {
        text-align: center;
        margin-bottom: 20px;
        color: white;
    }

    .login-box {
        background-color: #727272ff;
        padding: 20px 25px;
        justify-content: center;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    .login-box p {
        text-align: center;
        color: white;
    }
    .login-box input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-box button:hover {
      background: #0056b3;
    }

</style>