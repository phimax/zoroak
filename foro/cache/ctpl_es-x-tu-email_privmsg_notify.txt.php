<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Tienes un nuevo mensaje privado

Hola <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Has recibido un nuevo mensaje privado de "<?php echo (isset($this->_rootref['AUTHOR_NAME'])) ? $this->_rootref['AUTHOR_NAME'] : ''; ?>" en tu cuenta de "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>" con el siguiente tema:

<?php echo (isset($this->_rootref['SUBJECT'])) ? $this->_rootref['SUBJECT'] : ''; ?>


Puedes ver su nuevo mensaje visitando el siguiente enlace:

<?php echo (isset($this->_rootref['U_VIEW_MESSAGE'])) ? $this->_rootref['U_VIEW_MESSAGE'] : ''; ?>


Has solicitado que se te notifique, recuerda que siempre puedes elegir no ser notificado de nuevos mensajes cambiando esta opción en tu perfil.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>