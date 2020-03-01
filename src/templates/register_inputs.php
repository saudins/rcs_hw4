<form id="register-form" action="register.php" method="post">
    <div class="register-input">
        <input type="text" name="username" placeholder="Choose Your User Name" required></input>
        <input type="email" name="email" placeholder="Enter Your E-mail" required></input>
        <input type="password" name="pw1" id="pw1" placeholder="Choose Your Password (Must Be At Least 8 Characters Long)" required minlength="8" onkeyup='check(); enableReg(); disableReg();'></input>
        <input type="password" name="pw2" id="pw2" placeholder="Enter Your Password One More Time" required minlength="8" onkeyup='check(); enableReg(); disableReg();'></input>
        <div>
        <span id='message'></span>
        </div>
    </div>
    <button type="Submit" id="regBtn" class="btn waves-effect waves-light" disabled>Register</button>


</form>
