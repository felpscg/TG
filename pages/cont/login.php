<?php

class login {

    function __construct() {
        echo "<script>
    function submit() {
        document.formp.submit();
    }
</script>
<div id='corpo' >
    <form id='formp' name='formp' method='POST' action='#'>
        <fieldset>
            <legend>Login</legend>
            <div class='campo'>
                <div class='nome-campo'>
                    <p><span>E-mail ou CPF:*</span></p>
                    <p><span>Senha:*</span></p>
                </div>
                <div class='item-campo'>
                    <p><input type='text' name='login' /></p>
                    <p><input type='text' name='senha' /></p>

                </div>
                <p><a href='cadastrar.php'><input type='button' value='Cadastrar'/></a>
                    <input type='hidden' name='acesso' value='true'/>
                    <input type='button' value='Prosseguir' onclick='submit();'/></p>
            </div>
        </fieldset>
    </form>
</div>";
    }

}
