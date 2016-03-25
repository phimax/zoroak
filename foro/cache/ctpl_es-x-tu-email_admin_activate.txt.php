<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Activar cuenta de usuario.

Hola,

La cuenta de "<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>" ha sido desactivada o creada nuevamente, deberías verificar los detalles de este usuario (si se requiere) y proceder según sea apropiado.

Sigue este enlace para ver el perfil del usuario:
<?php echo (isset($this->_rootref['U_USER_DETAILS'])) ? $this->_rootref['U_USER_DETAILS'] : ''; ?>


Sigue este enlace para activar la cuenta:
<?php echo (isset($this->_rootref['U_ACTIVATE'])) ? $this->_rootref['U_ACTIVATE'] : ''; ?>



<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>