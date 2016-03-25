<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Cuenta activada

Hola <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Tu cuenta en "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>" ha sido activada por un Administrador, ahora puedes identificarte.

Tu contraseña ha sido guardada de forma segura en nuestra base de datos y no puede ser recuperada. En el caso de que la olvides tendrás la posibilidad de regenerarla usando la misma dirección de correo electrónico asociada a tu cuenta.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>