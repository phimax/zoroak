<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Notificación de mensaje en el foro - "<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>"

Hola <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Estás recibiendo esta notificación porque estás siguiendo el foro, "<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>" en "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>".
Este foro tiene una nueva respuesta al tema "<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>"<?php if ($this->_rootref['AUTHOR_NAME'] !== ('')) {  ?> por <?php echo (isset($this->_rootref['AUTHOR_NAME'])) ? $this->_rootref['AUTHOR_NAME'] : ''; } ?> desde tu última visita.
Siguiendo este enlace puedes ver esa respuesta, no se enviarán más notificaciones hasta que visites ese enlace.

<?php echo (isset($this->_rootref['U_NEWEST_POST'])) ? $this->_rootref['U_NEWEST_POST'] : ''; ?>


Si quieres ver el tema, haz clic en el siguiente enlace:
<?php echo (isset($this->_rootref['U_TOPIC'])) ? $this->_rootref['U_TOPIC'] : ''; ?>


Si quieres ver el foro, haz clic en el siguiente enlace:
<?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?>


Si no quieres seguir más ese foro puedes hacer clic en "Cancelar suscripción al Foro" cuando estés allí, o bien siguiendo este enlace:

<?php echo (isset($this->_rootref['U_STOP_WATCHING_FORUM'])) ? $this->_rootref['U_STOP_WATCHING_FORUM'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>