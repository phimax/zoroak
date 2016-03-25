<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Tu cuenta ha sido desactivada

Hola <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Tu cuenta en "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>" ha sido desactivada, probablemente debido a cambios hechos en tu perfil.
La Administración del Sitio deberá activarla antes de que puedas identificarse de nuevo.
Recibirás otra notificación cuando esto ocurra.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>