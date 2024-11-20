     <div class="bc" id="imgcontgen">

        <img src="View/images/media/bcetb.jpg" alt="">

    </div>

    <div class="sideright-container" id="contgen">

        <h1 class="tl">Centro de Monitoreo</h1>

        <div>

            <form  class="icon-content2" action="" method="POST">
                <div class="item">
                    <img class="icons" src="View/images/icons/user.png" alt="">
                    <h3 class="text" style="left: 0px; top:5px;">Usuario</h3>
                    <input id="username" name="username" style="right: 100px;" type="text" placeholder="Ingresa tu nombre de usuario" required>
                </div>

                <div class="item" style="position: relative; top: 70px;">
                    <img class="icons" src="View/images/icons/lock.png" alt="">
                    <h3 class="text" style="left: 0px; top:5px;">Contraseña</h3>
                    <input id="password" name="password" style="right: 150px;" type="password" placeholder="*****************" required>
                </div>

                <div class="item" style="position: relative; top: 190px;">
                    <button class="log" type="submit">Iniciar Sesión</button>
                    <h5>Si no tienes cuenta, <span id="acco" onclick="acco();">Crea tu Cuenta</span></h5>
                </div>
            </form>

            <br>

        </div>

        <h4 class="text2">©2024 - ETB <br> (Empresa de Telecomunicaciones de Bogotá)</h4>

    </div>

    <div class="sideright-container" id="contgen2">

        <h1 class="tl" style="position: relative; top: -55px;">Crear Cuenta</h1>

        <div>

        <form  class="icon-content2" id="createAccountForm" action="" method="POST">
            <div class="item" style="position: relative; bottom: 140px;">
                <img class="icons" src="View/images/icons/user.png" alt="">
                <h3 class="text" style="left: 0px; top:5px;">Usuario</h3>
                <input id="username" name="user" style="right: 100px;" type="text" placeholder="Ingresa tu nombre de usuario" required>
            </div>

            <div class="item" style="position: relative; bottom: 100px;">
                <img class="icons" src="View/images/icons/me.png" alt="">
                <h3 class="text" style="left: 0px; top:5px;">Nombre Completo</h3>
                <input id="names" name="names" style="right: 230px;" type="text" placeholder="Ingresa tu nombre completo" required>
            </div>

            <div class="item" style="position: relative; bottom: 60px;">
                <img class="icons" src="View/images/icons/phone.png" alt="">
                <h3 class="text" style="left: 0px; top:5px;">Celular</h3>
                <input id="cel" name="cel" style="right: 90px;" type="number" placeholder="Ingresa tu numero de celular" required>
            </div>

            <div class="item" style="position: relative; bottom: 20px;">
                <img class="icons" src="View/images/icons/email.png" alt="">
                <h3 class="text" style="left: 0px; top:5px;">Email</h3>
                <input id="email" name="email" style="right: 70px;" type="text" placeholder="Ingresa tu correo" required>
            </div>

            <div class="item" style="position: relative; top: 20px;">
                <img class="icons" src="View/images/icons/lock.png" alt="">
                <h3 class="text" style="left: 0px; top:5px;">Contraseña</h3>
                <input id="password" name="pass" style="right: 150px;" type="password" placeholder="*****************" required>
            </div>

            <div class="item" style="position: relative; top: 90px;">
                    <button class="log" type="submit">Crea tu Cuenta Ahora</button>
        </form>
                <h5 style="position: relative; right: 440px; top: 40px;">Si ya tienes una cuenta creada, <span id="acco" onclick="acco2();">Inicia Sesion</span></h5>
            </div>

            <br>

        </div>

        <h4 class="text2">©2024 - ETB <br> (Empresa de Telecomunicaciones de Bogotá)</h4>

    </div>