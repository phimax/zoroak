<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Notificación de nuevo tema - "<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>"

Hola <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Estás recibiendo esta notificación porque sigues el foro, "<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>" de "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>".
Este foro tiene un nuevo tema<?php if ($this->_rootref['AUTHOR_NAME'] !== ('')) {  ?> por <?php echo (isset($this->_rootref['AUTHOR_NAME'])) ? $this->_rootref['AUTHOR_NAME'] : ''; } ?> desde tu última visita, "<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>".
Puedes usar el siguiente enlace para ver el foro. No se enviarán más notificaciones hasta que lo visites.

<?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?>


Si no quieres seguir más ese foro puedes hacer clic en "Cancelar suscripción al Foro" cuando estés allí, o bien siguiendo este enlace:

<?php echo (isset($this->_rootref['U_STOP_WATCHING_FORUM'])) ? $this->_rootref['U_STOP_WATCHING_FORUM'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>