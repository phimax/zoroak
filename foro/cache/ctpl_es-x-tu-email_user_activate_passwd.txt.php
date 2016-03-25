<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Activación de nueva clave

Hola <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>


Estás recibiendo esta notificación porque tú (o alguien reemplazándote) solicitaste una nueva clave para tu cuenta en "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>".
Si no lo solicitaste por favor ignora esta notificación. 
Si persiste la solicitud contacta con La Administración del Sitio.

Para usar la nueva clave necesitas activarla. Para ello visita el siguiente enlace.

<?php echo (isset($this->_rootref['U_ACTIVATE'])) ? $this->_rootref['U_ACTIVATE'] : ''; ?>


Si no hay inconvenientes podrás identificarse mediante la siguiente nueva clave:

Clave: <?php echo (isset($this->_rootref['PASSWORD'])) ? $this->_rootref['PASSWORD'] : ''; ?>


Por supuesto posteriormente puedes cambiar esta clave para tu cuenta mediante el Panel de Control de Usuario.
Si tienes alguna dificultad contacta con La Administración del Sitio.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>