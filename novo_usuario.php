<?php
?>
<form action="novo_usuario_gravar.php" method='post'>
    <div><input type="text" name='nome' placeholder='Nome'></div>
    <div><input type="email" name='email' placeholder='Email'></div>
    <div><input type="text" name='user' placeholder='Usuário'></div>
    <div><input type="password" name='pass' placeholder='Senha'></div>
    <div>Admin<input type="checkbox" name='admin' value='1'></div>

    <div><input type="submit" value='gravar'></div>
</form>